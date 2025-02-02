<?php

namespace DOSBox\Filesystem;

use DOSBox\Filesystem\Directory;

abstract class FileSystemItem {
    protected $name, $parent, $current_date;

    const ILLEGAL_ARGUMENT_TEXT = "Error: A file or directory name may not contain '/', '\', ',', ' ' or ':'";

    public function __construct($name, $parent){
        $this->name = $name;
        $this->parent = $parent;
        $this->currentDate = '';
    }

    public function getPath() {
        $path = "";

        if($this->parent != null) {
            $path = $this->parent->getPath() . "\\" . $this->name;
        } else {  // For root directory
            $path = $this->name;
        }

        return $path;
    }

    public function getParent(){
        return $this->parent;
    }

    public function setParent($parent){
        $this->parent = $parent;
    }

    protected static function checkName($name) {
        if( strstr($name, "\\") != false || strstr($name, "/") != false
            || strstr($name, ",") != false || strstr($name, " ") != false) {
            return false;
        }

        return true;
    }

    public function setName($newName) {
        if($this->checkName($newName) == false) {
            throw new Exception(self::ILLEGAL_ARGUMENT_TEXT);
        }

        $this->name = $newName;
        
    }

    public function setCurrentDate() {
        $this->currentDate = date('d/m/Y H:i A');
    }

    public function getName(){
        return $this->name;
    }

    public function getCurrenDate(){
        return $this->currentDate;
    }

    public abstract function isDirectory();

    public abstract function getNumberOfContainedDirectories();

    public abstract function getNumberOfContainedFiles();

    public abstract function getSize();

    public function __toString(){
        return $this->getPath();
    }
}