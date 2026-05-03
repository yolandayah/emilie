#!/bin/bash
# vi: ts=8 sw=4 sts=4 et filetype=sh
#
# SPDX-License-Identifier: GPL-3.0-or-later
#
# Dependencias:
# composer require  matthiasmullie/minify --dev

DIRECTORY=${1:-.}
MCSS=vendor/bin/minifycss
MJS=vendor/bin/minifyjs

if [ ! -d ${DIRECTORY}/public/css ]
then
    echo No se encuenta el directorio ${DIRECTORY}/public/css
    exit 1
fi

if [ ! -x ${MCSS} ]
then
    echo No se encuenta el archivo ${MCSS}
    exit 1
fi

if [ ! -x ${MJS} ]
then
    echo No se encuenta el archivo ${MJS}
    exit 1
fi

CSS=$(ls ${DIRECTORY}/public/css)
JS=$(ls ${DIRECTORY}/public/js/*.js)
JSON=$(ls ${DIRECTORY}/public/js/*.json)

for f in $CSS
do
    case $f in
        *"min"*)
            continue
            ;;
        *)
            filename=${f%*.css}
            $MCSS ${DIRECTORY}/public/css/$f > ${DIRECTORY}/public/css/${filename}.min.css
            ;;
    esac
done

for f in $JS
do
    case $f in
        *"min"*)
            continue
            ;;
        *)
            filename=${f%*.js}
            $MJS $f > ${filename}.min.js
            ;;
    esac
done

for f in $JSON
do
    case $f in
        *"min"*)
            continue
            ;;
        *)
            filename=${f%*.json}
            $MJS $f > ${filename}.min.json
            ;;
    esac
done
