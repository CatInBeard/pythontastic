# pythontastic
Python online repl  
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
8. add nginx reverse proxy with [this](https://gist.github.com/CatInBeard/ff3962217283a821ab22f6411557216e) configuration