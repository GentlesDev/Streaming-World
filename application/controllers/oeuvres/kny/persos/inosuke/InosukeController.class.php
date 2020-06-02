<?php

class InosukeController
{
  public function httpGetMethod(Http $http, array $queryFields)
  {

    $artworkModel = new ArtworksModel();
    $productsModel = new ProductsModel();
    $artworks = $artworkModel->getAllArtworks();
    $lines = $productsModel->getAllLines();
    $artworkStreams = $artworkModel->getAllArtworksAvailable();
    $allArtworks = $artworkModel->get7ArtworksAvailable();
    return [
      "allArtworks"=> $allArtworks,
      "artworkStreams" => $artworkStreams,
      "lines" => $lines,
      "artworks" => $artworks
    ];
  }

  public function httpPostMethod(Http $http, array $formFields)
  {
  }
}
