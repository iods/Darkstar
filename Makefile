
bones:
	@cp build/compose/docker-compose.bones.yml docker-compose.yml
	@docker-compose build --no-cache --force-rm
	@make start

darkstar:
	@cp build/compose/docker-compose.darkstar.yml docker-compose.yml
	@docker-compose build --no-cache --force-rm
	@make start

start:
	@docker-compose up -d


stop:
	@docker-compose down


destroy:
	@docker-compose down --rmi all --volumes --remove-orphans
	@rm docker-compose.yml
