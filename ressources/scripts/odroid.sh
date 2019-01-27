echo "********************************************************"
echo "*             Clonage de Wiring-Odroid                  *"
echo "********************************************************"
cd /tmp
git clone https://github.com/sephyroth67/Wiringpi-Odroid.git
cd Wiringpi-Odroid
chmod +x ./build
echo "********************************************************"
echo "*             Installation                                       *"
echo "********************************************************"
sudo ./build
cd ..
echo "********************************************************"
echo "*             Suppression du dossier                     *"
echo "********************************************************"
rm -rf Wiring-Odroid
echo "********************************************************"
echo "*             Installation terminée                       *"
echo "********************************************************"
exit 0

