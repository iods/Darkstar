#
# PHP SDK Makefile Template
#

# Build the environment
all: init

# Run a test on the php:7.4-fpm image
test-phpfpm: init test-build-phpfpm test-destroy-phpfpm

init:
	@echo "Running some cool shit here..."


#
# PHP 7.4-fpm Tests
#
test-build-phpfpm:
	@docker-compose -f tests/docker-compose.phpfpm.yml up --build --force-recreate -d

test-destroy-phpfpm:
	@docker-compose -f tests/docker-compose.phpfpm.yml down

.PHONY: init test-build-phpfpm test-destroy-phpfpm