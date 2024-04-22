<?
    $tours = load('tours');
   
    $id = $_GET['id']; 
  
    

    //b) Finding thechosen tour by ID using for + if:
    
        for ($i = 0; $i < count($tours); $i++) {
        if ((int)$tours[$i]['id'] == $id) {
           // $tour = $tours[$i]['name'];
            print '<h1>Tour name: '. $tours[$i]['name'].'</h1>
            <h3>Country: '.$tours[$i]['country'] .'</h3>
            <img src="'.$tours[$i]['image'] .'" style="width: 260px" alt="">
            
            <p style="font-weight: 700; color: green" >Price of that tour: '.(int)$tours[$i]['price']['ammount'].' '. $tours[$i]['price']['currency'] .'</p>
            <br><br>
            <form action="/?page=order&id=<?= $id ?>" method="POST">
                <h2>You are booking the tour</h2>
                <label>
                    <input name="full_name" type="text" placeholder="Your full name">
                </label>
                <br>
                <label>
                    <input name="email" type="text" placeholder="Your email">
                </label>
                <br>
                <label>
                    <input name="phone_number" type="text" placeholder="Your phone number">
                </label>
                <br>
                <label>
                    <select name="quantity">
                        <option value="1">1 seat</option>
                        <option value="2">2 seat</option>
                        <option value="3">3 seat</option>
                    </select>
                </label>
                <br>
                <button >BOOK</button>
            </form>';
            break; // Найден нужный тур, прекращаем поиск
        }
       
    }
?>

