<?php

namespace OrpheusNET\Logchecker;

use Symfony\Component\Console\Application;

class LogcheckerConsole extends Application
{
    public function __construct()
    {
        $composer_config = json_decode(file_get_contents(__DIR__ . '/../composer.json'), true);
        $version = $composer_config['version'];

        parent::__construct('Logchecker', $version);

        $analyze_command = new Command\AnalyzeCommand();

        $this->addCommands([
            $analyze_command,
            new Command\DecodeCommand(),
            new Command\TranslateCommand()
        ]);
    }
}
