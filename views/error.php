<?php
// $route available from root index.php
http_response_code(404);
?>

<div class="p404">
  <h1>404</h1>
  <p>
    No domain matching
    <strong><?= htmlspecialchars($route) ?></strong>
    was found in the list.
  </p>
  <a href="<?= home() ?>" class="btn">
    <?= arrowLeft() ?> Back to list
  </a>
</div>