export PHP_VERSION=8.4
export PHP_EXTENSIONS="odbc,pdo_odbc,bcmath,calendar,ctype,curl,dba,exif,fileinfo,filter,gd,intl,libxml,mbregex,mbstring,msgpack,mysqli,mysqlnd,opcache,openssl,pcntl,pdo,pdo_mysql,pdo_pgsql,pdo_sqlite,pdo_sqlsrv,pgsql,phar,posix,readline,redis,session,simplexml,sockets,sodium,sqlite3,sqlsrv,tokenizer,xml,xmlreader,xmlwriter,zip,zlib,snowflake,rustypipewire"

export GITHUB_USER="yoramdelangen"
export GITHUB_TOKEN="$TOKEN_FOR_GITHUB"

bin/spc doctor --auto-fix

bin/spc download --debug --with-php=$PHP_VERSION --for-extensions="$PHP_EXTENSIONS" --prefer-pre-built

bin/spc build --with-clean --build-cli "$PHP_EXTENSIONS" --no-strip --debug
