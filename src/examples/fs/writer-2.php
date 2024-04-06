<? 

//$client = array('name' => $_GET['name'], 'email' => $_GET['email'], 'age' => $_GET['age']); // "a[]=1&a[]=2&a[]=3"

print_r($_GET);
$client_data = $_GET;
if(array_key_exists('name', $client_data) && array_key_exists('email', $client_data) && array_key_exists('age', $client_data)) {
    
   $name = 
    $client = [
        'name' => $client_data['name'],
        'email' => $client_data['email'],
        'age' => $client_data['age']
    ];
    
    
}

$file = fopen("./data/client-2.json", "w");
     
    fwrite($file, json_encode($client));
      fclose($file);
