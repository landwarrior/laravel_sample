#!/usr/bin/env bash

# bento/centos-8 で VM を作成した場合の初期構築

# composer で zip, unzip を使用するのでインストールしておく
# p7zip は必要あれば入れる
if ! rpm -qa | grep unzip ; then
  echo "  - install zip unzip"
  dnf install -y zip unzip p7zip
fi
if ! rpm -qa | grep ^git ; then
  echo "  - install git"
  dnf install -y git
fi
if ! rpm -qa | grep php ; then
  echo "  - install php"
  dnf install -y https://rpms.remirepo.net/enterprise/remi-release-8.rpm
  dnf module install -y php:remi-7.4
  dnf install -y php php-intl php-pdo php-mysqlnd
fi

if ! find / -name composer 2>/dev/null ; then
  php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
  php -r "if (hash_file('sha384', 'composer-setup.php') === 'e5325b19b381bfd88ce90a5ddb7823406b2a38cff6bb704b0acc289a09c8128d4a8ce2bbafcd1fcbdc38666422fe2806') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
  # Installer corrupt が出た場合は以下のサイトを参照してハッシュ値を変更しないといけない
  # https://getcomposer.org/download/
  php composer-setup.php
  php -r "unlink('composer-setup.php');"
  mv composer.phar /usr/local/bin/composer
fi

if ! rpm -qa | grep nginx | grep -v filesystem ; then
    echo "  - install nginx"
    dnf install -y nginx
fi

if ! rpm -qa | grep npm ; then
  echo "  - install npm"
  dnf install -y npm
fi

if ! rpm -qa | grep mysql-server ; then
    echo "  - install mysql"
    dnf install -y @mysql:8.0
    systemctl start mysqld
    systemctl enable mysqld
    mysql -e "create user homestead@localhost identified by 'secret';"
    mysql -e "grant all privileges on *.* to homestead@localhost;"
    mysql -e "create user homestead@'%' identified by 'secret';"
    mysql -e "grant all privileges on *.* to homestead@'%';"
    mysql -e "create database homestead;"
fi

timedatectl set-timezone Asia/Tokyo

# vi /etc/php-fpm.d/www.conf
#  user = nginx
#  group = nginx
#  listen = /var/run/php-fpm/php-fpm.sock
#  listen.owner = nginx
#  listen.group = nginx
#  ;listen.acl_users = apache,nginx
# vi /etc/nginx/conf.d/php-fpm.conf
#         server unix:/var/run/php-fpm/php-fpm.sock;
# vi /etc/nginx/nginx.conf
# server {
#     listen       80 default_server;
#     listen       [::]:80 default_server;
#     server_name  _;
#     root         /vagrant_data/sample/public;
#
#     # Load configuration files for the default server block.
#     include /etc/nginx/default.d/*.conf;
#
#     add_header X-Frame-Options "SAMEORIGIN";
#     add_header X-XSS-Protection "1; mode=block";
#     add_header X-Content-Type-Options "nosniff";
#
#     location / {
#         try_files $uri $uri/ /index.php?$query_string;
#     }
#
#     location = /favicon.ico { access_log off; log_not_found off; }
#     location = /robots.txt  { access_log off; log_not_found off; }
#
#     error_page 404 /index.php;
#
#     location ~ \.php$ {
#         fastcgi_pass unix:/var/run/php/php-fpm.sock;
#         fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
#         include fastcgi_params;
#     }
#
#     location ~ /\.(?!well-known).* {
#         deny all;
#     }
#
# #        error_page 404 /404.html;
# #            location = /40x.html {
# #        }
#
# #        error_page 500 502 503 504 /50x.html;
# #            location = /50x.html {
# #        }
# }
# 必要かわからないけど
# cd /vagrant_data/sample
# php /usr/local/bin/composer install
# php artisan migrate
