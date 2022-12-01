<?php
include "utils.php";
include "entity.php";
include "FDB.php";


$fdb = new FDB();
print_r($fdb->get_entities());
$customer=$fdb->get_entity("customer");
echo "<br>";
echo "<br>";
$customer->find_in_json("x","x");


$result = export_to_pdf(["id","name","age","address"]);
