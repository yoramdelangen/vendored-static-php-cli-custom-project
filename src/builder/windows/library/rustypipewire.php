<?php

declare(strict_types=1);

namespace App\builder\windows\library;

use SPC\builder\linux\library\LinuxLibraryBase;
use SPC\store\FileSystem;

class rustypipewire extends LinuxLibraryBase
{
    public const NAME = 'rustypipewire';

    /**
     * @throws RuntimeException
     * @throws FileSystemException
     */
    protected function build(): void
    {
        FileSystem::createDir(BUILD_ROOT_PATH . '/bin/ext');

        $files = glob($this->source_dir . '/*.{dll,lib}', GLOB_BRACE);
        foreach ($files as $file) {
            copy($file, BUILD_ROOT_PATH . '/bin/ext/' . basename($file));
        }
    }
}
