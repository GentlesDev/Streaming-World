<?php

class SearchController
{
  public function httpGetMethod(Http $http, array $queryFields)
  {

    $artworkModel = new ArtworksModel();
    $productsModel = new ProductsModel();
    $artworks = $artworkModel->getAllArtworks();
    $products = $productsModel->getAllProducts();
    $lines = $productsModel->getAllLines();
    $artworkStreams = $artworkModel->getAllArtworksAvailable();
    $allArtworks = $artworkModel->get7ArtworksAvailable();
    return [
      "allArtworks" => $allArtworks,
      'artworkStreams' => $artworkStreams,
      'artworks' => $artworks,
      'products' => $products,
      'lines' => $lines



    ];
  }

  public function httpPostMethod(Http $http, array $formFields)
  {
    $artworkModel = new ArtworksModel();
    $productsModel = new ProductsModel();
    $artworks = $artworkModel->getAllArtworks();
    $products = $productsModel->getAllProducts();
    $lines = $productsModel->getAllLines();
    $results = $productsModel->search($_POST['search']);
    $search = $_POST['search'];
    $artworkStreams = $artworkModel->getAllArtworksAvailable();
    $allArtworks = $artworkModel->get7ArtworksAvailable();
    return [
      "allArtworks" => $allArtworks,
      'artworkStreams' => $artworkStreams,
      'search' => $search,
      'results' => $results,
      'artworks' => $artworks,
      'products' => $products,
      'lines' => $lines
    ];
  }
}
