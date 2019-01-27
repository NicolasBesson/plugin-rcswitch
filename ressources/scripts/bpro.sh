echo "********************************************************"
echo "*             Clonage de Wiring-Bpro                      *"
echo "********************************************************"
cd /tmp
git clone https://github.com/sephyroth67/Wiringpi-Bpro.git
cd Wiring-Bpro
chmod +x ./build
echo "********************************************************"
echo "*             Installation                             *"
echo "********************************************************"
sudo ./build
cd ..
echo "********************************************************"
echo "*             Suppression du dossier                   *"
echo "********************************************************"
rm -rf Wiring-Bpro
echo "********************************************************"
echo "*             Installation terminée                    *"
echo "********************************************************"
exit 0
