<?php
class AdminController
{
  public function httpGetMethod(Http $http, array $queryFields)
  {
    if (empty($_SESSION) == true || $_SESSION['role'] !== "admin") {
      $http->redirectTo('/');
    }
    $userModel = new UserModel();
    $artworkModel = new ArtworksModel();
    $productsModel = new ProductsModel();
    $users = $userModel->getAllUsers();
    $artworks = $artworkModel->getAllArtworks();
    $lines = $productsModel->getAllLines();
    $artworkStreams = $artworkModel->getAllArtworksAvailable();
    return [
      'artworkStreams' => $artworkStreams,
      'lines' => $lines,
      'artworks' => $artworks,
      'users' => $users
    ];
  }

  public function httpPostMethod(Http $http, array $formFields)
  {
  }
}
