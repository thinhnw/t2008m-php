<?php
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

$sql_txt = "INSERT INTO products (name, price, category_id, supplier, description) VALUES('$name', $price, $category_id, '$supplier', '$description')";
if($conn->query($sql_txt) === true){
    header("location: product_listing.php"); // readirect ve trang danh sach
}else{
    echo "ERRORS:".$conn->error;
}
