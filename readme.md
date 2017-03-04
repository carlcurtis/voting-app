Prerequisite

Assumptions
The repository will be cloned into your home directory

Clone Repository
cd ./voting-app
composer require laravel/homestead --dev
php vender/bin/homestead make

mv Homestead.yaml.example Homestead.yaml
mv Vagrantfile.example Vagrantfile

sudo echo "192.168.10.10 voting.app" >> /etc/hosts

vagrant up

cd /Code/voting-app
php artisan migrate --seed
php artisan key:generate


Open voting.app browser
