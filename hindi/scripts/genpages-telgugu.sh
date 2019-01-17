#!/bin/bash


sudo rsync -avz /data/www/election_beta/assets/ /data/BALA/election-htmls/2018/telugu/assets/
sudo rsync -avz /data/www/election_beta/Jsons/ /data/BALA/election-htmls/2018/telugu/Jsons/

statearray=('telangana')

starrlen=${#statearray[@]}

for (( i=0; i<$starrlen; i++ ));
do
fname=${statearray[${i}]}".html"

wget  --html-extension http://219.65.68.153/election_beta/$fname -O /data/BALA/election-htmls/2018/telugu/$fname
done

distarray=('adilabad' 'bhadradri-kothagudem' 'hyderabad' 'jagtial' 'jangaon' 'jayashankar-bhupalpally' 'jogulamba-gadwal' 'kamareddy' 'karimnagar' 'khammam' 'kumuram-bheem' 'mahabubabad' 'mahabubnagar' 'mancherial' 'medak' 'medchal' 'nagarkurnool' 'nalgonda' 'nirmal' 'nizamabad' 'peddapalli' 'rajanna-sircilla' 'rangareddy' 'sangareddy' 'siddipet' 'suryapet' 'vikarabad' 'wanaparthy' 'warangal-rural' 'warangal-urban' 'yadadri-bhuvanagiri')

distarrlen=${#distarray[@]}
for (( i=0; i<$distarrlen; i++ ));
do
fname=${distarray[${i}]}".html"
wget --html-extension http://219.65.68.153/election_beta/telangana/district/$fname -O /data/BALA/election-htmls/2018/telugu/telangana/district/$fname
done

constarray=('chennur' 'bellampalle' 'sirpur' 'mancherial' 'khanapur' 'mudhole' 'boath' 'asifabad' 'nirmal' 'adilabad' 'jukkal' 'balkonda' 'armur' 'yellareddy' 'bodhan' 'nizamabadrural' 'kamareddy' 'banswada' 'nizamabadurban' 'manakondur' 'choppadandi' 'dharmapuri' 'manthani' 'huzurabad' 'husnabad' 'ramagundam' 'vemulawada' 'peddapalle' 'sircilla' 'koratla' 'jagtial' 'karimnagar' 'andole' 'zahirabad' 'dubbak' 'gajwel' 'sangareddy' 'narayankhed' 'narsapur' 'medak' 'siddipet' 'patancheru' 'vikarabad' 'chevella' 'ibrahimpatnam' 'pargi' 'tandur' 'medchal' 'maheshwaram' 'rajendranagar' 'malkajgiri' 'uppal' 'serilingampally' 'lalbahadurnagar' 'quthbullapur' 'kukatpally' 'secunderabadcantt' 'secundrabad' 'musheerabad' 'sanathnagar' 'nampally' 'goshamahal' 'khairatabad' 'amberpet' 'jubileehills' 'karwan' 'malakpet' 'chandrayangutta' 'yakutpura' 'charminar' 'bahdurpura' 'achampet' 'alampur' 'nagarkurnool' 'kalwakurthy' 'kollapur' 'shadnagar' 'jadcherla' 'kodangal' 'makthal' 'wanaparthy' 'gadwal' 'narayanpet' 'devarkadra' 'mahbubnagar' 'thungathurthi' 'nakrekal' 'kodad' 'nalgonda' 'suryapet' 'nagarjunasagar' 'alair' 'huzurnagar' 'bhongir' 'munugode' 'devarakonda' 'miryalguda' 'wardhanapet' 'ghanpurstation' 'parkal' 'bhupalpalle' 'jangaon' 'palakurthi' 'mulug' 'dornakal' 'warangalwest' 'narsampet' 'mahabubabad'  'warangaleast' 'madira' 'sathupalli' 'palair' 'wyra' 'kothagudem' 'pinapaka' 'aswaraopeta' 'bhadrachelam' 'khammam' 'yellandu' 'himayathnagar' 'gaganmahal' 'asifnagar' 'karyan' 'sitharambag' 'kantonment' 'amarachintha' 'indhurthi' 'maydaram' 'metpalli' 'neralla'  'jahirabadh' 'patancheru' 'ramayampeta' 'dommata' 'rajagopalapeta' 'kuthbullapur' 'kukatpally' 'chalakurthi' 'hanmakonda' 'warangal' 'burgampaadu' 'illandhu' 'sujathanagar' 'vemsuru' 'ashwaravpeta')

constarrlen=${#constarray[@]}
for (( i=0; i<$constarrlen; i++ ));
do
fname=${constarray[${i}]}".html"
wget --html-extension http://219.65.68.153/election_beta/telangana/constituency/$fname -O /data/BALA/election-htmls/2018/telugu/telangana/constituency/$fname
done

wget --html-extension http://219.65.68.153/election_beta/telangana/sidebar.html -O /data/BALA/election-htmls/2018/telugu/telangana/sidebar.html
wget --html-extension http://219.65.68.153/election_beta/telangana/sidebar/schedule -O /data/BALA/election-htmls/2018/telugu/telangana/schedule-sb.html
