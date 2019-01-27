echo "********************************************************"
echo "*             Clonage de WiringPi                      *"
echo "********************************************************"
cd /tmp
git clone https://github.com/sephyroth67/Wiringpi-Rpi.git
cd Wiringpi-Rpi
git pull origin
echo "********************************************************"
echo "*             Installation                             *"
echo "********************************************************"
./build
cd ..
echo "********************************************************"
echo "*             Suppression du dossier                   *"
echo "********************************************************"
rm -rf Wiringpi-Rpi
echo "********************************************************"
echo "*             Installation terminée                    *"
echo "********************************************************"
exit 0
