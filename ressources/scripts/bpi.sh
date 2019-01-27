echo "********************************************************"
echo "*             Clonage de Wiring-Bpi                     *"
echo "********************************************************"
cd /tmp
git clone https://github.com/sephyroth67/Wiringpi-Bpi.git
cd Wiringpi-Bpi
chmod +x ./build
echo "********************************************************"
echo "*             Installation                             *"
echo "********************************************************"
sudo ./build
cd ..
echo "********************************************************"
echo "*             Suppression du dossier                   *"
echo "********************************************************"
rm -rf Wiringpi-Bpi
echo "********************************************************"
echo "*             Installation terminée                    *"
echo "********************************************************"
exit 0

