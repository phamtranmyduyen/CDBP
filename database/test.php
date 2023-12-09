<?php
    $pointDetail= array();
    require_once('../DataProvider.php');
    $cttc = $_POST['cttc'];
    $tc = $_POST['dc'];
    array_push($pointDetail, $cttc, $dc);
    print_r($pointDetail)
    ?>