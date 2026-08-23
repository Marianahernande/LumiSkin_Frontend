-- ============================================
-- Plataforma de Gestión de Citas — Centro de Estética
-- Script completo para MySQL / XAMPP
-- Cómo usarlo: abre phpMyAdmin → pestaña "Importar" → elige este archivo → Continuar
-- Se crea la base de datos completa de un solo golpe, no hace falta hacer nada más antes.
-- ============================================

CREATE DATABASE IF NOT EXISTS citas_estetica CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE citas_estetica;

-- ============================================
-- TABLAS
-- ============================================

CREATE TABLE Roles (
  id_rol INT AUTO_INCREMENT PRIMARY KEY,
  nombre_rol VARCHAR(50) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE Usuarios (
  id_usuario INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  correo VARCHAR(150) NOT NULL UNIQUE,
  password_hash VARCHAR(255) NOT NULL,
  id_rol INT NOT NULL,
  creado_en DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (id_rol) REFERENCES Roles(id_rol)
) ENGINE=InnoDB;

CREATE TABLE Servicios (
  id_servicio INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  duracion_min INT NOT NULL,
  precio DECIMAL(10,2) NOT NULL,
  activo BOOLEAN DEFAULT TRUE
) ENGINE=InnoDB;

CREATE TABLE Reservas (
  id_reserva INT AUTO_INCREMENT PRIMARY KEY,
  id_usuario INT NOT NULL,
  id_servicio INT NOT NULL,
  fecha_hora_inicio DATETIME NOT NULL,
  fecha_hora_fin DATETIME NOT NULL,
  estado_actual VARCHAR(20) DEFAULT 'pendiente',
  creado_en DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (id_usuario) REFERENCES Usuarios(id_usuario),
  FOREIGN KEY (id_servicio) REFERENCES Servicios(id_servicio)
) ENGINE=InnoDB;

CREATE TABLE Historial_Estados (
  id_historial INT AUTO_INCREMENT PRIMARY KEY,
  id_reserva INT NOT NULL,
  estado_anterior VARCHAR(20),
  estado_nuevo VARCHAR(20),
  cambiado_por INT,
  cambiado_en DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (id_reserva) REFERENCES Reservas(id_reserva),
  FOREIGN KEY (cambiado_por) REFERENCES Usuarios(id_usuario)
) ENGINE=InnoDB;

CREATE TABLE Logs_Auditoria (
  id_log INT AUTO_INCREMENT PRIMARY KEY,
  id_usuario INT,
  accion VARCHAR(50) NOT NULL,
  tabla_afectada VARCHAR(50),
  id_registro_afectado INT,
  detalle JSON,
  ejecutado_en DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (id_usuario) REFERENCES Usuarios(id_usuario)
) ENGINE=InnoDB;

-- ============================================
-- ÍNDICES
-- ============================================

CREATE INDEX idx_disponibilidad ON Reservas (id_servicio, fecha_hora_inicio, fecha_hora_fin);
CREATE INDEX idx_estado_reserva ON Reservas (estado_actual);

-- ============================================
-- TRIGGERS — validar solapamiento
-- MySQL no tiene OVERLAPS ni permite un trigger para INSERT y UPDATE juntos,
-- por eso van separados y la comparación de rangos es manual.
-- ============================================

DELIMITER $$

CREATE TRIGGER trg_validar_solapamiento_insert
BEFORE INSERT ON Reservas
FOR EACH ROW
BEGIN
  DECLARE conflictos INT;

  SELECT COUNT(*) INTO conflictos
  FROM Reservas
  WHERE id_servicio = NEW.id_servicio
    AND estado_actual <> 'cancelado'
    AND NEW.fecha_hora_inicio < fecha_hora_fin
    AND NEW.fecha_hora_fin > fecha_hora_inicio;

  IF conflictos > 0 THEN
    SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Ya existe una reserva en ese bloque de tiempo';
  END IF;
END$$

CREATE TRIGGER trg_validar_solapamiento_update
BEFORE UPDATE ON Reservas
FOR EACH ROW
BEGIN
  DECLARE conflictos INT;

  SELECT COUNT(*) INTO conflictos
  FROM Reservas
  WHERE id_servicio = NEW.id_servicio
    AND estado_actual <> 'cancelado'
    AND id_reserva <> OLD.id_reserva
    AND NEW.fecha_hora_inicio < fecha_hora_fin
    AND NEW.fecha_hora_fin > fecha_hora_inicio;

  IF conflictos > 0 THEN
    SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Ya existe una reserva en ese bloque de tiempo';
  END IF;
END$$

DELIMITER ;

-- ============================================
-- DATOS BASE — para que la demo de esta noche ya tenga algo que mostrar
-- ============================================

INSERT INTO Roles (nombre_rol) VALUES ('cliente'), ('admin');

INSERT INTO Servicios (nombre, duracion_min, precio, activo) VALUES
  ('Facial hidratante', 45, 80000, TRUE),
  ('Masaje relajante', 60, 120000, TRUE),
  ('Manicure spa', 40, 45000, TRUE),
  ('Depilación facial', 20, 30000, TRUE);

-- Nota: no se insertan usuarios de ejemplo porque la contraseña debe pasar por
-- password_hash() en PHP, no se puede escribir el hash a mano de forma segura.
-- Regístrense desde la app una vez conectada al backend.
