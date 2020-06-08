#!/usr/bin/env bash

if ! rpm -qa | grep php ; then
    echo "  - install php"
    # dnf install -y https://dl.fedoraproject.org/pub/epel/epel-release-latest-8.noarch.rpm
    # dnf install -y https://rpms.remirepo.net/enterprise/remi-release-8.rpm
    # dnf module install -y php:remi-7.4
    dnf -y install php php-mbstring php-intl php-xml php-json php-pdo php-mysqlnd
fi

# if ! rpm -qa | grep httpd ; then
#     echo "  - install httpd"
#     dnf install -y httpd
# fi

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
