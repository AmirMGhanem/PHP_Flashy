<?php
include "Entity/entity.php";
include "Exporter/exporter.php";
include "FDB/FDB.php";





// init the db instance (FDB - File Database)
$db = new FDB();
$entities = $db->get_entities();
// $db->get_entity("orders")->delete_data_from_file("price", "1000");
$db->rename_entity("orders2", "orders");
//$db->create_entity("orders");
//$db->get_entity("orders")->append(['name' => 'amir', 'order' => 'iphone', 'price' => '6.5K']);
// $xls= new exporter();
// $xls->export_to_xls($db->get_entity("orders"),["name","price"]);



