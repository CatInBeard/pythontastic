# pythontastic
Python online repl  
[![uptime](https://img.shields.io/uptimerobot/ratio/m792899048-fe75220d9a0735c7d8a9a253)](https://stats.uptimerobot.com/Dl8Q0soGxj) [![Maintainability](https://api.codeclimate.com/v1/badges/ab63a8863b44e9b7d171/maintainability)](https://codeclimate.com/github/CatInBeard/pythontastic/maintainability)   
[pythontastic.space](https://pythontastic.space)  
![Repl example](https://pythontastic.space/img/terminal.png)
## Installation
1. download repository with `git clone https://github.com/CatInBeard/pythontastic.git`
2. copy docker/mysql/.env.example to docker/mysql/.env with your mysql root password
3. copy src/.env.example to src/.env with your configuration
4. run `make start`
5. run inside php container `php artisan key:generate`
6. website runs on http://localhost:8000, phpMyAdmin runs on http://localhost:1500
7. create database and user with phpMyAdmin and add configuration to src/.env
8. run inside php container `php artisan migrate`
9. add nginx reverse proxy with [this](https://gist.github.com/CatInBeard/ff3962217283a821ab22f6411557216e) configuration