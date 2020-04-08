<?php

class UpdateController
{
  public function httpGetMethod(Http $http, array $queryFields)
  {

    if(empty($_SESSION) == true || $_SESSION['role'] !== "admin" ) {
      $http->redirectTo('/');
    }
    $artworkModel = new ArtworksModel();
    $streaming = $artworkModel->getOneEpisodeByArtworkId($_GET['streamingId'], $_GET['artworkId']);
    // var_dump($streaming);
    $artworks = $artworkModel->getAllArtworks();


    // var_dump($figurines);
    $productsModel = new ProductsModel();
    $lines = $productsModel->getAllLines();
    return [
      'lines'=>$lines,
      "streaming"=>$streaming,
      "artworks"=>$artworks
    ];

  }

  public function httpPostMethod(Http $http, array $formFields)
  {
    $artworkModel = new ArtworksModel();
    $artworks = $artworkModel->getAllArtworks();
    $artworkModel->updateVideo($_POST, $_FILES);
    $productsModel = new ProductsModel();
    $lines = $productsModel->getAllLines();
    return [
      'lines'=>$lines,
      '$streaming'=>$streaming,
      "artworks"=>$artworks,
    ];


  }
}
