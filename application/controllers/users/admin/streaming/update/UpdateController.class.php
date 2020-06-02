<?php

class UpdateController
{
  public function httpGetMethod(Http $http, array $queryFields)
  {

    if (empty($_SESSION) == true || $_SESSION['role'] !== "admin") {
      $http->redirectTo('/');
    }
    $artworkModel = new ArtworksModel();
    $productsModel = new ProductsModel();
    $streamingModel = new StreamingModel();
    $episode = $streamingModel->getOneEpisodeByArtworkId($_GET['streamingId'], $_GET['artworkId'], $_GET['season']);
    $artworks = $artworkModel->getAllArtworks();
    $lines = $productsModel->getAllLines();
    $artworkStreams = $artworkModel->getAllArtworksAvailable();
    $allArtworks = $artworkModel->get7ArtworksAvailable();
    // var_dump($episode);
    return [
      "allArtworks" => $allArtworks,
      "artworkStreams" => $artworkStreams,
      "lines" => $lines,
      "episode" => $episode,
      "artworks" => $artworks
    ];
  }

  public function httpPostMethod(Http $http, array $formFields)
  {
    $artworkModel = new ArtworksModel();
    $productsModel = new ProductsModel();
    $streamingModel = new StreamingModel();
    $artworks = $artworkModel->getAllArtworks();
    $streamingModel->updateEpisode($_POST, $_FILES);
    $lines = $productsModel->getAllLines();
    $artworkStreams = $artworkModel->getAllArtworksAvailable();
    $allArtworks = $artworkModel->get7ArtworksAvailable();
    return [
      "allArtworks" => $allArtworks,
      "artworkStreams" => $artworkStreams,
      "lines" => $lines,
      "artworks" => $artworks
    ];
  }
}
