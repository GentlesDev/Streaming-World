<?php

class OrderController
{
  public function httpGetMethod(Http $http, array $queryFields)
  {

    if (empty($_SESSION) == true || $_SESSION['role'] !== 'admin') {
      $http->redirectTo('/');
    }
    $orderModel = new OrderModel();
    $artworkModel = new ArtworksModel();
    $productsModel = new ProductsModel();
    $orders = $orderModel->getAllOrders();
    $artworks = $artworkModel->getAllArtworks();
    $lines = $productsModel->getAllLines();
    $artworkStreams = $artworkModel->getAllArtworksAvailable();
    $allArtworks = $artworkModel->get7ArtworksAvailable();
    return [
      "allArtworks" => $allArtworks,
      "artworkStreams" => $artworkStreams,
      "lines" => $lines,
      "artworks" => $artworks,
      "orders" => $orders,
    ];
  }

  public function httpPostMethod(Http $http, array $formFields)
  {
  }
}
