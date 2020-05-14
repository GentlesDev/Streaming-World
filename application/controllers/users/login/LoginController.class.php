<?php

class LoginController
{
  public function httpGetMethod(Http $http, array $queryFields)
  {


    $error = null;
    $artworkModel = new ArtworksModel();
    $artworks = $artworkModel->getAllArtworks();
    $productsModel = new ProductsModel();
    $lines = $productsModel->getAllLines();
    $artworkStreams = $artworkModel->getAllArtworksAvailable();
    return [
      "artworkStreams" => $artworkStreams,
      'lines' => $lines,
      'artworks' => $artworks,
      'error' => $error
    ];
  }

  public function httpPostMethod(Http $http, array $formFields)
  {
    $userModel = new UserModel();
    $error = $userModel->logUser($_POST);
    $artworkModel = new ArtworksModel();
    $artworks = $artworkModel->getAllArtworks();
    $productsModel = new ProductsModel();
    $lines = $productsModel->getAllLines();
    $artworkStreams = $artworkModel->getAllArtworksAvailable();

    if (array_key_exists('firstName', $_SESSION) == false) {
      return [
        "artworkStreams" => $artworkStreams,
        'lines' => $lines,
        'artworks' => $artworks,
        'error' => $error
      ];
    } else {

      $http->redirectTo('/');
    }
  }
}
