<?
//   $file = fopen("./data/tours.json", "r");
//   $tours = json_decode(fread($file, 1000000 ), true);
//     fclose($file);
  include 'data.php';
?>


<section>
    <h1>Tours</h1>
    <ol>
        <? for($i=0; $i<count($tours); $i++) {?>
            <li> 
                <h2><?=$tours[$i]['name']?></h2>
                <div>
                    <?=$tours[$i]['price']['amount'] ?>
                    <?=$tours[$i]['price']['currency'] ?>
                </div>
                <hr>
            </li>

        <? } ?>
    </ol>
</section>