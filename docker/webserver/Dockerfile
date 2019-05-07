# docker build -t apachephp:v1 .
# nazwa obrazu: apachephp:v1

FROM ubuntu:16.04
MAINTAINER Booklet Group S.C. <b.mikolajczak@booklet.pl>

VOLUME ["/var/www"]

RUN apt-get update && apt-get dist-upgrade -y

RUN apt-get install php-imagick -y

RUN apt-get install -y \
    curl \
    php7.0 \
    php7.0-cli \
    php7.0-json \
    php7.0-curl \
    php7.0-mbstring \
    php7.0-xml \
    php7.0-zip \
    php7.0-intl \
    php7.0-soap \
    composer
