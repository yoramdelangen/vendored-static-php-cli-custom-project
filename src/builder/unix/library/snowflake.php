<?php

declare(strict_types=1);

namespace App\builder\unix\library;

use SPC\exception\FileSystemException;
use SPC\exception\RuntimeException;
use SPC\store\FileSystem;

trait snowflake
{
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
