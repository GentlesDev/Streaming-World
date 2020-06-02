<?php

class EpisodeController
{
  public function httpGetMethod(Http $http, array $queryFields)
  {

    $artworkModel = new ArtworksModel();
    $productsModel = new ProductsModel();
    $streamingModel = new StreamingModel();
    $artworkEpisode = $streamingModel->getOneEpisodeByArtworkId($_GET['status'], $_GET['artworkId'], $_GET['season']);
    $artworks = $artworkModel->getAllArtworks();
    $episodes = $streamingModel->getAllEpisodesByArtworksId();
    $status = $artworkEpisode['Status'];
    $posts = $streamingModel->getAllPostsByEpisode($_GET['artworkId'], $_GET['status']);
    $artworkStreams = $artworkModel->getAllArtworksAvailable();
    $lines = $productsModel->getAllLines();
    $allArtworks = $artworkModel->get7ArtworksAvailable();
    // var_dump($posts);
    // var_dump($status);
    // var_dump($artworkEpisode);
    return [
      "allArtworks" => $allArtworks,
      "artworkStreams" => $artworkStreams,
      "lines" => $lines,
      "status" => $status,
      "artworkEpisode" => $artworkEpisode,
      "artworks" => $artworks,
      "episodes" => $episodes,
      "posts" => $posts
    ];
  }

  public function httpPostMethod(Http $http, array $formFields)
  {
    $artworkModel = new ArtworksModel();
    $productsModel = new ProductsModel();
    $streamingModel = new StreamingModel();
    $artworkEpisode = $streamingModel->getOneEpisodeByArtworkId($_GET['status'], $_GET['artworkId'], $_GET['season']);
    $artworks = $artworkModel->getAllArtworks();
    $episodes = $streamingModel->getAllEpisodesByArtworksId();
    $status = $artworkEpisode['Status'];
    $posts = $streamingModel->getAllPostsByEpisode($_GET['artworkId'], $_GET['status']);
    $streamingModel->addPost($_POST);
    $lines = $productsModel->getAllLines();
    $artworkStreams = $artworkModel->getAllArtworksAvailable();
    $allArtworks = $artworkModel->get7ArtworksAvailable();
    // var_dump($posts);
    return [
      "allArtworks" => $allArtworks,
      "artworkStreams" => $artworkStreams,
      "lines" => $lines,
      "status" => $status,
      "artworkEpisode" => $artworkEpisode,
      "artworks" => $artworks,
      "episodes" => $episodes,
      "posts" => $posts
    ];
  }
}
