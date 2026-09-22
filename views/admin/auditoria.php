<?php
/**
 * Auditoría — Dahlia Admin
 * Estilos: css/auditoria.css
 */

$logs = [
    ['usuario' => 'Admin María Torres', 'accion' => 'Cambió estado de reserva #101', 'detalle' => 'Pendiente → En proceso',             'fecha' => '10 ago 2026, 09:14'],
    ['usuario' => 'Admin María Torres', 'accion' => 'Canceló reserva #105',          'detalle' => 'Motivo: cliente no se presentó',    'fecha' => '09 ago 2026, 18:02'],
    ['usuario' => 'Admin Jorge Salas',  'accion' => 'Desactivó servicio',            'detalle' => 'Depilación Facial',                  'fecha' => '08 ago 2026, 14:37'],
    ['usuario' => 'Admin Jorge Salas',  'accion' => 'Creó servicio',                 'detalle' => 'Exfoliación Corporal — S/ 40',       'fecha' => '05 ago 2026, 10:20'],
    ['usuario' => 'Admin María Torres', 'accion' => 'Editó servicio',                'detalle' => 'Manicura Spa: precio S/ 20 → S/ 22', 'fecha' => '03 ago 2026, 11:45'],
];

$pagina_activa = 'auditoria';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Auditoría — Dahlia Admin</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../assets/style/admin/auditoria.css">
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
        <a href="reservas.php" class="nav-link">Gestionar reservas</a>
        <a href="servicios.php" class="nav-link">Servicios</a>
        <a href="auditoria.php" class="nav-link <?= $pagina_activa === 'auditoria' ? 'nav-link--active' : '' ?>">
          <?php if ($pagina_activa === 'auditoria'): ?><span class="nav-link__dot"></span><?php endif; ?>
          Auditoría
        </a>
        <a href="perfil.php" class="nav-link">Mi perfil</a>
      </nav>

      <div class="sidebar__footer">
        <a href="#" class="sidebar__logout">Cerrar sesión</a>
      </div>
    </aside>

    <main class="main">
      <header class="page-header">
        <h1 class="page-title">Auditoría</h1>
      </header>

      <div class="table-card">
        <div class="table-scroll">
          <table>
            <thead>
              <tr>
                <th>Usuario</th>
                <th>Acción</th>
                <th>Detalle</th>
                <th>Fecha</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($logs as $log): ?>
                <tr>
                  <td><?= htmlspecialchars($log['usuario']) ?></td>
                  <td><?= htmlspecialchars($log['accion']) ?></td>
                  <td><?= htmlspecialchars($log['detalle']) ?></td>
                  <td><?= htmlspecialchars($log['fecha']) ?></td>
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
