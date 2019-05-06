<?php
    include('config.inc.php'); 
    $kepek = array();
    $olvaso = opendir($MAPPA);
    while (($fajl = readdir($olvaso)) !== false) {
        if (is_file($MAPPA.$fajl)) {
            $vege = strtolower(substr($fajl, strlen($fajl)-4));
            if (in_array($vege, $TIPUSOK)) {
                $kepek[$fajl] = filemtime($MAPPA.$fajl);
            }
        }
    }
    closedir($olvaso);
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Galeria</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>Galéria</title>
    <style type="text/css">
        div#galeria {margin: 0 auto; width: 620px;}
        div.kep { display: inline-block; }
        div.kep img { width: 200px; }
    </style>
    </head>
    <body>
        <table cellspacing="0" cellpadding="0" width="800px" align="center">
            <tr>
                <td colspan=4 class="header">
                    <img src="img/logo.png" width="230" height="189">
                </td>
                <td class="header">>
                    <div id="google">
                        <form method="get" action="http://www.google.com/search">
                         <input type="text" name="q" size="15" maxlength="255" value="" /></br>
                         <input type="submit" value="Google Keresés" /></br>
                         <input type="radio" name="sitesearch" value="" /> 
                          A weben! </br>
                        </form>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="menu">
                    <a href="index.html">Főoldal</a>
                </td>
                <td class="menu">
                    <a href="galeria.html">Galéria</a>
                </td>
                <td class="menu">
                    <a href="info.html">Info</a>
                </td>
                <td class="menu">
                    <a href="viccek.html">Viccek</a>
                </td>
                <td class="menu">
                    <a href="kapcsolat.html">Kapcsolat</a>
                </td>
            </tr>
            <tr>
                <td colspan=5 class="tartalom">
                    <div id="galeria">
                        <h1>Galéria</h1>
                        <h1><a href="feltolt.php">Feltöltés</a></h1>
                        <?php
                        arsort($kepek);
                        foreach($kepek as $fajl => $datum)
                        {
                        ?>
                        <div class="kep">
                        <a href="<?php echo $MAPPA.$fajl ?>">
                        <img src="<?php echo $MAPPA.$fajl ?>">
                        </a>            
                        <p>Név:  <?php echo $fajl; ?></p>
                        <p>Dátum:  <?php echo date($DATUMFORMA, $datum); ?></p>
                         </div>
                        <?php
                        }
                        ?>
                    </div>
                </td>
            </tr>

            
        </table>

    </body> 
</html>