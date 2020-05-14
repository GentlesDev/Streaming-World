<?php

class BasketController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
      $artworkModel = new ArtworksModel();
      $productsModel = new ProductsModel();
      $artworks = $artworkModel->getAllArtworks();
      $artworkStreams = $artworkModel->getAllArtworksAvailable();
      $lines = $productsModel->getAllLines();
      return[
        'lines'=>$lines,
        "artworks"=> $artworks,
        "artworkStreams" => $artworkStreams
      ];
    }

    public function httpPostMethod(Http $http, array $formFields)
    {


    }
}
