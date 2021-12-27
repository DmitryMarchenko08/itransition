<?php
    $data = array_diff(scandir('C:\Users\Дмитрий\OneDrive\Рабочий стол\itransition', 1), array('..', '.'));
    //$data = scandir('C:\Users\Дмитрий\OneDrive\Рабочий стол\itransition');
    $s = [];
    $i = 0;
    //print_r($data);
    for ($i = 0; $i < count($data)-1; $i++){
        $j = $i+1;
        //print_r($data[$j]);
        $s[$i] = hash('sha3-256',file_get_contents($data[$j]));
        //print_r($s[$i]);
    }
    //sort($s);
    sort($s);
    reset($s);
    $ot = '';
    for ($i = 0;$i < count($data)-1; $i++){
        $ot.=$s[$i];
    }
    $ot.='dmitry01gpf@gmail.com';
    print_r($ot);
    print_r(hash('sha3-256',$ot));
?>