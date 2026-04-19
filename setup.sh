#!/bin/bash

# ================================================
# Fresh Install Ubuntu 24 - CI3 + PHP 7.0 + MySQL
# VPS Target : 168.144.111.246
# Remote MySQL dari : 139.59.230.215
# ================================================

set -e

echo "=============================="
echo " Update sistem..."
echo "=============================="
apt update && apt upgrade -y

echo "=============================="
echo " Install kebutuhan dasar..."
echo "=============================="
apt install -y curl wget git unzip software-properties-common

echo "=============================="
echo " Tambah repo PHP Ondrej..."
echo "=============================="
add-apt-repository ppa:ondrej/php -y
apt update

echo "=============================="
echo " Install PHP 7.0..."
echo "=============================="
apt install -y php7.0 libapache2-mod-php7.0 php7.0-mysql php7.0-curl \
  php7.0-gd php7.0-mbstring php7.0-xml php7.0-zip php7.0-intl php7.0-json

echo "=============================="
echo " Install Apache..."
echo "=============================="
apt install -y apache2
a2enmod rewrite
a2enmod php7.0
systemctl enable apache2
systemctl start apache2

echo "=============================="
echo " Install MySQL..."
echo "=============================="
apt install -y mysql-server

echo "=============================="
echo " Konfigurasi MySQL..."
echo "=============================="

# Set default auth ke mysql_native_password
sed -i '/\[mysqld\]/a default_authentication_plugin=mysql_native_password' \
  /etc/mysql/mysql.conf.d/mysqld.cnf

# Izinkan remote connection
sed -i 's/bind-address.*/bind-address = 0.0.0.0/' \
  /etc/mysql/mysql.conf.d/mysqld.cnf

systemctl restart mysql

# Set root password dan auth method
mysql -u root <<EOF
ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'tinocaem';
CREATE DATABASE IF NOT EXISTS sky CHARACTER SET utf8 COLLATE utf8_general_ci;
CREATE USER IF NOT EXISTS 'root'@'139.59.230.215' IDENTIFIED WITH mysql_native_password BY 'tinocaem';
GRANT ALL PRIVILEGES ON *.* TO 'root'@'139.59.230.215' WITH GRANT OPTION;
FLUSH PRIVILEGES;
EOF

echo "=============================="
echo " Install phpMyAdmin 4.9.11..."
echo "=============================="
cd /var/www/html
wget -q https://files.phpmyadmin.net/phpMyAdmin/4.9.11/phpMyAdmin-4.9.11-all-languages.zip
unzip -q phpMyAdmin-4.9.11-all-languages.zip
mv phpMyAdmin-4.9.11-all-languages phpmyadmin
rm phpMyAdmin-4.9.11-all-languages.zip
cp phpmyadmin/config.sample.inc.php phpmyadmin/config.inc.php
sed -i "s/\$cfg\['blowfish_secret'\] = ''/\$cfg['blowfish_secret'] = 'abcdefghijklmnopqrstuvwxyz123456'/" \
  phpmyadmin/config.inc.php
chown -R www-data:www-data phpmyadmin

echo "=============================="
echo " Konfigurasi Firewall..."
echo "=============================="
ufw allow OpenSSH
ufw allow 80
ufw allow 443
ufw allow from 139.59.230.215 to any port 3306
ufw --force enable
ufw reload

echo "=============================="
echo " Sync file aplikasi dari VPS lama..."
echo "=============================="
apt install -y rsync
mkdir -p /var/www/sky
rsync -avz -e ssh root@139.59.230.215:/var/www/pts/ /var/www/sky/
chown -R www-data:www-data /var/www/sky
chmod -R 755 /var/www/sky

echo "=============================="
echo " Import DB dari VPS lama..."
echo "=============================="
echo "Mengambil DB dari 168.144.42.187..."
mysqldump -h 168.144.42.187 -u tino -ptinocaem --column-statistics=0 sky | \
  mysql -u root -ptinocaem sky

echo "=============================="
echo " Selesai!"
echo "=============================="
echo ""
echo "phpMyAdmin : http://$(hostname -I | awk '{print $1}')/phpmyadmin"
echo "MySQL user : root"
echo "MySQL pass : tinocaem"
echo "Database   : sky"
