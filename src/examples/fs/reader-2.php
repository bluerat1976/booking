    <?

        $file = fopen("./data/client-2.json", "r");
        $client = json_decode( fread($file, 1000), true );
        //var_dump($client);
        if($client['age']) {
           $client['age'] = (int)$client['age'];
           var_dump($client);
        }
   
    ?>
