-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 15, 2024 at 02:28 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bpr`
--

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `id` int NOT NULL,
  `nama_batch` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `status` enum('Open','Close') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`id`, `nama_batch`, `tanggal`, `status`) VALUES
(1, 'batch 1', '2023-12-13', 'Close'),
(3, 'batch 2', '2023-12-28', 'Open');

-- --------------------------------------------------------

--
-- Table structure for table `departemen`
--

CREATE TABLE `departemen` (
  `id` int NOT NULL,
  `nama_departemen` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `departemen`
--

INSERT INTO `departemen` (`id`, `nama_departemen`) VALUES
(1, 'SDM'),
(3, 'IT 2');

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `nik` varchar(254) NOT NULL,
  `username` varchar(254) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `posisi` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `jenis_kelamin` varchar(254) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tempat_lahir` varchar(10) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tingkat_pendidikan` varchar(8) NOT NULL,
  `asal_sekolah` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `nomor_hp` varchar(254) NOT NULL,
  `epi` int NOT NULL,
  `pengalaman` text NOT NULL,
  `sosmed` varchar(15) NOT NULL,
  `berkas` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` enum('witing','ditolak','diterima','') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'witing'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`id`, `user_id`, `nik`, `username`, `nama`, `posisi`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `tingkat_pendidikan`, `asal_sekolah`, `alamat`, `nomor_hp`, `epi`, `pengalaman`, `sosmed`, `berkas`, `status`) VALUES
(1, 43, '3213182504000001', 'tedi', 'Eya Surtiana', 'ux', 'Perempuan', 'subang', '2024-01-10', 's3', 'polsub', 'Dusun Parigisari', '085324087528', 123, 'ssmecjw', 'ig', '1704604628.pdf', 'ditolak'),
(3, 44, '26387638', 'lana', 'Lana', 'ui', 'Laki-laki', 'subang', '2024-01-09', 'd3', 'sma', 'Jl. mayang Desa Mayang RT 003 RW 001', '836923698', 123, 'akkjashnkkja  ajkc', 'ig', '1704728468.pdf', 'ditolak');

-- --------------------------------------------------------

--
-- Table structure for table `lowongan_kerja`
--

