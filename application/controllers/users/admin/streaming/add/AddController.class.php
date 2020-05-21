<?php

class AddController
{
  public function httpGetMethod(Http $http, array $queryFields)
  {

    if(empty($_SESSION) == true || $_SESSION['role'] !== "admin" ) {
      $http->redirectTo('/');
    }
    $artworkModel = new ArtworksModel();
    $error = null;  
    $artworks = $artworkModel->getAllArtworks();
    $specifies = $artworkModel->getAllSpecifies();
    $productsModel = new ProductsModel();
    $lines = $productsModel->getAllLines();
    $artworkStreams = $artworkModel->getAllArtworksAvailable();
    return [
      "artworkStreams" => $artworkStreams,
      "lines"=>$lines,
      "artworks"=>$artworks,
      'error' => $error,
      'specifies' => $specifies
    ];

  }

  public function httpPostMethod(Http $http, array $formFields)
  {
    $artworkModel = new ArtworksModel();
    $error = $artworkModel->addVideo($_POST, $_FILES);
    $artworks = $artworkModel->getAllArtworks();
    $productsModel = new ProductsModel();
    $lines = $productsModel->getAllLines();
    $artworkStreams = $artworkModel->getAllArtworksAvailable();
    $specifies = $artworkModel->getAllSpecifies();
    // var_dump($_POST);
    // var_dump($_FILES);
    return [
      "artworkStreams" => $artworkStreams,
      'lines'=>$lines,
      "artworks"=>$artworks,
      'error' => $error,
      'specifies' => $specifies
    ];


  }
}
