<?php

function WriteJson($status, $description, $data){
    echo json_encode(
        'status' -> $status,
        'description' -> $description,
        'data' -> $data
    );
}