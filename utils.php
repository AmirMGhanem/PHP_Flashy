<?php

function load_random_file($file_path)
{
    $file = fopen($file_path, "r");
    $content = fread($file, filesize($file_path));
    fclose($file);
    return $content;
}


function init_file($path)
{
    $file = fopen($path . ".json", "w");
    fwrite($file, json_encode([]));
    fclose($file);
}


function load_file($path)
{
    $file = json_decode(json_encode(json_decode(file_get_contents($path . ".json"), true)), true);
    return $file;
}

function save_file($path, $content)
{

    $file = fopen($path . ".json", "w");
    fwrite($file, json_encode($content));
    fclose($file);
}


function append_to_file($path, $content)
{
    $current = load_file($path);
    array_push($current, $content);
    save_file($path, $current);
}


function find_in_file($path, $k, $v)
{
    $file = load_file($path);
    $found = false;
    foreach ($file as $key => $value) {
        if ($value[$k] == $v) {
            $found = true;
            echo "key - " . $k . ", Value - " . $v . " = Found";
            echo "<br>";
            echo json_encode($value, JSON_PRETTY_PRINT);
            echo "<br>";
        }
    }
    if (!$found) {
        echo "<br>";
        echo "key - " . $k . ", Value - " . $v . " = Not Found";
        echo "<br>";
    }
}

function delete_file($path)
{
    unlink($path . ".json");


}
