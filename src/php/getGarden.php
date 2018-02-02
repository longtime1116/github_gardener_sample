<?php
$data = file_get_contents("https://github.com/users/${_GET['username']}/contributions");
header("Access-Control-Allow-Origin: *");
print $data;
