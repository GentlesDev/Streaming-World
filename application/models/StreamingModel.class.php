<?php
class StreamingModel
{
    public function displayEps($get)
    {
        $database = new Database();
        $sql = 'SELECT streaming.Id, Caption, Status, CreationTimestamp,
            artworks.Id AS ArtworkId, artworks.Image, Image_Cover, Url
            FROM streaming
            INNER JOIN artworks ON artworks.Id = streaming.Artworks_Id
            WHERE Url LIKE "%"?"%"
            ORDER BY Caption';
        return $database->query($sql, [$get]);
    }

    public function getAllEpisodes()
    {
        $database = new Database();
        $sql = 'SELECT streaming.Id, streaming.Status, streaming.Artworks_Id, streaming.Caption, streaming.Video, streaming.Description, streaming.CreationTimestamp, streaming.Saison,
            artworks.Id AS ArtworkId, artworks.Image, artworks.Image_Cover, artworks.Url,
            artworks_seasons.Season_Name, artworks_seasons.Season_Image, artworks_seasons.Season_Url, artworks_seasons.Artwork_Id
            FROM streaming
            INNER JOIN artworks_seasons ON artworks_seasons.Season_Name = streaming.Saison
            INNER JOIN artworks ON artworks.Id = streaming.Artworks_Id
            ORDER BY Caption, Saison';
        return $database->query($sql, []);
    }

    public function getAllEpisodesByArtworksId()
    {
        $database = new Database();
        $sql = 'SELECT streaming.Id, streaming.Status, streaming.Artworks_Id, streaming.Caption, streaming.Video, streaming.CreationTimestamp, streaming.Saison,
            artworks.Id AS ArtworkId, artworks.Image, artworks.Image_Cover, artworks.Url,
            artworks_seasons.Season_Name, artworks_seasons.Season_Image, artworks_seasons.Season_Url, artworks_seasons.Artwork_Id
            FROM streaming
            INNER JOIN artworks_seasons ON artworks_seasons.Season_Name = streaming.Saison
            INNER JOIN artworks ON artworks.Id = streaming.Artworks_Id
            WHERE streaming.Artworks_Id = ?  && artworks_seasons.Season_Url = ?
            ORDER BY Caption';
        return $database->query($sql, [$_GET['artworkId'], $_GET['season']]);
    }

    public function getOneEpisode($status, $art)
    {
        $database = new Database();
        $sql = 'SELECT streaming.Id, Status, Artworks_Id, Caption, Description, Video, CreationTimestamp,
            artworks.Id AS ArtworkId, artworks.Image, Image_Cover, Url
            FROM streaming
            INNER JOIN artworks ON artworks.Id = streaming.Artworks_Id
            WHERE Status = ? && artworks.Id = ?';
        return $database->queryOne($sql, [$status, $art]);
    }

    public function getOneEpisodeByArtworkId($status, $art, $spe)
    {
        $database = new Database();
        $sql = 'SELECT streaming.Id, streaming.Status, streaming.Artworks_Id, streaming.Caption, streaming.Description, streaming.Video, streaming.CreationTimestamp, streaming.Saison,
            artworks.Id AS ArtworkId, artworks.Image, artworks.Image_Cover, artworks.Url, artworks.Name,
            artworks_seasons.Season_Name, artworks_seasons.Season_Image, artworks_seasons.Season_Url
            FROM streaming
            INNER JOIN artworks_seasons ON artworks_seasons.Season_Name = streaming.Saison
            INNER JOIN artworks ON artworks.Id = streaming.Artworks_Id
            WHERE streaming.Status = ? && artworks.Id = ? && artworks_seasons.Season_Url = ?';
        return $database->queryOne($sql, [$status, $art, $spe]);
    }

    public function getTheStatusEpisodesByArtworksId()
    {
        $database = new Database();
        $artwork = $database->queryOne(
            "SELECT streaming.Id, streaming.Status, streaming.Artworks_Id, streaming.Caption, streaming.Video, streaming.CreationTimestamp, streaming.Saison,
            artworks.Id AS ArtworkId, artworks.Image, artworks.Image_Cover, artworks.Url,
            artworks_seasons.Season_Name, artworks_seasons.Season_Image, artworks_seasons.Season_Url, artworks_seasons.Artwork_Id
            FROM streaming
            INNER JOIN artworks_seasons ON artworks_seasons.Season_Name = streaming.Saison
            INNER JOIN artworks ON artworks.Id = streaming.Artworks_Id
            WHERE streaming.Artworks_Id = ?  && artworks_seasons.Season_Url = ? && streaming.Status = ?
            ORDER BY Caption",
            [
                $_GET['artworkId'],
                $_GET['season'],
                $_GET['status']
            ]
        );
        if ($artwork !== false) {
            return $artwork;
        } else {
            return $artwork;
        }
    }

