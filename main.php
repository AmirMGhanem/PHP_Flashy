<?php 
include "utils.php";
include "entity.php";
include "FDB.php";


$fdb = new FDB();
$ents = $fdb->get_entities();
$fdb->create_entity("test");
$ents2 = $fdb->get_entities();
print_r($fdb)





// $content = ["id"=>1,"name"=>"Amir","age"=>28,"address"=>"TLV"];
// $entity->append($conent2append);
// $c1 = ["id"=>3,"name"=>"Amir is the best","age"=>27,"address"=>"HAHAHAHAAHA HELL"];
// $entity->append($c1);

// $entity->find_in_json("id",1);
// $entity->find_in_json("id","3");


?>