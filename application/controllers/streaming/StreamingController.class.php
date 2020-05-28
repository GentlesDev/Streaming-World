<?php

class StreamingController
{
  public function httpGetMethod(Http $http, array $queryFields)
  {

    $artworkModel = new ArtworksModel();
    $productsModel = new ProductsModel();
    $artworks = $artworkModel->getAllArtworks();
    $artworkStreams = $artworkModel->getAllArtworksAvailable();
    $artworksList = $artworkModel->getAllArtworksAvailableList();
    $lines = $productsModel->getAllLines();
    return[
      "lines"=>$lines,
      "artworks"=>$artworks,
      "artworkStreams"=>$artworkStreams,
      "artworksList"=>$artworksList
    ];
  }

  public function httpPostMethod(Http $http, array $formFields)
  {
    $artworkModel = new ArtworksModel();
    $productsModel = new ProductsModel();
    $lines = $productsModel->getAllLines();
    $search = $_POST['search'];
    $searches = $artworkModel->search($search);
    // var_dump($search);
    return[
      "lines"=>$lines,
      "searches"=>$searches
    ];
  }
}
?>
