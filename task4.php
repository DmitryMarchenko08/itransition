<?php
    $cmdargv = array_slice($argv, 1);
    $amount_of_arguments = count($cmdargv);
    if (($amount_of_arguments < 3) or !($amount_of_arguments%2)){
        print_r('Error');
    }else{
        function win($mymove, $cmdargv,$computermove){
            $ind;
            for ($i = 0; $i < count($cmdargv); $i++){
                if ($cmdargv[$i]==$mymove){
                    $ind = $i;
                    break;
                }
            }
            $l = [];
            for ($i = 1; $i <= (count($cmdargv)-1)/2; $i++){ 
                if ($ind+1==count($cmdargv)){
                    $ind = 0;
                    array_push($l,$cmdargv[$ind]);
                }else{
                    $ind++;
                    array_push($l,$cmdargv[$ind]);
                }
            }
            $k = 0;
            for ($i = 0; $i < count($l);$i++){
                if ($l[$i] == $computermove){
                    $k++;
                    break;
                }
            }
            if ($k==0){
                print_r("You win\n");
            }else{
                print_r("You lose\n");
            }
        }
        $computerind = rand(0, count($cmdargv)-1);
        print_r("HMAC:\n");
        $h = hash_hmac("sha256",$computerind,'secret');
        print_r("$h\n");
        for ($i = 0; $i < count($cmdargv); $i++){
            $j = $i+1;
            print_r("$j - $cmdargv[$i]\n");
        }
        print_r("0 - exit\n");
        print_r("100 - help\n");
        fscanf(STDIN, "%d\n", $mymove);
        if ($mymove == "100"){
            print_r("table of loses:\n ");
            for ($i = 0; $i < count($argv); $i++){
                print_r("| $argv[$i] | ");
            }
            print_r("\n");
            for ($i = 0; $i < count($argv); $i++){
                print_r("| $argv[$i] | ");
            }

        }
        fscanf(STDIN, "%d\n", $mymove);
        $mymove--;
        $computermove = $cmdargv[$computerind];
        print_r("your move $cmdargv[$mymove]\n");
        print_r("Computer move $computermove\n");
        win($cmdargv[$mymove], $cmdargv,$computermove);
        print_r("HMAC key:\n");
        print_r(hash_hmac("sha256","$computerind$h",'secret'));
    }
?>