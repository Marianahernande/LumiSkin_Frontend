<?php
/**
 * Gestionar reservas — Dahlia Admin
 * Estilos: css/reservas.css
 */

$reservas = [
    ['cliente' => 'Valentina Ríos',  'servicio' => 'Limpieza Facial Profunda',  'fecha' => '10 ago 2026 · 09:00–10:00', 'estado' => 'pendiente'],
    ['cliente' => 'Camila Herrera',  'servicio' => 'Masaje Relajante Corporal', 'fecha' => '10 ago 2026 · 10:30–11:30', 'estado' => 'en-proceso'],
    ['cliente' => 'Sofía Delgado',   'servicio' => 'Manicura Spa',              'fecha' => '10 ago 2026 · 11:00–11:40', 'estado' => 'pendiente'],
    ['cliente' => 'Renata Ibáñez',   'servicio' => 'Pedicura Spa',              'fecha' => '10 ago 2026 · 13:00–13:50', 'estado' => 'finalizado'],
    ['cliente' => 'Fabiana Ortiz',   'servicio' => 'Hidratación con Colágeno',  'fecha' => '9 ago 2026 · 16:00–16:45',  'estado' => 'cancelado'],
    ['cliente' => 'Antonella Vega',  'servicio' => 'Exfoliación Corporal',      'fecha' => '9 ago 2026 · 17:00–17:45',  'estado' => 'finalizado'],
];

$estados = [
    'pendiente'  => 'Pendiente',
    'en-proceso' => 'En proceso',
    'finalizado' => 'Finalizado',
    'cancelado'  => 'Cancelado',
];

$pagina_activa = 'reservas';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestionar reservas — Dahlia Admin</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../assets/style/admin/reservas.css">
</head>
<body>
  <div class="app">

    <aside class="sidebar">
      <div class="sidebar__brand">
        <div class="sidebar__logo">D</div>
        <span class="sidebar__brand-name">Dahlia · Admin</span>
      </div>

      <nav class="sidebar__nav">
        <a href="dashboard.php" class="nav-link">Dashboard</a>
        <a href="reservas.php" class="nav-link <?= $pagina_activa === 'reservas' ? 'nav-link--active' : '' ?>">
          <?php if ($pagina_activa === 'reservas'): ?><span class="nav-link__dot"></span><?php endif; ?>
          Gestionar reservas
        </a>
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
        <h1 class="page-title">Gestionar reservas</h1>
      </header>

      <div class="table-card">
        <div class="table-scroll">
          <table>
            <thead>
              <tr>
                <th>Cliente</th>
                <th>Servicio</th>
                <th>Fecha / Hora</th>
                <th>Estado</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($reservas as $r): ?>
                <tr>
                  <td><?= htmlspecialchars($r['cliente']) ?></td>
                  <td><?= htmlspecialchars($r['servicio']) ?></td>
                  <td><?= htmlspecialchars($r['fecha']) ?></td>
                  <td>
                    <select class="status-select status-select--<?= $r['estado'] ?>">
                      <?php foreach ($estados as $valor => $etiqueta): ?>
                        <option value="<?= $valor ?>" <?= $valor === $r['estado'] ? 'selected' : '' ?>>
                          <?= $etiqueta ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </main>

  </div>
</body>
</html>
