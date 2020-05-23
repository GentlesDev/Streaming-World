<?php

class ProfilController
{
  public function httpGetMethod(Http $http, array $queryFields)
  {

    if (empty($_SESSION) == true) {
      $http->redirectTo('/');
    }
    $artworkModel = new ArtworksModel();
    $productsModel = new ProductsModel();
    $artworks = $artworkModel->getAllArtworks();
    $lines = $productsModel->getAllLines();
    $artworkStreams = $artworkModel->getAllArtworksAvailable();
    return [
      "artworkStreams" => $artworkStreams,
      "lines" => $lines,
      "artworks" => $artworks
    ];
  }

  public function httpPostMethod(Http $http, array $formFields)
  {

    $userModel = new UserModel();
    $artworkModel = new ArtworksModel();
    $productsModel = new ProductsModel();
    $userModel->updateUser($_POST);
    $artworks = $artworkModel->getAllArtworks();
    $lines = $productsModel->getAllLines();
    $artworkStreams = $artworkModel->getAllArtworksAvailable();
    return [
      "artworkStreams" => $artworkStreams,
      "lines" => $lines,
      "artworks" => $artworks
    ];
  }
}
