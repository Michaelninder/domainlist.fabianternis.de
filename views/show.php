<?php
// All variables + helpers injected from root index.php:
// $currentDomain, $domains, $config, fmt(), statusBadge(), ghIcon(), extIcon(), arrowLeft(), home()
$d           = $domains[$currentDomain];
$status      = $d['status']       ?? 'active';
$from        = fmt($d['from']     ?? null);
$to          = $d['to']           ?? null;
$desc        = $d['description']  ?? null;
$note        = $d['note']         ?? null;
$gh          = $d['github_url']   ?? null;
$domainOwner = $d['owner']        ?? null;   // null = Fabian Ternis (site owner)
$ghOwner     = $d['github_owner'] ?? null;   // GitHub URL of the domain owner
$subdomains  = $d['subdomains']   ?? null;

// Resolve display owner
$ownerLabel = $domainOwner ?? $config['owner'];
$ownerIsMe  = ($domainOwner === null);
?>

<div class="detail">

  <a href="<?= home() ?>" class="back">
    <?= arrowLeft() ?> Back to list
  </a>

  <div class="detail-panel">

    <!-- ── Top: name + status badge ──────────────────────────────────────── -->
    <div class="detail-top">
      <h1 class="detail-domain"><?= htmlspecialchars($currentDomain) ?></h1>
      <?= statusBadge($status) ?>
    </div>

    <!-- ── Meta grid ─────────────────────────────────────────────────────── -->
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
        <?php if ($ghOwner && !$ownerIsMe): ?>
          <a href="<?= htmlspecialchars($ghOwner) ?>" target="_blank" rel="noopener"
             class="val owner-link">
            <?= ghIcon(12) ?>
            <?= htmlspecialchars($ownerLabel) ?>
            <?= extIcon() ?>
          </a>
        <?php else: ?>
          <span class="val"><?= htmlspecialchars($ownerLabel) ?></span>
        <?php endif; ?>
      </div>

    </div><!-- /.meta-grid -->

    <?php if ($desc || $note || $gh): ?>
    <hr class="detail-sep">
    <?php endif; ?>

    <!-- ── Description ───────────────────────────────────────────────────── -->
    <?php if ($desc): ?>
    <div class="detail-section">
      <div class="section-label">Description</div>
      <p class="detail-desc"><?= htmlspecialchars($desc) ?></p>
    </div>
    <?php endif; ?>

    <!-- ── Note ──────────────────────────────────────────────────────────── -->
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

    <!-- ── GitHub (main repo / org) ──────────────────────────────────────── -->
    <?php if ($gh): ?>
    <div class="detail-section">
      <div class="section-label">GitHub</div>
      <a href="<?= htmlspecialchars($gh) ?>" target="_blank" rel="noopener" class="detail-gh">
        <?= ghIcon(14) ?>
        <?= htmlspecialchars($gh) ?>
        <?= extIcon() ?>
      </a>
    </div>
    <?php endif; ?>

  </div><!-- /.detail-panel -->

  <!-- ── Subdomains ────────────────────────────────────────────────────────── -->
  <?php if (!empty($subdomains)): ?>
  <div class="subdomains-wrap">
    <h2 class="subdomains-title">
      <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"
           fill="none" stroke="currentColor" stroke-width="2"
           stroke-linecap="round" stroke-linejoin="round">
        <rect x="2" y="3" width="20" height="14" rx="2" ry="2"/>
        <line x1="8" y1="21" x2="16" y2="21"/>
        <line x1="12" y1="17" x2="12" y2="21"/>
      </svg>
      Subdomains
      <span class="subdomains-count"><?= count($subdomains) ?></span>
    </h2>

    <div class="sub-table">

      <!-- Table header -->
      <div class="sub-row sub-head">
        <span class="sub-col col-address">Address</span>
        <span class="sub-col col-name">Service</span>
        <span class="sub-col col-desc">Description</span>
        <span class="sub-col col-repo">Repo</span>
        <span class="sub-col col-status">Live</span>
      </div>

      <!-- Table rows -->
      <?php foreach ($subdomains as $sub):
        $isDeployed = $sub['is_deployed'] ?? false;
      ?>
      <div class="sub-row <?= $isDeployed ? 'deployed' : 'not-deployed' ?>">

        <span class="sub-col col-address">
          <a href="<?= htmlspecialchars($sub['address']) ?>" target="_blank" rel="noopener"
             class="sub-addr">
            <?= htmlspecialchars($sub['address']) ?>
            <?= extIcon() ?>
          </a>
        </span>

        <span class="sub-col col-name">
          <?= htmlspecialchars($sub['name'] ?? '') ?>
        </span>

        <span class="sub-col col-desc">
          <?= htmlspecialchars($sub['description'] ?? '') ?>
        </span>

        <span class="sub-col col-repo">
          <?php if (!empty($sub['github'])): ?>
            <a href="<?= htmlspecialchars($sub['github']) ?>" target="_blank" rel="noopener"
               class="sub-gh-link" title="<?= htmlspecialchars($sub['github']) ?>">
              <?= ghIcon(13) ?>
              <?= extIcon() ?>
            </a>
          <?php else: ?>
            <span class="sub-empty">—</span>
          <?php endif; ?>
        </span>

        <span class="sub-col col-status">
          <?php if ($isDeployed): ?>
            <span class="sub-live">
              <span class="live-dot"></span>Live
            </span>
          <?php else: ?>
            <span class="sub-offline">Offline</span>
          <?php endif; ?>
        </span>

      </div>
      <?php endforeach; ?>

    </div><!-- /.sub-table -->
  </div><!-- /.subdomains-wrap -->
  <?php endif; ?>

</div><!-- /.detail -->