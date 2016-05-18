## Requirements

-   VPS server (or some server) which runs Ubuntu 14.04 (this guide is make for this OS)
-   have Java JDK8 installed on the server and JAVA_HOME set
-   nginx installed, PHP >= 5.5.9, openSSL PHP extension, mbstring PHP ext, PDO and tokenizer PHP ext
-   have composer installed
-   MariaDB or MySQL database installed
-   Raspberry PI 2 with Ubuntu 14.04
-   GSM Modem SIM800
-   SIM card **without pin lock** (see issues)
-   have Java JDK8 installed on the Raspberry PI and JAVA_HOME set
-   have Java RxTx installed on the Raspberry PI

... and maybe I forgot something. I will update this manual when I remember.


## VPS installation

This commands you need to type into VPS server console.

	# clone this project    
	git clone https://github.com/ptrstovka/sms-gateway.git

	# go into project directory  
	cd sms-gateway

	# install all dependencies with composer  
	composer install

	# copy the configuration file  
	cp .env.example .env

	# edit .env file (see instructions in this file)  
	editor .env

	# generate application key  
	php artisan key:generate

	# run the migrations  
	php artisan migrate

	# last step - run database seeders  
	php artisan db:seed

An account with admin privileges was created. Email: **admin@smsgw.io** and password: **admin**. You should change this 
as soon as possible. Next we need to setup server.

	# get the server from github  
	wget https://github.com/ptrstovka/smsgw/releases/download/1.0/smsgw-server.jar
	
	# get the configuration file (place in the same directory as jar file)
	TODO: available soon (give me couple days)
	
	# configure server
	TODO: instructions soon

	# run the server
	java -jar smsgw-server.jar debug

## Server installation

This commands you need to type into Raspberry PI 2 console.

	# get the client .jar file from Github
	wget https://github.com/ptrstovka/smsgw/releases/download/1.0/smsgw-client.jar
	
	# get the configuration file (place in the same directory as jar file)
	TODO: available soon
	
	# configure client
	TODO: instructions soon
	
	# run the client
	java -jar smsgw-client.jar debug
	
Now, everything should work. I know, I did't covered all steps but as soon as I will repair some issues, I will make 
better installation manual.