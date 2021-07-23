<?php
header('Content-Type: application/json');
require "base.php";

function queryAll($query)
{
    return makeRequest($query);
}

$data = json_decode(file_get_contents("php://input"));
echo json_encode(queryAll($data->query));