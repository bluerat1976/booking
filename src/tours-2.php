<?
//   $file = fopen("./data/tours.json", "r");
//   $tours = json_decode(fread($file, 1000000 ), true);
//     fclose($file);
    $tours = load('tours');
    
    //--------------Search by name---------------------
    if(isset($_POST['search'])) {
        $tours = array_filter($tours, function($tour) {
            return !(stripos($tour['name'], $_POST['search']) === false) || $_POST['search'] == ' ';
        });
    }
    $tours = array_values($tours);

    //---------Search by min and max prices-----------------

    // Обработка формы поиска
if (isset($_POST["min_price"]) || isset($_POST["max_price"])) {
    $min_price = $_POST["min_price"];
    $max_price = $_POST["max_price"];

    // Фильтрация туров по цене
    $tours = array_filter($tours, function($tour) use ($min_price, $max_price) {
        $price = $tour['price']['ammount'];
        return $price >= $min_price && $price <= $max_price;
    });
}

if(isset($_POST['sort_desc'])) {
   usort($tours, function($tour_a, $tour_b) {
        return $tour_b['price']['ammount'] - $tour_a['price']['ammount'];
   });
}

if(isset($_POST['sort_asc'])) {
    usort($tours, function($tour_a, $tour_b) {
         return $tour_a['price']['ammount'] - $tour_b['price']['ammount'];
    });
 }
$tours = array_values($tours);


?>


<section>
    <h1>Tours</h1>

    <!------FILTERS------------->
    
    <form action="/" method="POST">
        <input name="search" type="text" placeholder="Enter keyword" value="<?= $_POST['search'] ?? ' ' ?>">
        <button>SEARCH</button>
    </form>

    <!-------/FILTERS------------>

    <!---------------------------->
        <form action="/" method="post" >
            <input name="min_price" type="text" placeholder="Enter min price" size="6" value="<?= $_POST['min_price'] ?? ' ' ?>">
            <input name="max_price" type="text" placeholder="Enter max price" size="6" value="<?= $_POST['max_price'] ?? ' ' ?>">
            <button>Search</button>
            <fieldset>
                <legend>Sort</legend>
                <button name="sort_desc">V</button>
                <button name="sort_asc">A</button>
            </fieldset>
        </form>
        
    <!-------------------------->
    <ol>
        <? for($i=0; $i<count($tours); $i++) {?>
            <li> 
                <h2><?=$tours[$i]['name']?></h2>
                <div>
                    <?=$tours[$i]['country']?>
                    <?=$tours[$i]['price']['ammount'] ?>
                    <?=$tours[$i]['price']['currency'] ?>
                    <a href="/?page=book&id=<?=$tours[$i]['id']?>"></a>
                </div>
                <hr>
            </li>

        <? } ?>
    </ol>
</section>