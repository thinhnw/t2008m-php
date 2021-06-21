<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <?php
        // lay ds sv tu database
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
        $sql_txt = "SELECT * FROM categories";
        $rs = $conn->query($sql_txt);
        $categories = [];
        if($rs->num_rows > 0){
            while($row = $rs->fetch_assoc()){
                $categories[] = $row;
            }
        }
    ?>
    <div class="w-50 mt-4 mx-auto">
        <a href="product_listing.php">All Products</a>
    </div>
    <table class="table w-50 mx-auto mt-4">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Category Name</th>
                <th scope="col" class="text-center">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($categories as $index => $category) { ?>
                <tr>
                    <th scope="row"><?= $category["id"] ?></th>
                    <td>
                        <?= $category["name"] ?>
                    </td>
                    <td class="text-center">
                        <a class="text-danger" href="category_delete.php?id=<?= $category["id"]?>">X</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <div class="text-center mx-auto w-50">
        <button class="btn btn-outline-primary w-100">
            <a href="category_new.php">
                + Add Category
            </a>
        </button>
    </div>
</body>
</html>

