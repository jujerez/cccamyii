#!/bin/sh

if [ "$1" = "travis" ]; then
    psql -U postgres -c "CREATE DATABASE cccamyii_test;"
    psql -U postgres -c "CREATE USER cccamyii PASSWORD 'cccamyii' SUPERUSER;"
else
    sudo -u postgres dropdb --if-exists cccamyii
    sudo -u postgres dropdb --if-exists cccamyii_test
    sudo -u postgres dropuser --if-exists cccamyii
    sudo -u postgres psql -c "CREATE USER cccamyii PASSWORD 'cccamyii' SUPERUSER;"
    sudo -u postgres createdb -O cccamyii cccamyii
    sudo -u postgres psql -d cccamyii -c "CREATE EXTENSION pgcrypto;" 2>/dev/null
    sudo -u postgres createdb -O cccamyii cccamyii_test
    sudo -u postgres psql -d cccamyii_test -c "CREATE EXTENSION pgcrypto;" 2>/dev/null
    LINE="localhost:5432:*:cccamyii:cccamyii"
    FILE=~/.pgpass
    if [ ! -f $FILE ]; then
        touch $FILE
        chmod 600 $FILE
    fi
    if ! grep -qsF "$LINE" $FILE; then
        echo "$LINE" >> $FILE
    fi
fi
