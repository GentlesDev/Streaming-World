<?php
class AddController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
        if (empty($_SESSION) == true || $_SESSION['role'] !== "admin") {
            $http->redirectTo('/');
        }

        $artworkModel = new ArtworksModel();
        $artworks = $artworkModel->getAllArtworks();
        $productsModel = new ProductsModel();
        $lines = $productsModel->getAllLines();
        $artworkStreams = $artworkModel->getAllArtworksAvailable();
        $error = null;
        return [
            "artworkStreams" => $artworkStreams,
            'lines' => $lines,
            "artworks" => $artworks,
            "error" => $error
        ];
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
        $artworkModel = new ArtworksModel();
        $artworks = $artworkModel->getAllArtworks();
        $error = $artworkModel->addSpecifie($_POST, $_FILES);
        $productsModel = new ProductsModel();
        $lines = $productsModel->getAllLines();
        $artworkStreams = $artworkModel->getAllArtworksAvailable();
        return [
            "artworkStreams" => $artworkStreams,
            'lines' => $lines,
            "artworks" => $artworks,
            "error" => $error
        ];
    }
}
