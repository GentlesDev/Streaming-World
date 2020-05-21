<?php
class ArtworksModel
{
  public function addArtwork($post, $files)
  {
    $database = new Database();
    $artwork = $database->queryOne(
      "SELECT Name, Url FROM artworks WHERE Name = ?",
      [$post['name']]
    );
    // var_dump($post);
    // var_dump($files);
    if ($artwork !== false) {
      return 'Vous ne pouvez pas enregistrer deux artworks ayant le même nom ou le même url.';
    } else {
      $database->executeSql(
        'INSERT INTO artworks(Name, Url, Image, Image_Cover, In_Streaming)
      VALUES (?, ?, ?, ?, "non")',
        [
          $post['name'],
          $post['url'],
          $files["artwork_pics"]["name"],
          $files["cover_pics"]["name"]
        ]
      );
      $http = new HTTP();
      $http->moveUploadedFile("artwork_pics", "/ressources/images/cover");
      $http->moveUploadedFile("cover_pics", "/ressources/images/cover");
      $http->redirectTo("/users/admin");
      return null;
    }
  }

  public function suppArtwork($id)
  {
    $database = new Database();
    $database->executeSql(
      'DELETE FROM artworks WHERE Id = ?',
      [$id]
    );
  }

  public function updateArtwork($post, $files)
  {
    $database = new Database();
    if (empty($files["artwork_pics"]["name"]) && empty($files["cover_pics"]["name"])) {
      $database->executeSql(
        'UPDATE artworks
          SET Name = ?, Url = ?
          WHERE Id = ?',
        [
          $post['name'],
          $post["url"],
          $post['artworkId']
        ]
      );
    } else if (empty($files["artwork_pics"]["name"])) {
      $database->executeSql(
        'UPDATE artworks
            SET Name = ?, Url = ?, Image_Cover = ?
            WHERE Id = ?',
        [
          $post['name'],
          $post["url"],
          $files["cover_pics"]["name"],
          $post['artworkId']
        ]
      );
    } else if (empty($files["cover_pics"]["name"])) {
      $database->executeSql(
        'UPDATE artworks
              SET Name = ?, Url = ?, Image = ?
              WHERE Id = ?',
        [
          $post['name'],
          $post["url"],
          $files["artwork_pics"]["name"],
          $post['artworkId']
        ]
      );
    } else {
      $database->executeSql(
        'UPDATE artworks
              SET Name = ?, Url = ?, Image = ?, Image_Cover = ?
              WHERE Id = ?',
        [
          $post['artworksId'],
          $post["caption"],
          $post["status"],
          $post["description"],
          $files["artwork_pics"]["name"],
          $files["cover_pics"]["name"],
          $post['artworkId']
        ]
      );
    }
    $http = new HTTP();
    $http->moveUploadedFile("artwork_pics", "/ressources/images/cover");
    $http->moveUploadedFile("cover_pics", "/ressources/images/cover");
    $http->redirectTo("/users/admin");
  }

  public function getAllArtworksAvailable()
  {
    $database = new Database();

    $sql = 'SELECT *
            FROM artworks
            WHERE In_Streaming = "oui"
            ORDER BY Name';
    // var_dump($database);
    return $database->query($sql, []);
  }

  public function getAllArtworkSpecifies($get)
  {
    $database = new Database();

    $sql = 'SELECT * 
    FROM `artworks_specifies` 
    INNER JOIN artworks ON artworks_specifies.Artwork_Id = artworks.Id 
    WHERE Artwork_Id = ? && In_Streaming = "oui"';
    return $database->query($sql, [$get]);
  }

  public function getAllSpecifies()
  {
    $database = new Database();

    $sql = 'SELECT artworks_specifies.Id, artworks_specifies.Specifie_Name, artworks_specifies.Specifie_Image, artworks_specifies.Specifie_Url, artworks_specifies.Artwork_Id, artworks.Name AS Artwork_Name
            FROM artworks_specifies
            INNER JOIN artworks ON artworks.Id = artworks_specifies.Artwork_Id
            ORDER BY Artwork_Name, Specifie_Url';
    return $database->query($sql, []);
  }

  public function addSpecifie($post, $files)
  {
    $database = new Database();
    $artwork = $database->queryOne(
      "SELECT specifie_Name, specifie_Url 
      FROM artworks_specifies 
      WHERE specifie_Name = ? || specifie_Url = ?",
      [$post['name'], $post['url']]
    );
    // var_dump($post);
    // var_dump($files);
    if ($artwork !== false) {
      return 'Vous ne pouvez pas enregistrer deux artworks ayant le même nom ou le même url.';
    } else {
      $database->executeSql(
        'INSERT INTO artworks_specifies (specifie_Name, specifie_Url, specifie_Image, Artwork_Id)
      VALUES (?, ?, ?, ?)',
        [
          $post['name'],
          $post['url'],
          $files["cover_pics"]["name"],
          $post['artwork']
        ]
      );
      $http = new HTTP();
      $http->moveUploadedFile("cover_pics", "/ressources/images/saisons");
      $http->redirectTo("/users/admin");
      return null;
    }
  }

  public function suppSpecifie($id)
  {
    $database = new Database();
    $database->executeSql(
      'DELETE FROM artworks_specifies WHERE Id = ?',
      [$id]
    );
  }

