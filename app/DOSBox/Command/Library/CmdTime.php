<?php

namespace DOSBox\Command\Library;

use DOSBox\Interfaces\IDrive;
use DOSBox\Interfaces\IOutputter;
use DOSBox\Filesystem\Directory;
use DOSBox\Command\BaseCommand as Command;

class CmdTime extends Command {
    private $directoryToPrint;

    const SYSTEM_CANNOT_FIND_THE_PATH_SPECIFIED = "File Not Found.";
    const PARAMETER_NOT_DATE = "Error, Your Parameter Is Not Date";

    public function __construct($commandName, IDrive $drive){
        parent::__construct($commandName, $drive);
    }

    public function checkNumberOfParameters($numberOfParametersEntered) {
        return ($numberOfParametersEntered == 0 || $numberOfParametersEntered == 1);
    }

    public function checkParameterValues(IOutputter $outputter) {
        // for($i=0; $i< $this->getParameterCount(); $i++) {
        //     if ($this->isDate($this->getParameterAt($i), $outputter))
        //         return false;
        // }
        return true;
    }

    public function isDate($parameter,IOutputter $outputter){
        if(strtotime($parameter) == false){
            $outputter->printLine(self::PARAMETER_NOT_DATE);
            return true;
        }
    }

    public function printCurrentTime(IOutputter $outputter){
        $outputter->printLine(date('H:i:s'));
        $outputter->newLine();
    }

    public function execute(IOutputter $outputter){
        if($this->getParameterCount() > 0){
            for($i=0; $i< $this->getParameterCount(); $i++) {
                if ($this->isDate($this->getParameterAt($i), $outputter))
                    return false;
            }
        }else{
            $this->printCurrentTime($outputter);
        }

    }

    public function printHeader($directoryToPrint, IOutputter $outputter) {
        $outputter->printLine(" Directory of " . $directoryToPrint->getPath());
        $outputter->newLine();
    }

}