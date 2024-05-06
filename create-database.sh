#!/usr/bin/env bash

mysql --user=root --password="$MYSQL_ROOT_PASSWORD" <<-EOSQL
    CREATE DATABASE IF NOT EXISTS aula;
    GRANT ALL PRIVILEGES ON \`aula%\`.* TO '$MYSQL_USER'@'%';
EOSQL
