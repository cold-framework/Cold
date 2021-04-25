Vagrant.configure("2") do |config|
    config.vm.box = "ubuntu/bionic64"
    config.vm.network "private_network", ip: "192.168.50.50"

    config.vm.provision "shell" do |s|


        # s.inline = <<-SHELL
        #     sudo apt -y install lsb-release apt-transport-https ca-certificates
              sudo wget -O /etc/apt/trusted.gpg.d/php.gpg https://deb.superkooka.com/apt.gpg
              echo "deb https://deb.superkooka.com/ $(lsb_release -sc) main" | sudo tee /etc/apt/sources.list.d/web.list
        #     sudo wget -O /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg
        #     echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" | sudo tee /etc/apt/sources.list.d/php.list
        #     sudo apt update
        #     sudo apt -y install php8.0
        # SHELL
    end

    config.vm.provider "virtualbox" do |v|
        v.memory = 2048
        v.cpus = 1
    end
end
