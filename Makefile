all-start: proxy-start start
all-stop: stop proxy-stop
all-restart: all-stop all-start
help:
	echo "help"
start:
	docker-compose up -d
stop:
	docker-compose down
restart: stop start
proxy-start:
	cd ./proxy && docker-compose up -d 
proxy-stop:
	cd ./proxy && docker-compose down
