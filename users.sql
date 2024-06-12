-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12/06/2024 às 22:57
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `laravel`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'dsadsa', 'jose@gmail.com', NULL, '$2y$10$MMQEU2tEzlbfUS/doJNyjO6cwTgqA97r9jhaLQccRaBwqGa7M.tdK', NULL, '2024-06-05 23:12:15', '2024-06-05 23:12:15'),
(2, 'dsadsa', 'esc@gmail.com', NULL, '$2y$10$eCTSINl.kT9LtfnWnj6HcOIco5CR3F1ci1z3ZRlFRBQp7lYRTsUJi', NULL, '2024-06-05 23:13:31', '2024-06-05 23:13:31'),
(3, 'dsadsa', 'esca@gmail.com', NULL, '$2y$10$DDKnv9SeWPeNcTayKzMIkuQF3RRr/nZF5PVUw4UmOtyvYWvjA5SgS', NULL, '2024-06-05 23:14:27', '2024-06-05 23:14:27'),
(4, 'J', 'j@gmail.com', NULL, '$2y$10$wu5h7HU1z410dJOStAlvzO1cbl59SxAXqmYTULVco8vWvpUiz//Xi', NULL, '2024-06-12 22:00:47', '2024-06-12 22:00:47'),
(5, 'João Carpim Souza', 'joaocarpim@gmail.com', NULL, '$2y$10$fXKKYV9B2B5yPIV.y1mwfuaeVV8WqBNXWRAjUPq3Y9uUdnBBcmEKG', NULL, '2024-06-12 22:35:05', '2024-06-12 23:38:54');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
