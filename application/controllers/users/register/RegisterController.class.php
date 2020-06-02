<?php
class RegisterController
{
  public function httpGetMethod(Http $http, array $queryFields)
  {

    $error = null;
    $artworkModel = new ArtworksModel();
    $productsModel = new ProductsModel();
    $artworks = $artworkModel->getAllArtworks();
    $lines = $productsModel->getAllLines();
    $artworkStreams = $artworkModel->getAllArtworksAvailable();
    $allArtworks = $artworkModel->get7ArtworksAvailable();
    return [
      "allArtworks" => $allArtworks,
      'artworkStreams' => $artworkStreams,
      'lines' => $lines,
      'error' => $error,
      'artworks' => $artworks
    ];
  }

  public function httpPostMethod(Http $http, array $formFields)
  {
    $userModel = new UserModel();
    $artworkModel = new ArtworksModel();
    $productsModel = new ProductsModel();
    $artworks = $artworkModel->getAllArtworks();
    $error = $userModel->addUser($_POST);
    $lines = $productsModel->getAllLines();
    $artworkStreams = $artworkModel->getAllArtworksAvailable();
    $allArtworks = $artworkModel->get7ArtworksAvailable();
    if (array_key_exists('role', $_SESSION) === false) {
      return [
        "allArtworks" => $allArtworks,
        'artworkStreams' => $artworkStreams,
        'lines' => $lines,
        'error' => $error,
        'artworks' => $artworks
      ];
    }
  }
}
