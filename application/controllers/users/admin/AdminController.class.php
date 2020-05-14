<?php
class AdminController
{
  public function httpGetMethod(Http $http, array $queryFields)
  {
    if (empty($_SESSION) == true || $_SESSION['role'] !== "admin") {
      $http->redirectTo('/');
    }


    $userModel = new UserModel();

    $users = $userModel->getAllUsers();
    $artworkModel = new ArtworksModel();
    $artworks = $artworkModel->getAllArtworks();
    $productsModel = new ProductsModel();
    $lines = $productsModel->getAllLines();
    $artworkStreams = $artworkModel->getAllArtworksAvailable();


    return [
      "artworkStreams" => $artworkStreams,
      'lines' => $lines,
      "artworks" => $artworks,
      'users' => $users
    ];
  }

  public function httpPostMethod(Http $http, array $formFields)
  {
  }
}
