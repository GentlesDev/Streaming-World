<?php

class ProductController
{
  public function httpGetMethod(Http $http, array $queryFields)
  {
    if(empty($_SESSION) == true || $_SESSION['role'] !== "admin" ) {
      $http->redirectTo('/');
    }
    $artworkModel = new ArtworksModel();
    $productsModel = new ProductsModel();
    $artworks = $artworkModel->getAllArtworks();
    $products = $productsModel->getAllProducts();
    $lines = $productsModel->getAllLines();
    return[
      'products'=>$products,
      "artworks"=>$artworks,
      'lines'=>$lines
    ];


  }

  public function httpPostMethod(Http $http, array $formFields)
  {
    $artworkModel = new ArtworksModel();
    $productsModel = new ProductsModel();
    $artworks = $artworkModel->getAllArtworks();
    $products = $productsModel->getAllProducts();
    $lines = $productsModel->getAllLines();
    return[
      'products'=>$products,
      "artworks"=>$artworks,
      'lines'=>$lines
    ];

  }
}
