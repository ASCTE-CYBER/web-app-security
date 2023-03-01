# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|
  # Configure VM running a web app
  config.vm.define "web-app" do |app|
    app.vm.box = "generic/debian11"
    app.vm.hostname = "web-app"
    app.vm.network "private_network", ip: "192.168.56.111"
    app.vm.synced_folder "./webappfiles", "/vagrant"
    app.vm.provider "virtualbox" do |vb|
      vb.gui = false
      vb.memory = "1024"
    end
    app.vm.provision "shell", inline: <<-SHELL
      apt-get update -y
      curl -sSL https://get.docker.com/ | sudo sh
    SHELL
    app.vm.provision "shell", run: "always", inline: <<-SHELL
      sudo docker rm -f php-webserver
      sudo docker run -dit --name php-webserver --restart=always -p 8080:80 -v /vagrant:/var/www/html php:apache
    SHELL
  end
end
