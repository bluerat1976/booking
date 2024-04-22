<?
    
    $client_full_name = $_POST['full_name'];
    $client_email = $_POST['email'];
    $client_phone_number = $_POST['phone_number'];

    $order_ticket_quantity = (int)$_POST['quantity'];
    $order_tour_id = $_GET['id'];
    

    $order = [
        "client" => [
            "full_name" => $client_full_name,
            "email" => $client_email,
            "phone_number" => $client_phone_number,
        ],
        "ticket_quantity" => $order_ticket_quantity,
        "tour_id" => $order_tour_id,  
    ];

    save($order, "order");
//-----------------
$tours = load('tours');
   
$id = (int)$_GET['id']; 
// a) array function for filtration of chosen tour by ID:

function filterById($tour) {
    global $id;
    return $tour['id'] == $id;
}

$filtered_tours = array_filter($tours, 'filterById');

if (!empty($filtered_tours)) {
    $tour = reset($filtered_tours); // Получаем первый элемент отфильтрованного массива
  $final_tour_cost = $tour['price']['ammount'] * $order_ticket_quantity;
}

?>

<!--
    HW-2: show a successmessage to the client
    and print the total cost in this format:
        'tour name': 2 tickets x 260 EUR = 520 EUR

-->

<h2>You succesfully ordered Tour: <?= $tour['name'] ?></h2>
<p><?=$order_ticket_quantity?> Tickets X <?= $tour['price']['ammount'] ?> <?= $tour['price']['currency'] ?> = TOTAL: <?=$final_tour_cost?> <?= $tour['price']['currency'] ?> </p>
<br>
<br>
<hr>