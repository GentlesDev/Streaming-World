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
        $artworks = $artworkModel->getAllArtworks();
        $lines = $productsModel->getAllLines();
        $artworkStreams = $artworkModel->getAllArtworksAvailable();
        $error = null;
        return [
            "artworkStreams" => $artworkStreams,
            "lines" => $lines,
            "artworks" => $artworks,
            "error" => $error
        ];
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
        $artworkModel = new ArtworksModel();
        $productsModel = new ProductsModel();
        $artworks = $artworkModel->getAllArtworks();
        $error = $artworkModel->addSeason($_POST, $_FILES);
        $lines = $productsModel->getAllLines();
        $artworkStreams = $artworkModel->getAllArtworksAvailable();
        return [
            "artworkStreams" => $artworkStreams,
            "lines" => $lines,
            "artworks" => $artworks,
            "error" => $error
        ];
    }
}