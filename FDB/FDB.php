<?php

// Files Database
class FDB
{

    public $entities = [];

    public function __construct()
    {
        // Files Database constructor, scan and create instances of the entites. 
        $files = scandir("Files", 1);
        $files = array_diff($files, array('.', '..'));
        foreach ($files as $file) {
            // Load the current content of the files 
            $content = $this->load_random_file("Files/" . $file);
            // get rid of the .json extension
            $file = explode(".", $file);
            $file = $file[0];
            // init all the entities
            $entity = new Entity($file, False);
            $entity->set_content($content);
            $entity->set_path("Files/" . $file);
            // add the entity to the entities array
            array_push($this->entities, $entity);
        }
    }
    
    /**
     * name: scan_directory
     * description: scan the directory and return true if the file exists
     * @param  mixed $name
     * @return boolean
     */    
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


        
    /**
     * rename_entity
     * description: rename the entity by assigning the old file as new name and deleting the old one
     * @param  mixed $old_name
     * @param  mixed $new_name
     * @return void
     */
    public function rename_entity($old_name, $new_name)
    {
        $this->entities[$new_name] = $this->entities[$old_name];
        unset($this->entities[$old_name]);
    }




        
    /**
     * create_entity
     * description : create a new entity and add it to the entities array if it doesn't exist
     * @param  mixed $name
     * @return void
     */
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

        
    /**
     * get_entities
     * description : return the entities array
     * @return array
     */
    public function get_entities()
    {
        return $this->entities;
    }


        
    /**
     * get_entity
     * description : return the entity by name
     * @param  mixed $name
     * @return array
     */
    // return entity
    public function get_entity($name)
    {
        foreach ($this->entities as $entity) {
            if ($entity->_entity_name == $name)
                return $entity;
        }
    }


    /**
     * remove_entity
     * description : remove the entity by name
     * @param  mixed $name
     * @return void
     */
    public function remove_entity($name)
    {
        foreach ($this->entities as $key => $value) {
            if ($value->_entity_name == $name) {
                $value->delete();
                unset($this->entities[$key]);
            }
        }
    }



    private function load_random_file($file_path)
    {
        $file = fopen($file_path, "r");
        $content = fread($file, filesize($file_path));
        fclose($file);
        return $content;
    }
    
}
