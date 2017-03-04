## Prerequisite
Vagrant
git
composer
php


## Assumptions
This is being preformed on OSX and you a `id.rsa.pub` file
The repository will be cloned into your home directory

## Instructions
Clone Repository and move into directory
`git clone git@github.com:carlcurtis/voting-app.git; cd ./voting-app`

Install Homestead
`composer require laravel/homestead --dev`
`php vender/bin/homestead make`

Copy config files
`mv Homestead.yaml.example Homestead.yaml`
`mv Vagrantfile.example Vagrantfile`
`mv .env.example .env`

Place entry in Host file
`sudo echo "192.168.10.10 voting.app" >> /etc/hosts`

Start Vagrant machine and SSH onto it
`vagrant up`
`vagrant ssh`

Move into working directory
`cd /Code/voting-app`
Seed the database
`php artisan migrate --seed`

Generate a environment key
`php artisan key:generate`

The application should now be at http://voting.app
