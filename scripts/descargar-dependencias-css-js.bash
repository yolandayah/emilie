#!/bin/bash
# vi: ts=8 sw=4 sts=4 et filetype=sh
#
# SPDX-License-Identifier: GPL-3.0-or-later

DIRECTORY=${1:-.}
MY_CSV=${DIRECTORY}/scripts/dependencias-css-js.csv

if [ ! -f ${MY_CSV} ]
then
    echo No se encuenta el archivo ${MY_CSV}
    exit 1
fi

TMP_FILE=$(mktemp)

while IFS=, read -r fecha tipo url
do
    if [ "$tipo" = "Tipo" ]
    then
        echo "$fecha,$tipo,$url" >> $TMP_FILE
        continue
    fi

    file=${url##*/}
    today=$(date +%F)

    if curl --create-dirs -s -o ${DIRECTORY}/public/$tipo/$file -L $url
    then
        echo "$today,$tipo,$url" >> $TMP_FILE
    else
        echo "$fecha,$tipo,$url" >> $TMP_FILE
    fi
done < "${MY_CSV}"

cp $TMP_FILE $MY_CSV

rm $TMP_FILE
