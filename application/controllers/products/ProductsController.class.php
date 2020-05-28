<?php

class ProductsController
{
  public function httpGetMethod(Http $http, array $queryFields)
  {

    $artworkModel = new ArtworksModel();
    $productsModel = new ProductsModel();
    $artworks = $artworkModel->getAllArtworks();
    $products = $productsModel->getAllProducts();
    $productsList = $productsModel->getAllProductsList($_GET['start']);
    $lines = $productsModel->getAllLines();
    $artworkStreams = $artworkModel->getAllArtworksAvailable();
    // var_dump($productsList);
    // var_dump(intval($_GET['start']));
    return [
      "artworkStreams" => $artworkStreams,
      "artworks" => $artworks,
      "products" => $products,
      "lines" => $lines,
      "productsList" => $productsList
    ];
  }

  public function httpPostMethod(Http $http, array $formFields)
  {
  }
}
