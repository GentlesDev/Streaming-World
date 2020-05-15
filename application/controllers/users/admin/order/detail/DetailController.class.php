<?php

class DetailController
{
  public function httpGetMethod(Http $http, array $queryFields)
  {

    if(empty($_SESSION) == true || $_SESSION['role'] !== 'admin') {
      $http->redirectTo('/');
    }
    $id= $_GET['orderId'];
    $orderModel = new OrderModel() ;
    $orderdetail = $orderModel->getUserOrderDetails($id);
        $artworkModel = new ArtworksModel();
        $artworks = $artworkModel->getAllArtworks();
        $productsModel = new ProductsModel();
        $lines = $productsModel->getAllLines();
        $artworkStreams = $artworkModel->getAllArtworksAvailable();

    return [
                'orderdetail'=>$orderdetail,
                "artworkStreams" => $artworkStreams,
                "lines" => $lines,
                "artworks" => $artworks
            ];


  }

  public function httpPostMethod(Http $http, array $formFields)
  {



  }
}
