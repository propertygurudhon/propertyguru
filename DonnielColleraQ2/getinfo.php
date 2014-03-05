<?php
require_once("data.php");

$ArrayURL = explode('/', $_SERVER['REQUEST_URI']);
$id = end($ArrayURL);
$data = new baseObj();

if (is_object($data)) $status = '200 OK';
$status_header = 'Content-type: text';

//header($status_header);
echo "[" . json_encode( $data->getAll($id) ) . "]";
//echo $data->getAll($id);
?>
