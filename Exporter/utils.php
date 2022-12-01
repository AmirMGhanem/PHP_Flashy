<?php

function values_to_excel_string($values)
{

    $string_val="";
    foreach($values as $value)
    {
        $string_val.="\n";
        $string_val.=implode("\t", $value);
        

    }
    return $string_val;
}

?>