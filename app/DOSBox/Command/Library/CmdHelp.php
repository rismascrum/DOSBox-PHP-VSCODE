<?php

namespace DOSBox\Command\Library;

use DOSBox\Interfaces\IDrive;
use DOSBox\Interfaces\IOutputter;
use DOSBox\Command\BaseCommand as Command;

class CmdHelp extends Command {
    private $directoryToPrint;

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
        $command = null;
        if(!empty($this->params[0])){
            $command = $this->params[0];
        }

        $list_command = [
            'cd','dir','exit','format','help','label','mkdir','mkfile','mkdir','move',
        ];

        if(empty($command) || $command == strtolower('cd')){
            $this->getCd($outputter);
        }
        
        if(empty($command) || $command == strtolower('dir')){
            $this->getDir($outputter);
        }

        if(empty($command) || $command == strtolower('exit')){
            $this->getExit($outputter);
        }

        if(empty($command) || $command == strtolower('format')){
            $this->getFormat($outputter);
        }

        if(empty($command) || $command == strtolower('help')){
            $this->getHelp($outputter);
        }

        if(empty($command) || $command == strtolower('label')){
            $this->getLabel($outputter);
        }

        if(empty($command) || $command == strtolower('mkdir')){
            $this->getMkdir($outputter);
        }

        if(empty($command) || $command == strtolower('mkfile')){
            $this->getMkfile($outputter);
        }

        if(empty($command) || $command == strtolower('move')){
            $this->getMove($outputter);
        }

        if(!empty($command) && !in_array($command,$list_command)){
            $this->getCommandNotFound($outputter);
        }
    }

    private function getCd(IOutputter $outputter){
        $outputter->printLine("CD displays the name of or changes the current directory");
    }

    private function getDir(IOutputter $outputter){
        $outputter->printLine("DIR Displays a list of files and subdirectories in a directory");
    }

    private function getExit(IOutputter $outputter){
        $outputter->printLine("EXIT Quits the CMD.EXE program (command interpreter)");
    }

    private function getFormat(IOutputter $outputter){
        $outputter->printLine("FORMAT Formats a disk for use with Windows");
    }

    private function getHelp(IOutputter $outputter){
        $outputter->printLine("HELP Provides Help information for Windows commands");
    }

    private function getLabel(IOutputter $outputter){
        $outputter->printLine("LABEL Creates, Changes, Deletes the volumes label of a disk");
    }

    private function getMkdir(IOutputter $outputter){
        $outputter->printLine("MKDIR Creates a directory");
    }

    private function getMkfile(IOutputter $outputter){
        $outputter->printLine("MKFILE Created a file");
    }

    private function getMove(IOutputter $outputter){
        $outputter->printLine("MOVE Moves one or more files from one directory to another directory");
    }

    private function getCommandNotFound(IOutputter $outputter){
        $outputter->printLine("Error display ...");
    }
}