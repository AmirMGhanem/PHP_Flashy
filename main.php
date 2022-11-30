<?php 
include "utils.php";


Class Entity
{
    public $_entity_name;
    public $_entity_path="Files/";
    public $_entity_content;

    public function __construct($name)
    {
        $this->_entity_name = $name;
        $this->_entity_path = $this->_entity_path.$name;
        // init_file($this->_entity_path);

        echo "Entity created";
        echo "<br>";
    }

    public function load()
    {
        $content= load_file($this->_entity_path);
        return json_encode($content,JSON_PRETTY_PRINT);
        
    }

    public function append($content)
    {
        append_to_file($this->_entity_path,$content);
    }

}

$entity = new Entity("customer");
$content = ["id"=>1,"name"=>"Amir","age"=>28,"address"=>"TLV"];
$conent2append=["id"=>2,"name"=>"Wafa","age"=>27,"address"=>"Maghar"];
$entity->append($conent2append);





?>