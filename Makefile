USER = shleif
CONTAINERS = $(shell docker ps -a -q)

dev:
	@docker-compose stop
	@sudo docker-compose up -d --build
	@sudo chown -R $(USER):$(USER) ./app

stop:
	@docker-compose stop

start:
	@docker-compose start

chown:
	@sudo chown -R $(USER):$(USER) ./app

stop_all:
	@sudo docker