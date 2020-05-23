<?php

class UpdateController
{
  public function httpGetMethod(Http $http, array $queryFields)
  {
    if(empty($_SESSION) == true || $_SESSION['role'] !== "admin" ) {
      $http->redirectTo('/');
    }
    $artworkModel = new ArtworksModel();
    $productsModel = new ProductsModel();
    $oeuvre = $artworkModel->getOneArtwork($_GET['artworkId']);
    $artworks = $artworkModel->getAllArtworks();
    $lines = $productsModel->getAllLines();
    $artworkStreams = $artworkModel->getAllArtworksAvailable();  
    return [
      "artworkStreams" => $artworkStreams,
      "lines"=>$lines,
      "oeuvre"=>$oeuvre,
      "artworks"=>$artworks
    ];
  }

  public function httpPostMethod(Http $http, array $formFields)
  {
    $artworkModel = new ArtworksModel();
    $productsModel = new ProductsModel();
    $artworks = $artworkModel->getAllArtworks();
    $oeuvre = $artworkModel->getOneArtwork($_POST['artworkId']);
    $artworkModel->updateArtwork($_POST, $_FILES);
    $lines = $productsModel->getAllLines();
    $artworkStreams = $artworkModel->getAllArtworksAvailable();
    // var_dump($_POST);
    // var_dump($_FILES);
    return [
      'artworkStreams' => $artworkStreams,
      'lines'=>$lines,
      'oeuvre'=>$oeuvre,
      'artworks'=>$artworks,
    ];


  }
}
