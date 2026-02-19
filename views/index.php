<?php
// $domains, $config, helpers all available from root index.php
?>

<div class="hero">
  <h1>Domain Portfolio</h1>
  <p>All domains registered or managed by <?= htmlspecialchars($config['owner']) ?>.</p>
</div>

<!-- Filters -->
<div class="filters">
  <div class="search-box">
    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
         stroke-linejoin="round">
      <circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/>
    </svg>
    <input type="search" id="search" placeholder="Search domains…" autocomplete="off">
  </div>
  <button class="fbtn on"       data-f="all">All</button>
  <button class="fbtn on-green" data-f="active">Active</button>
  <button class="fbtn on-red"   data-f="expired">Expired</button>
</div>

<!-- Grid -->
<div class="grid" id="grid">

<?php foreach ($domains as $key => $d):
  $status     = $d['status']       ?? 'active';
  $from       = fmt($d['from']     ?? null);
  $to         = $d['to']           ?? null;
  $desc       = $d['description']  ?? null;
  $subdomains = $d['subdomains']   ?? null;
  $subCount   = !empty($subdomains) ? count($subdomains) : 0;
?>
  <a class="card <?= $status ?>"
     href="<?= durl($key) ?>"
     data-s="<?= $status ?>"
     data-d="<?= htmlspecialchars(strtolower($key)) ?>">

    <div class="card-head">
      <span class="card-name"><?= htmlspecialchars($key) ?></span>
      <div class="card-badges">
        <?php if ($subCount > 0): ?>
          <span class="badge badge-sub" title="<?= $subCount ?> subdomain<?= $subCount !== 1 ? 's' : '' ?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="9" height="9" viewBox="0 0 24 24"
                 fill="none" stroke="currentColor" stroke-width="2.5"
                 stroke-linecap="round" stroke-linejoin="round">
              <rect x="2" y="3" width="20" height="14" rx="2"/>
              <line x1="8" y1="21" x2="16" y2="21"/>
              <line x1="12" y1="17" x2="12" y2="21"/>
            </svg>
            <?= $subCount ?>
          </span>
        <?php endif; ?>
        <?= statusBadge($status) ?>
      </div>
    </div>

    <div class="card-dates">
      <span class="date-item">From&nbsp;<em><?= $from ?></em></span>
      <span class="date-item">
        &rarr;&nbsp;<?php if ($to): ?>
          <em><?= fmt($to) ?></em>
        <?php else: ?>
          <em class="present">Present</em>
        <?php endif; ?>
      </span>
    </div>

    <?php if ($desc): ?>
    <p class="card-desc"><?= htmlspecialchars($desc) ?></p>
    <?php endif; ?>

  </a>
<?php endforeach; ?>

  <div class="empty" id="empty" style="display:none">
    <strong>No domains found</strong>Try a different search term or filter.
  </div>

</div><!-- /#grid -->

<script>
(function () {
  const search = document.getElementById('search');
  const grid   = document.getElementById('grid');
  const empty  = document.getElementById('empty');
  const cards  = Array.from(grid.querySelectorAll('.card'));
  const btns   = Array.from(document.querySelectorAll('.fbtn'));
  let filter = 'all', q = '';

  function run() {
    let n = 0;
    cards.forEach(c => {
      const ok = (filter === 'all' || c.dataset.s === filter)
              && c.dataset.d.includes(q);
      c.style.display = ok ? '' : 'none';
      if (ok) n++;
    });
    empty.style.display = n ? 'none' : '';
  }

  search.addEventListener('input', () => {
    q = search.value.trim().toLowerCase();
    run();
  });

  btns.forEach(b => {
    b.addEventListener('click', () => {
      btns.forEach(x => { x.className = 'fbtn'; });
      if (b.dataset.f === 'all')     b.classList.add('on');
      if (b.dataset.f === 'active')  b.classList.add('on-green');
      if (b.dataset.f === 'expired') b.classList.add('on-red');
      filter = b.dataset.f;
      run();
    });
  });
})();
</script>