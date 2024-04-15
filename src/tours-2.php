<?
//   $file = fopen("./data/tours.json", "r");
//   $tours = json_decode(fread($file, 1000000 ), true);
//     fclose($file);
    $tours = load('tours');
    
    //--------------Search by name---------------------
    if(isset($_POST['search'])) {
        $tours = array_filter($tours, function($tour) {
            return similar_text($tour['name'], $_POST['search']) >=3 || $_POST['search'] == ' ';
        });
    }
    $tours = array_values($tours);

    //---------Search by min and max prices-----------------

    // Обработка формы поиска
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $min_price = $_POST["min_price"];
    $max_price = $_POST["max_price"];

    // Фильтрация туров по цене
    $tours = array_filter($tours, function($tour) use ($min_price, $max_price) {
        $price = $tour['price']['ammount'];
        return $price >= $min_price && $price <= $max_price;
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
            <input name="min_price" type="text" placeholder="Enter min price" value="<?= $_POST['min_price'] ?? ' ' ?>">
            <input name="max_price" type="text" placeholder="Enter max price" value="<?= $_POST['max_price'] ?? ' ' ?>">
            <button>Search</button>
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
                </div>
                <hr>
            </li>

        <? } ?>
    </ol>
</section>