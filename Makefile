#
# PHP SDK Makefile Template
#

# Build the environment
all: init build

# Runs a test on the php:7.4-fpm image
test-phpfpm: init test-build-phpfpm test-destroy-phpfpm

#
# Environment Setup
#
init:
	@echo "Running some cool shit here..."

build:
	@docker-compose up -d --build

down:
	@docker-compose down


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
.PHONY: init build down test-build-phpfpm test-destroy-phpfpm