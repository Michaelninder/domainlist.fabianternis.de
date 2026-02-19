<?php

declare(strict_types=1);

$config  = require __DIR__ . '/config.php';
$domains = $config['domains'];

/* ── Routing ──────────────────────────────────────────────────────────── */
$route = isset($_GET['route']) ? trim($_GET['route'], '/') : '';
$route = strtolower($route);

// Determine current view
$currentDomain = null;
$view = 'list';

if ($route !== '' && $route !== 'index.php') {
    $routeKey = strtolower($route);
    // Find matching domain key (case-insensitive)
    foreach ($domains as $key => $data) {
        if (strtolower($key) === $routeKey) {
            $currentDomain = $key;
            $view = 'detail';
            break;
        }
    }
    if ($currentDomain === null) {
        $view = '404';
    }
}

/* ── Helpers ──────────────────────────────────────────────────────────── */
function formatDate(?string $date): string {
    if ($date === null || $date === '') return '—';
    $ts = strtotime($date);
    if ($ts === false) return htmlspecialchars($date);
    return date('M j, Y', $ts);
}

function baseUrl(): string {
    $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
    $host   = $_SERVER['HTTP_HOST'] ?? 'localhost';
    $path   = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
    return $scheme . '://' . $host . $path;
}

function domainUrl(string $domain): string {
    return baseUrl() . '/' . strtolower($domain);
}

function homeUrl(): string {
    return baseUrl() . '/';
}

function statusBadge(string $status): string {
    if ($status === 'active') {
        return '<span class="badge badge-active"><span class="badge-dot"></span>Active</span>';
    }
    return '<span class="badge badge-expired"><span class="badge-dot"></span>Expired</span>';
}

/* ── Stats ────────────────────────────────────────────────────────────── */
$totalCount   = count($domains);
$activeCount  = 0;
$expiredCount = 0;
foreach ($domains as $d) {
    if (($d['status'] ?? 'active') === 'active') $activeCount++;
    else $expiredCount++;
}

