<?php
    header("Content-Type:application/json");

    $data = [
        'message' => 'Hello from PHP!',
        'success' => true
    ];

    echo json_encode($data);
?>