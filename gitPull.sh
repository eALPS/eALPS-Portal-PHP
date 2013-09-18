#!/bin/sh

echo 作業ディレクトリに移動します．
# cd /var/www/html/ealps-portal/

echo git pull を実行します．
git pull

echo vendor ディレクトリを消去します．
rm -rf vendor/*

echo cache ディレクトリを消去します．
rm -rf app/cache/*

echo vendor をアップデートします．
php composer.phar self-update

echo vendor をインストールします．
php composer.phar install

echo cache ディレクトリのアクセス権を変更します．
chmod -R 777 app/cache

echo logs ディレクトリのアクセス権を変更します．
chmod -R 777 app/logs

exit 0
