<?
    include 'data.php';
    
    function compareByPrice($p1, $p2) {
        return $p1['price']['ammount'] - $p2['price']['ammount'];
        // if ($p1['price']['ammount'] > $p2['price']['ammount'] ) {
        //     return 1;
        // }
        // if($p1['price']['ammount'] < $p2['price']['ammount'] ) {
        //     return -1;
        // }
        // if($p1['price']['ammount'] == $p2['price']['ammount'] ) {
        //     return 0;
        // }

    }
    
    usort($products, function ($p1, $p2) {
        return $p1['price']['ammount'] - $p2['price']['ammount'];
    });
?>

<!---- TEMPLATE ----->

<ol>
    <? for($i = 0; $i < 6; $i++) { ?>
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