<?php

declare(strict_types=1);

namespace App\builder\windows\library;

use SPC\builder\windows\library\WindowsLibraryBase;
use SPC\store\FileSystem;

class snowflake extends WindowsLibraryBase
{
    public const NAME = 'snowflake';

    /**
     * @throws RuntimeException
     * @throws FileSystemException
     */
    protected function build(): void
    {
        $builddir = BUILD_ROOT_PATH;
        $phpSource = SOURCE_PATH . '/php-src';

        FileSystem::resetDir($this->source_dir . '/modules');
        FileSystem::resetDir($this->source_dir . '/.libs');

        FileSystem::createDir($builddir . '/bin/ext');

        $envs = 'PHP_HOME=' . $phpSource;

        // configure
        shell()->cd($this->source_dir)
            ->exec($envs . ' ./scripts/build_pdo_snowflake.sh');

        copy($this->source_dir . '/modules/pdo_snowflake.so', $builddir . '/bin/ext/pdo_snowflake.so');
    }
}
