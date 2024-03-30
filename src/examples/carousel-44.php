
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

    

?>


<!----------TEMPLATE------------------------>

<style>
    body { text-align: center;}
    img {width: 20%;}
    h2 {color: #666666 }
    h3 {color: #6e6e6e}
    a {text-decoration: none; font-weight: 600; font-size: 24px; padding: 4px;}
    .carousel-navigation {margin-top: 10px}
</style>

<div>
    <h1>Carousel </h1>
    <h2>You are on a slide number <?= $current_picture ?></h2>
    <h3> The slide image is available at - <?= $slides[$current_picture] ?></h3>
</div>

<hr>
<br>
<div id="carousel">
    <img id="slide" src="<?= $slides[$current_picture-1] ?>" alt="Slide">
    <img id="slide" src="<?= $slides[$current_picture] ?>" alt="Slide">
    <img id="slide" src="<?= $slides[$current_picture+1] ?>" alt="Slide">
    
    <br><br>
    <div class="carousel-navigation"> 
        <a href="?img=<?=$prev_picture?>">&lt</a>
        
        <a href="?img=<?=$next_picture ?>">&gt</a>
    </div>
</div>

