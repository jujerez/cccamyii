#!/bin/sh

BASE_DIR=$(dirname "$(readlink -f "$0")")
if [ "$1" != "test" ]; then
    psql -h localhost -U cccamyii -d cccamyii < $BASE_DIR/cccamyii.sql
fi
psql -h localhost -U cccamyii -d cccamyii_test < $BASE_DIR/cccamyii.sql
