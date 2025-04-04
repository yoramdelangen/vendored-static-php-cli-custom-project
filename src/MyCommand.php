<?php

declare(strict_types=1);

namespace App;

use SPC\command\BaseCommand;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand('test-command', 'Testing build command', ['test:php'])]
class MyCommand extends BaseCommand
{
    public function handle(): int
    {
        var_dump("hllow world");

        return 0;
    }
}
