-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 10, 2023 lúc 10:52 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `hotel`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `anhdichvu`
--

CREATE TABLE `anhdichvu` (
  `id` varchar(20) NOT NULL,
  `linkAnh` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `anhdichvu`
--

INSERT INTO `anhdichvu` (`id`, `linkAnh`) VALUES
('h1', 'https://images.unsplash.com/photo-1680263202313-852e5189e823?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=982&q=80'),
('h1', 'https://images.unsplash.com/photo-1680188591320-89711f6e6d7d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=435&q=80'),
('h1', 'https://images.unsplash.com/photo-1680186434161-5f72fc76c8dd?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=464&q=80'),
('h2', 'https://images.unsplash.com/photo-1659482633371-c51d3a02bc81?ixlib=rb-4.0.3&ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80'),
('h2', 'https://plus.unsplash.com/premium_photo-1679492942738-5f1a98810609?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80'),
('h2', 'https://plus.unsplash.com/premium_photo-1670270312555-ee722a1bbc4c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1112&q=80'),
('h3', 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80'),
('h3', 'https://images.unsplash.com/photo-1555939594-58d7cb561ad1?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80'),
('h3', 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80'),
('h4', 'https://plus.unsplash.com/premium_photo-1675937428926-985c55809ac9?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8d2FzaGluZyUyMG1hY2hpbmV8ZW58MHx8MHx8&auto=format&fit=crop&w=500&q=60'),
('h4', 'https://images.unsplash.com/photo-1626806819282-2c1dc01a5e0c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8d2FzaGluZyUyMG1hY2hpbmV8ZW58MHx8MHx8&auto=format&fit=crop&w=500&q=60'),
('h4', 'https://images.unsplash.com/photo-1577553698923-17f1a80ce5bc?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80'),
('h5', 'https://images.unsplash.com/photo-1544161515-4ab6ce6db874?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8c3BhfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60'),
('h5', 'https://images.unsplash.com/photo-1600334089648-b0d9d3028eb2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8c3BhfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60'),
('h5', 'https://images.unsplash.com/photo-1596178060671-7a80dc8059ea?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTJ8fHNwYXxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60'),
('h6', 'https://images.unsplash.com/photo-1542766788-a2f588f447ee?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8Zml0bmVzcyUyMGNlbnRlcnxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60'),
('h6', 'https://images.unsplash.com/photo-1571902943202-507ec2618e8f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8Zml0bmVzcyUyMGNlbnRlcnxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60'),
('h6', 'https://images.unsplash.com/photo-1620188467120-5042ed1eb5da?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTJ8fGZpdG5lc3MlMjBjZW50ZXJ8ZW58MHx8MHx8&auto=format&fit=crop&w=500&q=60');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
