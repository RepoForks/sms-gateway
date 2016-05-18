## About this project

Hello, my name is Peter and this project was developed for successful graduation in my school in Slovakia.

This project consists from two repositories. First is this, containing thw Web user interface and REST API part and
the second [repository](https://github.com/ptrstovka/smsgw) contains server and client application for hardware modules.
You will understand why, as soon as you will know, which problems I had and know how the system works.

## Goals

So in the beginning, I set some objectives:

-   connect to API from anywhere (from the Internet)
-   to have hardware devices in my home (GSM modems, Raspberry PI 2)
-   make this as cheaper for operation as could be
-   to provide some native APIs (such as user verification and so on...)


I don't know better solution at this time for this objectives. So I made this project to reach them.

Also I want successfully graduate. And I think, I got it.

## How the all system works?

First repository (this) contains web interface and REST API part.

Second repository (link above) contains server and client software.

I used Ubuntu 14.04 Server, Raspberry PI 2 and GSM Modem SIM800. But this project should work on all operating systems 
(tested only on Ubuntu 14.04) and with all computers. I choose Raspberry PI 2 because of it's high availability, 
small price, wide spectrum of shields... The total cost for building a simple SMS gateway with this project is about 
80$. And I'm student, I don't have much money ;) (More requirements in installation)
 
**The Web UI**

This part allows you to manage all the system. Manage gateways, users, API keys, enable/disable APIs, see the history 
and so on. The web UI is made with the Laravel framework. (I know, I can make it better. But this is my first project 
made in this framework and with PHP language. I will improve my skills and this project too.)

**REST API**

This part allows you to send HTTP requests to the API and execute SMS sending from connected gateways. The documentation
 for the API will be available soon because I want to improve it.

**Client part**

This software runs on hardware device where are connected GSM modems with prepaid cards.

**Server part**

Server part runs on VPS server and it handles all the client connections and API connections. All this is done via 
WebSockets. Server part also generate the AT commands and send it to the client(s), which execute given AT command. So 
all the logic is on the server. What, where or when - this decisions make server.


## Installation

Installation manual can be found [here](INSTALLATION.md)

## The future of this project

I don't maintain this project because no one use it. If someone want to use it, I will be able to make updates, new 
features, bug fixes, cooperation and so on. This project also has a lof of issues, boilerplate code and a lot of 
programming mistakes. But I plan to resolve this issues.

## License

Can be found [here](LICENSE.md)

## Changelog

[Here](CHANGELOG.md)

## Demo

You can see how the web UI looks (as user, just register) [here](http://sms.jasompeter.com)