CREATE TABLE `lowongan_kerja` (
  `id` int NOT NULL,
  `batch_id` int DEFAULT NULL,
  `posisi` varchar(15) NOT NULL,
  `departemen_id` int DEFAULT NULL,
  `persyaratan` text NOT NULL,
  `tugas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `lowongan_kerja`
--

INSERT INTO `lowongan_kerja` (`id`, `batch_id`, `posisi`, `departemen_id`, `persyaratan`, `tugas`) VALUES
(7, NULL, 'ux', 1, 'S2', 'Desain 3'),
(8, NULL, 'ui', 3, 's1', 'desain'),
(9, 3, 'Baru', 1, 'Baru', 'Baru'),
(10, 1, 'Bru', 1, 'Baru', 'Baru');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(30) NOT NULL,
  `level` varchar(10) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `email verified at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `confirm_password` varchar(255) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `level`, `email`, `email verified at`, `password`, `confirm_password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'tedi', 'admin', 'tedi@gmail.com', NULL, '$2y$10$fTjXjPKKS.Bo.7D4CYNmFuBn.rtRcI3NixRHFoPXbtJgR0lXx2t22', '', 'NqY58OQWLZIfqusYKSOYE2G2T1s8APft2VBICqXTXsVKmnmy5ziSjhkp5glo', '2020-11-09 23:38:29', '2024-01-15 07:25:31'),
(3, 'adiat', 'user', 'adiat@gmail.com', NULL, '$2y$10$4aqJw1LPACj3omgxIcMRAeMlil0G4rf0I7VruG7tKMUQqPsSrjLda', '', 'yEQCE939k2tt8G5VzYB1N13YYTnRNYdEisLujc3ImXYrN4XKeGy5dUH5UgU0', '2020-11-12 21:28:24', '2020-11-18 18:53:58'),
(23, 'bob', 'user', 'bob@gmail.com', NULL, '$2y$10$vdjWmiKWpT1Tdw7sl6wJ5.4ZURjrxpCu/ck9UAANtQF31nnso4TCa', '$2y$10$uRB57W.i4BC0LM6dRSO0H..63AwergOPFhRabVN0/6qsWy0Vfc0rW', 'fBEjljW9b82V6FT2OG4CIH1wH1mVh7yZvX7e0c3mghDKckc6bL8AUr4PvW9P', '2020-11-18 19:21:43', '2020-12-01 21:06:12'),
(24, 'rahmat', 'user', 'rahmat@gmail.com', NULL, '$2y$10$/ScJuOCJYwe51tk1thwn..lF1dIvgs/D7gu6CFQ87WA8U6NGjP6Y.', '$2y$10$D6MsV9WRln8klLqJLn4iF.ah94LdGu./GeH4YXwbDw/DKCL8KtMbK', 'hMXAOr5bTELa817zonXDtcNbNWIXLGDo6kOGXYd5xL22LmCawmfIJ04kNeKk', '2020-11-19 02:28:14', '2020-11-30 23:22:35'),
(38, 'bagus', 'user', 'bagus_semesta@gmail.com', NULL, '$2y$10$mvITobwboI.6Pu5YaJ6.Z.waA5uZgvR5vhJs1qjyJPqnfqPff79X.', '$2y$10$bvvgDS7rX8/WOghMCw3CDe7FwvIyPNnDNyoKvFtWrVmrP53XUe6wO', 'BD6tOY0KcmnB6wQ1wuCZHLcAiBezkx3hWHOFRMcwQvY8eOxw80FvhwDX8odi', '2023-11-23 07:36:20', '2023-11-23 07:36:20'),
(39, 'jauzy', 'user', 'jauzy@gmail.com', NULL, '$2y$10$4uVIKLKkCQcwG0tTvVcPJOnNZbIzfH2kvH3SOWxHAOfdvocBGDDIS', '$2y$10$JOqxTdsMN4goilMAteQbVOTA9VeWKEc/2fF9eEsgHL0SbViEqagvC', 'gJHbGNapZnMP8dzqALUhGLe1KNJbPLEh2xxLeymoRz19Old4yYll6X7OHsIY', '2023-11-23 07:41:19', '2023-11-23 07:41:19'),
(40, 'cecehe', 'user', 'posive@mailinator.com', NULL, '$2y$10$PRfkURrqe1mYSS72boTNDeIFdITYiD46MCyapwjg2nmlqyIv/T4Iu', '$2y$10$s6.d9Bsl6fZau1xTv/1iaezSZfySgLbqpUDBHNCGEPxUVf9JnM8YC', 'LFRBrZ0A3g7bOCLBKyzHNJ7WSsialCZhAIK5lil9P09LZWwZeeXszZnHByj1', '2023-11-23 07:42:58', '2023-11-23 07:42:58'),
(42, 'coba', 'user', 'coba@gmail.com', NULL, '$2y$10$XM.E.dvhymV74Ujwi6oNX.7ADbyWwpq5ueHSaZQ/vU.uf.6kRB1X2', '$2y$10$B..4f9dYJ1/laPE6TNRS5OltJCWYRUvLsycyApKM7LDCi18JE2GDm', 'P9fmWyhsAAmxR9ARoWBIcdn2bRYOJdkEgIR2vgD6TZcQ3UjFQgxd5clmlwJO', '2023-12-18 05:38:30', '2023-12-18 05:38:30'),
(43, 'tedi', 'user', 'tedi@mail.com', NULL, '$2y$10$7B/rRDF0NqojX.DvnlP8eOLkzH16glsJKfP9f2ytJTVyzXkJMfNba', '$2y$10$ksJYHUEb98FwG/VbMw6rrOLuQXwaiD.IuI4ofjzCo2uDLmHq99wwe', 'R849IEZMjFBay4CHR6V4Knp2ClDQjMR7wQnpNS8MBCKqBYv8MTua4zY3fTw6', '2023-12-25 06:05:36', '2023-12-25 06:05:36'),
(44, 'lana', 'user', 'ismaillana13@gmail.com', NULL, '$2y$10$FEWZ8nFN3clL27xlYIHNkOsP.M3fm25AZ0GAGRZh1ArDEQsbYs6Xm', '$2y$10$iuq/mbetjVToez.4DJ9Ev.WXrKL9tcNkvLEuOj79yHUvVHfTla/pK', 'cumIFPZ6BNA6e2mJSRldGoMTyffR0LMxWDu9cN81XxRYInxuKWx21x1wRb31', '2024-01-07 08:51:33', '2024-01-07 08:51:33'),
(45, 'Fatar', 'user', 'fatar@gmail.com', NULL, '$2y$10$Ffj9449B8ir3iV7szixQIuHhjZIpur.8wjmh.UJTgPaxJvV4g7kIa', '$2y$10$FQ2gAtMCZzWr6Qhad.dAjOaMwumeHcGi3BpYAG58GBDKWprlZ7O3y', '1d425r2MSKw5G8O3f7dH50PoxXk7LrkQ6ZMVrsRnWgCENKPjDzE9qwCc691D', '2024-01-15 07:21:19', '2024-01-15 07:21:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lowongan_kerja`
--
ALTER TABLE `lowongan_kerja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `departemen`
--
ALTER TABLE `departemen`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lowongan_kerja`
--
ALTER TABLE `lowongan_kerja`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
