#!/usr/bin/ php

<?php

  /*
    coded by Ibnusyawall 407 Authentic Exploit
  */

  $ua = 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13';
  function req($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_USERAGENT, $ua);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
  }

  function isi($site, $file) {
    if ($site !== $file) {
      $pfile = fopen('./result/'.$file, "w");
      $plogs = fopen('log.txt', 'w');
      $purls = $site;

      $con = req($purls);
      fwrite($pfile, $con);
      echo PHP_EOL. '  [ maling_sc | 407 Authentic Exploit ] '. PHP_EOL;
      echo '       '. $file. ' Berhasil dibuat !'. PHP_EOL;
      fclose($pfile);

      fwrite($plogs, '[ runing using php maling_sc on site'. $site. ' ]'. PHP_EOL);
      fclose($plogs);

    } else {
      echo " interupt! ketik : php def.php http://site.com ex.html". PHP_EOL;
    }
  }

  isi($argv[1], $argv[2])

?>
