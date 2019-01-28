#!/bin/bash

# Automatically generated script by
# vagrantbox/doc/src/vagrant/src-vagrant/deb2sh.py
# The script is based on packages listed in debpkg_minimal.txt.

#set -x  # make sure each command is printed in the terminal
touch /tmp/Rcswitch
echo 10 > /tmp/Rcswitch
echo "installation de git"
sudo apt-get update
echo 30 > /tmp/Rcswitch
sudo apt-get -y install git-core
echo 40 > /tmp/Rcswitch
echo "Attribution des droits aux scripts"
cd ..
cd ..
cd plugins/rcswitch2/ressources/scripts
chmod +x RFSniffer
chmod +x Send
chmod +x arc
chmod +x phenix
chmod +x typeA
chmod +x typeB
chmod +x typeD
chmod +x homeeasy
chmod +x brennen
chmod +x blyss
chmod +x Otio
chmod +x HEreceive
chmod +x Mcz
echo "Lancement de l'installation de Wiringpi si detection d'un raspberry"
RPI_BOARD_HARDWARE=`grep Hardware /proc/cpuinfo | cut -d: -f2 | tr -d " "`
if [[ $RPI_BOARD_HARDWARE ==  "BCM2835" || $RPI_BOARD_HARDWARE == "BCM2836" || $RPI_BOARD_HARDWARE == "BCM2837" ]]
then
cd /tmp
git clone https://github.com/sephyroth67/Wiringpi-Rpi.git
echo 30 > /tmp/Rcswitch
cd Wiringpi-Rpi
git pull origin
echo 50 > /tmp/Rcswitch
echo "Installation de Wiringpi"
./build
echo 80 > /tmp/Rcswitch
cd ..
echo "Suppression du dossier"
rm -rf Wiringpi-Rpi
echo 100 > /tmp/Rcswitch
echo "Installation terminée"
else 
echo "####################################################################################################"
echo "#Installation automatique non possible, installation manuelle par la page de configuration possible#"
echo "####################################################################################################"

echo 100 > /tmp/Rcswitch
fi
rm /tmp/Rcswitch 
