<?php

session_start();
   
include('connection.php');

$search_value= $_POST['search_value'];
$rows=[];

$select_product_row = "SELECT id, p_name FROM products WHERE p_name LIKE '%".$search_value ."%'";
$rsl_product_row = $conn->query($select_product_row);


$html = "";
foreach ($rsl_product_row as $rsl_product_rows) {
    $html .= '<a href="product.php?id='.$rsl_product_rows["id"] .'"> '. $rsl_product_rows["p_name"] .'</a> </br>';
}

// Send HTML response
$data = $html;
echo $data;

$conn->close();
?>