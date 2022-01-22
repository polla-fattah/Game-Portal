#! /bin/bash
echo "Starting Counter-Strike:Source Server"
sudo kill -9 $1
sudo screen -wipe
cd /var/run/screen
sudo chmod 700 S-root
echo "changed to 700"

