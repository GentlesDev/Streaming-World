<?php

class EpisodeController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {

      $artworkModel = new ArtworksModel();
      $streamings = $artworkModel->getOneEpisodeByArtworkId($_GET['status'], $_GET['artworkId'], $_GET['specifie']);
      $artworks = $artworkModel->getAllArtworks();
      $episodes = $artworkModel->getAllEpisodesByArtworksId();
      $number = $artworkModel->getTheStatusEpisodesByArtworksId();
      $status = $streamings['Status'];
      $posts = $artworkModel->getAllPostsByEpisode($_GET['artworkId'], $_GET['status']);
      $artworkStreams = $artworkModel->getAllArtworksAvailable();
      // var_dump($posts);
      // var_dump($comments);
      // var_dump($status);
      // var_dump($streamings);
      $productsModel = new ProductsModel();
      $lines = $productsModel->getAllLines();
      return[
        "artworkStreams" => $artworkStreams,
        'lines'=>$lines,
        'status'=>$status,
        "streamings"=>$streamings,
        "artworks"=>$artworks,
        "episodes"=>$episodes,
        "posts"=>$posts,
        'number'=> $number
      ];

    }

    public function httpPostMethod(Http $http, array $formFields)
    {
      $artworkModel = new ArtworksModel();
      $streamings = $artworkModel->getOneEpisodeByArtworkId($_GET['status'], $_GET['artworkId'], $_GET['specifie']);
      $artworks = $artworkModel->getAllArtworks();
      $episodes = $artworkModel->getAllEpisodesByArtworksId();
      $number = $artworkModel->getTheStatusEpisodesByArtworksId();
      $status = $streamings['Status'];
      $posts = $artworkModel->getAllPostsByEpisode($_GET['artworkId'], $_GET['status']);
      $artworkModel->addPost($_POST);
      // $artworkModel->addComment($_POST);
      // var_dump($posts);
      // var_dump($comments);
      $productsModel = new ProductsModel();
      $lines = $productsModel->getAllLines();
      $artworkStreams = $artworkModel->getAllArtworksAvailable();
      return[
        "artworkStreams" => $artworkStreams,
        'lines'=>$lines,
        'status'=>$status,
        "streamings"=>$streamings,
        "artworks"=>$artworks,
        "episodes"=>$episodes,
        "posts"=>$posts,
        'number'=> $number
      ];


    }
}
?>
