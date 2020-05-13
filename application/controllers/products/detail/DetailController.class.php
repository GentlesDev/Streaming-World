<?php

class DetailController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {

      $artworkModel = new ArtworksModel();
      $productsModel = new ProductsModel();
      $artworks = $artworkModel->getAllArtworks();
      $product = $productsModel->getOneProduct($_GET['productId']);
      $lines = $productsModel->getAllLines();
      $posts = $productsModel->getAllPostsByProduct($_GET['productId']);
      return[
        'lines'=>$lines,
        "artworks"=>$artworks,
        "product"=>$product,
        "posts"=>$posts
      ];

    }

    public function httpPostMethod(Http $http, array $formFields)
    {
    $artworkModel = new ArtworksModel();
    $productsModel = new ProductsModel();
    $artworks = $artworkModel->getAllArtworks();
    $product = $productsModel->getOneProduct($_GET['productId']);
    $lines = $productsModel->getAllLines();
    $posts = $productsModel->getAllPostsByProduct($_GET['productId']);
    $productsModel->addPost($_POST);
    return [
      'lines' => $lines,
      "artworks" => $artworks,
      "product" => $product,
      "posts" => $posts
    ];


    }
}
