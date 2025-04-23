<?php

declare(strict_types=1);

namespace App\builder\macos\library;

use SPC\builder\macos\library\MacOSLibraryBase;

class rustypipewire extends MacOSLibraryBase
{
    use \App\builder\unix\library\rustypipewire;

    public const NAME = 'rustypipewire';
}
