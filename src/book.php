<?
    $tours = load('tours');
   
    $id = (int)$_GET['id']; 
   // a) array function for filtration of chosen tour by ID:
    
    function filterById($tour) {
        global $id;
        return $tour['id'] == $id;
    }

    $filtered_tours = array_filter($tours, 'filterById');

    if (!empty($filtered_tours)) {
        $tour = reset($filtered_tours); // Получаем первый элемент отфильтрованного массива

    }
    

    //b) Finding the chosen tour by ID using for + if:
    
    //     for ($i = 0; $i < count($tours); $i++) {
    //     if ($tours[$i]['id'] == $id) {
    //         $tour = $tours[$i]['name'];
    //         print $tour;
    //         break; // Найден нужный тур, прекращаем поиск
    //     }
    // }
?>

<h1>Tour name: <?= $tour['name'] ?></h1>
<h3>Country: <?= $tour['country'] ?></h3>
<img src="<?= $tour['image'] ?>" style="width: 260px" alt="">

<p style="font-weight: 700; color: green" >Price <?= (int)$tour['price']['ammount']?> <?=$tour['price']['currency'] ?></p>
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
    <button>BOOK</button>
</form>