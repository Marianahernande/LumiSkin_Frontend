<?php


$servicios = [
    ['nombre' => 'Limpieza Facial Profunda',  'duracion' => '60 min', 'precio' => 'S/ 45', 'activo' => true],
    ['nombre' => 'Hidratación con Colágeno',  'duracion' => '45 min', 'precio' => 'S/ 38', 'activo' => true],
    ['nombre' => 'Masaje Relajante Corporal', 'duracion' => '60 min', 'precio' => 'S/ 50', 'activo' => true],
    ['nombre' => 'Exfoliación Corporal',      'duracion' => '45 min', 'precio' => 'S/ 40', 'activo' => true],
    ['nombre' => 'Manicura Spa',              'duracion' => '40 min', 'precio' => 'S/ 22', 'activo' => true],
    ['nombre' => 'Pedicura Spa',              'duracion' => '50 min', 'precio' => 'S/ 28', 'activo' => true],
];

$pagina_activa = 'servicios';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestión de servicios — Dahlia Admin</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../assets/style/admin/servicios.css">
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
        <a href="servicios.php" class="nav-link <?= $pagina_activa === 'servicios' ? 'nav-link--active' : '' ?>">
          <?php if ($pagina_activa === 'servicios'): ?><span class="nav-link__dot"></span><?php endif; ?>
          Servicios
        </a>
        <a href="auditoria.php" class="nav-link">Auditoría</a>
        <a href="perfil.php" class="nav-link">Mi perfil</a>
      </nav>

      <div class="sidebar__footer">
        <a href="#" class="sidebar__logout">Cerrar sesión</a>
      </div>
    </aside>

    <main class="main">
      <header class="page-header">
        <h1 class="page-title">Gestión de servicios</h1>
        <button type="button" class="btn btn--primary">+ Nuevo servicio</button>
      </header>

      <div class="table-card">
        <div class="table-scroll">
          <table>
            <thead>
              <tr>
                <th>Servicio</th>
                <th>Duración</th>
                <th>Precio</th>
                <th>Estado</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($servicios as $s): ?>
                <tr>
                  <td><?= htmlspecialchars($s['nombre']) ?></td>
                  <td><?= htmlspecialchars($s['duracion']) ?></td>
                  <td><?= htmlspecialchars($s['precio']) ?></td>
                  <td>
                    <?php if ($s['activo']): ?>
                      <span class="badge badge--success">Activo</span>
                    <?php else: ?>
                      <span class="badge">Inactivo</span>
                    <?php endif; ?>
                  </td>
                  <td>
                    <div class="btn-group">
                      <button type="button" class="btn btn--outline btn--sm">Editar</button>
                      <button type="button" class="btn btn--danger-outline btn--sm">Desactivar</button>
                    </div>
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
