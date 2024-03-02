<!------------LOGIC------------------->

<?
const TICKET_PRICE = 100;

if(array_key_exists('quantity', $_GET)) {
    $quantity = (int)$_GET['quantity'];
    
    $cost = TICKET_PRICE * $quantity;
    $total = $cost;

} else {
    $error ="You don't specify any quantity!";
}
?>

<!----------TEMPLATE----------------------->

<a href="/?quantity=1">Buy 1 ticket</a><br>
<a href="/?quantity=2">Buy 2 ticket</a><br>
<a href="/?quantity=3">Buy 3 ticket</a><br>
<a href="/?quantity=4">Buy 4 ticket</a><br>
<hr>
    <form action="">
        <input type="text" name ="quantity" placeholder="Input quantity of tickets">
        <button>BUY</button>
    </form>
<hr>
<? if (isset($total)): ?>
    <div>
        <?= $quantity ?> tickets * <?= TICKET_PRICE ?> = <?= $total?>
    </div>
<? endif ?>
<? if(isset($error)): ?>
   <div style ="color:red"> 
    <?= $error ="You don't specify any quantity!" ?>
    </div>
<? endif ?>