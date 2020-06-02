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
    $artworkStreams = $artworkModel->getAllArtworksAvailable();
    $allArtworks = $artworkModel->get7ArtworksAvailable();
    return [
      "allArtworks" => $allArtworks,
      'artworkStreams' => $artworkStreams,
      'lines' => $lines,
      'artworks' => $artworks,
      'product' => $product,
      'posts' => $posts
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
    $artworkStreams = $artworkModel->getAllArtworksAvailable();
    $productsModel->addPost($_POST);
    $allArtworks = $artworkModel->get7ArtworksAvailable();
    return [
      "allArtworks" => $allArtworks,
      'artworkStreams' => $artworkStreams,
      'lines' => $lines,
      'artworks' => $artworks,
      'product' => $product,
      'posts' => $posts
    ];
  }
}
