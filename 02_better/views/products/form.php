
<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
      <?php foreach ($errors as $error): ?>
       <div><?php echo $error ?></div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>

  <form action="" method="POST" enctype="multipart/form-data">
      <?php if ($product['image']): ?>
          <img class="product-img-view" src="../<?php echo $product['image'] ?>">
      <?php endif; ?>

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
        value="<?php echo $title ?>" 
      />
    </div><br>
    <div class="form-group">
      <label>Product Description</label>
      <textarea class="form-control" name="description"><?php echo $description ?></textarea>
    </div>
    <div class="form-group">
      <label>Product Price</label>
      <input
        type="number"
        step=".01"
        class="form-control"
        name="price"
        value="<?php echo $price ?>"
      />
    </div><br>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>