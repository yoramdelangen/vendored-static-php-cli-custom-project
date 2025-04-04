<?php

declare(strict_types=1);

namespace App\builder\linux\library;

use SPC\builder\linux\library\LinuxLibraryBase;

class snowflake extends LinuxLibraryBase
{
    use \App\builder\unix\library\snowflake;

    public const NAME = 'snowflake';
}
