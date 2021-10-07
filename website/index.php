<?php


require_once 'vendor/autoload.php';

use Spatie\CalendarLinks\Link;



if(isset($_POST['submit']) && isset($_POST['google']))
{
    $from = DateTime::createFromFormat('Y-m-d H:i', $_POST['from']);
    $to = DateTime::createFromFormat('Y-m-d H:i', $_POST['to']);

    $link = Link::create($_POST['title'], $from, $to)
            ->description($_POST['desc']);
//          ->address('Kadaga 10, Adazi');

    echo "<a href='" . $link->google() . "' target=”_blank”>CLICK HERE TO OPEN GOOGLE CALENDAR</a>";
}
elseif (isset($_POST['submit']) && isset($_POST['yahoo']))
{
    $from = DateTime::createFromFormat('Y-m-d H:i', $_POST['from']);
    $to = DateTime::createFromFormat('Y-m-d H:i', $_POST['to']);

    $link = Link::create($_POST['title'], $from, $to)
        ->description($_POST['desc']);
    echo "<a href='" . $link->yahoo() . "' target=”_blank”>CLICK HERE TO OPEN YAHOO CALENDAR</a>";

}

?>

<h1>Party set up</h1>

<form method="post">
    <label for="title">Title:</label><br>
    <input type="text" id="title" name="title"><br>
    <label for="from">From:</label><br>
    <input type="text" id="from" name="from"><br>
    <label for="to">To:</label><br>
    <input type="text" id="to" name="to"><br>
    <label for="desc">Description:</label><br>
    <input type="text" id="desc" name="desc"><br>
    <input type="checkbox" id="google" name="google" value="Google">
    <label for="vehicle1"> Google Calendar</label><br>
    <input type="checkbox" id="yahoo" name="yahoo" value="Yahoo">
    <label for="vehicle2"> Yahoo Calendar</label><br>
    <input type="submit" name="submit" value="Submit">
</form>

