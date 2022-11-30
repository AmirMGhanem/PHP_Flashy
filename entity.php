<?php


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

    public function find_in_json($k,$v)
    {
        find_in_file($this->_entity_path,$k,$v);
    }

}


?>