<?
    $tours = load('tours');
    $id = $_GET['id'];
    //HW1: find the tour by ID and print its name in H2. a) array function, b) for + if
?>

<hr>
<form action="/?page=order&id=<?= $id ?>" method="POST">
    <h2>You are booking the tour</h2>
    <label>
        <input name="full_name" type="text" placeholder="Your full name">
    </label>
    <br>
    <label>
        <input name="email" type="text" placeholder="Your email">
    </label>
    <br>
    <label>
        <input name="phone_number" type="text" placeholder="Your phone number">
    </label>
    <br>
    <label>
        <select name="quantity">
            <option value="1">1 seat</option>
            <option value="2">2 seat</option>
            <option value="3">3 seat</option>
        </select>
    </label>
    <br>
    <button >BOOK</button>
</form>