  public function updateSpecifie($post, $files)
  {
    $database = new Database();
    if (empty($files["cover_pics"]["name"])) {
      $database->executeSql(
        'UPDATE artworks_specifies
              SET Specifie_Name = ?, Specifie_Url = ?
              WHERE Id = ?',
        [
          $post['name'],
          $post["url"],
          $post['specifie']
        ]
      );
    } else {
      $database->executeSql(
        'UPDATE artworks_specifies
              SET Specifie_Name = ?, Specifie_Url = ?, Specifie_Image = ?
              WHERE Id = ?',
        [
          $post['name'],
          $post["url"],
          $files["cover_pics"]["name"],
          $post['specifie']
        ]
      );
    }
    $http = new HTTP();
    $http->moveUploadedFile("cover_pics", "/ressources/images/saisons");
    $http->redirectTo("/users/admin");
  }

  public function getOneArtwork($get)
  {
    $database = new Database();
    $sql = 'SELECT *
            FROM artworks
            WHERE Id = ?';
    // var_dump($database);
    return $database->queryOne($sql, [$get]);
  }

  public function getAllArtworks()
  {
    $database = new Database();

    $sql = 'SELECT *
            FROM artworks
            ORDER BY Name';
    // var_dump($database);
    return $database->query($sql, []);
  }

  public function getOneSpecifie($get)
  {
    $database = new Database();
    $sql = 'SELECT *
            FROM artworks_specifies
            WHERE Id = ?';
    // var_dump($database);
    return $database->queryOne($sql, [$get]);
  }

  public function getOneArtworkSpecifie()
  {
    $database = new Database();
    $sql = 'SELECT *
            FROM artworks
            INNER JOIN artworks_specifies ON artworks.Id = artworks_specifies.Artwork_Id
            WHERE artworks_specifies.Specifie_Url = ?';
    // var_dump($database);
    return $database->queryOne($sql, [$_GET['specifie']]);
  }


  public function search($post)
  {
    $database = new Database();
    $sql = 'SELECT artworks.Id, artworks.Image, Image_Cover, Url, Name
            FROM artworks
            WHERE Name LIKE "%"?"%" && In_Streaming = "oui" || Url LIKE "%"?"%" && In_Streaming = "oui"
            ORDER BY Name';
    return $database->query($sql, [$post, $post]);
  }

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
            artworks_specifies.Specifie_Name, artworks_specifies.Specifie_Image, artworks_specifies.Specifie_Url, artworks_specifies.Artwork_Id
            FROM streaming
            INNER JOIN artworks_specifies ON artworks_specifies.Specifie_Name = streaming.Saison
            INNER JOIN artworks ON artworks.Id = streaming.Artworks_Id
            ORDER BY Caption, Saison';
    return $database->query($sql, []);
  }

  public function getAllEpisodesByArtworksId()
  {
    $database = new Database();
    $sql = 'SELECT streaming.Id, streaming.Status, streaming.Artworks_Id, streaming.Caption, streaming.Video, streaming.CreationTimestamp, streaming.Saison,
            artworks.Id AS ArtworkId, artworks.Image, artworks.Image_Cover, artworks.Url,
            artworks_specifies.Specifie_Name, artworks_specifies.Specifie_Image, artworks_specifies.Specifie_Url, artworks_specifies.Artwork_Id
            FROM streaming
            INNER JOIN artworks_specifies ON artworks_specifies.Specifie_Name = streaming.Saison
            INNER JOIN artworks ON artworks.Id = streaming.Artworks_Id
            WHERE streaming.Artworks_Id = ?  && artworks_specifies.Specifie_Url = ?
            ORDER BY Caption';
    return $database->query($sql, [$_GET['artworkId'], $_GET['specifie']]);
  }

  public function getTheStatusEpisodesByArtworksId()
  {
    $database = new Database();
    $artwork = $database->queryOne(
      "SELECT streaming.Id, streaming.Status, streaming.Artworks_Id, streaming.Caption, streaming.Video, streaming.CreationTimestamp, streaming.Saison,
            artworks.Id AS ArtworkId, artworks.Image, artworks.Image_Cover, artworks.Url,
            artworks_specifies.Specifie_Name, artworks_specifies.Specifie_Image, artworks_specifies.Specifie_Url, artworks_specifies.Artwork_Id
            FROM streaming
            INNER JOIN artworks_specifies ON artworks_specifies.Specifie_Name = streaming.Saison
            INNER JOIN artworks ON artworks.Id = streaming.Artworks_Id
            WHERE streaming.Artworks_Id = ?  && artworks_specifies.Specifie_Url = ? && streaming.Status = ?
            ORDER BY Caption",
      [
        $_GET['artworkId'], 
        $_GET['specifie'],
        $_GET['status']
      ]
    );
    if ($artwork !== false) {
      return $artwork;
    } else {
      return $artwork;
  }
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
            artworks_specifies.Specifie_Name, artworks_specifies.Specifie_Image, artworks_specifies.Specifie_Url
            FROM streaming
            INNER JOIN artworks_specifies ON artworks_specifies.Specifie_Name = streaming.Saison
            INNER JOIN artworks ON artworks.Id = streaming.Artworks_Id
            WHERE streaming.Status = ? && artworks.Id = ? && artworks_specifies.Specifie_Url = ?';
    return $database->queryOne($sql, [$status, $art, $spe]);
  }

  public function updateVideo($post, $files)
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

  public function addVideo($post, $file)
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
        $post['specifie']
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
          $post['artworksId'],
          $post["description"],
          $post['status'],
          $post['specifie']
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
          $post['artworksId'],
          $post["description"],
          $post['status'],
          $post['specifie']
        ]);
        $http = new HTTP();
        $http->moveUploadedFile("vid_pics", "/../../../streaming_vids");
        $http->redirectTo("/users/admin");
        exit();
      }
    }
  }

  public function suppVideo($id)
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
    $http->redirectTo("/streaming/artwork/specifies/episode?artworkId=" . $post['artworkId'] . "&specifie=" . $post['specifieUrl'] . "&status=" . $post['episodeId']);
    exit();
  }
}
