<?php

$links = [

  [
    'url' => 'admin/dashboard',
    'name' => 'dashbord',
    'icon' => 'bi bi-bar-chart-fill',
    'roles' => ['SA', 'CS', 'ART', 'RPT', 'STC'],
  ],
  [
    'url' => 'admin/profile',
    'name' => 'profile',
    'icon' => 'bi bi-person-circle',
    'roles' => ['SA', 'CS', 'ART', 'RPT', 'STC'],
  ],
  [
    'url' => 'admin/users',
    'name' => 'utilisateurs',
    'icon' => 'fa-solid fa-users',
    'roles' => ['SA'],
  ],
  [
    'url' => 'admin/partners',
    'name' => 'partenaires',
    'icon' => 'fa-solid fa-handshake',
    'roles' => ['SA'],
  ],
  [
    'url' => 'admin/operations',
    'name' => 'operations',
    'icon' => 'bi bi-gear',
    'roles' => ['SA'],
  ],
  [
    'url' => 'admin/connexions',
    'name' => 'connexions',
    'icon' => 'bi bi-link',
    'roles' => ['SA'],
  ],
  [
    'url' => 'admin/roles',
    'name' => 'roles',
    'icon' => 'bi bi-clipboard-data',
    'roles' => ['SA'],
  ],
  [
    'url' => 'admin/rapports',
    'name' => 'rapports',
    'icon' => 'bi bi-clipboard ',
    'roles' => ['SA', 'CS', 'RPT'],
  ],
  [
    'url' => 'admin/articles',
    'name' => 'articles',
    'icon' => 'bi bi-newspaper ',
    'roles' => ['SA', 'CS', 'ART'],
  ],
  [
    'url' => 'admin/populations',
    'name' => 'populations',
    'icon' => 'fa-solid fa-chart-line',
    'roles' => ['SA', 'CS', 'STC'],
  ],

];
?>

<div class="w-100 bg-gradient h-100" id="sidebar">
  <!-- profile -->
  <div class="w-100 text text-end d-block d-md-none">
    <button class="btn btn-sm fs-2 p-0 btn-outline-light" onclick="toggleSideBar()">

      <i class="bi bi-x"></i>
    </button>
  </div>
  <div class="d-flex fs-5">

    <div class="w-100 text-center d-flex flex-column align-items-center" id="logo">
      <i class="bi bi-person-circle mx-auto " style='font-size:60px;'></i>
      <span>
        <?= auth()->user()['prenom_fr'] . " " . auth()->user()['nom_fr'] ?>
      </span>
    </div>
  </div>
  <div>

    <ul class="list-group mt-5 d-flex flex-column gap-1 pb-2">
      <?php foreach ($links as $link): ?>
        <?php
        if (!in_array(auth()->user()['role']['code'], $link['roles']))
          continue;
        ?>
        <li class=" fs-5 rounded <?= str_starts_with(request()->route(), $link['url']) ? 'active' : '' ?>">
          <a href="<?= route($link['url']) ?>" class="d-flex gap-2 py-2 px-3">
            <i class="<?= $link['icon'] ?>"></i>
            <span>
              <?= $link['name'] ?>
            </span>
          </a>
        </li>
      <?php endforeach; ?>

    </ul>


  </div>
</div>