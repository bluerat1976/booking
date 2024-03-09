<?php
    $first = $second = $third = $average = "";

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        // Check if the array keys are set
        $first = isset($_GET['first']) ? $_GET['first'] : "";
        $second = isset($_GET['second']) ? $_GET['second'] : "";
        $third = isset($_GET['third']) ? $_GET['third'] : "";
        
        if (empty($first) || empty($second) || empty($third)) {
            echo "<p style='color:red'>Please fill up all fields!</p>";
        } else {
            if (!is_numeric($first) || !is_numeric($second) || !is_numeric($third)) {
                echo "<p style='color:red'>All grades must be numeric.</p>";
            } else {
                $first = (float)$first;
                $second = (float)$second;
                $third = (float)$third;
    
                if ($first < 0 || $first > 10 || $second < 0 || $second > 10 || $third < 0 || $third > 10) {
                    echo "<p style='color:red'>All grades must be between 0 and 10.0</p>";
                } else {
                    $first = number_format($first, 1, '.');
                    $second = number_format($second, 1, '.');
                    $third = number_format($third, 1, '.');
                    $average = (float)(($first + $second + $third) / 3);
                    $average = number_format($average, 1, '.');
                }
            }
        }
    }

?>
    
<h1>Calculate average of 3 numbers</h1>
<br><br>
<form action="../examples/grade-calculator.php" method="GET">
    <input type="text" name="first" placeholder="Input first figure" />
    <input type="text" name="second" placeholder="Input second figure" />
    <input type="text" name="third" placeholder="Input third figure" />
    <br><hr>
    <br>
    <button>GET AVERAGE GRADE</button> <br><br>
</form>

<table>
<tr><td>First:</td><td><?= $first ?></td></tr>
    <tr><td>Second:</td><td><?= $second ?></td></tr>
    <tr><td>Third:</td><td><?= $third ?></td></tr>
    <hr>
    <tr><td><strong>Average:</strong></td><td><?= isset($average) ? $average : "" ?></td></tr>
</table>