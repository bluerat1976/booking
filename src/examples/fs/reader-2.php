    <?

        $file = fopen("./data/client-2.json", "r");
        $client = json_decode( fread($file, 1000), true );
        //var_dump($client);
        if($client['age'] && $client['active'])  {
           $client['age'] = (int)$client['age'];
           $client['active'] = (bool)$client['active']; 
           var_dump($client);
        }
   
    ?>
