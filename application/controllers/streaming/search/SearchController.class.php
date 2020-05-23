<?php

class SearchController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
      $artworkModel = new ArtworksModel();
      $productsModel = new ProductsModel();
      $artworks = $artworkModel->getAllArtworks();
      $lines = $productsModel->getAllLines();
      $artworkStreams = $artworkModel->getAllArtworksAvailable();
      return[
        "artworkStreams" => $artworkStreams,
        "lines"=>$lines,
        "artworks"=>$artworks
      ];
    }
    public function httpPostMethod(Http $http, array $formFields)
    {
      $artworkModel = new ArtworksModel();
      $productsModel = new ProductsModel();
      $artworks = $artworkModel->getAllArtworks();
      $searches = $artworkModel->search($_POST['search']);
      $lines = $productsModel->getAllLines();
      $artworkStreams = $artworkModel->getAllArtworksAvailable();
      // var_dump($searches);
      return[
        "artworkStreams" => $artworkStreams,
        "lines"=>$lines,
        "artworks"=>$artworks,
        "searches"=>$searches
      ];
    }
}
