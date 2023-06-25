<?php

function WriteJson($status, $description, $data){
    echo json_encode(
        array(
        'status' => $status,
        'description' => $description,
        'data' => $data
        )
    );
}