<?php 

const PAGE_TITLE = "Booking confirmation"; // string

const SIT_PRICE = 100.50;                // float

$book_client_vip = true;              // boolean
$book_adults = 3;                  // int
$book_cost = $book_adults * SIT_PRICE; // float
?>

<!------TEMPLATE / VIEW--------------->
<h1><?= PAGE_TITLE ?></h1>
<p>Adults: <?= $book_adults ?></p>
<p>Total cost: <?= $book_adults ?> * <?= number_format(SIT_PRICE, 2, '.', '')  ?>$ = <?= number_format($book_cost, 2, '.') ?>$</p>


<? if($book_client_vip == true): ?>
    <p>VIP</p>
<? endif ?>

