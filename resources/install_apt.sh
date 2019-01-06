function pip_install {
	sudo pip3 install -U "$@"
	if [ $? -ne 0 ]; then
		echo "pi3 command not operational, try pip3.2"
        sudo pip3.2 install -U "$@"
        if [ $? -ne 0 ]; then
            echo "could not install $@ - abort"
            rm /tmp/dependancy_twinkly_in_progress
            exit 1
        fi
	fi
}


PROGRESS_FILE=/tmp/dependancy_twinkly_in_progress
if [ ! -z $1 ]; then
	PROGRESS_FILE=$1
fi
touch ${PROGRESS_FILE}
echo 0 > ${PROGRESS_FILE}
echo "********************************************************"
echo "*             Installation des dépendances             *"
echo "********************************************************"
echo "***** Commande: sudo apt-get update **********"
sudo apt-get update
echo 20 > ${PROGRESS_FILE}
echo "***** Commande: sudo apt-get install -y python3 python3-venv python3-pip **********"
sudo apt-get install -y python3 python3-venv python3-pip
echo 30 > ${PROGRESS_FILE}
echo "***** Commande: sudo pip3 install -U setuptools **********"
sudo pip3 install -U setuptools
echo 40 > ${PROGRESS_FILE}
echo "***** Commande: cd ../../plugins/twinkly/resources/xled/ **********"
cd ../../plugins/twinkly/resources/xled/
echo "***** Commande: sudo python3 setup.py install **********"
sudo python3 setup.py install
echo 100 > ${PROGRESS_FILE}
echo "********************************************************"
echo "*             Installation terminée                    *"
echo "********************************************************"
rm ${PROGRESS_FILE}