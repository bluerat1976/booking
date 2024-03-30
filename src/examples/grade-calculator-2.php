<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade Calculator</title>
</head>
<body>
    <h2>Grade Calculator</h2>
    <form method="post" action="">
        <table>
            <tr>
                <td>Grade 1:</td>
                <td><input type="text" name="grade1"></td>
            </tr>
            <tr>
                <td>Grade 2:</td>
                <td><input type="text" name="grade2"></td>
            </tr>
            <tr>
                <td>Grade 3:</td>
                <td><input type="text" name="grade3"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Calculate"></td>
            </tr>
        </table>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $grade1 = $_POST["grade1"];
        $grade2 = $_POST["grade2"];
        $grade3 = $_POST["grade3"];

        // Check for empty input
        if (empty($grade1) || empty($grade2) || empty($grade3)) {
            echo "<p>Please enter all grades.</p>";
        } else {
            // Check for numeric input
            if (!is_numeric($grade1) || !is_numeric($grade2) || !is_numeric($grade3)) {
                echo "<p>Grades must be numeric.</p>";
            } else {
                // Check for range
                if ($grade1 < 0 || $grade1 > 10 || $grade2 < 0 || $grade2 > 10 || $grade3 < 0 || $grade3 > 10) {
                    echo "<p>Grades must be between 0 and 10.</p>";
                } else {
                    // Calculate average
                    $average = ($grade1 + $grade2 + $grade3) / 3;
                    echo "<table>";
                    echo "<tr><td>Grade 1:</td><td>$grade1</td></tr>";
                    echo "<tr><td>Grade 2:</td><td>$grade2</td></tr>";
                    echo "<tr><td>Grade 3:</td><td>$grade3</td></tr>";
                    echo "<tr><td>Average:</td><td>$average</td></tr>";
                    echo "</table>";
                }
            }
        }
    }
    ?>
</body>
</html>