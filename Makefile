#
# PHP SDK Makefile Template
#

# Build the environment
all: init create build

# Runs a test on the php:7.4-fpm image
test-phpfpm: init test-build-phpfpm test-destroy-phpfpm

#
# Environment Setup
#
init:
	@echo "Running some cool shit here..."

create:
	@composer create-project --ignore-platform-reqs --prefer-dist laravel/laravel src/laravel
	@cp config/env/laravel.env .env

build:
	@docker-compose up -d

down:
	@docker-compose down
	@rm .env
	@rm -rf src/laravel

#
# PHP 7.4-fpm Tests
#
test-build-phpfpm:
	@docker-compose -f tests/docker-compose.phpfpm.yml up --build --force-recreate -d

test-destroy-phpfpm:
	@docker-compose -f tests/docker-compose.phpfpm.yml down


#
# Phony reference
#
.PHONY: init build down test-build-phpfpm test-destroy-phpfpm create
