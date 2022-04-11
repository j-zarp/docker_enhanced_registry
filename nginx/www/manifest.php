<pre class="prettyprint">
<?php
  $img = $_GET['img'];
  $tag = $_GET['tag'];

  $resp = file_get_contents("http://registry:5000/v2/" . $img . "/manifests/" . $tag);
  echo $resp;
?>
</pre>

<script src="https://cdn.jsdelivr.net/gh/google/code-prettify@master/loader/run_prettify.js"></script>

