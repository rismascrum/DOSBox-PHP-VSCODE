<?php

namespace DOSBox\Command\Library;

use DOSBox\Interfaces\IDrive;
use DOSBox\Interfaces\IOutputter;
use DOSBox\Filesystem\File;
use DOSBox\Command\BaseCommand as Command;

class CmdMkFile extends Command {
    public function __construct($commandName, IDrive $drive){
        parent::__construct($commandName, $drive);
    }

    public function checkNumberOfParameters($numberOfParametersEntered) {
        return true;
    }

    public function checkParameterValues(IOutputter $outputter) {
        return true;
    }

    public function execute(IOutputter $outputter){
        $fileName = $this->params[0];

        $fileContent = null;
        if(!empty($this->params[1])){
            $fileContent = $this->params[1];
        }

        if($this->checkFileExist($fileName, $outputter)){
            $newFile = new File($fileName, $fileContent);
            $this->getDrive()->getCurrentDirectory()->add($newFile);
        }
    }

    private function checkFileExist($pathName, IOutputter $outputter) {
        $fsi = $this->getDrive()->getItemFromPath($pathName);

        if ($fsi == null) {
            return true;
        }

        $outputter->printLine("File already exist");

        return false;
    }

}