#!/bin/bash

# Delay function
delay() {
  sleep 2
}

#sudo sed -i "s/DB_HOST=.*/DB_HOST=db/" .env
#sudo sed -i "s/DB_HOST_SERVICE=.*/DB_HOST_SERVICE=db/" .env


git reset --hard
git pull

# Remove existing container
docker rm -f testpackage
delay

# Remove existing image
docker rmi testpackage:dev
delay

# Build the image
docker build -t testpackage:dev -f docker/dev/containerDB/dockerfile .
delay


# Create the container using the newly built image
docker run -v ${PWD}:/app -d -p 8034:8034 --name testpackage --network mysqlDB-network --link mysqlLocalDB:db testpackage:dev
delay
