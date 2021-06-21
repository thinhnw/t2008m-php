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

    <div class="container-fluid pt-5">
        <div class="row justify-content-center">
            <div class="col-6">
                <h1>Add New Product</h1>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-6">
                <form action="category_save.php" method="POST">
                    <div class="mb-3 form-group">
                        <label for="category_name" class="form-label">Category Name *</label>
                        <input type="text" class="form-control" name="category_name" required>
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