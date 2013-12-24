#!/usr/bin/env sh

cd ./vendors/elFinder/src/
make clean
make all

cp ../css/elfinder.css ../../../assets/css/elfinder.css
cp -r ../js/i18n ../../../assets/js/
cp ../js/elfinder.full.js ../../../assets/js/
cp ../js/elfinder.min.js ../../../assets/js/

cp -r ../images/* ../../../assets/images/
#cp -r ../connectors/php ../../../

cd ../../../