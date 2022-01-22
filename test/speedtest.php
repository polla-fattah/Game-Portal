#!/usr/bin/php5
<?php
/*
 *  Speedtest.net linux terminal client.
 *
 *  This is free and open source software by Janhouse (speedtest@janhouse.lv)
 *
 *  I made this script so anyone could easily test incoming and outgoing
 *  network speed using linux terminal.
 *  In a way this is even better then speedtest.net web version because
 *  here you can see total upload and download speed even if you are
 *  downloading or uploading files in other programms at the same time.
 *  At the beginning of execution it checks total download and upload ammount
 *  of network interface and then it starts downloading/uploading files to
 *  speedtest.net test server. At the end of the script it checks them again
 *  and makes neccesary calculations.
 *
 *  Script uses curl, executes ifconfig commands in shell and writes temporary
 *  files in temp_down folder. Make sure you have everything set up before
 *  using it. :)
 *
 *  Oh... I allmost forgot... Don't forget to chmod +x speedtest.php
 *
 *  Version 0.1b
 *
 *
 *  TODO:
 *
 *      Draw graph from output using gd2
 *
 *      Make some sort of error checking for connection
 *
 */

error_reporting(0);
header("content-type: text/plain");


/* * *              Configuration                   * * */
$iface="eth0";
$server="riga";
$downloads="/var/www/speedtest/temp_down/";
$uploads="/var/www/speedtest/upload/";
$datadir="/var/www/speedtest/data/";
$randoms=rand(100000000000, 9999999999999);
$time=time();
$day=date("d-m-Y");

/* * *              Speedtest servers               * * */
$do_server['riga'] = "http://speedtest.vivonet.lv";
$do_server['ogre'] = "http://speedtest.oic.lv";
$do_server['limbazi'] = "http://web-a.lvdats.lv";
$do_server['ventspils'] = "http://www.arions.lv";

$do_size[1]=500;
$do_size[2]=1000;
$do_size[3]=1500;
$do_size[4]=2000;
$do_size[5]=2500;
$do_size[6]=3000;
$do_size[7]=3500;
$do_size[8]=4000;


/* * *              The rest                        * * */
function download($size){

    global $server, $downloads, $do_server, $server, $iface, $randoms, $do_size;

    $fails=$downloads."fails_".$size.".jpg";

    $fp = fopen ($fails, 'w+');
    $ch = curl_init($do_server[$server]."/speedtest/random".$do_size[$size]."x".$do_size[$size].".jpg?x=".$randoms."-".$size);
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 50);
    curl_setopt($ch, CURLOPT_FILE, $fp);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

    $sakums=microtime(true);

    $sakuma_rx=shell_exec("sudo ifconfig ".$iface."|grep RX\ bytes|awk '{ print $2 }'|cut -d : -f 2");
    $klucis=curl_exec($ch);
    $beigu_rx=shell_exec("sudo ifconfig ".$iface."|grep RX\ bytes|awk '{ print $2 }'|cut -d : -f 2");

    $beigas=microtime(true);

    curl_close($ch);
    fclose($fp);

    unlink($fails);

    $pavadija=$beigas-$sakums; // laiks

    if($pavadija<4 && $size!=8) download(++$size);
    else{

        //$izmers_mbyte=(filesize($fails)/1024)/1024; // megabaiti
        //$izmers_mbit=((filesize($fails)*8)/1000)/1000; // megabITI
        //$atrums_mbyte=$izmers_mbyte/$pavadija; // megabaiti sekunde
        //$atrums_mbit=$izmers_mbit/$pavadija; // megabiti sekunde

        $sakuma_rx=trim($sakuma_rx);
        $beigu_rx=trim($beigu_rx);

        $rx=$beigu_rx-$sakuma_rx;

        $rx_laiks=((($rx*8)/1000)/1000)/$pavadija;
        $rx_laiks=round($rx_laiks, 2);
        //print "$size - $pavadija - $rx_laiks\n";

        write_to_file($rx_laiks, "d");

        print "\t".$iface." download ātrums: \t\t".$rx_laiks." (Mb\s)\n";

    }
}

function upload($size){

    global $server, $uploads, $do_server, $server, $iface, $randoms;

    $fails=$uploads."fails_".$size;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_VERBOSE, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible;)");
    curl_setopt($ch, CURLOPT_URL, $do_server[$server]."/speedtest/upload.php?x=0.".$randoms);
    curl_setopt($ch, CURLOPT_POST, true);
    $post = array(
        "file_box"=>"@".$fails,
    );
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

    $sakums=microtime(true);
    $sakuma_tx=shell_exec("sudo ifconfig ".$iface."|grep TX\ bytes|awk '{print $6}'|cut -d: -f2");
    $response = curl_exec($ch);
    $beigu_tx=shell_exec("sudo ifconfig ".$iface."|grep TX\ bytes|awk '{print $6}'|cut -d: -f2");
    $beigas=microtime(true);

    $aiznem=substr($response, 5);
    $kopa=filesize($fails)+$aiznem;

    $pavadija=$beigas-$sakums; // sekundes

    /*
    $izmers_mbyte=($kopa/1024)/1024; // megabaiti
    $izmers_mbit=(($kopa*8)/1000)/1000; // megabITI
    $atrums_mbyte=$izmers_mbyte/$pavadija; // megabiti sekunde
    $atrums_mbit=$izmers_mbit/$pavadija; // megabiti sekunde
     */

    if($pavadija<4 && $size!=8) upload(++$size);
    else{

        $sakuma_tx=trim($sakuma_tx);
        $beigu_tx=trim($beigu_tx);

        $tx=$beigu_tx-$sakuma_tx;

        $tx_laiks=((($tx*8)/1000)/1000)/$pavadija;
        $tx_laiks=round($tx_laiks, 2);

        //print "$size - $pavadija - $tx_laiks\n";

        write_to_file($tx_laiks, "u");

        print "\t".$iface." upload ātrums: \t\t".$tx_laiks." (Mb\s)\n";

    }
}

function write_to_file($data, $updown){ // u - upload; d - download
    global $day, $time, $datadir, $iface;

    $fp = fopen($datadir."data_".$day.".txt", "a");
    fwrite($fp, $time."|".$updown."|".$iface."|".$data."\n");
    fclose($fp);

}


print "\n\tTesting download speed...\n\n";

download(1);
print "\n\tTesting upload speed...\n\n";
upload(1);

?>