<?php

namespace DOSBox\Command\Library;

use DOSBox\Interfaces\IDrive;
use DOSBox\Interfaces\IOutputter;
use DOSBox\Command\BaseCommand as Command;

class CmdVer extends Command {
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
        $outputter->printLine("Microsoft Windows XP [Version 5.1.2600]");
        $outputter->printLine("afandi afandi@idntimes.com");
        $outputter->printLine("bella bella@idntimes.com");
        $outputter->printLine("reza reza@idntimes.com");
        $outputter->printLine("pratiwi pratiwi@idntimes.com");
        $outputter->printLine("eka eka@idntimes.com");
    }
}