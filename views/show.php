<?php
// $currentDomain, $domains, $config, helper functions all available from root index.php
$d      = $domains[$currentDomain];
$status = $d['status']      ?? 'active';
$from   = fmt($d['from']    ?? null);
$to     = $d['to']          ?? null;
$desc   = $d['description'] ?? null;
$note   = $d['note']        ?? null;
$gh     = $d['github_url']  ?? null;
?>

<div class="detail">

  <a href="<?= home() ?>" class="back">
    <?= arrowLeft() ?> Back to list
  </a>

  <div class="detail-panel">

    <!-- ── Top: name + status badge ── -->
    <div class="detail-top">
      <h1 class="detail-domain"><?= htmlspecialchars($currentDomain) ?></h1>
      <?= statusBadge($status) ?>
    </div>

    <!-- ── Meta grid ── -->
    <div class="meta-grid">
      <div class="meta-item">
        <label>Registered</label>
        <span class="val"><?= $from ?></span>
      </div>
      <div class="meta-item">
        <label>Expires / Expired</label>
        <?php if ($to): ?>
          <span class="val"><?= fmt($to) ?></span>
        <?php else: ?>
          <span class="val now">Present</span>
        <?php endif; ?>
      </div>
      <div class="meta-item">
        <label>Status</label>
        <span class="val"><?= ucfirst(htmlspecialchars($status)) ?></span>
      </div>
      <div class="meta-item">
        <label>Owner</label>
        <span class="val"><?= htmlspecialchars($config['owner']) ?></span>
      </div>
    </div>

    <?php if ($desc || $note || $gh): ?>
    <hr class="detail-sep">
    <?php endif; ?>

    <!-- ── Description ── -->
    <?php if ($desc): ?>
    <div class="detail-section">
      <div class="section-label">Description</div>
      <p class="detail-desc"><?= htmlspecialchars($desc) ?></p>
    </div>
    <?php endif; ?>

    <!-- ── Note ── -->
    <?php if ($note): ?>
    <div class="detail-section">
      <div class="section-label">Note</div>
      <span class="detail-note">
        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24"
             fill="none" stroke="currentColor" stroke-width="2.2"
             stroke-linecap="round" stroke-linejoin="round">
          <circle cx="12" cy="12" r="10"/>
          <line x1="12" y1="8"  x2="12"    y2="12"/>
          <line x1="12" y1="16" x2="12.01" y2="16"/>
        </svg>
        <?= htmlspecialchars($note) ?>
      </span>
    </div>
    <?php endif; ?>

    <!-- ── GitHub ── -->
    <?php if ($gh): ?>
    <div class="detail-section">
      <div class="section-label">GitHub</div>
      <a href="<?= htmlspecialchars($gh) ?>" target="_blank" rel="noopener" class="detail-gh">
        <?= ghIcon(14) ?>
        <?= htmlspecialchars($gh) ?>
        <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" viewBox="0 0 24 24"
             fill="none" stroke="currentColor" stroke-width="2"
             stroke-linecap="round" stroke-linejoin="round" style="margin-left:2px;opacity:.45">
          <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/>
          <polyline points="15 3 21 3 21 9"/>
          <line x1="10" y1="14" x2="21" y2="3"/>
        </svg>
      </a>
    </div>
    <?php endif; ?>

  </div><!-- /.detail-panel -->
</div><!-- /.detail -->