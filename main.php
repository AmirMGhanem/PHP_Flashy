<?php 
include "utils.php";
include "entity.php";

$entity = new Entity("customer");
$content = ["id"=>1,"name"=>"Amir","age"=>28,"address"=>"TLV"];
// $entity->append($conent2append);
$c1 = ["id"=>3,"name"=>"Amir is the best","age"=>27,"address"=>"HAHAHAHAAHA HELL"];
// $entity->append($c1);

$entity->find_in_json("name","Amir is the best");





?>