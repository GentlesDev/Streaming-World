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
    $link = mysqli_connect("localhost", "root", "", "streaming_world");
    $table_name = "artworks";
    $query = mysqli_query($link, "SHOW TABLE STATUS WHERE name='$table_name'");
    $row = mysqli_fetch_array($query);
    $dir = $row[10] - 1;
    $allArtworks = $artworkModel->get7ArtworksAvailable();
    return [
      "allArtworks" => $allArtworks,
      'artworkStreams' => $artworkStreams,
      'lines' => $lines,
      'artworks' => $artworks,
      'users' => $users,
      'dir' => $dir
    ];
  }

  public function httpPostMethod(Http $http, array $formFields)
  {
  }
}