    public function updateEpisode($post, $files)
    {
        $database = new Database();
        if (empty($files["vid_pics"]["name"])) {
            $database->executeSql(
                'UPDATE streaming
            SET Artworks_Id = ?, Caption = ?, Status = ?, Description = ?
            WHERE Id = ?',
                [
                    $post['artworksId'],
                    $post["caption"],
                    $post["status"],
                    $post["description"],
                    $post['vidId']
                ]
            );
        } else {
            $database->executeSql(
                'UPDATE streaming
            SET Artworks_Id = ?, Caption = ?, Status = ?, Description = ?, Video = ?
            WHERE Id = ?',
                [
                    $post['artworksId'],
                    $post["caption"],
                    $post["status"],
                    $post["description"],
                    $files["vid_pics"]["name"],
                    $post['vidId']
                ]
            );
        }
        $http = new HTTP();
        $http->moveUploadedFile("vid_pics", "/../../../streaming_vids");
        $http->redirectTo("/users/admin");
    }

    public function addEpisode($post, $file)
    {
        $database = new Database();
        $vid = $database->query(
            'SELECT streaming.Id, Status, Artworks_Id, Caption, Video, CreationTimestamp,
            artworks.Id AS ArtworkId, artworks.Image, Image_Cover, Url, Saison
            FROM streaming
            INNER JOIN artworks ON artworks.Id = streaming.Artworks_Id
            WHERE Artworks_Id = ? && Status = ? && Saison = ?',
            [
                $post['artworksId'],
                $post['status'],
                $post['season']
            ]
        );
        // var_dump($vid);
        if (empty($vid) === false) {
            return "Vous ne pouvez pas ajouter deux épisodes avec le même status !";
        } else {
            $artwork = $database->queryOne(
                "SELECT * FROM artworks WHERE Id = ?",
                [$post['artworksId']]
            );
            if ($artwork['In_Streaming'] === "oui") {
                $database->executeSql("INSERT INTO streaming (Caption, Video, Artworks_Id, Description, Status, Saison, CreationTimestamp)
            VALUES (?, ?, ?, ?, ?, ?, NOW())", [
                    $post["caption"],
                    $file["vid_pics"]["name"],
                    $post["artworksId"],
                    $post["description"],
                    $post["status"],
                    $post["season"]
                ]);
                $http = new HTTP();
                $http->moveUploadedFile("vid_pics", "/../../../streaming_vids");
                $http->redirectTo("/users/admin");
                exit();
            } else {
                $database->executeSql(
                    'UPDATE artworks
                    SET In_Streaming = "oui"
                    WHERE Id = ?',
                    [$post['artworksId']]
                );
                $database->executeSql("INSERT INTO streaming (Caption, Video, Artworks_Id, Description, Status, Saison, CreationTimestamp)
            VALUES (?, ?, ?, ?, ?, ?, NOW())", [
                    $post["caption"],
                    $file["vid_pics"]["name"],
                    $post["artworksId"],
                    $post["description"],
                    $post["status"],
                    $post["season"]
                ]);
                $http = new HTTP();
                $http->moveUploadedFile("vid_pics", "/../../../streaming_vids");
                $http->redirectTo("/users/admin");
                exit();
            }
        }
    }

    public function deleteEpisode($id)
    {
        $database = new Database();
        $database->executeSql(
            'DELETE FROM streaming WHERE Id = ?',
            [$id]
        );
        $vid = $database->query(
            'SELECT streaming.Id, Status, Artworks_Id, Caption, Video, CreationTimestamp,
            artworks.Id AS ArtworkId, artworks.Image, Image_Cover, Url
            FROM streaming
            INNER JOIN artworks ON artworks.Id = streaming.Artworks_Id
            WHERE Artworks_Id = ?',
            [$_GET['artworkId']]
        );
        if (empty($vid)) {
            $database->executeSql(
                'UPDATE artworks
            SET In_Streaming = "non"
            WHERE Id = ?',
                [$_GET['artworkId']]
            );
        }
    }

    public function getAllPostsByEpisode($art, $id)
    {
        $database = new Database();
        $sql = 'SELECT  post.Id, post.Content, post.CreationTimestamp, post.Nickname, post.Product_Id, post.Episode_Id, post.Artwork_Id
            FROM post
            WHERE Artwork_Id = ? && Episode_Id = ?';
        return $database->query($sql, [$art, $id]);
    }

    public function addPost($post)
    {
        $database = new Database();
        $database->executeSql(
            'INSERT INTO post(Content, NickName, CreationTimestamp, Episode_Id, Artwork_Id)
            VALUES (?, ?, NOW(), ?, ?)',
            [
                $post['post'],
                $_SESSION['pseudo'],
                $post['episodeId'],
                $post['artworkId']
            ]
        );
        $http = new HTTP();
        $http->redirectTo("/streaming/artwork/seasons/episode?artworkId=" . $post['artworkId'] . "&season=" . $post['seasonUrl'] . "&status=" . $post['episodeId']);
        exit();
    }
}
?>