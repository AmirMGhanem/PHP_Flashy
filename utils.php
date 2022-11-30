<?php

function init_file($path)
{
    $file = fopen($path.".json", "w");
    fwrite($file,json_encode([]));
    fclose($file);
}


function load_file($path){
    $file = json_decode(json_encode(json_decode(file_get_contents($path.".json"), true)),true);
    return $file;
}


function save_file($path,$content){
    
    $file = fopen($path.".json","w");
    fwrite($file,json_encode($content));
    fclose($file);
}


function append_to_file($path,$content){
    // echo json_encode($content);
    $current=load_file($path);
    if ($current == null)
    {
        echo " empty array ";
    }

}


?>