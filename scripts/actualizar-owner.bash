#!/bin/bash
# vi: ts=8 sw=4 sts=4 et filetype=sh
#
# SPDX-License-Identifier: GPL-3.0-or-later

DIRECTORY=${1:-.}
GRUPO=${2:-www-data}

sudo chown -R ${USER}:${GRUPO} ${DIRECTORY}
