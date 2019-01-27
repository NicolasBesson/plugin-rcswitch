echo "********************************************************"
echo "*             Clonage de Wiring-Opi                      *"
echo "********************************************************"
cd /tmp
git clone https://github.com/sephyroth67/Wiringpi-Opi.git
cd Wiringpi-Opi
chmod +x ./build
echo "********************************************************"
echo "*             Installation                             *"
echo "********************************************************"
sudo ./build
cd ..
echo "********************************************************"
echo "*             Suppression du dossier                   *"
echo "********************************************************"
rm -rf Wiring-Opi
echo "********************************************************"
echo "*             Installation terminée                    *"
echo "********************************************************"
exit 0

