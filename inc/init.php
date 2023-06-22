<?php
$files=["date/NepaliCalendar","date/TechieCalendar","menu/custom","admin/meta"];

foreach($files as $file){
    $file_name=__DIR__."/plugin/".$file.".php";
    if(file_exists($file_name)){
        require $file_name;
    }
}