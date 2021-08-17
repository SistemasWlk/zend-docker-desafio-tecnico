FROM dennisoliveira/zend1

MAINTAINER Wilker <sistemaswlk@gmail.com>

WORKDIR /var/www/html/zend-docker-desafio-tecnico/
COPY . /var/www/html/zend-docker-desafio-tecnico/
ADD _docker/000-default.conf /etc/apache2/sites-available/000-default.conf