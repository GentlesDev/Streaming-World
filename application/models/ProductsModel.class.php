<?php
class ProductsModel {

  public function getAllProducts() {
    $database = new Database();
    $sql = 'SELECT *
    FROM products';
    // var_dump($database);
    return $database->query($sql, []);

  }

  public function getOneProduct($id)
  {
    $database = new Database();
    $sql =
      'SELECT products.Id AS ProductId, products.Artworks_Id, products.Name AS productName, products.Photo, products.ProductLine, products.Description, products.QuantityInStock, products.BuyPrice, products.Price, artworks.Id, artworks.Name, artworks.Url, artworks.Image, artworks.Image_Cover, productline.LineId, productline.ProductLine
    FROM products
    INNER JOIN productline ON productline.ProductLine = products.ProductLine
    INNER JOIN artworks ON artworks.Id = products.Artworks_Id
    WHERE products.Id = ?';
    // var_dump($database);
    return $database->queryOne($sql, [$id]);
  }

  public function getAllLines()
  {
    $database = new Database();

    $sql = 'SELECT *
    FROM productline
    ORDER BY ProductLine';
    // var_dump($database);
    return $database->query($sql, []);
  }

  public function getOneLine()
  {
    $database = new Database();
    $sql = 'SELECT *
    FROM products
    INNER JOIN productline ON productline.ProductLine = products.ProductLine
    WHERE products.ProductLine = ?';
    return $database->query($sql, [$_GET['name']]);
  }

  public function search($post)
  {
    $database = new Database();
    $sql = 'SELECT products.Id, products.Artworks_Id, products.Name, products.Photo, products.ProductLine, products.Description, products.Price
    FROM products
    INNER JOIN artworks ON artworks.Id = products.Artworks_Id
    WHERE artworks.Name LIKE "%"?"%"';
    return $database->query($sql, [$post]);
  }

  public function updateProduct($_post, $_files)
  {
    $database = new Database();
    if (empty($_files["product_pics"]["name"])) {
      $database->executeSql('UPDATE products
      SET Name = ?, Artworks_Id = ?, ProductLine = ?, Description = ?, QuantityInStock = ?, BuyPrice = ?, Price = ?
      WHERE Id = ?', [
      $_post["name"],
      $_post['artworksId'],
      $_post["productline"],
      $_post["description"],
      $_post["quantity"],
      $_post["buyPrice"],
      $_post["price"],
      $_post['productId']]
      );
    } else {
      $database->executeSql('UPDATE products
      SET Name = ?, Artworks_Id = ?, Photo = ?, ProductLine = ?, Description = ?, QuantityInStock = ?, BuyPrice = ?, Price = ?
      WHERE Id = ?', [
        $_post["name"],
        $_post['artworksId'],
        $_files["product_pics"]["name"],
        $_post["productline"],
        $_post["description"],
        $_post["quantity"],
        $_post["buyPrice"],
        $_post["price"],
        $_post['productId']]
      );
    }
    $http = new HTTP();
    $http->moveUploadedFile("product_pics", "/ressources/images/products");
    $http->redirectTo("/users/admin");
  }

  public function addProduct($_post, $_file)
  {
    $database = new Database();
    $database->executeSql("INSERT INTO products (Name, Artworks_Id, Photo, ProductLine, Description, QuantityInStock, BuyPrice, Price) VALUES (?, ?, ?, ?, ?, ?, ?, ?)", [
    $_post["name"],
    $_post['artworksId'],
    $_file["product_pics"]["name"],
    $_post["productline"],
    $_post["description"],
    $_post["quantity"],
    $_post["buyPrice"],
    $_post["price"]
    ]);
    $http = new HTTP();
    $http->moveUploadedFile("product_pics", "/ressources/images/products");
    $http->redirectTo("/users/admin");
    exit();
  }

  public function suppProduct($id)
  {
    $database = new Database();
    $database->executeSql('DELETE FROM products WHERE Id = ?', [$id]);
  }

  public function getAllPostsByProduct($id)
  {
    $database = new Database();
    $sql = 'SELECT  post.Id, post.Content, post.CreationTimestamp, post.Nickname, post.Product_Id, post.Episode_Id, post.Artwork_Id
            FROM post
            WHERE Product_Id = ?';
    return $database->query($sql, [$id]);
  }

  public function addPost($post)
  {
    $database = new Database();
    $database->executeSql(
        'INSERT INTO post(Content, NickName, CreationTimestamp, Product_Id)
            VALUES (?, ?, NOW(), ?)',
        [
          $post['post'],
          $_SESSION['pseudo'],
          $post['productId']
        ]
      );
    $http = new HTTP();
    $http->redirectTo("/products/detail?productId=".$post['productId']);
    exit();
  }


}
?>
