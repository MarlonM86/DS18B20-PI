#!/bin/bash

#Update the system
sudo apt update && sudo apt upgrade -y

# Install Basics
sudo apt install curl python3-pip apache2 php -y
pip3 install w1thermsensor
systemctl enable apache2
systemctl start apache2

# Change Directory and copy files from github
cd /var/www/html/
sudo rm index.html
sudo curl -LJO https://raw.githubusercontent.com/MarlonM86/DS18B20-PI/main/index.php
sudo curl -LJO https://raw.githubusercontent.com/MarlonM86/DS18B20-PI/main/script.js
sudo curl -LJO https://raw.githubusercontent.com/MarlonM86/DS18B20-PI/main/style.css
sudo curl -LJO https://raw.githubusercontent.com/MarlonM86/DS18B20-PI/main/temperature.php
sudo curl -LJO https://raw.githubusercontent.com/MarlonM86/DS18B20-PI/main/temppi.py
sudo curl -LJO https://raw.githubusercontent.com/MarlonM86/DS18B20-PI/main/icon3.ico
systemctl restart apache2

# Make Service for Sensor
cd /etc/systemd/system/
sudo curl -LJO https://raw.githubusercontent.com/MarlonM86/DS18B20-PI/main/temperature.service
systemctl daemon-reload
systemctl enable temperature
systemctl start temperature
sleep 3
systemctl stop temperature

echo ""
echo "Installation finished"
echo "After the reboot please follow these further steps:"
echo "   Please check the status of the Webserver with: systemctl status apache2" 
echo "   Please check the status of the Python-Service with: systemctl status temperature" 
echo "Hint: Copy the commands before rebooting"
echo "Thank you for using our Product"
