-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2025 at 10:30 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `techempower`
--

-- --------------------------------------------------------

--
-- Table structure for table `eoi`
--

CREATE TABLE `eoi` (
  `EOInumber` int(11) NOT NULL,
  `JobReferenceNumber` varchar(5) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Streetaddress` varchar(40) NOT NULL,
  `Suburb` varchar(40) NOT NULL,
  `State` varchar(50) NOT NULL,
  `Postcode` int(4) NOT NULL,
  `Emailaddress` varchar(100) NOT NULL,
  `Phonenumber` int(12) NOT NULL,
  `Skill1` varchar(50) DEFAULT NULL,
  `Skill2` varchar(50) DEFAULT NULL,
  `Skill3` varchar(50) DEFAULT NULL,
  `Otherskills` text DEFAULT NULL,
  `Status` enum('New','Current','Final','') NOT NULL DEFAULT 'New'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eoi`
--
ALTER TABLE `eoi`
  ADD PRIMARY KEY (`EOInumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eoi`
--
ALTER TABLE `eoi`
  MODIFY `EOInumber` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `ref_code` varchar(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `employment_type` varchar(50) NOT NULL,
  `overview` text NOT NULL,
  `responsibilities` text NOT NULL,
  `qualifications` text NOT NULL,
  `salary_range` varchar(50) NOT NULL,
  `contact_email` varchar(100) NOT NULL,
  `reports_to` varchar(100) NOT NULL,
  `posted_date` date NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `ref_code`, `title`, `location`, `employment_type`, `overview`, `responsibilities`, `qualifications`, `salary_range`, `contact_email`, `reports_to`, `posted_date`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'CYB01', 'Cybersecurity Specialist', 'Melbourne, VIC', 'Full-time', 'Join TechEmpower to protect digital assets and implement robust cybersecurity solutions...', 'Monitor and respond to security alerts and incidents.\nConduct vulnerability assessments and risk analysis.\nEnsure compliance with internal policies and external regulations.', 'Essential: Bachelor''s in Cybersecurity, 2+ years experience...\nPreferable: CISSP certification, experience with AWS security tools.', '$85,000 – $110,000 AUD', 'careers@techempower.com.au', 'IT Security Manager', '2025-04-10', 1, '2025-05-21 02:30:00', '2025-05-21 02:30:00'),
(2, 'UID03', 'UI/UX Designer', 'Melbourne, VIC', 'Full-time', 'TechEmpower is seeking a creative and user-focused UI/UX Designer...', 'Conduct user research and usability testing.\nCreate wireframes, prototypes, and high-fidelity designs.\nCollaborate with developers to implement user-centered designs.\nMaintain and evolve the design system and brand guidelines.', 'Essential: Experience with Figma or Adobe XD, strong design portfolio...\nPreferable: Knowledge of HTML/CSS, familiarity with Agile environments.', '$70,000 – $90,000 AUD', 'designcareers@techempower.com.au', 'Product Design Lead', '2025-04-14', 1, '2025-05-21 02:30:00', '2025-05-21 02:30:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ref_code` (`ref_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;
