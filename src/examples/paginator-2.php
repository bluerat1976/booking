

<!----LOGIC------------->
<?php
    if(isset($_GET['p'])) {
        $page = $_GET['p'];
    } else {
        $page = 1;
    }

    $prev_page = $page - 1;
    $next_page = $page + 1;
?>
<!--TEMPLATE------------------------>

<style>
    body { text-align: center;}
    a {color: #0770a5; font-weight: 600; text-decoration: none; padding: 4px; font-size: 22px; }
    .link:nth-child(<?=$page?>) {text-decoration: underline;}
    .none {display:none;}
</style>

<div>
    <h1>You are on page <?= $page ?></h1>
</div>

<hr>

<div> 
    <a <? if($prev_page < 1): ?> class="none" <?endif?> href="?p=<?=$prev_page?>">&lt</a>
    <span >
        
        <?
            for($p = 1; $p <= 5; $p++) {
                print ('<a class="link" href="?p='.$p.'" onclick="underkineLink(this)">'.$p.'</a>'); // Page numbers are displayed using a "for" loop
            }
        ?>
        <script>
            function underkineLink(link) {
                let link = document.querySelectorAll("link");
                links.forEach(function (item) {
                    item.classList.remove('link')
                });
            }
         </script>   
        <!-- <a href="?p=1">1</a>
        <a href="?p=2">2</a>
        <a href="?p=3">3</a>
        <a href="?p=4">4</a>
        <a href="?p=5">5</a> -->
    </span>
    <a <? if($next_page > 5): ?> class="none" <?endif?>href="?p=<?=$next_page ?>">&gt</a>
</div>