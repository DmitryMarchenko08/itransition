<?php
    class Winner{
        function win($mymove,$computer,$all_elements){
            $ind;
            for ($i = 0; $i < count($all_elements); $i++){
                if ($all_elements[$i]==$mymove){
                    $ind = $i;
                    break;
                }
            }
            $l = [];
            for ($i = 1; $i <= (count($all_elements)-1)/2; $i++){ 
                if ($ind+1==count($all_elements)){
                    $ind = 0;
                    array_push($l,$all_elements[$ind]);
                }else{
                    $ind++;
                    array_push($l,$all_elements[$ind]);
                }
            }
            $k = 0;
            for ($i = 0; $i < count($l);$i++){
                if ($l[$i] == $computer){
                    $k++;
                    break;
                }
            }
            if ($mymove==$computer){
                print_r(" Draw    ");
            }else{
                if ($k==0){
                    print_r(" win    ");
                }else{
                    print_r(" lose    ");
                }
            }
        }
    }
    class Table{
        function table($cmdargv){
            for ($i = 0; $i < count($cmdargv); $i++){
                print_r("    $cmdargv[$i] ");
            }
            print_r("\n");
            for ($i=0; $i < count($cmdargv); $i++){
                print_r("$cmdargv[$i] ");
                for ($j = 0; $j < count($cmdargv);$j++){
                    $temp = new Winner();
                    $temp->win($cmdargv[$i],$cmdargv[$j],$cmdargv);
                }
                print_r("\n");
            }
        }
    }
    class Generate{
        function generate(){
            $d=getdate();
            return $d[0];
        }
    }
    class Hmac1{
        function gen_hmac($computerind){
            $f = new Generate();
            $key = $f->generate();
            $h = hash_hmac("sha256","$computerind",'secret');
            print_r("$h\n");
        }
    } 
    $cmdargv = array_slice($argv, 1);
    $amount_of_arguments = count($cmdargv);
    if (($amount_of_arguments < 3) or !($amount_of_arguments%2)){
        print_r('Error');
    }else{
        $th = new Hmac1();
        $tg = new Generate();
        $x = $tg->generate(); 
        print_r("HMAC: ");
        $th->gen_hmac($x);
        for ($i = 0; $i < count($cmdargv); $i++){
            $j = $i+1;
            print_r("$j - $cmdargv[$i]\n");
        }
        print_r("0 - exit\n");
        print_r("? - help\n");
        $computerind = rand(0, count($cmdargv)-1); 
        fscanf(STDIN, "%s\n", $mymove);
        if ($mymove == "?"){
            $t2 = new Table();
            $t2->table($cmdargv); 
            fscanf(STDIN, "%s\n", $mymove);
        }
        (int)$mymove--;
        print_r("Your move: $cmdargv[$mymove]\nComputer move: $cmdargv[$computerind]\n");
        $t1 = new Winner();
        $t1->win($cmdargv[$mymove],$cmdargv[$computerind],$cmdargv);
        print_r("\nHMAC key: ");
        $th->gen_hmac("$x$computerind");
    }
?>