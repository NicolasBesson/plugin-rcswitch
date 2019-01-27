#!/bin/bash

# Automatically generated script by
# vagrantbox/doc/src/vagrant/src-vagrant/deb2sh.py
# The script is based on packages listed in debpkg_minimal.txt.

#set -x  # make sure each command is printed in the terminal
echo "****************************************************************"
echo "le numéro du GPIO à utiliser est dans la colonne wPi ou wiringpi"
echo "****************************************************************"
GPIO_INFO=`which gpio`
if [[ $GPIO_INFO == "" || $GPIO_INFO == "" ]]
then
echo "!!!Pour pouvoir déterminer le GPIO il faut d'abord installer WIRINGPI en fonction de votre carte!!!"
else
gpio readall
fi
