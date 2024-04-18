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
?>

<!--
    HW-2: show a successmessage to the client
    and print the total cost in this format:
        'tour name': 2 tickets x 260 EUR = 520 EUR
-->