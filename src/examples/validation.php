<!-- This script allows client to rate a hotel -->
<?php

    $agg_rate_value = 4.5;
    $agg_rate_count = 10;

    if (isset($_GET['rate'])) {
        print("You have entered '{$_GET['rate']}' <br>");
        // $_GET['rate'] -> string
        if (is_numeric($_GET['rate'])) {
            
            if(preg_match('/[0-5]\.\d/', $_GET['rate'])) {
                $rate = (float)$_GET['rate']; //MAKE SURE THIS IS FLOAT
                print("Rate " .$rate ."<br>");
                $total_rate = $agg_rate_count * $agg_rate_value;
            
                $total_rate += $rate;
                print_r("Total rate - " . $total_rate . " <br>");
                $current_rate = $total_rate / ($agg_rate_count + 1);
                //-------------

                //HW*2: print formated number x.x - done
                print ("You've rated this hotel with " . number_format($current_rate, 1,'.'));
            } else {
                print("Only nubbers  between 0.0 and 5.0 are allowed!");
            } 
        } else {
            print("Only nubbers  between 0.0 and 5.0 are allowed!");
        }
    } else {
        //HW*2: print formated number x.x - done
        print ("Tis hotel was rated at" . number_format($agg_rate_value, 1, '.') ."by". number_format($agg_rate_count, 1, '.') . "users");
    }
    

?>

<form action="../examples/validation.php" method="GET">
    <input type="text" name="rate" required/>
    <button>RATE</button>
</form>