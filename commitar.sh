#!/bin/bash
git config credential.helper store
#find ./ -iname .gitignore -exec rm {} \;
#echo "##### GITIGNORE EXCLUIDO ==> OK #####"
git add .
echo "##### GIT ADD ==> OK #####"
data=`date +%d-%m-%Y_%H:%M:%S`
git commit -m $data
echo "##### COMMIT ==> OK #####"
git push origin master #empurrar
echo "##### PUSH ==> OK #####"
