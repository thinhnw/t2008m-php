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
        $products = [];
        $products[] = [
            "name" => "Macbook Pro 16' 2021",
            "price" => 2000,
            "desc" => "Brand new laptop with better processor",
            "supplier" => "The Gioi Di Dong",
        ];
        $products[] = [
            "name" => "DELL XPS 15 2021 i7 10700",
            "price" => 1500,
            "desc" => "Best ultrabook in 2021",
            "supplier" => "FPT Shop",
        ];
        $products[] = [
            "name" => "Logitech Bluetooth Mouse M590 Silence",
            "price" => 30,
            "desc" => "Wireless and quiet",
            "supplier" => "CellphoneS",
        ];
//        var_dump($products);
    ?>
    <script>
        console.log(<?= json_encode($products); ?>);
    </script>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Description</th>
                <th scope="col">Supplier</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($products as $index => $product) { ?>
                <tr>
                    <th scope="row"><?= $index ?></th>
                    <td>
                        <?= $product["name"] ?>
                    </td>
                    <td>
                        <?= $product["price"] ?>$
                    </td>
                    <td>
                        <?= $product["desc"] ?>$
                    </td>
                    <td>
                        <?= $product["supplier"] ?>$
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>

