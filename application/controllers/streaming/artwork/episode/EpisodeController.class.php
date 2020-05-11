<?php

class EpisodeController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {

      $artworkModel = new ArtworksModel();
      $streamings = $artworkModel->getOneEpisode($_GET['status'], $_GET['artworkId']);
      $artworks = $artworkModel->getAllArtworks();
      $episodes = $artworkModel->getAllEpisodesByArtworksId($_GET['artworkId']);
      $status = $streamings['Status'];
      $posts = $artworkModel->getAllPostsByEpisode($_GET['artworkId'], $_GET['status']);
      // var_dump($posts);
      // var_dump($comments);
      // var_dump($status);
      // var_dump($streamings);
      // var_dump($episodes);
      $productsModel = new ProductsModel();
      $lines = $productsModel->getAllLines();
      return[
        'lines'=>$lines,
        'status'=>$status,
        "streamings"=>$streamings,
        "artworks"=>$artworks,
        "episodes"=>$episodes,
        "posts"=>$posts
      ];

    }

    public function httpPostMethod(Http $http, array $formFields)
    {
      $artworkModel = new ArtworksModel();
      $streamings = $artworkModel->getOneEpisode($_GET['status'], $_GET['artworkId']);
      $artworks = $artworkModel->getAllArtworks();
      $episodes = $artworkModel->getAllEpisodesByArtworksId($_GET['artworkId']);
      $status = $streamings['Status'];
      $posts = $artworkModel->getAllPostsByEpisode($_GET['artworkId'], $_GET['status']);
      $artworkModel->addPost($_POST);
      // $artworkModel->addComment($_POST);
      // var_dump($posts);
      // var_dump($comments);
      $productsModel = new ProductsModel();
      $lines = $productsModel->getAllLines();
      return[
        'lines'=>$lines,
        'status'=>$status,
        "streamings"=>$streamings,
        "artworks"=>$artworks,
        "episodes"=>$episodes,
        "posts"=>$posts
      ];


    }
}
?>
