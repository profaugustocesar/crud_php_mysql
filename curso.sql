-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18/03/2023 às 14:40
-- Versão do servidor: 10.4.27-MariaDB
-- Versão do PHP: 8.2.0
--

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `curso`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(80) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `criadoEm` datetime NOT NULL DEFAULT current_timestamp(),
  `modificadoEm` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `criadoEm`, `modificadoEm`) VALUES
(17, 'Augusto César', 'augusto@sistema.com', '$2y$10$EPj9KNLzlzW52OszI8Vx3e3hrgNc4XxvF8sV0GawSnS5sATts4QA2', '2023-03-16 21:25:07', '2023-03-18 09:35:25'),
(18, 'Isabela Maria', 'isabelamaria@sistema.com', '$2y$10$bRG7cqQ3gGwJSaTKvA.Jou5t1B3MAiszY5SZVA.YinvCWCZofcXPC', '2023-03-16 21:25:37', '2023-03-18 09:34:55'),
(19, 'Pedro Augusto', 'pedro@sistema.com', '$2y$10$eQfEcZIVg7aYMjSb4LeQqOMPidlRQgUSdFtzGo.7XdWpYU9QLk2YK', '2023-03-16 21:25:58', '2023-03-18 09:35:18'),
(20, 'Clóvis de Barros', 'clovis@sistema.com', '$2y$10$k0v6QeZWV5qt7/gyeajBlOsqfETi8uQtkoz6y0ytrbFPH6yZ5fDRm', '2023-03-16 21:26:24', '2023-03-18 09:35:09');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
