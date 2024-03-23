<?
    include 'data.php';
    
    // function compareByPrice($p1, $p2) {
    //     return $p1['price']['ammount'] - $p2['price']['ammount'];
    //     // if ($p1['price']['ammount'] > $p2['price']['ammount'] ) {
    //     //     return 1;
    //     // }
    //     // if($p1['price']['ammount'] < $p2['price']['ammount'] ) {
    //     //     return -1;
    //     // }
    //     // if($p1['price']['ammount'] == $p2['price']['ammount'] ) {
    //     //     return 0;
    //     // }

    // }

    // usort($products, function ($p1, $p2) {
    //     return $p1['price']['ammount'] - $p2['price']['ammount'];
    // });

    //-- Pagination --

    if(isset($_GET['page'])) {
        $page = $_GET['page'];
    } else  {
        $page = 1;
    };

    $prev_page = $page - 1;
    $next_page = $page + 1;

?>

<!---- TEMPLATE ----->
<style>
    a {color: #0770a5; font-weight: 600; text-decoration: none; padding: 4px; font-size: 22px; }
   span a:nth-child(<?=$page ?>) {text-decoration: underline; }
    .none {display:none;}
    .box-sort {padding: 14px; width: 50px; border-width: 1px; border-style: solid; border-color: #c30707}
    .sort {color: #c30707; font-size: 22px; font-weight: 600}

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

    usort($products, 'compareByPrice');

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
    <a href="?page=<?=$page?>&sort=<?=$sort?>">&#9650</a> 
    <a href="?page=<?=$page?>&sort=<?=$sort?>">&#9660</a>    
</div>
    
<!-------------/ Sort----------------->

<div> 
            <? if($page==1) {?>
                    <ol>
                        <? for($i = 0; $i < 3; $i++) { ?>
                            <li>
                                <h2>
                                    <?= $products[$i]['name'] ?>
                                    <? if($products[$i]['new']) {?> <img src="<?= NEW_STICKER ?>" width = "70"> <?} ?>
                                </h2>
                                <h3><?= $products[$i]['category'] ?></h3>
                                <img src="<?= $products[$i]['image']  ?>" alt="" width="100">
                                <div><?= $products[$i]['price']['ammount']  ?><?= $products[$i]['price']['currency'] ?></div>
                                <hr>

                            </li>
                        <? } ?>
                    </ol>  
                <? } 
                if ($page==2){ ?>
                    <ol>
                        <? for($i = 3; $i < 6; $i++) { ?>
                            <li>
                                <h2>
                                    <?= $products[$i]['name'] ?>
                                    <? if($products[$i]['new']) {?> <img src="<?= NEW_STICKER ?>" width = "70"> <?} ?>
                                </h2>
                                <h3><?= $products[$i]['category'] ?></h3>
                                <img src="<?= $products[$i]['image']  ?>" alt="" width="100">
                                <div><?= $products[$i]['price']['ammount']  ?><?= $products[$i]['price']['currency'] ?></div>
                                <hr>

                            </li>
                        <? } ?>
                    </ol>  
                <?}?>

                <a <? if($prev_page < 1): ?> class="none"<?endif?> href="?page=<?=$prev_page?>">&lt</a>
                    <span>
                    <?
                        for($page = 1; $page <= 2; $page++) {
                            print ('<a class="page-number" href="?page='.$page.'">'.$page.'</a>'); // Page numbers are displayed using a "for" loop
                        }
                    ?>    
                    </span>
                <a <? if($next_page > 2): ?> class="none" <?endif?>href="?page=<?=$next_page ?>">&gt</a> 
    
</div>
