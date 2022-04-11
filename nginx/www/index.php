<!DOCTYPE html>
<html>
<head>
  <title>Docker repository</title>
</head>
<style>
        body {
                font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif;
                line-height: 1.6;
                color: #222;
                max-width: 40rem;
                padding: 2rem;
                margin: auto;
                background: #fafafa;
        }

        img {
                max-width: 100%;
        }

        a {
                color: #2ECC40;
        }

        h1,
        h2,
        strong {
                color: #111;
                margin-bottom: 0;
        }
</style>
<body>
<?php
  $img = $_GET['img'];
  $manifest = $_GET['manifest'];
  $tag = $_GET['tag'];
  
  if (isset($img)){
    // specific image details
    $resp = file_get_contents("http://registry:5000/v2/" . $img . "/tags/list");
    $obj = json_decode($resp);
    foreach($obj as $title => $content) {
      echo "<h2>" . $title . "</h2>" . "<br>";
      if (!is_array($content)) {
        echo $content . "<br>";
        $img_name=$content;
      } else {
        echo "<dl>";
        foreach($content as $key => $value) {
          echo "<dd>" . $key . ". <a href=\"./manifest.php?img=" . $img_name . "&tag=" . $value . "\">" . $value . "</a> </dd>";
        }
      }
      echo "</dl>";
    }
  } else { 
    // repository listing
    $resp = file_get_contents('http://registry:5000/v2/_catalog');
    $obj = json_decode($resp);
    foreach($obj as $title => $content) {
      echo "<h2>" . $title . "</h2>" . "<br>";
      echo "<dl>";
      foreach($content as $key => $value) {
        echo "<dd>" . $key . ". <a href=\"./index.php?img=" . $value . "\">" . $value . "</a> </dd>";
      }
      echo "</dl>";
    }
  }

?>
</body>
</html>

