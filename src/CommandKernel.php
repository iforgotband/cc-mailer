<?php

use Symfony\Component\Yaml\Parser;

class CommandKernel {
    private $config;

    function __construct() {
        $yaml = new Parser();
        $config = $yaml->parse(file_get_contents('config/parameters.yml'));
        $this->config = new StdClass();

        foreach ($config['parameters'] as $key => $val) {
            $this->config->{$key} = $val;
        }
    }

    function run($whatToRun, $params = array()) {
        $className = str_replace('-', ' ', $whatToRun);
        $className = ucwords($className);
        $className = str_replace(' ', '', $className);

        $fqClass = 'Jobs\\' . $className;
        if (class_exists($fqClass)) {
            $thingy = new $fqClass($this->config, $params);
            $thingy->run();
        } else {
            echo "This isn't a job I know how to do.\n";
        }
    }
}

