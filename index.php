<?php
declare(strict_types=1);

// ── Bootstrap ───────────────────────────────────────────────────────────────
$config  = require __DIR__ . '/config.php';
$domains = $config['domains'];

// ── Helpers (available to all views) ────────────────────────────────────────
function base(): string {
    $s = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
    return $s . '://' . ($_SERVER['HTTP_HOST'] ?? 'localhost')
         . rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
}
function home(): string             { return base() . '/'; }
function durl(string $d): string    { return base() . '/' . strtolower($d); }

function fmt(?string $date): string {
    if (!$date) return '—';
    $ts = strtotime($date);
    return $ts ? date('M j, Y', $ts) : htmlspecialchars($date);
}

function statusBadge(string $s): string {
    if ($s === 'active') {
        return '<span class="badge badge-active"><span class="dot"></span>Active</span>';
    }
    return '<span class="badge badge-expired"><span class="dot"></span>Expired</span>';
}

function ghIcon(int $size = 14): string {
    return '<svg xmlns="http://www.w3.org/2000/svg" width="'.$size.'" height="'.$size.'"
        viewBox="0 0 24 24" fill="currentColor"><path d="M12 0C5.37 0 0 5.373 0 12
        c0 5.303 3.438 9.8 8.207 11.387.6.113.793-.261.793-.577v-2.234
        c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756
        -1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237
        1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604
        -2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221
        -.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23
        A11.509 11.509 0 0 1 12 5.803c1.02.005 2.047.138 3.006.404
        2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176
        .77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921
        .43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576
        C20.566 21.797 24 17.3 24 12c0-6.627-5.373-12-12-12z"/></svg>';
}

function extIcon(): string {
    return '<svg xmlns="http://www.w3.org/2000/svg" width="11" height="11"
        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
        stroke-linecap="round" stroke-linejoin="round" style="opacity:.45">
        <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/>
        <polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/>
        </svg>';
}

function arrowLeft(): string {
    return '<svg xmlns="http://www.w3.org/2000/svg" width="13" height="13"
        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"
        stroke-linecap="round" stroke-linejoin="round">
        <path d="M19 12H5"/><path d="m12 19-7-7 7-7"/></svg>';
}

// ── Routing via REQUEST_URI ──────────────────────────────────────────────────
$requestUri = $_SERVER['REQUEST_URI'] ?? '/';
$path       = parse_url($requestUri, PHP_URL_PATH) ?? '/';

// Strip base path when running in a subdirectory
$basePath = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
if ($basePath !== '' && $basePath !== '/' && str_starts_with($path, $basePath)) {
    $path = substr($path, strlen($basePath));
}

$route = trim($path, '/');
if ($route === 'index.php') {
    $route = '';
}

$currentDomain = null;
$view = 'index';

if ($route !== '') {
    foreach ($domains as $key => $_) {
        if (strtolower($key) === strtolower($route)) {
            $currentDomain = $key;
            $view = 'show';
            break;
        }
    }
    if ($currentDomain === null) {
        $view = 'error';
    }
}

// ── Stats ────────────────────────────────────────────────────────────────────
$total   = count($domains);
$active  = 0;
$expired = 0;
foreach ($domains as $d) {
    ($d['status'] ?? 'active') === 'active' ? $active++ : $expired++;
}

// ── Page title ───────────────────────────────────────────────────────────────
$pageTitle = match($view) {
    'show'  => htmlspecialchars($currentDomain) . ' · ' . htmlspecialchars($config['site_title']),
    'error' => '404 · ' . htmlspecialchars($config['site_title']),
    default => htmlspecialchars($config['site_title']),
};

?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $pageTitle ?></title>
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
    <?php require __DIR__ . '/views/' . $view . '.php'; ?>
  </div>
</main>

<footer>
  <div class="wrap">
    <div class="footer-row">
      <span class="footer-copy">&copy; <?= date('Y') ?> <?= htmlspecialchars($config['owner']) ?></span>
      <span class="footer-v">v<?= htmlspecialchars($config['version']) ?></span>
    </div>
  </div>
</footer>

</body>
</html>