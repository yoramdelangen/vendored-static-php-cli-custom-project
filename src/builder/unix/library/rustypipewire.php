<?php

declare(strict_types=1);

namespace App\builder\unix\library;

use SPC\exception\FileSystemException;
use SPC\exception\RuntimeException;
use SPC\store\FileSystem;

trait rustypipewire
{
    /**
     * @throws RuntimeException
     * @throws FileSystemException
     */
    protected function build(): void
    {
        FileSystem::createDir(BUILD_ROOT_PATH . '/bin/ext');

        $ext = '*.so';
        if (osfamily2dir() === 'macos') {
            $ext = '*.{dylib,so}';
        } else if (osfamily2dir() === 'windows') {
            $ext = '*.{dll,lib}';
        }

        $files = glob($this->source_dir . '/' . $ext, GLOB_BRACE);
        foreach ($files as $file) {
            copy($file, BUILD_ROOT_PATH . '/bin/ext/' . basename($file));
        }
    }
}
