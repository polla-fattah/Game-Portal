#! /bin/bash
echo "Starting Counter-Strike:Source Server"

cd /usr/hlds/cstrike
pwd
touch $2.cfg
chmod 777 $2.cfg

echo "// Use this file to configure your DEDICATED server." >> $2.cfg 
echo "// This config file is executed on server start." >> $2.cfg


echo "hostname $2" >> $2.cfg
echo "mp_autokick 0" >> $2.cfg
echo "mp_autocrosshair 0">> $2.cfg
echo "mp_autoteambalance 0">> $2.cfg
echo "mp_buytime 2">> $2.cfg
echo "mp_consistency 1">> $2.cfg
echo "mp_c4timer 35">> $2.cfg
echo "mp_fadetoblack 0">> $2.cfg
echo "mp_falldamage 0">> $2.cfg
echo "mp_flashlight 1">> $2.cfg
echo "mp_forcecamera 3">> $2.cfg
echo "mp_forcechasecam 2">> $2.cfg
echo "mp_friendlyfire 0">> $2.cfg
echo "mp_freezetime $9">> $2.cfg
echo "mp_fraglimit 0">> $2.cfg
echo "mp_hostagepenalty 0">> $2.cfg
echo "mp_limitteams 15">> $2.cfg
echo "mp_logfile 1">> $2.cfg
echo "mp_logmessages 1">> $2.cfg
echo "mp_logdetail 3">> $2.cfg
echo "mp_maxrounds 0">> $2.cfg
echo "mp_playerid 0">> $2.cfg
echo "mp_roundtime $6">> $2.cfg 
echo "mp_startmoney $8">> $2.cfg
echo "mp_timelimit 0">> $2.cfg
echo "mp_tkpunish 0">> $2.cfg
echo "mp_winlimit $7">> $2.cfg

echo "sv_aim 0">> $2.cfg
echo "sv_airaccelerate 10">> $2.cfg
echo "sv_airmove 1">> $2.cfg
echo "sv_allowdownload 1">> $2.cfg
echo "sv_clienttrace 1.0">> $2.cfg
echo "sv_clipmode 0">> $2.cfg
echo "sv_allowupload 1">> $2.cfg
echo "sv_cheats 0">> $2.cfg
echo "sv_gravity 800">> $2.cfg
echo "sv_lan 1">> $2.cfg
echo "sv_maxrate 7000">> $2.cfg
echo "sv_maxspeed 320">> $2.cfg
echo "sv_maxupdaterate 101">> $2.cfg
echo "sys_ticrate 10000">> $2.cfg
echo "decalfrequency 60">> $2.cfg
echo "pausable 0">> $2.cfg
echo "log on">> $2.cfg
echo "decalfrequency 60">> $2.cfg
echo "edgefriction 2">> $2.cfg
echo "host_framerate 0">> $2.cfg
echo "exec listip.cfg">> $2.cfg
echo "exec banned.cfg">> $2.cfg
echo "rcon_password $5" >> $2.cfg
echo "sv_password $4" >> $2.cfg

echo "# Execute Admin Mod configuration file" >> $2.cfg
echo "exec addons/adminmod/config/adminmod.cfg">>$2.cfg

echo "";
pwd
cd /usr/hlds
whoami
sleep 1

#sudo  /usr/hlds/hlds_run -game cstrike -insecure +maxplayers $3 +map $1  -port ${10} +servercfgfile $2.cfg
sudo screen -A -m -d -S $2  /usr/hlds/hlds_run -game cstrike -insecure +maxplayers $3 +map $1  -port ${10} +servercfgfile $2.cfg
#sudo screen -A -m -d -S server2 /usr/hlds/hlds_run -game cstrike -insecure +maxplayers $3 +map $1  -port 27034 +servercfgfile server1.cfg

#/usr/hlds/hlds_run -game cstrike -insecure +map cs_italy +maxplayers 16  -port 27016 +servercfgfile server1.cfg