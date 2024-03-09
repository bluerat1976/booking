<style>
    .circle {
        display: block;
        width: 100px;
        height: 100px;
        border-radius: 50%;
        margin: 10px;
        opacity: 0.3; /* бледнй цвет */
    }
    .red { background-color: red; }
    .yellow { background-color: yellow; }
    .green { background-color: green; }
</style>
<h1>Traffic light</h1>
<hr><br>
    <a class="circle red" href="traffic-light.php?color=red"></a>
    <a class="circle yellow" href="traffic-light.php?color=yellow"></a>
    <a class="circle green" href="traffic-light.php?color=green"></a>

<?php
    // Проверяем, передан ли параметр color через GET
    if (isset($_GET['color'])) {
        $color = $_GET['color'];
        switch ($color) {
            case 'red':
                echo '<style>.red { opacity: 1; }</style>';
                break;
            case 'yellow':
                echo '<style>.yellow { opacity: 1; }</style>';
                break;
            case 'green':
                echo '<style>.green { opacity: 1; }</style>';
                break;
            default:
                echo 'Invalid color';
                break;
        }
    }
?>





    
