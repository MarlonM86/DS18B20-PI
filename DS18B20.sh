#!/bin/bash

#Update the system
sudo apt update && sudo apt upgrade -y

# Install Basics
sudo apt install curl python3-pip w1thermsensor apache2 php -y
systemctl enable apache2
systemctl start apache2

# Change Directory and copy files from github
cd /var/www/html/
# https://raw.githubusercontent.com/MarlonM86/DS18B20-PI/main/file
sudo curl -LJO #Link to the file
sudo curl -LJO #Link to the file
sudo curl -LJO #Link to the file
sudo curl -LJO #Link to the file
sudo curl -LJO #Link to the file
systemctl restart apache2

# Make Service for Sensor
cd /etc/systemd/system/
sudo curl -LJO #Link to the file
systemctl deamon-reload
systemctl enable temperature
systemctl start temperature
sleep 3
systemctl stop temperature

echo "Installation finished!"
echo "######################"
echo "Please check the status of the Webserver with: systemctl status apache2 !"
echo "Please check the status of the Python-Service with: systemctl status temperature !"
echo "######################"
echo "Thank you for using our Product!"