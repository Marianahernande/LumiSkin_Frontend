<?php
/**
 * Mi perfil — Dahlia Admin
 * Estilos: css/perfil.css
 */

$nombre = 'María Torres';
$email  = 'maria.torres@dahliabeaute.com';
$rol    = 'Administrador';

$pagina_activa = 'perfil';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mi perfil — Dahlia Admin</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../assets/style/admin/perfil.css">
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
        <a href="auditoria.php" class="nav-link">Auditoría</a>
        <a href="perfil.php" class="nav-link <?= $pagina_activa === 'perfil' ? 'nav-link--active' : '' ?>">
          <?php if ($pagina_activa === 'perfil'): ?><span class="nav-link__dot"></span><?php endif; ?>
          Mi perfil
        </a>
      </nav>

      <div class="sidebar__footer">
        <a href="#" class="sidebar__logout">Cerrar sesión</a>
      </div>
    </aside>

    <main class="main">
      <header class="page-header">
        <h1 class="page-title">Mi perfil</h1>
      </header>

      <form class="form-card" method="post" action="">
        <div class="form-group">
          <label for="nombre">Nombre completo</label>
          <input type="text" id="nombre" name="nombre" class="form-control"
                 value="<?= htmlspecialchars($nombre) ?>">
        </div>

        <div class="form-group">
          <label for="email">Correo electrónico</label>
          <input type="email" id="email" name="email" class="form-control"
                 value="<?= htmlspecialchars($email) ?>">
        </div>

        <div class="form-group">
          <label for="rol">Rol</label>
          <input type="text" id="rol" name="rol" class="form-control"
                 value="<?= htmlspecialchars($rol) ?>" readonly>
        </div>

        <button type="submit" class="btn btn--primary">Guardar cambios</button>
      </form>

      <section class="btn-guide">
        <p class="btn-guide__title">Estados de botón — guía de componentes</p>
        <div class="btn-states">
          <div class="btn-state">
            <button type="button" class="btn btn--primary">Reposo</button>
            <p class="btn-state__label">Reposo</p>
          </div>
          <div class="btn-state">
            <button type="button" class="btn btn--primary btn--hover-sim">Hover</button>
            <p class="btn-state__label">Hover (simulado)</p>
          </div>
          <div class="btn-state">
            <button type="button" class="btn btn--primary btn--loading" disabled>Cargando</button>
            <p class="btn-state__label">Cargando</p>
          </div>
          <div class="btn-state">
            <button type="button" class="btn btn--disabled-look" disabled>Deshabilitado</button>
            <p class="btn-state__label">Deshabilitado</p>
          </div>
        </div>
      </section>
    </main>

  </div>
</body>
</html>
