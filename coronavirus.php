<?php
header('Content-Type:text/plain');

$content = fopen('https://raw.githubusercontent.com/nytimes/covid-19-data/master/live/us.csv','r');
$match = fgetcsv($content);
$match = fgetcsv($content);
echo "coronavirus_total_cases_us ".$match[1]."\n";
echo "coronavirus_total_deaths_us ".$match[2]."\n";

$content = fopen('https://raw.githubusercontent.com/nytimes/covid-19-data/master/live/us-states.csv','r');
$states = array('al','ak','az','ar','ca','co','ct','dl','dc','fl','ga','gu','hi','id','il','in','ia','ks','ky','la','me','md','ma','mi','mn','ms','mo','mt','ne','nv','nh','nj','nm','ny','nc','nd','mp','oh','ok','or','pa','pr','ri','sc','sd','tn','tx','ut','vt','va','vi','wa','wv','wi','wy');
fgetcsv($content);
$ticker = 0;
while(($line = fgetcsv($content)) !== FALSE){
  echo 'coronavirus_cases{state="'.$states[$ticker].'"} '.$line[3]."\n";
  echo 'coronavirus_deaths{state="'.$states[$ticker].'"} '.$line[4]."\n";
  $ticker = $ticker + 1;
}
