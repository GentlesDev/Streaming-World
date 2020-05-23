<?php

class SucessController
{
  public function httpGetMethod(Http $http, array $queryFields)
  {
    if (empty($_SESSION) == true) {
      $http->redirectTo('/');
    }
    $artworkModel = new ArtworksModel();
    $orderModel = new OrderModel();
    $productsModel = new ProductsModel();
    $artworks = $artworkModel->getAllArtworks();
    $user = substr($_GET['order'], -1);
    $orderModel->sucessTime($user);
    $lines = $productsModel->getAllLines();
    $artworkStreams = $artworkModel->getAllArtworksAvailable();
    // var_dump($user);

    return [
      "artworkStreams" => $artworkStreams,
      "lines" => $lines,
      "user" => $user,
      "artworks" => $artworks
    ];
  }

  public function httpPostMethod(Http $http, array $formFields)
  {
  }
}
