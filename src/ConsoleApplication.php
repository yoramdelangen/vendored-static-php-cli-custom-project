<?php

namespace App;

use SPC\builder\BuilderBase;
use SPC\builder\BuilderProvider;
use SPC\ConsoleApplication as SPCConsoleApplication;

class ConsoleApplication extends SPCConsoleApplication
{
    public function __construct()
    {
        parent::__construct();

        BuilderProvider::customize(function (BuilderBase $builder) {
            // $builder->addLib();
            // $builder->addExt();
        });

        $this->addCommands([
            new MyCommand(),
        ]);
    }
}
