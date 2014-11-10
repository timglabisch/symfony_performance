VAGRANTFILE_API_VERSION = "2"

$script = <<SCRIPT
    sudo apt-get update
    sudo apt-get install -y docker.io python-pip
    pip install fig
    date > /etc/vagrant_provisioned_at
SCRIPT

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
    config.vm.box = "ubuntu/trusty64"
    config.vm.network "private_network", ip: "192.168.44.82"
    config.vm.provision "shell", inline: $script

    config.vm.provider :virtualbox do |virtualbox|
        virtualbox.customize ["modifyvm", :id, "--memory", "7096"]
        virtualbox.customize ["modifyvm", :id, "--cpuexecutioncap", "70"]
    end

end
