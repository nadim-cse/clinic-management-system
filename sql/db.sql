-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 21, 2020 at 10:56 AM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `clinic_management_system_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` enum('admin','doctor','pharmacist','patient') COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `address`, `user_type`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Patient 1', 'patient1@gmail.com', '01731001333', 'Azadi-4, Mirboxtula, Sylhet', 'patient', NULL, '$2y$10$B.8nA/GgZAw2xMi3StsLE.I.NkfjKBrlnpClOLmUb2azEukR0N1WC', NULL, '2020-08-19 10:43:19', '2020-08-19 10:43:19'),
(2, 'Doctor 1', 'doctor1@gmail.com', '017111111111', 'Akhaliya, Sylhet', 'doctor', NULL, '$2y$10$tB7DyLFPHWzxJRx2WKXUD.CwgaxtBu0NIXPNEawMwXMMNn470yXD2', 'NLc5FLN4VRDd1DY14DzcvnUtU83wTkiFULgfU6Q3TxyWX38t6uvIUpGjeqEq', '2020-08-19 10:57:03', '2020-08-19 10:57:03'),
(3, 'Doctor 2', 'doctor2@gmail.com', '01711222222', 'Zindabazar,Sylhet', 'doctor', NULL, '$2y$10$tB7DyLFPHWzxJRx2WKXUD.CwgaxtBu0NIXPNEawMwXMMNn470yXD2', NULL, '2020-08-19 10:57:03', '2020-08-19 10:57:03'),
(4, 'Doctor 3', 'doctor3@gmail.com', '01711333333', 'Raynagar,Sylhet', 'doctor', NULL, '$2y$10$tB7DyLFPHWzxJRx2WKXUD.CwgaxtBu0NIXPNEawMwXMMNn470yXD2', NULL, '2020-08-19 10:57:03', '2020-08-19 10:57:03'),
(5, 'Pharmacist 1', 'pharmacist1@gmail.com', '01711444444', 'Kumarpara,Sylhet', 'pharmacist', NULL, '$2y$10$tB7DyLFPHWzxJRx2WKXUD.CwgaxtBu0NIXPNEawMwXMMNn470yXD2', NULL, '2020-08-19 10:57:03', '2020-08-19 10:57:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
