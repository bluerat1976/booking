

<?php
    if(isset($_GET['img'])) {
        $current_picture = $_GET['img'];
    } else {
        $current_picture = 1;
    }

    $prev_picture = $current_picture - 1;
    $next_picture = $current_picture + 1;
?>
<!--TEMPLATE------------------------>

<style>
    body { text-align: center;}
    a:nth-child(<?=$current_picture ?>) {width: 50%; }
    
</style>

<div>
    <h1>Carousel </h1>
    <h2>You are on a slide <?= $current_picture ?></h2>
</div>

<hr>

<div> 
    <a <? if($prev_picture < 1): ?> class="none" <?endif?> href="?img=<?=$prev_picture?>">&lt</a>
    <span >
        
        <?
            for($p = 1; $p <= 5; $p++) {
                print ('<div class="slide"><a href="?p='.$p.'">'.$p.'</a></div'); // Page numbers are displayed using a "for" loop
            }
        ?>
<!-----------Carousel--------------------------->

  <div id="carousel">
    <img id="slide" src="" alt="Slide">
    <button onclick="prevSlide()">&lt</button>
    <button onclick="nextSlide()">&gt</button>
  </div>
        <script>
            let slides = [
                "img/img-1.jpg",
                "img/img-2.jpg",
                "img/img-3.jpg",
                "img/img-4.jpg",
                "img/img-5.jpg",
                "img/img-6.jpg",
                "img/img-7.jpg",
                "img/img-8.jpg",
            ]
    let currentSlideIndex = 0;
    let slideElement = document.getElementById("slide");

    function showSlide() {
      slideElement.src = slides[currentSlideIndex];
    }

    function nextSlide() {
      currentSlideIndex = (currentSlideIndex + 1) % slides.length;
      showSlide();
    }

    function prevSlide() {
      currentSlideIndex = (currentSlideIndex - 1 + slides.length) % slides.length;
      showSlide();
    }

    showSlide(); // Показать первый слайд при загрузке страницы   
         </script> 


    </span>
    <a <? if($next_picture > 5): ?> class="none" <?endif?>href="?img=<?=$next_picture ?>">&gt</a>
</div>