<?php

$time=time();
$day=date("d-m-Y");
$datadir="/var/www/speedtest/data/";

$fp = fopen($datadir."data_".$day.".txt", "r");
if ($fp) {
    $i_u=0;
    $i_d=0;
    while (!feof($fp)) {
        $nolasitie = fgets($fp, 4096);
        if($nolasitie!=""){
        $dati=explode("|", $nolasitie);
        $band[$dati[2]][$dati[1]][($dati[1]==u ? ++$i_u : ++$i_d)][time]=$dati[0];
        $band[$dati[2]][$dati[1]][($dati[1]==u ? $i_u : $i_d)][speed]=$dati[3];
        }
    }
    fclose($fp);
}

//print_r($band);

error_reporting(0);
header('Content-Type: image/png');

$x_max=790;
$y_max=280;
$im=@imagecreatetruecolor($x_max, $y_max)
or die ("Cannot Initialize new GD image stream");

imageAlphaBlending($im, false);
imageSaveAlpha($im, true);
//ImageAntiAlias($im, true);

$bar1 = imagecolorallocate($im, 80, 80, 80);
$bar2 = imagecolorallocate($im, 50, 50, 50);

$red = imagecolorallocate($im, 255, 0, 0);
$blue = imagecolorallocate($im, 0, 0, 255);


$textcolor = imagecolorallocate($im, 31, 34, 29);
$bgc = imagecolorallocate($im, 200, 200, 200);
imagefilledrectangle($im, 0, 0, $x_max, $y_max, $bgc);

$graf_fons="graph_bg.png";

$graf_izmers=getimagesize($graf_fons);
$src = imagecreatefrompng($graf_fons);


$graf_viet_x=($x_max/2)-($graf_izmers[0]/2)+13;
$graf_viet_y=($y_max/2)-($graf_izmers[1]/2)+10;


// Copy and merge
imagecopymerge($im, $src, $graf_viet_x, $graf_viet_y, 0, 0, $graf_izmers[0], $graf_izmers[1], 100);

$pa_cik_x=round($graf_izmers[0]/24);

for($i=0; $i<25; $i++){
    $pa=$pa_cik_x*$i;
    imageline($im, $graf_viet_x+$pa, $graf_viet_y+1, $graf_viet_x+$pa, $graf_viet_y+$graf_izmers[1]-2, $bar1);


    imagestring($im, 2, $graf_viet_x+$pa-($i>9 ? "6" : "3"), $graf_viet_y+$graf_izmers[1]+3, $i, $textcolor);

}

$pa_cik_y=round($graf_izmers[1]/10);

for($i=10; $i>=0; $i--){
    $pa=$pa_cik_y*$i;

    imageline($im, $graf_viet_x, $graf_viet_y+$pa, $graf_viet_x+$graf_izmers[0], $graf_viet_y+$pa, $bar2);

    if($i!=0)
    imagestring($im, 2, $graf_viet_x-($i*10==100 ? "23" : "17"), $graf_viet_y+$graf_izmers[1]-$pa-5, $i*10, $textcolor);

}

$y_ass=$graf_izmers[1]/100;
$x_ass=$graf_izmers[0]/1440;

foreach($band['eth0'] as $bi=>$bt){

    if($bi=="u") $krasa=$red;
    else $krasa=$blue;

    foreach($bt as $bn){

        $stundas=date("G", $bn['time']);
        $minutes=date("i", $bn['time']);
        $x_min=($stundas*60)+$minutes;

        $y_kur=$y_ass*$bn['speed'];

        $x_kur=$x_ass*$x_min;

        if(@$ieprieksejais){

            if($bn['time']-$ieprieksejais['t']<1800){
            imageline($im, $ieprieksejais['x'], $ieprieksejais['y'], $graf_viet_x+$x_kur, $graf_viet_y+$graf_izmers[1]-$y_kur, $krasa);
            }

        unset($ieprieksejais);
        }

        ImageFilledEllipse($im, $graf_viet_x+$x_kur, $graf_viet_y+$graf_izmers[1]-$y_kur, 4, 4, $krasa);

        $ieprieksejais['t']=$bn['time'];
        $ieprieksejais['x']=$graf_viet_x+$x_kur;
        $ieprieksejais['y']=$graf_viet_y+$graf_izmers[1]-$y_kur;
    }

    unset($ieprieksejais);
}

imagestring($im, 2, 50, 20, "IZZI interneta atruma grafiks uz ".$day." (Zila krasa - download, sarkana - upload) (atrumi megabitos)", $textcolor);
imagestring($im, 2, 600, 34, "Darbojas ar speedtest.net", $bar1);


$background_color = ImageColorAllocate ($im, 234, 234, 234);
$text_color = ImageColorAllocate ($im, 233, 14, 91);
$graph_color = ImageColorAllocate ($im,25,25,25);


imagepng($im);
imagedestroy($im);

?>