/* ── HTML helpers ─────────────────────────────────────────────────────── */
function pageTitle(string $sub = ''): string {
    global $config;
    $base = htmlspecialchars($config['site_title']);
    return $sub ? htmlspecialchars($sub) . ' · ' . $base : $base;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $view === 'detail' ? pageTitle($currentDomain) : pageTitle() ?></title>
    <link rel="stylesheet" href="<?= htmlspecialchars(baseUrl()) ?>/style.css">
    <meta name="robots" content="noindex">
</head>
<body>

<!-- ── Header ──────────────────────────────────────────────────────────── -->
<header>
    <div class="container">
        <div class="header-inner">
            <div class="site-brand">
                <a href="<?= homeUrl() ?>" class="site-title"><?= htmlspecialchars($config['site_title']) ?></a>
                <span class="site-owner"><?= htmlspecialchars($config['owner']) ?></span>
            </div>
            <div class="header-stats">
                <div class="stat">
                    <span class="stat-value total"><?= $totalCount ?></span>
                    <span class="stat-label">Total</span>
                </div>
                <div class="stat">
                    <span class="stat-value active"><?= $activeCount ?></span>
                    <span class="stat-label">Active</span>
                </div>
                <div class="stat">
                    <span class="stat-value expired"><?= $expiredCount ?></span>
                    <span class="stat-label">Expired</span>
                </div>
            </div>
        </div>
    </div>
</header>

<main>
<div class="container">

<?php if ($view === 'list'): ?>

<!-- ── List view ───────────────────────────────────────────────────────── -->
<div class="page-hero">
    <h1>Domain Portfolio</h1>
    <p>All domains ever registered or managed by <?= htmlspecialchars($config['owner']) ?>.</p>
</div>

<div class="filter-bar">
    <div class="search-wrap">
        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none"
             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/>
        </svg>
        <input type="search" id="search" placeholder="Search domains…" autocomplete="off">
    </div>
    <button class="filter-btn active" data-filter="all">All</button>
    <button class="filter-btn active-status" data-filter="active">Active</button>
    <button class="filter-btn expired-status" data-filter="expired">Expired</button>
</div>

<div class="domain-grid" id="domainGrid">

<?php foreach ($domains as $key => $d):
    $status = $d['status'] ?? 'active';
    $from   = formatDate($d['from'] ?? null);
    $to     = ($d['to'] ?? null) ? formatDate($d['to']) : '<span class="present">Present</span>';
    $desc   = $d['description'] ?? null;
?>
    <a class="domain-card status-<?= htmlspecialchars($status) ?>"
       href="<?= domainUrl($key) ?>"
       data-status="<?= htmlspecialchars($status) ?>"
       data-domain="<?= htmlspecialchars(strtolower($key)) ?>">
        <div class="card-top">
            <span class="domain-name"><?= htmlspecialchars($key) ?></span>
            <?= statusBadge($status) ?>
        </div>
        <div class="card-dates">
            <span class="date-chip">From <span><?= $from ?></span></span>
            <span class="date-chip">&rarr;&nbsp;<span><?= $to ?></span></span>
        </div>
        <?php if ($desc): ?>
        <p class="card-desc"><?= $desc ?></p>
        <?php endif; ?>
    </a>
<?php endforeach; ?>

    <div class="no-results" id="noResults" style="display:none;">
        <strong>No domains found</strong>
        Try a different search or filter.
    </div>

</div><!-- /#domainGrid -->

<?php elseif ($view === 'detail'):
    $d      = $domains[$currentDomain];
    $status = $d['status'] ?? 'active';
    $from   = formatDate($d['from'] ?? null);
    $to     = ($d['to'] ?? null) ? formatDate($d['to']) : null;
    $desc   = $d['description'] ?? null;
?>

<!-- ── Detail view ─────────────────────────────────────────────────────── -->
<div class="detail-wrap">
    <a href="<?= homeUrl() ?>" class="back-link">
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M19 12H5"/><path d="m12 19-7-7 7-7"/>
        </svg>
        Back to list
    </a>

    <div class="detail-card">
        <div class="detail-header">
            <h1 class="detail-domain"><?= htmlspecialchars($currentDomain) ?></h1>
            <?= statusBadge($status) ?>
        </div>

        <div class="detail-meta">
            <div class="meta-item">
                <label>Registered</label>
                <span><?= $from ?></span>
            </div>
            <div class="meta-item">
                <label>Expires / Expired</label>
                <?php if ($to): ?>
                    <span><?= $to ?></span>
                <?php else: ?>
                    <span class="present">Present</span>
                <?php endif; ?>
            </div>
            <div class="meta-item">
                <label>Status</label>
                <span><?= ucfirst(htmlspecialchars($status)) ?></span>
            </div>
            <div class="meta-item">
                <label>Owner</label>
                <span><?= htmlspecialchars($config['owner']) ?></span>
            </div>
        </div>

        <?php if ($desc): ?>
        <hr class="detail-divider">
        <div class="detail-desc"><?= $desc ?></div>
        <?php endif; ?>
    </div>
</div>

<?php elseif ($view === '404'): ?>

<!-- ── 404 ─────────────────────────────────────────────────────────────── -->
<div class="not-found">
    <h1>404</h1>
    <p>No domain <strong><?= htmlspecialchars($route) ?></strong> found in the list.</p>
    <a href="<?= homeUrl() ?>" class="btn">
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M19 12H5"/><path d="m12 19-7-7 7-7"/>
        </svg>
        Back to list
    </a>
</div>

<?php endif; ?>

</div><!-- /.container -->
</main>

<!-- ── Footer ──────────────────────────────────────────────────────────── -->
<footer>
    <div class="container">
        <div class="footer-inner">
            <span class="footer-text">
                &copy; <?= date('Y') ?> <?= htmlspecialchars($config['owner']) ?>
            </span>
            <span class="footer-version">v<?= htmlspecialchars($config['version']) ?></span>
        </div>
    </div>
</footer>

<?php if ($view === 'list'): ?>
<script>
(function () {
    const search   = document.getElementById('search');
    const grid     = document.getElementById('domainGrid');
    const noResult = document.getElementById('noResults');
    const cards    = Array.from(grid.querySelectorAll('.domain-card'));
    const btns     = Array.from(document.querySelectorAll('.filter-btn'));

    let activeFilter = 'all';
    let searchVal    = '';

    function applyFilters() {
        let visible = 0;
        cards.forEach(card => {
            const domain  = card.dataset.domain || '';
            const status  = card.dataset.status || '';
            const matchF  = activeFilter === 'all' || status === activeFilter;
            const matchS  = domain.includes(searchVal);
            const show    = matchF && matchS;
            card.style.display = show ? '' : 'none';
            if (show) visible++;
        });
        noResult.style.display = visible === 0 ? '' : 'none';
    }

    search.addEventListener('input', () => {
        searchVal = search.value.trim().toLowerCase();
        applyFilters();
    });

    btns.forEach(btn => {
        btn.addEventListener('click', () => {
            btns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            activeFilter = btn.dataset.filter;
            applyFilters();
        });
    });
})();
</script>
<?php endif; ?>

</body>
</html>