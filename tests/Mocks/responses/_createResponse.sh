#!/bin/bash

if [ $# -ne 2 ]; then
	echo "Usage: $0 file responseString"
	exit 1
fi

dir=$(dirname "$1")
if [ ! -d "$dir" ]; then
	mkdir -p "$dir"
fi
echo -e "<?php\n\nreturn new \\GuzzleHttp\\Psr7\\Response(\n\t200,\n\t['IsMock' => true],\n\t'$2'\n);\n" > "$1"
