
CREATE DATABASE IF NOT EXISTS `flyfly` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE `flyfly`;

CREATE TABLE `clients` (
  `passaport_client` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_cognoms` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edat` int NOT NULL,
  `telefon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adreca` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ciutat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pais` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipus_targeta` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero_targeta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`passaport_client`),
  UNIQUE KEY `clients_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE `reserva` (
  `passaport_client` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codi_vol` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `localitzador` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero_seient` int NOT NULL,
  `equipatge_ma` enum('sí','no') COLLATE utf8mb4_unicode_ci NOT NULL,
  `equipatge_cabina` enum('sí','no') COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantitat_equipatges` int NOT NULL,
  `tipus_assegurança` enum('Franquícia fins a 1000 Euros','Franquícia fins 500 Euros','Sense franquícia') COLLATE utf8mb4_unicode_ci NOT NULL,
  `preu_vol` decimal(8,2) NOT NULL,
  `tipus_checking` enum('on-line','mostrador','quiosc') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`passaport_client`,`codi_vol`),
  UNIQUE KEY `reserva_localitzador_unique` (`localitzador`),
  KEY `reserva_codi_vol_foreign` (`codi_vol`),
  CONSTRAINT `reserva_codi_vol_foreign` FOREIGN KEY (`codi_vol`) REFERENCES `vols` (`codi_vol`) ON DELETE CASCADE,
  CONSTRAINT `reserva_passaport_client_foreign` FOREIGN KEY (`passaport_client`) REFERENCES `clients` (`passaport_client`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `treballadors` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nom_cognoms` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contrasenya` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `darrera_hora_entrada` timestamp NULL DEFAULT NULL,
  `darrera_hora_sortida` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `treballadors_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE `vols` (
  `codi_vol` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codi_model_avio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ciutat_origen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ciutat_destinacio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `terminal_origen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `terminal_destinacio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_sortida` date NOT NULL,
  `data_arribada` date NOT NULL,
  `hora_sortida` time NOT NULL,
  `hora_arribada` time NOT NULL,
  `classe` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`codi_vol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO flyfly.treballadors
(id, nom_cognoms, email, contrasenya, tipus, darrera_hora_entrada, darrera_hora_sortida, created_at, updated_at)
VALUES(1, 'Oriol Fernandez', 'oriol@gmail.com', '$2y$12$5xINKFU0txZQuWiZr1yz5uv4ECP8BamRm6epVznPmWJXXmSFbZPEy', 'Cap', '2024-04-08 16:10:51', '2024-04-08 16:10:51', '2024-04-04 16:10:51', '2024-04-08 15:51:10');

CREATE USER 'root'@'localhost' IDENTIFIED BY '1234';
GRANT ALL PRIVILEGES ON flyfly.* TO 'root'@'localhost';
FLUSH PRIVILEGES;
