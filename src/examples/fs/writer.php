<?php
    // Get client_name from URL (metog get)
    // Save the name inside a text file

    if(isset($_GET['client_name'])) {
        $client_name = $_GET['client_name'];
    } else {
        print("client name parameter missing");
    }
