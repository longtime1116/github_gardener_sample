<?php
//$data = file_get_contents("https://github.com/users/longtime1116/contributions");
$data = file_get_contents($_GET['url']);
header("Access-Control-Allow-Origin: *");
header("Content-Type: text/plain");
print $data;
