#!/bin/bash



distarray=('Adilabad' 'Hyderabad' 'Karimnagar' 'Khammam' 'Mahabubnagar' 'Medak' 'Nalgonda' 'Nizamabad' 'Rangareddy' 'Warangal' )

distarrlen=${#distarray[@]}
for (( i=0; i<$distarrlen; i++ ));
do
fname=${distarray[${i}]}".html"
fname1=${distarray[${i}]}
wget --html-extension http://192.168.150.157/election_admin_beta/Results/DistrictResults/$fname1 -O /data/BALA/election-htmls/2018/telugu/telangana/results/$fname
done


