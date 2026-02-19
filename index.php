<?php
declare(strict_types=1);

$config  = require __DIR__ . '/config.php';
$domains = $config['domains'];

/* ── Routing ───────────────────────────────────────────────────────────── */
$route = isset($_GET['route']) ? trim($_GET['route'], '/') : '';

$currentDomain = null;
$view = 'list';

if ($route !== '' && $route !== 'index.php') {
    foreach ($domains as $key => $_) {
        if (strtolower($key) === strtolower($route)) {
            $currentDomain = $key;
            $view = 'detail';
            break;
        }
    }
    if ($currentDomain === null) {
        $view = '404';
    }
}

/* ── Helpers ───────────────────────────────────────────────────────────── */
function fmt(?string $date): string {
    if (!$date) return '—';
    $ts = strtotime($date);
    return $ts ? date('M j, Y', $ts) : htmlspecialchars($date);
}

function base(): string {
    $s = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
    return $s . '://' . ($_SERVER['HTTP_HOST'] ?? 'localhost')
         . rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
}

function durl(string $d): string { return base() . '/' . strtolower($d); }
function home(): string { return base() . '/'; }

function statusBadge(string $s): string {
    if ($s === 'active') {
        return '<span class="badge badge-active"><span class="dot"></span>Active</span>';
    }
    return '<span class="badge badge-expired"><span class="dot"></span>Expired</span>';
}

function ghIcon(): string {
    return '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
         fill="currentColor"><path d="M12 0C5.37 0 0 5.373 0 12c0 5.303 3.438 9.8 8.207
         11.387.6.113.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333
         -1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07
         1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467
         -5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322
         3.301 1.23A11.509 11.509 0 0 1 12 5.803c1.02.005 2.047.138 3.006.404 2.291-1.552
         3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221
         0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576
         C20.566 21.797 24 17.3 24 12c0-6.627-5.373-12-12-12z"/></svg>';
}

function arrowLeft(): string {
    return '<svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24"
        fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"
        stroke-linejoin="round"><path d="M19 12H5"/><path d="m12 19-7-7 7-7"/></svg>';
}

/* ── Stats ─────────────────────────────────────────────────────────────── */
$total   = count($domains);
$active  = 0;
$expired = 0;
foreach ($domains as $d) {
    ($d['status'] ?? 'active') === 'active' ? $active++ : $expired++;
}

?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $view === 'detail'
    ? htmlspecialchars($currentDomain) . ' · ' . htmlspecialchars($config['site_title'])
    : htmlspecialchars($config['site_title']) ?></title>
  <link rel="stylesheet" href="<?= base() ?>/style.css">
  <meta name="robots" content="noindex,nofollow">
</head>
<body>

<header>
  <div class="wrap">
    <div class="header-row">
      <div class="brand">
        <a href="<?= home() ?>" class="brand-name"><?= htmlspecialchars($config['site_title']) ?></a>
        <span class="brand-sub"><?= htmlspecialchars($config['owner']) ?></span>
      </div>
      <div class="stat-row">
        <div class="stat"><span class="stat-n t"><?= $total ?></span><span class="stat-l">Total</span></div>
        <div class="stat"><span class="stat-n a"><?= $active ?></span><span class="stat-l">Active</span></div>
        <div class="stat"><span class="stat-n e"><?= $expired ?></span><span class="stat-l">Expired</span></div>
      </div>
    </div>
  </div>
</header>

<main>
<div class="wrap">

<?php /* ═══════════════════════ LIST VIEW ═══════════════════════ */
if ($view === 'list'): ?>

<div class="hero">
  <h1>Domain Portfolio</h1>
  <p>All domains registered or managed by <?= htmlspecialchars($config['owner']) ?>.</p>
</div>

<div class="filters">
  <div class="search-box">
    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
      <circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/>
    </svg>
    <input type="search" id="search" placeholder="Search…" autocomplete="off">
  </div>
  <button class="fbtn on"       data-f="all">All</button>
  <button class="fbtn on-green" data-f="active">Active</button>
  <button class="fbtn on-red"   data-f="expired">Expired</button>
</div>

<div class="grid" id="grid">

<?php foreach ($domains as $key => $d):
  $status = $d['status']     ?? 'active';
  $from   = fmt($d['from']   ?? null);
  $to     = $d['to'] ?? null;
  $note   = $d['note']       ?? null;
  $desc   = $d['description'] ?? null;
  $gh     = $d['github_url'] ?? null;
