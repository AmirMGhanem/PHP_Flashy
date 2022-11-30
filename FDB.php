<?php

// Files Database
class FDB
{

    public $entities = [];

    public function __construct()
    {
        $files = scandir("Files", 1);
        $files = array_diff($files, array('.', '..'));
        foreach ($files as $file) {

            $content = load_random_file("Files/" . $file);
            echo "content    " . $content;
            $file = explode(".", $file);
            $file = $file[0];
            $entity = new Entity($file, False);
            $entity->set_content($content);
            $entity->set_path("Files/" . $file);
            array_push($this->entities, $entity);
        }
    }

    public function scan_directory($name)
    {
        $files = scandir("Files", 1);
        $files = array_diff($files, array('.', '..'));
        foreach ($files as $f) {
            $f = explode(".", $f);
            $f = $f[0];
            if ($f == $name)
                return true;
        }
        return false;
    }



    public function rename_entity($old_name, $new_name)
    {
        $this->entities[$new_name] = $this->entities[$old_name];
        unset($this->entities[$old_name]);
    }


    public function create_entity($name)
    {
        if (!($this->scan_directory($name))){
            $entity = new Entity($name);
            array_push($this->entities, $entity);
        }else
        {
            echo "Entity already exists";
        }
            
    }

    public function get_entities()
    {
        return $this->entities;
    }

    public function get_entity($name)
    {
        foreach ($this->entities as $key => $value) {
            if ($value->_entity_name == $name) {
                return $value;
            }
        }
    }

    public function remove_entity($name)
    {
        foreach ($this->entities as $key => $value) {
            if ($value->_entity_name == $name) {
                unset($this->entities[$key]);
            }
        }
    }
}
