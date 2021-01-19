#!/bin/bash

check () {
    if ! command -v $1 &> /dev/null
    then
       echo "[-] $1 could not be found, please install it"
       exit
    else
       echo "[+] $1 OK"
    fi
}

check "asciinema"
check "php"
check "fzf"

DIR="$( cd "$( dirname "$0" )" && pwd )"
echo 'Add this to your $PATH to use rec:' "$DIR/bin"
echo "Exemple : "
echo "export PATH=\"\$PATH:${DIR}/bin\""
