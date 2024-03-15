
<?php
    if(isset($_GET['img'])) {
        $current_picture = $_GET['img'];
    } else {
        $current_picture = 1;
    }

    $slides = array (
        'img/img-1.jpg',
        'img/img-2.jpg',
        'img/img-3.jpg',
        'img/img-4.jpg',
        'img/img-5.jpg',
        'img/img-6.jpg',
        'img/img-7.jpg',
        'img/img-8.jpg',
    );

    $prev_picture = ($current_picture - 1 + count($slides))% count($slides);
    $next_picture = ($current_picture + 1) %count($slides);

    if($prev_picture < 0 ) {
        $current_picture = 8;
    }

?>


<!----------TEMPLATE------------------------>

<style>
    body { text-align: center;}
    img {width: 400px;}
    a {text-decoration: none; font-weight: 600; font-size: 24px; padding: 4px;}
    .carousel-navigation {margin-top: 10px}
    span a:nth-child(<?=$current_picture ?>) {text-decoration: underline; }
</style>

<div>
    <h1>Carousel </h1>
    <h2 style="color: #9f9f9f">You are on a slide number <?= $current_picture ?></h2>
    <h3 style="color: #b1b1b1"> The slide image is available at - <?= $slides[$current_picture] ?></h3>
</div>

<hr>
<br>
<div id="carousel">
    <img id="slide" src="<?= $slides[$current_picture] ?>" alt="Slide">
    <br><br>
    <div class="carousel-navigation"> 
        <a href="?img=<?=$prev_picture?>">&lt</a>
        <span>
            <?
                for($img_number = 1; $img_number <= 7; $img_number++) {
                    print ('<a href="?img='.$img_number.'">'.$img_number.'</a>'); // slide numbers are displayed using a "for" loop
                }
            ?>
        </span>
        <a href="?img=<?=$next_picture ?>">&gt</a>
    </div>
</div>

