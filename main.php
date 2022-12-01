<?php
include "Entity/entity.php";
include "FDB/FDB.php";
include "Exporter/exporter.php";


// $fdb = new FDB();
// print_r($fdb->get_entities());
// $customer=$fdb->get_entity("customer");
// echo "<br>";
// echo "<br>";
// $customer->find_in_json("x","x");


// $result = export_to_pdf(["id","name","age","address"]);


$e = new Entity("customer",False);
$xls= new exporter();
$xls->export($e,["name","age"]);