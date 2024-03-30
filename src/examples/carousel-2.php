
<?php
    if(isset($_GET['img'])) {
        $current_picture = $_GET['img'];
    } else {
        $current_picture = 1;
    }

    $prev_picture = $current_picture - 1;
    $next_picture = $current_picture + 1;

    
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


?>
<!--TEMPLATE------------------------>

<style>
    body { text-align: center;}
    img {width: 400px;}
    a {text-decoration: none; font-weight: 600; font-size: 24px; padding: 4px;}
    .carousel-navigation {margin-top: 10px}
    span a:nth-child(<?=$current_picture ?>) {text-decoration: underline; }
    .none {display:none;}
</style>

<div>
    <h1>Carousel </h1>
    <h2>You are on a slide number <?= $current_picture ?></h2>
    <h3> The slide's picture is available on adress: <?= $slides[$current_picture] ?></h3>
</div>

<hr>


<!-------Carousel---v-1--------------->
<div id="carousel">
    <img id="slide" src="<?= $slides[$current_picture] ?>" alt="Slide">
    
    <button onclick="prevSlide(<?=$prev_picture ?>)">&lt</button>
    <button onclick="nextSlide()">&gt</button>

    <div class="carousel-navigation"> 
        <a <? if($prev_picture < 0): ?> $current_picture = 7 <?endif?> href="?img=<?=$prev_picture?>">&lt</a>
        <span>
            <?
                for($img_number = 1; $img_number <= 7; $img_number++) {
                    print ('<a href="?img='.$img_number.'">'.$img_number.'</a>'); // slide numbers are displayed using a "for" loop
                }
            ?>
        </span>
        <a <? if($next_picture > 8): ?> class="none" <?endif?>href="?img=<?=$next_picture ?>">&gt</a>
    </div>
</div>

<!-------Carousel----V-2---------------->


<!-----------Carousel--------------------------->

  
        
   <script>   
   
            let currentSlideIndex = 0;
    let slideElement = document.getElementById("slide");

    function showSlide() {
      slideElement.src = slides[<?=$current_picture ?>];
    }

    function nextSlide() {
        <?=$current_picture ?> = (<?=$current_picture ?> + 1) % slides.length;
      showSlide();
    }

    function prevSlide() {
        <?=$current_picture ?> = (<?=$current_picture ?> - 1 + slides.length) % slides.length;
      showSlide();
    }

    showSlide(); // Показать первый слайд при загрузке страницы   
         </script> 


    