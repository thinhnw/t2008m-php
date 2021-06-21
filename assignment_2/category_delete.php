<?php
$id = $_GET["id"];

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

$sql_txt = "DELETE FROM categories WHERE id=$id";
if($conn->query($sql_txt) === true){
    header("location: category_listing.php"); // readirect ve trang danh sach
}else{
    echo "ERRORS:".$conn->error;
}
