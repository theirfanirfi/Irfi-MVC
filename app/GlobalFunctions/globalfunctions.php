<?php 

function baseUrl($url) {
    echo "http://".$_SERVER['SERVER_NAME']."/IrfiMVC/".$url;
}

function rbaseUrl() {
    return "http://".$_SERVER['SERVER_NAME']."/IrfiMVC/";
}

?>