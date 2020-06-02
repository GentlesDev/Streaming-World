<?php

class LoginController
{
  public function httpGetMethod(Http $http, array $queryFields)
  {
    $artworkModel = new ArtworksModel();
    $productsModel = new ProductsModel();
    $error = null;
    $artworks = $artworkModel->getAllArtworks();
    $lines = $productsModel->getAllLines();
    $artworkStreams = $artworkModel->getAllArtworksAvailable();
    $allArtworks = $artworkModel->get7ArtworksAvailable();
    return [
      "allArtworks" => $allArtworks,
      'artworkStreams' => $artworkStreams,
      'lines' => $lines,
      'artworks' => $artworks,
      'error' => $error
    ];
  }

  public function httpPostMethod(Http $http, array $formFields)
  {
    $userModel = new UserModel();
    $artworkModel = new ArtworksModel();
    $productsModel = new ProductsModel();
    $error = $userModel->logUser($_POST);
    $artworks = $artworkModel->getAllArtworks();
    $lines = $productsModel->getAllLines();
    $artworkStreams = $artworkModel->getAllArtworksAvailable();
    $allArtworks = $artworkModel->get7ArtworksAvailable();
    if (array_key_exists('firstName', $_SESSION) == false) {
      return [
        "allArtworks" => $allArtworks,
        'artworkStreams' => $artworkStreams,
        'lines' => $lines,
        'artworks' => $artworks,
        'error' => $error
      ];
    } else {
      $http->redirectTo('/');
    }
  }
}
