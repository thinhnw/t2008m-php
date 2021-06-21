<?php
$id = $_POST["id"];
$name = $_POST["product_name"];
$price = $_POST["product_price"];
$category_id = $_POST["product_category_id"];
$supplier = $_POST["product_supplier"];
$description = $_POST["product_description"];

$servername = "localhost";
$username = "root";
$password = ""; // neu dung mamp password: root
$db = "t2008m_php";
// create connection
$conn = new mysqli($servername,$username,$password,$db);
// kiem tra ket noi
if($conn->connect_error){
    die("Connect error...");// die lam dung luong chuong trinh tai day
}

$sql_txt = "UPDATE products SET name='$name',price = $price, category_id = $category_id, supplier='$supplier', description='$description' WHERE id= $id";
if($conn->query($sql_txt) === true){
    header("location: product_listing.php"); // readirect ve trang danh sach
}else{
    echo "ERRORS:".$conn->error;
}
