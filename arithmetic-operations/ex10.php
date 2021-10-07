<?php




class Geometry{

    public static function rectangle($len, $wid){
        return $len * $wid;
    }
    public static function circle($r){
        return ($r * $r) * pi();
    }
    public static function triangle($base, $height){
        return $base * $height * 0.5;
    }
}


$selection = (int) readLine('Enter your choice (1-4): ');


if($selection === 1){
    $r= readline('Enter radius : ');
    echo (round(Geometry::circle($r))).PHP_EOL;
}
else if ($selection === 2) {
    $l = readline('Enter length: ');
    $w = readline('Enter width: ');
    echo Geometry::rectangle($l , $w) .PHP_EOL;
}
else if ($selection === 3){
    $b = readline('Enter base Length : ');
    $h = readline('Enter height : ');
    echo Geometry::triangle($b, $h). PHP_EOL;
}
else if ($selection === 4){
    exit;
}
else {
    echo 'Error'. PHP_EOL;
}



