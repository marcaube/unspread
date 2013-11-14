<?php

namespace Ob\Unspread\Console;

use Symfony\Component\Console\Application as BaseApplication;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class Application extends BaseApplication
{
    const NAME = 'Unspread';
    const VERSION = '0.1';

    public function __construct()
    {
        parent::__construct(static::NAME, static::VERSION);
    }
}