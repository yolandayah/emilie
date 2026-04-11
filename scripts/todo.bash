#!/bin/bash
# vi: ts=8 sw=4 sts=4 et filetype=sh
#
# SPDX-License-Identifier: GPL-3.0-or-later

FULL_PATH=$(realpath ${0})
MY_PATH=${FULL_PATH%/*}

${MY_PATH}/todo.txt/todo.sh -d ${MY_PATH}/todo.txt/todo.cfg "$@"
