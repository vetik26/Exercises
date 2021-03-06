(function() {

    if (window.WEB_SOCKET_FORCE_FLASH) {
        // Keeps going.
    } else if (window.WebSocket) {
        return;
    } else if (window.MozWebSocket) {
        // Firefox.
        window.WebSocket = MozWebSocket;
        return;
    }

    var logger;
    if (window.WEB_SOCKET_LOGGER) {
        logger = WEB_SOCKET_LOGGER;
    } else if (window.console && window.console.log && window.console.error) {
        logger = window.console;
    } else {
        logger = {log: function(){ }, error: function(){ }};
    }

    if (swfobject.getFlashPlayerVersion().major < 10) {
        logger.error("Flash Player >= 10.0.0 is required.");
        return;
    }
    if (location.protocol == "file:") {
        logger.error(
            "WARNING: web-socket-js doesn't work in file:///... URL " +
            "unless you set Flash Security Settings properly. " +
            "Open the page via Web server i.e. http://...");
    }

    /**
     * Our own implementation of WebSocket class using Flash.
     * @param {string} url
     * @param {array or string} protocols
     * @param {string} proxyHost
     * @param {int} proxyPort
     * @param {string} headers
     */
    window.WebSocket = function(url, protocols, proxyHost, proxyPort, headers) {
        var self = this;
        self.__id = WebSocket.__nextId++;
        WebSocket.__instances[self.__id] = self;
        self.readyState = WebSocket.CONNECTING;
        self.bufferedAmount = 0;
        self.__events = {};
        if (!protocols) {
            protocols = [];
        } else if (typeof protocols == "string") {
            protocols = [protocols];
        }

        self.__createTask = setTimeout(function() {
            WebSocket.__addTask(function() {
                self.__createTask = null;
                WebSocket.__flash.create(
                    self.__id, url, protocols, proxyHost || null, proxyPort || 0, headers || null);
            });
        }, 0);
    };

    /**
     * Send data to the web socket.
     * @param {string} data  The data to send to the socket.
     * @return {boolean}  True for success, false for failure.
     */
    WebSocket.prototype.send = function(data) {
        if (this.readyState == WebSocket.CONNECTING) {
            throw "INVALID_STATE_ERR: Web Socket connection has not been established";
        }

        var result = WebSocket.__flash.send(this.__id, encodeURIComponent(data));
        if (result < 0) { // success
            return true;
        } else {
            this.bufferedAmount += result;
            return false;
        }
    };

    /**
     * Close this web socket gracefully.
     */
    WebSocket.prototype.close = function() {
        if (this.__createTask) {
            clearTimeout(this.__createTask);
            this.__createTask = null;
            this.readyState = WebSocket.CLOSED;
            return;
        }
        if (this.readyState == WebSocket.CLOSED || this.readyState == WebSocket.CLOSING) {
            return;
        }
        this.readyState = WebSocket.CLOSING;
        WebSocket.__flash.close(this.__id);
    };

    /**
     * Implementation of {@link <a href="http://www.w3.org/TR/DOM-Level-2-Events/events.html#Events-registration">DOM 2 EventTarget Interface</a>}
     *
     * @param {string} type
     * @param {function} listener
     * @param {boolean} useCapture
     * @return void
     */
    WebSocket.prototype.addEventListener = function(type, listener, useCapture) {
        if (!(type in this.__events)) {
            this.__events[type] = [];
        }
        this.__events[type].push(listener);
    };

    /**
     * Implementation of {@link <a href="http://www.w3.org/TR/DOM-Level-2-Events/events.html#Events-registration">DOM 2 EventTarget Interface</a>}
     *
     * @param {string} type
     * @param {function} listener
     * @param {boolean} useCapture
     * @return void
     */
    WebSocket.prototype.removeEventListener = function(type, listener, useCapture) {
        if (!(type in this.__events)) return;
        var events = this.__events[type];
        for (var i = events.length - 1; i >= 0; --i) {
            if (events[i] === listener) {
                events.splice(i, 1);
                break;
            }
        }
    };

    /**
     * Implementation of {@link <a href="http://www.w3.org/TR/DOM-Level-2-Events/events.html#Events-registration">DOM 2 EventTarget Interface</a>}
     *
     * @param {Event} event
     * @return void
     */
    WebSocket.prototype.dispatchEvent = function(event) {
        var events = this.__events[event.type] || [];
        for (var i = 0; i < events.length; ++i) {
            events[i](event);
        }
        var handler = this["on" + event.type];
        if (handler) handler.apply(this, [event]);
    };

    /**
     * Handles an event from Flash.
     * @param {Object} flashEvent
     */
    WebSocket.prototype.__handleEvent = function(flashEvent) {

        if ("readyState" in flashEvent) {
            this.readyState = flashEvent.readyState;
        }
        if ("protocol" in flashEvent) {
            this.protocol = flashEvent.protocol;
        }

        var jsEvent;
        if (flashEvent.type == "open" || flashEvent.type == "error") {
            jsEvent = this.__createSimpleEvent(flashEvent.type);
        } else if (flashEvent.type == "close") {
            jsEvent = this.__createSimpleEvent("close");
            jsEvent.wasClean = flashEvent.wasClean ? true : false;
            jsEvent.code = flashEvent.code;
            jsEvent.reason = flashEvent.reason;
        } else if (flashEvent.type == "message") {
            var data = decodeURIComponent(flashEvent.message);
            jsEvent = this.__createMessageEvent("message", data);
        } else {
            throw "unknown event type: " + flashEvent.type;
        }

        this.dispatchEvent(jsEvent);

    };

    WebSocket.prototype.__createSimpleEvent = function(type) {
        if (document.createEvent && window.Event) {
            var event = document.createEvent("Event");
            event.initEvent(type, false, false);
            return event;
        } else {
            return {type: type, bubbles: false, cancelable: false};
        }
    };

    WebSocket.prototype.__createMessageEvent = function(type, data) {
        if (window.MessageEvent && typeof(MessageEvent) == "function" && !window.opera) {
            return new MessageEvent("message", {
                "view": window,
                "bubbles": false,
                "cancelable": false,
                "data": data
            });
        } else if (document.createEvent && window.MessageEvent && !window.opera) {
            var event = document.createEvent("MessageEvent");
            event.initMessageEvent("message", false, false, data, null, null, window, null);
            return event;
        } else {
            return {type: type, data: data, bubbles: false, cancelable: false};
        }
    };

    /**
     * Define the WebSocket readyState enumeration.
     */
    WebSocket.CONNECTING = 0;
    WebSocket.OPEN = 1;
    WebSocket.CLOSING = 2;
    WebSocket.CLOSED = 3;

    WebSocket.__isFlashImplementation = true;
    WebSocket.__initialized = false;
    WebSocket.__flash = null;
    WebSocket.__instances = {};
    WebSocket.__tasks = [];
    WebSocket.__nextId = 0;

    /**
     * Load a new flash security policy file.
     * @param {string} url
     */
    WebSocket.loadFlashPolicyFile = function(url){
        WebSocket.__addTask(function() {
            WebSocket.__flash.loadManualPolicyFile(url);
        });
    };

    /**
     * Loads WebSocketMain.swf and creates WebSocketMain object in Flash.
     */
    WebSocket.__initialize = function() {

        if (WebSocket.__initialized) return;
        WebSocket.__initialized = true;

        if (WebSocket.__swfLocation) {
            window.WEB_SOCKET_SWF_LOCATION = WebSocket.__swfLocation;
        }
        if (!window.WEB_SOCKET_SWF_LOCATION) {
            logger.error("[WebSocket] set WEB_SOCKET_SWF_LOCATION to location of WebSocketMain.swf");
            return;
        }
        if (!window.WEB_SOCKET_SUPPRESS_CROSS_DOMAIN_SWF_ERROR &&
            !WEB_SOCKET_SWF_LOCATION.match(/(^|\/)WebSocketMainInsecure\.swf(\?.*)?$/) &&
            WEB_SOCKET_SWF_LOCATION.match(/^\w+:\/\/([^\/]+)/)) {
            var swfHost = RegExp.$1;
            if (location.host != swfHost) {
                logger.error(
                    "[WebSocket] You must host HTML and WebSocketMain.swf in the same host " +
                    "('" + location.host + "' != '" + swfHost + "'). " +
                    "See also 'How to host HTML file and SWF file in different domains' section " +
                    "in README.md. If you use WebSocketMainInsecure.swf, you can suppress this message " +
                    "by WEB_SOCKET_SUPPRESS_CROSS_DOMAIN_SWF_ERROR = true;");
            }
        }
        var container = document.createElement("div");
        container.id = "webSocketContainer";

        container.style.position = "absolute";
        if (WebSocket.__isFlashLite()) {
            container.style.left = "0px";
            container.style.top = "0px";
        } else {
            container.style.left = "-100px";
            container.style.top = "-100px";
        }
        var holder = document.createElement("div");
        holder.id = "webSocketFlash";
        container.appendChild(holder);
        document.body.appendChild(container);

        swfobject.embedSWF(
            WEB_SOCKET_SWF_LOCATION,
            "webSocketFlash",
            "1" /* width */,
            "1" /* height */,
            "10.0.0" /* SWF version */,
            null,
            null,
            {hasPriority: true, swliveconnect : true, allowScriptAccess: "always"},
            null,
            function(e) {
                if (!e.success) {
                    logger.error("[WebSocket] swfobject.embedSWF failed");
                }
            }
        );

    };

    /**
     * Called by Flash to notify JS that it's fully loaded and ready
     * for communication.
     */
    WebSocket.__onFlashInitialized = function() {

        setTimeout(function() {
            WebSocket.__flash = document.getElementById("webSocketFlash");
            WebSocket.__flash.setCallerUrl(location.href);
            WebSocket.__flash.setDebug(!!window.WEB_SOCKET_DEBUG);
            for (var i = 0; i < WebSocket.__tasks.length; ++i) {
                WebSocket.__tasks[i]();
            }
            WebSocket.__tasks = [];
        }, 0);
    };

    /**
     * Called by Flash to notify WebSockets events are fired.
     */
    WebSocket.__onFlashEvent = function() {
        setTimeout(function() {
            try {

                var events = WebSocket.__flash.receiveEvents();
                for (var i = 0; i < events.length; ++i) {
                    WebSocket.__instances[events[i].webSocketId].__handleEvent(events[i]);
                }
            } catch (e) {
                logger.error(e);
            }
        }, 0);
        return true;
    };


    WebSocket.__log = function(message) {
        logger.log(decodeURIComponent(message));
    };

    WebSocket.__error = function(message) {
        logger.error(decodeURIComponent(message));
    };

    WebSocket.__addTask = function(task) {
        if (WebSocket.__flash) {
            task();
        } else {
            WebSocket.__tasks.push(task);
        }
    };

    /**
     * Test if the browser is running flash lite.
     * @return {boolean} True if flash lite is running, false otherwise.
     */
    WebSocket.__isFlashLite = function() {
        if (!window.navigator || !window.navigator.mimeTypes) {
            return false;
        }
        var mimeType = window.navigator.mimeTypes["application/x-shockwave-flash"];
        if (!mimeType || !mimeType.enabledPlugin || !mimeType.enabledPlugin.filename) {
            return false;
        }
        return mimeType.enabledPlugin.filename.match(/flashlite/i) ? true : false;
    };

    if (!window.WEB_SOCKET_DISABLE_AUTO_INITIALIZATION) {

        swfobject.addDomLoadEvent(function() {
            WebSocket.__initialize();
        });
    }

})();