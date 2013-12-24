#!/usr/bin/env sh

mkdir vendors
git clone https://github.com/zxbodya/elFinder.git ./vendors/elFinder
cd ./vendors/elFinder/
git checkout 1.x
cd ./../../