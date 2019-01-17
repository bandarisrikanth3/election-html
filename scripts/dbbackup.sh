#!/bin/bash

dbtime=`date +"%Y-%m-%d-%H-%M"`

echo $dbtime


sudo mysqldump -u root -ppassword sak_election > /data/BALA/election-htmls/$dbtime".sql" 
