<?php

if(isset($_COOKIE['wizyta'])) {
    echo 'Ostatnia wizyta: ' . $_COOKIE['wizyta'];
} else {
    echo 'To Twoja pierwsza wizyta na tej stronie';
}

setcookie("wizyta", date("d-m-Y H:i:s"), time() + (86400 * 30), "/");
?>