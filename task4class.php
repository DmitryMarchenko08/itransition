<?php
    $d=getdate();
    print_r(hash_hmac("sha256",$d[0],'secret'));
?>