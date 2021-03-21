DC=docker-compose

# Start Docker
up:
	@make build
	$(DC) exec --user=root php /bin/bash /docker/xdebug,sh


bones:
	@cp build/compose/docker-compose.bones.yml docker-compose.yml
	@make build


congruence:
	@cp build/compose/docker-compose.congruence.yml docker-compose.yml
	@make build


darkstar:
	@cp build/compose/docker-compose.darkstar.yml docker-compose.yml
	@make build


ravinos:
	@cp build/compose/docker-compose.ravinos.yml docker-compose.yml
	@make build


.PHONY: build
build:
	$(DC) build --no-cache --force-rm
	$(DC) up -d


.PHONY: tests
tests:
	$(DC) run phpunit

stop:
	$(DC) down


destroy:
	$(DC) down --rmi all --volumes --remove-orphans
	@rm docker-compose.yml