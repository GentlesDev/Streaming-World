<?php

class ArtworkController
{
  public function httpGetMethod(Http $http, array $queryFields)
  {

    $artworkModel = new ArtworksModel();
    $productsModel = new ProductsModel();
    $artworks = $artworkModel->getAllArtworks();
    $lines = $productsModel->getAllLines();
    $artworkStreams = $artworkModel->getAllArtworksAvailable();
    $title = $artworkModel->getOneArtwork($_GET['artworkId']);
    $seasons = $artworkModel->getAllArtworkSeasons($_GET['artworkId']);
    return [
      "seasons" => $seasons,
      "title" => $title,
      "artworkStreams" => $artworkStreams,
      "lines" => $lines,
      "artworks" => $artworks
    ];
  }

  public function httpPostMethod(Http $http, array $formFields)
  {
  }
}
