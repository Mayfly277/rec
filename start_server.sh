#!/bin/bash

if [ -L $0 ] ; then
    DIR=$(dirname $(readlink -f $0)) ;
else
    DIR=$(dirname $0) ;
fi ;

cd $DIR
sudo docker build -t rec_browse:latest .
sudo docker run --name "rec_browse" --rm -d -p "127.0.0.1:5000:5000" -v "$DIR/casts:/app/static/casts" rec_browse:latest
echo "Web ihm at : http://127.0.0.1:5000/"
