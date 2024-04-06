<?php
    // ?name=John Doe&email=jd@example.host&age=30

    $name = $_GET['name'];
    $email = $_GET['email'];
    $age = $_GET['age'];
    
    $client = [
        'name' => $name,
        'email' => $email,
        'age' => $age,
    ];


   
    $file = fopen("./data/client.json", "w");
     
    fwrite($file, json_encode($client));
        fclose($file);


