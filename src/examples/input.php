<?
$temp = $_GET['temp'];

$estimation = $temp >= 18 ? "warm" : "cold";

print($estimation);