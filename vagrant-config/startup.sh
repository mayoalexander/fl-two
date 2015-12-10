while true
do
  [ -f /vagrant/Vagrantfile ] && break
  sleep 0.1
done
rm -f /etc/apache2/apache2.conf
rm -f /etc/mysql/my.cnf
rm -f /etc/php5/apache2/php.ini
cp -f /vagrant/vagrant-config/my.cnf /etc/mysql/my.cnf
cp -f /vagrant/vagrant-config/apache2.conf /etc/apache2/apache2.conf
cp -f /vagrant/vagrant-config/php.ini /etc/php5/apache2/php.ini
service mysql restart
mysql -uroot -proot < /vagrant/vagrant-config/reset.sql
mysql -uroot -proot dfrg_main < /vagrant/vagrant-config/schema.sql
su vagrant -c "(cd /vagrant/dfrg-ppc && php composer.phar update)"
su vagrant -c "(cd /vagrant/dfrg-websites && php composer.phar update)"
service apache2 restart
