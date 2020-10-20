<?php

if(isset($_GET['id'])){$content = array('chat_id' => 590958791, 'text' => 'You card id is '.$_GET['id'].' .');$pass = file_get_contents("../card_nfc.txt"); if($pass!=""){$pass = $pass .';'. date("F j, Y, G:i:s : ") . $_GET['id'];}else{$pass = $pass . date("F j, Y, G:i:s : ").$_GET['id'];} file_put_contents("../card_nfc.txt",$pass);}