?>
  <a class="card <?= $status ?>"
     href="<?= durl($key) ?>"
     data-s="<?= $status ?>"
     data-d="<?= htmlspecialchars(strtolower($key)) ?>">

    <div class="card-head">
      <span class="card-name"><?= htmlspecialchars($key) ?></span>
      <?= statusBadge($status) ?>
    </div>

    <div class="card-dates">
      <span class="date-item">From&nbsp;<em><?= $from ?></em></span>
      <span class="date-item">
        &rarr;&nbsp;<?php if ($to): ?><em><?= fmt($to) ?></em>
        <?php else: ?><em class="present">Present</em><?php endif; ?>
      </span>
    </div>

    <?php if ($note): ?>
    <div class="card-note">
      <span class="note-chip">
        <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" viewBox="0 0 24 24"
             fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"
             stroke-linejoin="round"><circle cx="12" cy="12" r="10"/>
          <line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
        </svg>
        <?= htmlspecialchars($note) ?>
      </span>
    </div>
    <?php endif; ?>

    <?php if ($desc): ?>
    <p class="card-desc"><?= htmlspecialchars($desc) ?></p>
    <?php endif; ?>

    <?php if ($gh): ?>
    <div class="card-gh">
      <span class="gh-link"><?= ghIcon() ?><?= htmlspecialchars(preg_replace('#^https://github\.com/#', '', $gh)) ?></span>
    </div>
    <?php endif; ?>

  </a>
<?php endforeach; ?>

  <div class="empty" id="empty" style="display:none">
    <strong>No domains found</strong>Try a different search term or filter.
  </div>

</div><!-- /#grid -->

<?php /* ═══════════════════════ DETAIL VIEW ═══════════════════════ */
elseif ($view === 'detail'):
  $d      = $domains[$currentDomain];
  $status = $d['status']      ?? 'active';
  $from   = fmt($d['from']    ?? null);
  $to     = $d['to']          ?? null;
  $desc   = $d['description'] ?? null;
  $note   = $d['note']        ?? null;
  $gh     = $d['github_url']  ?? null;
?>

<div class="detail">
  <a href="<?= home() ?>" class="back"><?= arrowLeft() ?> Back to list</a>

  <div class="detail-panel">

    <!-- Header -->
    <div class="detail-top">
      <h1 class="detail-domain"><?= htmlspecialchars($currentDomain) ?></h1>
      <?= statusBadge($status) ?>
    </div>

    <!-- Meta grid -->
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

    <!-- Description -->
    <?php if ($desc): ?>
    <div class="detail-section">
      <div class="section-label">Description</div>
      <p class="detail-desc"><?= htmlspecialchars($desc) ?></p>
    </div>
    <?php endif; ?>

    <!-- Note -->
    <?php if ($note): ?>
    <div class="detail-section">
      <div class="section-label">Note</div>
      <span class="detail-note">
        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24"
             fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"
             stroke-linejoin="round"><circle cx="12" cy="12" r="10"/>
          <line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
        </svg>
        <?= htmlspecialchars($note) ?>
      </span>
    </div>
    <?php endif; ?>

    <!-- GitHub -->
    <?php if ($gh): ?>
    <div class="detail-section">
      <div class="section-label">GitHub</div>
      <a href="<?= htmlspecialchars($gh) ?>" target="_blank" rel="noopener" class="detail-gh">
        <?= ghIcon() ?>
        <?= htmlspecialchars($gh) ?>
        <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" viewBox="0 0 24 24"
             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
             stroke-linejoin="round" style="margin-left:2px;opacity:.5">
          <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/>
          <polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/>
        </svg>
      </a>
    </div>
    <?php endif; ?>

  </div><!-- /.detail-panel -->
</div><!-- /.detail -->

<?php /* ═══════════════════════ 404 ═══════════════════════ */
elseif ($view === '404'): ?>

<div class="p404">
  <h1>404</h1>
  <p>No domain matching <strong><?= htmlspecialchars($route) ?></strong> found.</p>
  <a href="<?= home() ?>" class="btn"><?= arrowLeft() ?> Back to list</a>
</div>

<?php endif; ?>

</div><!-- /.wrap -->
</main>

<footer>
  <div class="wrap">
    <div class="footer-row">
      <span class="footer-copy">&copy; <?= date('Y') ?> <?= htmlspecialchars($config['owner']) ?></span>
      <span class="footer-v">v<?= htmlspecialchars($config['version']) ?></span>
    </div>
  </div>
</footer>

<?php if ($view === 'list'): ?>
<script>
(function(){
  const search = document.getElementById('search');
  const grid   = document.getElementById('grid');
  const empty  = document.getElementById('empty');
  const cards  = Array.from(grid.querySelectorAll('.card'));
  const btns   = Array.from(document.querySelectorAll('.fbtn'));
  let filter = 'all', q = '';

  function run(){
    let n = 0;
    cards.forEach(c => {
      const ok = (filter === 'all' || c.dataset.s === filter)
              && c.dataset.d.includes(q);
      c.style.display = ok ? '' : 'none';
      if(ok) n++;
    });
    empty.style.display = n ? 'none' : '';
  }

  search.addEventListener('input', () => { q = search.value.trim().toLowerCase(); run(); });

  btns.forEach(b => {
    b.addEventListener('click', () => {
      btns.forEach(x => x.className = 'fbtn');
      if(b.dataset.f === 'all')     b.classList.add('on');
      if(b.dataset.f === 'active')  b.classList.add('on-green');
      if(b.dataset.f === 'expired') b.classList.add('on-red');
      filter = b.dataset.f;
      run();
    });
  });
})();
</script>
<?php endif; ?>

</body>
</html>