apt-get update
apt-get -y install python-software-properties
sudo add-apt-repository ppa:ondrej/php5
apt-get update
echo "mysql-server mysql-server/root_password select root" | debconf-set-selections
echo "mysql-server mysql-server/root_password_again select root" | debconf-set-selections
echo "mysql-server mysql-server/root_password password root" | debconf-set-selections
echo "mysql-server mysql-server/root_password_again password root" | debconf-set-selections
echo "mysql-server-5.5 mysql-server/root_password select root" | debconf-set-selections
echo "mysql-server-5.5 mysql-server/root_password_again select root" | debconf-set-selections
echo "mysql-server-5.5 mysql-server/root_password password root" | debconf-set-selections
echo "mysql-server-5.5 mysql-server/root_password_again password root" | debconf-set-selections
echo "mysql-server-5.6 mysql-server/root_password select root" | debconf-set-selections
echo "mysql-server-5.6 mysql-server/root_password_again select root" | debconf-set-selections
echo "mysql-server-5.6 mysql-server/root_password password root" | debconf-set-selections
echo "mysql-server-5.6 mysql-server/root_password_again password root" | debconf-set-selections
apt-get -y install git libapache2-mod-php5 php5-dev php-pear curl multitail apache2 libcurl3-dev linux-headers-$(uname -r) build-essential php5 php5-cli php5-gd php5-curl php5-mysql mysql-server
pecl install oauth
echo "extension=oauth.so" > /etc/php5/mods-available/oauth.ini
ln -s /etc/php5/mods-available/oauth.ini /etc/php5/apache2/conf.d/20-oauth.ini
mkdir /var/log/php
chown -R vagrant:www-data /var/log/php
chmod -R 777 /var/lib/php5
echo "
check_mail:0" >> /etc/multitail.conf
mysql -uroot -proot < /vagrant/vagrant-config/users.sql
chown -R vagrant:vagrant /home/vagrant/
su vagrant -c "(cd /vagrant/dfrg-websites && curl -sS https://getcomposer.org/installer | php)"
ln -s /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled/rewrite.load
