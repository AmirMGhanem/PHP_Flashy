<?php
require_once("utils.php");

Class Entity
{
    public $_entity_name;
    public $_entity_path="Files/";
    public $_entity_content;

    public function __construct($name,$new_instance=True)
    {
        $this->_entity_name = $name;
        $this->_entity_path = $this->_entity_path.$name;
        if($new_instance)
        {
            init_file($this->_entity_path);
            echo "Entity created  - " . $this->_entity_name . "     |    PATH - ". $this->_entity_path;
            echo "<br> <br>" ;
        }

    }

    public function get_content(){
        return $this->_entity_content;
    }


    public function set_name($name)
    {
        $this->_entity_name = $name;
    }

    public function set_path($path)
    {
        $this->_entity_path = $path;
    }

    public function set_content($content)
    {
        $this->_entity_content = $content;
    }
    

    public function load()
    {
        $content= load_file($this->_entity_path);
        $this->set_content($content);
        return json_encode($content,JSON_PRETTY_PRINT);
        
    }

    public function append($content)
    {
        append_to_file($this->_entity_path,$content);
        echo "Entity appended  - " . $this->_entity_name . "     |    PATH - ". $this->_entity_path;
    }

    public function find_in_json($k, $v)
    {
        find_in_file($this->_entity_path, $k, $v);
    }

    public function find_all($args)
    {
        
        $result = find_all_in_file($this->_entity_path, $args);
        return $result;
        
    }

    public function delete_data_from_file($key,$value)
    {
        try {
        remove_data_from_file($this->_entity_path,$key,$value);
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }


    public function delete_file()
    {
        delete_file($this->_entity_path);
        echo "Entity ".$this->_entity_name." deleted"; 
    }
}
