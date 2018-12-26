PROGRESS_FILE=/tmp/dependancy_twinkly_in_progress
if [ ! -z $1 ]; then
	PROGRESS_FILE=$1
fi
touch ${PROGRESS_FILE}
echo 0 > ${PROGRESS_FILE}
echo "********************************************************"
echo "*             Installation des dépendances             *"
echo "********************************************************"
sudo apt-get update
echo 20 > ${PROGRESS_FILE}
sudo apt-get install -y python3 python3-venv python3-pip
echo 30 > ${PROGRESS_FILE}
sudo pip3 install -U setuptools
echo 40 > ${PROGRESS_FILE}
cd ../../plugins/twinkly/resources/xled/
sudo python3 setup.py install
echo 100 > ${PROGRESS_FILE}
echo "********************************************************"
echo "*             Installation terminée                    *"
echo "********************************************************"
rm ${PROGRESS_FILE}