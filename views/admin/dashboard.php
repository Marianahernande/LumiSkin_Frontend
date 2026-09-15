<?php

// Datos (después se reemplazan por consultas a la BD)
$reservas_hoy = 8;
$ingresos_mes = 'S/ 1,240';
$ocupacion    = '72%';

$alertas = [
    ['tipo' => 'danger',  'texto' => 'Fabiana Ortiz canceló su cita de Hidratación con Colágeno', 'tiempo' => 'hace 2h'],
    ['tipo' => 'warning', 'texto' => 'Reserva #103 pendiente de confirmación',                    'tiempo' => 'hace 4h'],
    ['tipo' => 'success', 'texto' => 'Nueva reserva: Camila Herrera — Masaje Relajante',          'tiempo' => 'hace 5h'],
];

$calendario = [
    ['dia' => 4,  'citas' => 3, 'hoy' => false],
    ['dia' => 5,  'citas' => 5, 'hoy' => false],
    ['dia' => 6,  'citas' => 2, 'hoy' => false],
    ['dia' => 7,  'citas' => 6, 'hoy' => false],
    ['dia' => 8,  'citas' => 4, 'hoy' => false],
    ['dia' => 9,  'citas' => 1, 'hoy' => false],
    ['dia' => 10, 'citas' => 0, 'hoy' => true],
];

$pagina_activa = 'dashboard';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard — Dahlia Admin</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../assets/style/admin/dashboard.css">
</head>
<body>
  <div class="app">

    <aside class="sidebar">
      <div class="sidebar__brand">
        <div class="sidebar__logo">D</div>
        <span class="sidebar__brand-name">Dahlia · Admin</span>
      </div>

      <nav class="sidebar__nav">
        <a href="dashboard.php" class="nav-link <?= $pagina_activa === 'dashboard' ? 'nav-link--active' : '' ?>">
          <?php if ($pagina_activa === 'dashboard'): ?><span class="nav-link__dot"></span><?php endif; ?>
          Dashboard
        </a>
        <a href="reservas.php" class="nav-link">Gestionar reservas</a>
        <a href="servicios.php" class="nav-link">Servicios</a>
        <a href="auditoria.php" class="nav-link">Auditoría</a>
        <a href="perfil.php" class="nav-link">Mi perfil</a>
      </nav>

      <div class="sidebar__footer">
        <a href="#" class="sidebar__logout">Cerrar sesión</a>
      </div>
    </aside>

    <main class="main">
      <header class="page-header">
        <h1 class="page-title">Dashboard</h1>
      </header>

      <section class="stats">
        <article class="stat-card">
          <p class="stat-card__label">Reservas hoy</p>
          <p class="stat-card__value"><?= $reservas_hoy ?></p>
        </article>
        <article class="stat-card">
          <p class="stat-card__label">Ingresos del mes</p>
          <p class="stat-card__value"><?= htmlspecialchars($ingresos_mes) ?></p>
        </article>
        <article class="stat-card">
          <p class="stat-card__label">Ocupación</p>
          <p class="stat-card__value"><?= htmlspecialchars($ocupacion) ?></p>
        </article>
      </section>

      <div class="section-grid">
        <section class="card">
          <h2 class="card__title">Alertas y cancelaciones recientes</h2>
          <div class="alert-list">
            <?php foreach ($alertas as $alerta): ?>
              <article class="alert-item">
                <span class="alert-item__dot alert-item__dot--<?= $alerta['tipo'] ?>"></span>
                <div class="alert-item__body">
                  <p class="alert-item__text"><?= htmlspecialchars($alerta['texto']) ?></p>
                </div>
                <span class="alert-item__time"><?= htmlspecialchars($alerta['tiempo']) ?></span>
              </article>
            <?php endforeach; ?>
          </div>
        </section>

        <section class="card">
          <h2 class="card__title">Calendario de citas · esta semana</h2>
          <div class="calendar">
            <div class="calendar__day-name">Lun</div>
            <div class="calendar__day-name">Mar</div>
            <div class="calendar__day-name">Mié</div>
            <div class="calendar__day-name">Jue</div>
            <div class="calendar__day-name">Vie</div>
            <div class="calendar__day-name">Sáb</div>
            <div class="calendar__day-name">Dom</div>

            <?php foreach ($calendario as $dia): ?>
              <div class="calendar__day<?= $dia['hoy'] ? ' calendar__day--today' : '' ?>">
                <?= $dia['dia'] ?>
                <span class="calendar__count"><?= $dia['citas'] ?></span>
              </div>
            <?php endforeach; ?>
          </div>
        </section>
      </div>
    </main>

  </div>
</body>
</html>
