<?php
class ArtworksModel
{
  public function addArtwork($post, $files)
  {
    $database = new Database();
    $artwork = $database->queryOne(
      "SELECT Name, Url 
      FROM artworks 
      WHERE Name = ?",
      [$post["name"]]
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
          $post["name"],
          $post["url"],
          $files["artwork_pics"]["name"],
          $files["cover_pics"]["name"]
        ]
      );
      $link = mysqli_connect("localhost", "root", "", "streaming_world");
      $table_name = "artworks";
      $query = mysqli_query($link, "SHOW TABLE STATUS WHERE name='$table_name'");
      $row = mysqli_fetch_array($query);
      $dir = $row[10] - 1;
      $dirName = 'application/www/ressources/images/bg/' . $dir;
      mkdir($dirName, 0777, TRUE);
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
      'DELETE 
    FROM artworks 
    WHERE Id = ?',
      [$id]
    );
    if (file_exists('application/www/ressources/images/bg/' . $id . '/bg.jpg')) {
      unlink('application/www/ressources/images/bg/' . $id . '/bg.jpg');
    }
    if (is_dir('application/www/ressources/images/bg/' . $id)) {
    rmdir('application/www/ressources/images/bg/' . $id);
    }
    $database->executeSql(
      'ALTER TABLE artworks 
      AUTO_INCREMENT = '.$id,
      []
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
          $post["name"],
          $post["url"],
          $post["artworkId"]
        ]
      );
    } else if (empty($files["artwork_pics"]["name"])) {
      $database->executeSql(
        'UPDATE artworks
          SET Name = ?, Url = ?, Image_Cover = ?
          WHERE Id = ?',
        [
          $post["name"],
          $post["url"],
          $files["cover_pics"]["name"],
          $post["artworkId"]
        ]
      );
    } else if (empty($files["cover_pics"]["name"])) {
      $database->executeSql(
        'UPDATE artworks
          SET Name = ?, Url = ?, Image = ?
          WHERE Id = ?',
        [
          $post["name"],
          $post["url"],
          $files["artwork_pics"]["name"],
          $post["artworkId"]
        ]
      );
    } else {
      $database->executeSql(
        'UPDATE artworks
          SET Name = ?, Url = ?, Image = ?, Image_Cover = ?
          WHERE Id = ?',
        [
          $post["artworksId"],
          $post["caption"],
          $post["status"],
          $post["description"],
          $files["artwork_pics"]["name"],
          $files["cover_pics"]["name"],
          $post["artworkId"]
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


  public function getAllArtworks()
  {
    $database = new Database();
    $sql = 'SELECT *
            FROM artworks
            ORDER BY Name';
    // var_dump($database);
    return $database->query($sql, []);
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

  public function getAllArtworkSeasons($get)
  {
    $database = new Database();
    $sql = 'SELECT * 
    FROM `artworks_seasons` 
    INNER JOIN artworks ON artworks_seasons.Artwork_Id = artworks.Id 
    WHERE Artwork_Id = ? && In_Streaming = "oui"';
    return $database->query($sql, [$get]);
  }

  public function getAllSeasons()
  {
    $database = new Database();
    $sql = 'SELECT artworks_seasons.Id, artworks_seasons.Season_Name, artworks_seasons.Season_Image, artworks_seasons.Season_Url, artworks_seasons.Artwork_Id, artworks.Name AS Artwork_Name
            FROM artworks_seasons
            INNER JOIN artworks ON artworks.Id = artworks_seasons.Artwork_Id
            ORDER BY Artwork_Name, Season_Url';
    return $database->query($sql, []);
  }

  public function getOneSeason($get)
  {
    $database = new Database();
    $sql = 'SELECT *
            FROM artworks_seasons
            WHERE Id = ?';
    // var_dump($database);
    return $database->queryOne($sql, [$get]);
  }

  public function getOneArtworkSeason()
  {
    $database = new Database();
    $sql = 'SELECT *
            FROM artworks
            INNER JOIN artworks_seasons ON artworks.Id = artworks_seasons.Artwork_Id
            WHERE artworks_seasons.Season_Url = ?';
    // var_dump($database);
    return $database->queryOne($sql, [$_GET["season"]]);
  }

  public function addSeason($post, $files)
  {
    $database = new Database();
    $artwork = $database->queryOne(
      "SELECT Season_Name, Season_Url 
      FROM artworks_seasons
      WHERE Season_Name = ? || Season_Url = ?",
      [$post['name'], $post['url']]
    );
    // var_dump($post);
    // var_dump($files);
    if ($artwork !== false) {
      return 'Vous ne pouvez pas enregistrer deux artworks ayant le même nom ou le même url.';
    } else {
      $database->executeSql(
        'INSERT INTO artworks_seasons (Season_Name, Season_Url, Season_Image, Artwork_Id)
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

  public function suppSeason($id)
  {
    $database = new Database();
    $database->executeSql(
      'DELETE FROM artworks_seasons WHERE Id = ?',
      [$id]
    );
  }

  public function updateSeason($post, $files)
  {
    $database = new Database();
    if (empty($files["cover_pics"]["name"])) {
      $database->executeSql(
        'UPDATE artworks_seasons
              SET Season_Name = ?, Season_Url = ?
              WHERE Id = ?',
        [
          $post['name'],
          $post["url"],
          $post['season']
        ]
      );
    } else {
      $database->executeSql(
        'UPDATE artworks_seasons
              SET Season_Name = ?, Season_Url = ?, Season_Image = ?
              WHERE Id = ?',
        [
          $post['name'],
          $post["url"],
          $files["cover_pics"]["name"],
          $post['season']
        ]
      );
    }
    $http = new HTTP();
    $http->moveUploadedFile("cover_pics", "/ressources/images/saisons");
    $http->redirectTo("/users/admin");
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
}
