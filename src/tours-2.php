<?
//   $file = fopen("./data/tours.json", "r");
//   $tours = json_decode(fread($file, 1000000 ), true);
//     fclose($file);
//$tours = load('tours');
include 'data.php';
?>


<section>
    <h1>Tours</h1>

    <!------FILTERS------------->
    
    <form action="/" method="post">
        <input name="search" type="text" placeholder="Enter keyword">
        <button>SEARCH</button>
    </form>


    <!-------/FILTERS------------>

    <ol>
        <? for($i=0; $i<count($tours); $i++) {?>
            <li> 
                <h2><?=$tours[$i]['name']?></h2>
                <div>
                    <?=$tours[$i]['country']?>
                    <?=$tours[$i]['price']['ammount'] ?>
                    <?=$tours[$i]['price']['currency'] ?>
                </div>
                <hr>
            </li>

        <? } ?>
    </ol>
</section>