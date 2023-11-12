FROM php:8.2

RUN apt-get update && \
    apt-get install -y git zip unzip

RUN docker-php-ext-install pdo_mysql

RUN git config --global user.email "Olenka1303@gmail.com" && \
    git config --global user.name "Olena Zhuk"

# Install symfony CLI
RUN \
    curl -sS https://get.symfony.com/cli/installer | bash && \
    mv /root/.symfony5/bin/symfony /usr/local/bin/symfony

# Install composer
RUN \
   php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
   php -r "if (hash_file('sha384', 'composer-setup.php') === 'e21205b207c3ff031906575712edab6f13eb0b361f2085f1f1237b7126d785e826a450292b6cfd1d64d92e6563bbde02') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" && \
   php composer-setup.php && \
   php -r "unlink('composer-setup.php');" && \
   mv composer.phar /usr/local/bin/composer

WORKDIR /code