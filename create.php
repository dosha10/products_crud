<?php

$pdo = new PDO('mysql:host=localhost;=3306;dbname=products_crud','root','');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $date = date('Y-m-d H:i:s');

    if (!$title) {
        $errors[] = 'Product title is required';
    }

    if (!$price) {
        $errors[] = 'Product price is required';
    }

    if (empty($errors)) {

        $statement = $pdo->prepare("INSERT INTO products (title, image, description, price, create_date)
                                  VALUES (:title, :image, :description, :price, :date)");
        $statement->bindValue(':title', $title);
        $statement->bindValue(':image', '');
        $statement->bindValue(':description', $description);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':date', $date);
        $statement->execute();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--Bootstrap CSS-->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
      crossorigin="anonymous"
    />
    <!--app css-->
    <link rel="stylesheet" href="app.css" />
    <title>Products CRUD</title>
  </head>
  <body>

  <h1>Create New Product</h1>

    <?php if (!empty($errors)): ?>
      <div class="alert alert-danger">
        <?php foreach ($errors as $error): ?>
         <div><?php echo $error ?></div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

    <form action="" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label>Product Image</label>
        <br>
        <input 
          type="file"
          name="image"
        />
      </div><br>
      <div class="form-group">
        <label>Product Title</label>
        <input
          type="text"
          class="form-control"
          name="title"
        />
      </div><br>
      <div class="form-group">
        <label>Product Description</label>
        <textarea class="form-control" name="description"></textarea>
      </div>
      <div class="form-group">
        <label>Product Price</label>
        <input
          type="number"
          step=".01"
          class="form-control"
          name="price"
        />
      </div><br>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </body>
</html>
