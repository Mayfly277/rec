#!/bin/bash

DIR="$( cd "$( dirname "$0" )" && pwd )"
cd $DIR
sudo docker build -t rec_browse:latest .
sudo docker run --name "rec_browse" --rm -p "127.0.0.1:5000:5000" -v "$DIR/casts:/app/static/casts" rec_browse:latest
echo "Web ihm at : http://127.0.0.1:5000/"
