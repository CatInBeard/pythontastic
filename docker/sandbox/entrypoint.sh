#!/bin/bash

#Start sshd 
/usr/sbin/sshd -D &

# Turn on bash's job control
set -m

# Start docker service in background
/usr/local/bin/dockerd-entrypoint.sh &

# Wait that the docker service is up
while ! docker info; do
  echo "Waiting docker..."
  sleep 3
done

# Import pre-installed images
PYTON3FILE=/usr/src/app/python3.tar.gz

if test -f "$PYTON3FILE"; then
    docker load < "$PYTON3FILE" || docker pull python:3 && docker save python:3 > "$PYTON3FILE"
else 
    docker pull python:3
    docker save python:3 > "$PYTON3FILE"
fi

# Bring docker service back to foreground
fg %2
