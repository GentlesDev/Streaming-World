<?php

class AddController
{
  public function httpGetMethod(Http $http, array $queryFields)
  {
    if (empty($_SESSION) == true || $_SESSION['role'] !== "admin") {
      $http->redirectTo('/');
    }
    $artworkModel = new ArtworksModel();
    $productsModel = new ProductsModel();
    $error = null;
    $artworks = $artworkModel->getAllArtworks();
    $lines = $productsModel->getAllLines();
    $artworkStreams = $artworkModel->getAllArtworksAvailable();
    $seasons = $artworkModel->getAllSeasons();
    $allArtworks = $artworkModel->get7ArtworksAvailable();
    return [
      "allArtworks" => $allArtworks,
      "artworkStreams" => $artworkStreams,
      "lines" => $lines,
      "artworks" => $artworks,
      "error" => $error,
      'seasons' => $seasons
    ];
  }

  public function httpPostMethod(Http $http, array $formFields)
  {
    $artworkModel = new ArtworksModel();
    $productsModel = new ProductsModel();
    $streamingModel = new StreamingModel();
    $error = $streamingModel->addEpisode($_POST, $_FILES);
    $artworks = $artworkModel->getAllArtworks();
    $lines = $productsModel->getAllLines();
    $artworkStreams = $artworkModel->getAllArtworksAvailable();
    $seasons = $artworkModel->getAllSeasons();
    $allArtworks = $artworkModel->get7ArtworksAvailable();
    // var_dump($_POST);
    // var_dump($_FILES);
    return [
      "allArtworks" => $allArtworks,
      "artworkStreams" => $artworkStreams,
      "lines" => $lines,
      "artworks" => $artworks,
      "error" => $error,
      'seasons' => $seasons
    ];
  }
}
