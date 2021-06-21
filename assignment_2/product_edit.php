<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Add New Product</title>
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

        $id = $_GET["id"];
        $sql_txt = "SELECT * FROM products WHERE id = $id";
        $rs = $conn->query($sql_txt);
        $product = null;
        if($rs->num_rows > 0){
            if ($row = $rs->fetch_assoc()) {
                $product = $row;
            }
        }
        $sql_txt = "SELECT * FROM categories";
        $rs = $conn->query($sql_txt);
        $categories = [];
        if($rs->num_rows > 0) {
            while($row = $rs->fetch_assoc()){
                $categories[] = $row;
            }
        }
    ?>
    <div class="container-fluid pt-5">
        <div class="row justify-content-center">
            <div class="col-6">
                <h1>Add New Product</h1>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-6">
                <form action="product_update.php" method="POST">
                    <input type="hidden" name="id" value="<?= $product["id"]?>">
                    <div class="mb-3">
                        <label for="product_name" class="form-label">Product Name *</label>
                        <input type="text" class="form-control" name="product_name" required value="<?= $product["name"]?>" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Price (USD) *</label>
                        <input type="number" class="form-control" name="product_price" required value="<?= $product["price"]?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select name="product_category_id" class="form-select">
                            <?php foreach($categories as $index => $category) { ?>
                                <option
                                    value="<?= $category["id"] ?>"
                                    <?php if( $category["id"] == $product['category_id'] ): ?> selected="selected"<?php endif; ?>
                                >
                                    <?= $category["name"] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Supplier *</label>
                        <input type="text" class="form-control" name="product_supplier" required value="<?= $product["supplier"]?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" name="product_description"  ><?= $product["description"]?></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button class="btn btn-secondary">
                        <a href="product_listing.php" class="text-light">Back</a>
                    </button>
                </form>
            </div>
        </div>

    </div>

</body>
</html>