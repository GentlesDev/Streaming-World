<?php

class DetailController
{
  public function httpGetMethod(Http $http, array $queryFields)
  {

    if (empty($_SESSION) == true || $_SESSION['role'] !== 'admin') {
      $http->redirectTo('/');
    }
    $id = $_GET['orderId'];
    $orderModel = new OrderModel();
    $artworkModel = new ArtworksModel();
    $productsModel = new ProductsModel();
    $orderdetail = $orderModel->getUserOrderDetails($id);
    $artworks = $artworkModel->getAllArtworks();
    $lines = $productsModel->getAllLines();
    $artworkStreams = $artworkModel->getAllArtworksAvailable();
    $allArtworks = $artworkModel->get7ArtworksAvailable();
    return [
      "allArtworks" => $allArtworks,
      "orderdetail" => $orderdetail,
      "artworkStreams" => $artworkStreams,
      "lines" => $lines,
      "artworks" => $artworks
    ];
  }

  public function httpPostMethod(Http $http, array $formFields)
  {
  }
}
