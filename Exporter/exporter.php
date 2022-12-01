<?php
require_once('fpdf/fpdf.php');
require_once("utils.php");

class exporter
{
    public $pdf;
    public function __construct()
    {
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=exported_file.xls");
    }

    public function export($entity, $args)
    {
        if (!($entity instanceof Entity)) {
            throw new Exception("Entity is not an instance of Entity");
        }
        if (is_array($args)) {
            $values = $entity->find_all($args);
            $strval = values_to_excel_string($values);
            $args = implode("\t", $args);
            echo $args;
            echo $strval;
        }
    }
}
