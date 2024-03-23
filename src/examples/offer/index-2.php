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
<?php
// Установка значения сортировки по умолчанию
if (isset($_GET['sort'])) {
    $sort = $_GET['sort'];
} else {
    $sort = 'asc'; // По умолчанию сортируем по возрастанию
}

// Размер страницы (сколько элементов на странице)
$page_size = 3;

// Общее количество элементов
$total_items = count($products);

// Общее количество страниц
$total_pages = ceil($total_items / $page_size);

// Текущая страница (по умолчанию 1, если не указана в запросе)
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

// Проверка на допустимость текущей страницы
if ($current_page < 1) {
    $current_page = 1;
} elseif ($current_page > $total_pages) {
    $current_page = $total_pages;
}

// Определение индексов начала и конца элементов для текущей страницы
$start_index = ($current_page - 1) * $page_size;
$end_index = $start_index + $page_size;

// Фильтрация элементов для текущей страницы
$displayed_products = array_slice($products, $start_index, $page_size);
?>

<!---- TEMPLATE ----->

<!-- HTML и CSS-коды -->

<div class="box-sort">
    <p class="sort">Sort:</p>
    <br>
    <!-- Ссылка для сортировки по возрастанию -->
    <?php if ($sort === 'asc'): ?>
        <a href="?sort=desc&page=<?= $current_page ?>">&#9650</a>
    <?php else: ?>
        <a href="?sort=asc&page=<?= $current_page ?>">&#9650</a>
    <?php endif; ?>
    
    <!-- Ссылка для сортировки по убыванию -->
    <?php if ($sort === 'asc'): ?>
        <a href="?sort=asc&page=<?= $current_page ?>">&#9660</a>
    <?php else: ?>
        <a href="?sort=desc&page=<?= $current_page ?>">&#9660</a>
    <?php endif; ?>
</div>

<!-- Вывод списка продуктов на текущей странице -->
<ol>
    <?php foreach ($displayed_products as $product): ?>
        <li>
            <h2>
                <?= $product['name'] ?>
                <?php if ($product['new']): ?>
                    <img src="<?= NEW_STICKER ?>" width="70">
                <?php endif; ?>
            </h2>
            <h3><?= $product['category'] ?></h3>
            <img src="<?= $product['image'] ?>" alt="" width="100">
            <div><?= $product['price']['ammount'] ?><?= $product['price']['currency'] ?></div>
            <hr>
        </li>
    <?php endforeach; ?>
</ol>

<!-- Навигация по страницам -->
<div> 
    <?php if ($current_page > 1): ?>
        <a href="?sort=<?= $sort ?>&page=<?= $current_page - 1 ?>">&lt</a>
    <?php endif; ?>

    <?php for ($page = 1; $page <= $total_pages; $page++): ?>
        <a <?php if ($page == $current_page): ?> class="page-number" <?php endif; ?> href="?sort=<?= $sort ?>&page=<?= $page ?>">
            <?= $page ?>
        </a>
    <?php endfor; ?>

    <?php if ($current_page < $total_pages): ?>
        <a href="?sort=<?= $sort ?>&page=<?= $current_page + 1 ?>">&gt</a>
    <?php endif; ?>
</div>

<!-- Остальной HTML-код -->

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