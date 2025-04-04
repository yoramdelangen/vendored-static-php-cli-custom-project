# static-php-cli project in vendored mode

This repository is a demostration of changes in the `crazywhalecc/static-php-cli` project
for a custom project without forking.

Example php extension: pdo_snowflake

Question: https://github.com/crazywhalecc/static-php-cli/issues/687
PR: https://github.com/crazywhalecc/static-php-cli/pull/691

## Usage

```bash
git clone git@github.com:yoramdelangen/vendored-static-php-cli-custom-project.git
cd vendored-static-php-cli-custom-project

composer install

# of course all other commands beforehand needs to be ran.
# my Macbook is prepared, therefore i dont need to setup static-php-cli envrionment

# Download all necessary sources
bin/spc download --for-extensions "snowflake" --shallow-clone

# start compiling
bin/spc build --build-cli "pdo,snowflake" --debug
```

## Running issues

- After successfull compiling it failes to run `php -ri pdo_snowflake` due to pdo_snowflake extension
  is a dynamic linked object.
- I made a "custom" spc binary. It would be nice todo it without, and it would be possible.

## What does it do

1. Allow for changes in the BuilderProvider to manually `builder->addLib` and `builder->addExt` with manual instances.
2. Allow for custom commands (custom `spc` argument).
3. Allow to extend ext.json, lib.json, source.json etc.
4. Dynamic load anything in the namespace (`App\builder\xxxx` and folders `src/builder/extension` and `src/builder/(linux|macos|unix|windows)/library/*`
