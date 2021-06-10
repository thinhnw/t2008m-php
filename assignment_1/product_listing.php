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
        $sql_txt = "
            SELECT p.id, p.name, p.price, c.name AS category, p.supplier, p.description
            FROM products p INNER JOIN categories c WHERE p.category_id = c.id";
        $rs = $conn->query($sql_txt);
        $products = [];
        if($rs->num_rows > 0){
            while($row = $rs->fetch_assoc()){
                $products[] = $row;
            }
        }
    ?>
    <script>
        console.log(<?= json_encode($products); ?>);
    </script>
    <div class="w-50 mt-4 mx-auto">
        <a href="category_listing.php">All Categories</a>
    </div>
    <table class="table w-50 mx-auto mt-4">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Category</th>
                <th scope="col">Supplier</th>
                <th scope="col">Description</th>
                <th scope="col">Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($products as $index => $product) { ?>
                <tr>
                    <th scope="row"><?= $product["id"] ?></th>
                    <td>
                        <?= $product["name"] ?>
                    </td>
                    <td>
                        <?= $product["price"] ?>$
                    </td>
                    <td>
                        <?= $product["category"] ?>
                    </td>
                    <td>
                        <?= $product["supplier"] ?>
                    </td>
                    <td>
                        <?= $product["description"] ?>
                    </td>
                    <td>
                        <a href="product_edit.php?id=<?= $product["id"]?>">Edit</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <div class="text-center mx-auto w-50">
        <button class="btn btn-outline-primary w-100">
            <a href="product_new.php">
                + Add Product
            </a>
        </button>
    </div>
</body>
</html>

