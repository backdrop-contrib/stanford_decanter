#!/bin/sh

cd /home/root && \
		git clone https://github.com/backdrop-contrib/bee.git && \
 	 	chmod +x bee/bee.php && \
		ln -s /home/root/bee/bee.php /usr/bin/bee

echo "memory_limit = 1024M \
		_error_log = /workspace/local/logs/php-devcontainer.log \
		xdebug.mode = off \
		xdebug.start_with_request = no \
		xdebug.client_port = 9000" > /usr/local/etc/php/conf.d/devcontainer.php.ini

mkdir web
