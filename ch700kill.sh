#! /bin/bash
echo "Starting Counter-Strike:Source Server killing"
sudo kill -9 $1
screen -wipe
cd /var/run/screen
sudo chmod 700 S-root
cd /usr/hlds/cstrike
sudo rm $2.cfg
echo "KIll ID and change S-root dir to changed to 700"

