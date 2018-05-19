<?php
function __autoload($class_name){
    include "includes/" . $class_name . ".php";
}

$arr = DbHandler::select_cmd(['table' => 'magic_users']);
$jarr = DbHandler::insert_cmd([
    'table' => 'magic_users',
    'col' => ['default'],
    'val' => ['chuks']
]);
//$arr = DbHandler::getArray($result_set);
echo json_encode($arr);

?>
