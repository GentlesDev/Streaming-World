<?php

class AddController
{
  public function httpGetMethod(Http $http, array $queryFields)
  {
    if(empty($_SESSION) == true || $_SESSION['role'] !== "admin" ) {
      $http->redirectTo('/');
    }
    $artworkModel = new ArtworksModel();
    $productsModel = new ProductsModel();
    $artworks = $artworkModel->getAllArtworks();
    $lines = $productsModel->getAllLines();
    $artworkStreams = $artworkModel->getAllArtworksAvailable();
    return[
      "artworkStreams" => $artworkStreams,
      "artworks"=>$artworks,
      'lines'=>$lines
    ];


  }

  public function httpPostMethod(Http $http, array $formFields)
  {

    $productsModel = new ProductsModel();
    $productsModel->addProduct($_POST, $_FILES);
    $artworkModel = new ArtworksModel();
    $productsModel = new ProductsModel();
    $artworks = $artworkModel->getAllArtworks();
    $lines = $productsModel->getAllLines();
    $artworkStreams = $artworkModel->getAllArtworksAvailable();
    return[
      "artworkStreams" => $artworkStreams,
      "artworks"=>$artworks,
      'lines'=>$lines
    ];

  }
}
