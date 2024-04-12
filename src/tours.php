<?
        $tours = load('tours');
        
        // $file = fopen("./data/tours.json", "r");
        // $tours = json_decode(fread($file, 1000000), true);
        // fclose($file);
    
    //-- Pagination --

    if(isset($_GET['page-num'])) {
        $page_num = $_GET['page-num'];
    } else  {
        $page_num = 1;
    };

    $prev_page_num = $page_num - 1;
    $next_page_num = $page_num + 1;

?>

<!---- TEMPLATE ----->
<style>
     span a:nth-child(<?=$page_num ?>) {text-decoration: underline;}
 
</style>

<!------------Sort-------------->
<?
    // Дополнительно установим начальное значение сортировки
    //$sort = isset($_GET['sort']) ? $_GET['sort'] : 'asc'; // По умолчанию сортируем по возрастанию
    if (isset($_GET['sort'])) {
        $sort = $_GET['sort'];
    } else {
        $sort = 'asc'; // По умолчанию сортируем по возрастанию
    }
    // Функция для сравнения цен
    function compareByPrice($p1, $p2) {
        global $sort; // Объявим использование глобальной переменной $sort

        if ($sort == 'asc') {
            return $p1['price']['ammount'] - $p2['price']['ammount'];
        } else {
            return $p2['price']['ammount'] - $p1['price']['ammount'];
        }
    }

   usort($tours, 'compareByPrice');

    // Переключение порядка сортировки при клике на стрелки
    if (isset($_GET['sort'])) {
        if ($_GET['sort'] === 'asc') {
            $sort = 'desc';
        } else {
            $sort = 'asc';
        }
    };
?>

<div class="box-sort">
    <p class="sort">Sort:</p>
    <br>
    <a href="?page=<?=$page?>&page-num=<?=$page_num?>&sort=<?=$sort?>">&#9650</a> 
    <a href="?page=<?=$page?>&page-num=<?=$page_num?>&sort=<?=$sort?>">&#9660</a>    
</div>
    
<!-------------/ Sort----------------->

<div> 
            <? if($page_num==1) {?>
                    <ol>
                        <? for($i = 0; $i < 3; $i++) { ?>
                            <li>
                                <h2 class="h2-color">
                                    <?= $tours[$i]['name'] ?>
                                    <? if($tours[$i]['new']) {?> <img src="<?= NEW_STICKER ?>" width = "70"> <?} ?>
                                </h2>
                                <h4><?= $tours[$i]['category'] ?></h4>
                                <h3><?= $tours[$i]['country'] ?></h3>
                                <img src="<?= $tours[$i]['image']  ?>" alt="" width="200">
                                <br><br>
                                <div><p class="price"><?= $tours[$i]['price']['ammount'] ?><?= $tours[$i]['price']['currency'] ?></p></div>
                                <hr>

                            </li>
                        <? } ?>
                    </ol>  
                <? } 
                if ($page_num==2){ ?>
                    <ol>
                        <? for($i = 3; $i < 5; $i++) { ?>
                            <li>
                                <h2 class="h2-color">
                                    <?= $tours[$i]['name'] ?>
                                    <? if($tours[$i]['new']) {?> <img src="<?= NEW_STICKER ?>" width = "70"> <?} ?>
                                </h2>
                                <h4><?= $tours[$i]['category'] ?></h4>
                                <h3><?= $tours[$i]['country'] ?></h3>
                                <img src="<?= $tours[$i]['image']  ?>" alt="" width="200">
                                <br><br>
                                <div><p class="price"><?= $tours[$i]['price']['ammount']  ?><?= $tours[$i]['price']['currency'] ?></p></div>
                                <hr>

                            </li>
                        <? } ?>
                    </ol>  
                <?}?>

                <a <? if($prev_page_num < 1): ?> class="none"<?endif?> href="?page=<?=$page?>&page-num=<?=$prev_page_num?>">&lt</a>
                    <span>
                    <?
                        for($page_num = 1; $page_num <= 2; $page_num++) {
                            print ('<a class="page-number" href="?page='.$page.'&page-num='.$page_num.'">'.$page_num.'</a>'); // Page numbers are displayed using a "for" loop
                        }
                    ?>    
                    </span>
                <a <? if($next_page_num > 2): ?> class="none" <?endif?>href="?page=<?=$page?>&page-num=<?=$next_page_num ?>">&gt</a> 
    
</div>
