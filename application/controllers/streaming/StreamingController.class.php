<?php

class StreamingController
{
  public function httpGetMethod(Http $http, array $queryFields)
  {

    $artworkModel = new ArtworksModel();
    $artworks = $artworkModel->getAllArtworks();
    $artworkStreams = $artworkModel->getAllArtworksAvailable();
    $productsModel = new ProductsModel();
    $lines = $productsModel->getAllLines();
    return[
      'lines'=>$lines,
      "artworks"=>$artworks,
      "artworkStreams"=>$artworkStreams
    ];

  }

  public function httpPostMethod(Http $http, array $formFields)
  {
    $artworkModel = new ArtworksModel();
    $search = $_POST['search'];
    // var_dump($search);
    $streamings = $artworkModel->search($search);
    $productsModel = new ProductsModel();
    $lines = $productsModel->getAllLines();
    return[
      'lines'=>$lines,
      "streamings"=>$streamings
    ];


  }
}
?>
