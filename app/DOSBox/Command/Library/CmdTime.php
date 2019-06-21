<?php

namespace DOSBox\Command\Library;

use DOSBox\Interfaces\IDrive;
use DOSBox\Interfaces\IOutputter;
use DOSBox\Filesystem\Directory;
use DOSBox\Command\BaseCommand as Command;

class CmdTime extends Command {
    private $directoryToPrint;

    const SYSTEM_CANNOT_FIND_THE_PATH_SPECIFIED = "File Not Found.";

    public function __construct($commandName, IDrive $drive){
        parent::__construct($commandName, $drive);
    }

    public function checkNumberOfParameters($numberOfParametersEntered) {
        return ($numberOfParametersEntered == 0 || $numberOfParametersEntered == 1);
    }

    public function checkParameterValues(IOutputter $outputter) {
        if($this->getParameterCount() > 0)
        {
            
        }
        return true;
    }

    public function printCurrentTime(IOutputter $outputter){
        $outputter->printLine(date('H:i:s'));
        $outputter->newLine();
    }

    public function execute(IOutputter $outputter){
        $this->printCurrentTime($outputter);
    }

    public function printHeader($directoryToPrint, IOutputter $outputter) {
        $outputter->printLine(" Directory of " . $directoryToPrint->getPath());
        $outputter->newLine();
    }

}