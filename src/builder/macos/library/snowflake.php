<?php

declare(strict_types=1);

namespace App\builder\macos\library;

use SPC\builder\macos\library\MacOSLibraryBase;

class snowflake extends MacOSLibraryBase
{
    use \App\builder\unix\library\snowflake;

    public const NAME = 'snowflake';
}
