<?php

namespace Ob\ExcelMerge\Console;

use Symfony\Component\Console\Application as BaseApplication;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class Application extends BaseApplication
{
    const NAME = 'Excel Merge';
    const VERSION = '0.1';

    public function __construct()
    {
        parent::__construct(static::NAME, static::VERSION);
    }

//    public function getDefaultInputDefinition()
//    {
//        return new InputDefinition(array(
//            new InputArgument('command', InputArgument::REQUIRED, 'The command to execute'),
//
//            new InputOption('--help', '-h', InputOption::VALUE_NONE, 'Display this help message.'),
//        ));
//    }
}