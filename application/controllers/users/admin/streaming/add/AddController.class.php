<?php

class AddController
{
  public function httpGetMethod(Http $http, array $queryFields)
  {

    if(empty($_SESSION) == true || $_SESSION['role'] !== "admin" ) {
      $http->redirectTo('/');
    }
    $artworkModel = new ArtworksModel();
    $artworks = $artworkModel->getAllArtworks();
    $productsModel = new ProductsModel();
    $lines = $productsModel->getAllLines();

    // var_dump($figurines);
    return [
      'lines'=>$lines,
      "artworks"=>$artworks
    ];

  }

  public function httpPostMethod(Http $http, array $formFields)
  {
    $artworkModel = new ArtworksModel();
    $artworks = $artworkModel->getAllArtworks();
    $artworkModel->addVideo($_POST, $_FILES);
    $productsModel = new ProductsModel();
    $lines = $productsModel->getAllLines();
    // var_dump($_POST);
    // var_dump($_FILES);
    return [
      'lines'=>$lines,
      "artworks"=>$artworks,
    ];


  }
}
