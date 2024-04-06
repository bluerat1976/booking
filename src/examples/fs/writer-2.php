<? 

   // $client_data = $_GET;
    var_dump($_GET); // Gives all parametrs from $_GET
  
    if(array_key_exists('name', $_GET) && array_key_exists('email', $_GET) && array_key_exists('age', $_GET) && array_key_exists('active', $_GET) ) {
        
        $client = [
            'name' => $_GET['name'],
            'email' => $_GET['email'],
            'age' => $_GET['age'],
            'active' => $_GET['active'],
        ];   
      // var_dump('<br>'.$client);
       $file = fopen("./data/client-2.json", "w");
        
        fwrite($file, json_encode($client));
        fclose($file);
        var_dump($client); // Gives the client's parametrs only
    } else {
        print('<br><br> Some client\'s paramets are missing. Enter all client\'s paramets: name, email, and age!');
    }

 
