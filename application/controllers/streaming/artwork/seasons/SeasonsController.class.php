<?php

class SeasonsController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {

        $artworkModel = new ArtworksModel();
        $productsModel = new ProductsModel();
        $streamingModel = new StreamingModel();
        $artworks = $artworkModel->getAllArtworks();
        $lines = $productsModel->getAllLines();
        $title = $artworkModel->getOneArtworkSeason();
        $seasons = $streamingModel->getAllEpisodesByArtworksId();
        $artworkStreams = $artworkModel->getAllArtworksAvailable($_GET['artworkId']);
        $allArtworks = $artworkModel->get7ArtworksAvailable();
        return [
            "allArtworks" => $allArtworks,
            "seasons" => $seasons,
            "artworkStreams" => $artworkStreams,
            "title" => $title,
            "lines" => $lines,
            "artworks" => $artworks
        ];
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
    }
}
