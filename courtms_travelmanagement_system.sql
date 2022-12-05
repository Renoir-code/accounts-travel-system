-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2022 at 02:01 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `courtms_travelmanagement_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `changes`
--

CREATE TABLE `changes` (
  `changes_id` int(10) UNSIGNED NOT NULL,
  `staff_id` int(11) NOT NULL,
  `monthly_allotment` int(11) NOT NULL,
  `arrears` int(11) NOT NULL,
  `travel_recovery` int(11) NOT NULL,
  `upkeepchange_type` int(11) NOT NULL,
  `post_change` int(11) NOT NULL,
  `dateof_change` varchar(255) NOT NULL,
  `changes_remarks` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` int(11) NOT NULL,
  `location_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `location_name`) VALUES
(1, 'Court Administration division'),
(2, 'Supreme Court'),
(3, 'Parish Court'),
(4, 'Court of Appeal');

-- --------------------------------------------------------

--
-- Table structure for table `officer_type`
--

CREATE TABLE `officer_type` (
  `officer_id` int(11) NOT NULL,
  `officer_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `officer_type`
--

INSERT INTO `officer_type` (`officer_id`, `officer_name`) VALUES
(1, 'Travelling Officer'),
(2, 'Casual Officer');

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE `rates` (
  `rate_id` int(10) UNSIGNED NOT NULL,
  `rate_name` varchar(255) NOT NULL,
  `rate_value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reset_email_request`
--

CREATE TABLE `reset_email_request` (
  `id` int(11) NOT NULL,
  `email` varchar(150) CHARACTER SET latin1 NOT NULL,
  `token` varchar(150) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `date_created` datetime NOT NULL,
  `status` enum('New','Completed') CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reset_email_request`
--

INSERT INTO `reset_email_request` (`id`, `email`, `token`, `date_created`, `status`) VALUES
(1, 'renoir.elliott@cad.gov.jm', 'ba54db8de5774fe60ed525adb300f3faed5b44db6da63e1d13fe801a52f54e40', '2022-11-13 16:29:03', 'New'),
(2, 'renoir.elliott@cad.gov.jm', '16cd98a43d954a2bc87bcad7d22da227613011997559c2b41a0499df3e519a98', '2022-11-13 16:29:42', 'New'),
(3, 'renoir.elliott@cad.gov.jm', '10fc274de0747e489a0e23ff0a81725ba004ab4d4e5d1e2f851b0f4821904edb', '2022-11-13 20:07:16', 'New'),
(4, 'renoir.elliott@cad.gov.jm', 'baa680c1190ed8336a9305d7cf71eda2195cbdb87f9c01b8d25ce1895aebefac', '2022-11-13 20:14:08', 'New'),
(5, 'renoir.elliott@cad.gov.jm', 'ece65d3d6fde2c8b76ba23b86de1008216abca62b890f44b0c51a40b04effeff', '2022-11-13 20:18:34', 'New'),
(6, 'renoir.elliott@cad.gov.jm', '7ae5a612c72312cf33084fee302c0fee663a287a4f76d01a7822ed0cc35b4adf', '2022-11-13 20:22:21', 'New'),
(7, 'renoir.elliott@cad.gov.jm', '73de65722f0722cabfe72122d015e9322589dae6c8646e5ec88f3ba0eee806a0', '2022-11-13 20:24:35', 'New'),
(8, 'renoir.elliott@cad.gov.jm', 'dbf8c1c60775a66d61a8c500eb3aa2368aae4e5c8270dd047f2ba8eef75a0ec6', '2022-11-13 20:26:34', 'New'),
(9, 'renoir.elliott@cad.gov.jm', '8ab113cc70237561e6e1f3bba27b5d7a9a0680e5ee665a6ae6b5d4feb1d05c5f', '2022-11-13 20:29:06', 'New'),
(10, 'renoir.elliott@cad.gov.jm', '319011ddeea2338c9efdc0bb92dc728877c6410c006f3a46dfda795081786dac', '2022-11-13 20:32:42', 'New'),
(11, 'renoir.elliott@cad.gov.jm', '3646915090b19f9917e5988e6f10f2e7f9bb92eacde481f8f1db5024db031b47', '2022-11-13 20:33:32', 'New'),
(12, 'renoir.elliott@cad.gov.jm', '4bcb80afa74eff59cdecd4e3eeeee0f0e66aaf1ac72fce9bbac60a9e696f7685', '2022-11-13 20:33:34', 'New'),
(13, 'renoir.elliott@cad.gov.jm', 'ec98748b916014fb3f38c15f703daf77b0955d627af81d72a92169b14fc8e723', '2022-11-13 20:33:40', 'New'),
(14, 'renoir.elliott@cad.gov.jm', 'fbf877bb9fba3660002039a2e099f976b03360e462e6094b8280b0e7c70535c2', '2022-11-13 21:52:47', 'New'),
(15, 'renoir.elliott@cad.gov.jm', '99cf1b52045b00042dd5536e2e70e564c848ec2f86d7c8ef4bafa9e5c4be72cb', '2022-11-13 21:53:52', 'New'),
(16, 'renoir.elliott@cad.gov.jm', '6d1615fbcd671b2531c1949b583a7167e52c499f2c611a4e2a74edb4f5c71f70', '2022-11-13 21:59:43', 'New'),
(17, 'renoir.elliott@cad.gov.jm', 'fb299cb3308ff63c6d5f83586ffc1298cdb9712b2c6c536ce2112f75fdd24a26', '2022-11-13 22:01:43', 'New'),
(18, 'renoir.elliott@cad.gov.jm', '01e80b7276fe3f0c6d6b983e60cc87022d5150196eb038d6292e331c99cd1e9a', '2022-11-13 22:04:30', 'New'),
(19, 'renoir.elliott@cad.gov.jm', 'f5c712b9fbd6dc0f25d27970e7c7ea357dc7f61bc8fa5b8f5f236992c3c0b3cd', '2022-11-13 22:06:38', 'New'),
(20, 'renoir.elliott@cad.gov.jm', '93290ac489158a067e73b01cd82d54ce06d9295fd1a46b03931f0dc769e39995', '2022-11-13 22:10:44', 'New'),
(21, 'renoir.elliott@cad.gov.jm', 'b06cbbc985971021d8078d88919bc1915786828f6b6d5cf120bb7f1c4626b5cd', '2022-11-13 22:14:16', 'New'),
(22, 'renoir.elliott@cad.gov.jm', '98cf953df4083b5d47ed3892af06c5b2f716618536c7c0b2455337cbe74d1f7d', '2022-11-13 22:15:28', 'Completed'),
(23, 'renoir.elliott@cad.gov.jm', '135f2030d7a8e8f88f7fe677b80f175cea56b689aa90021aff927e681db61b05', '2022-11-13 22:20:14', 'Completed'),
(24, 'renoir.elliott@cad.gov.jm', 'acad493ffe1b15f51ebc75d31bec1d2a0d7312a6fb426154ac2062f484fb9d3d', '2022-11-13 22:23:21', 'Completed'),
(25, 'renoir.elliott@cad.gov.jm', 'd4d1e4f8f5a0b83bcedb5ea2c46d66087586830ca9835dab3df45da6d79978f0', '2022-11-13 22:28:45', 'Completed'),
(26, 'renoir.elliott@cad.gov.jm', 'f77530549e058be0ee88b8df2c022b8b5180d57e1fa1c551596a19e838c81ea0', '2022-11-13 22:29:33', 'New'),
(27, 'renoir.elliott@cad.gov.jm', '977b7f4736d9c7399b65576b7db8e4c10a2df2346f35e76b51d690182d55316c', '2022-11-13 22:31:54', 'Completed'),
(28, 'renoir.elliott@cad.gov.jm', 'd1e6b79715c3cafe3371461828554208997f80f471219c4ac6ddfa229c35aae9', '2022-11-14 10:50:37', 'New'),
(29, 'renoir.elliott@cad.gov.jm', '8a356961e72ee237e094f2ecc7eb8f454aafb3cb2d3b184d3be416f29bc07c25', '2022-11-14 10:51:28', 'Completed'),
(30, 'renoir.elliott@cad.gov.jm', '3591b084bfdc07607fce8c282cb7ca72186d923a853bdce61e86048523926d6e', '2022-11-14 10:55:44', 'Completed'),
(31, 'renoir.elliott@cad.gov.jm', '94c8162df73cc38de7b559c01a52ee6ee17f531e494825f26feb315e4e0c35c8', '2022-11-15 07:07:17', 'New'),
(32, 'renoir.elliott@cad.gov.jm', '6edee46d167236574823979a76348a855fcc46d36910cf04bedaa8c985b7a609', '2022-11-15 07:07:34', 'New'),
(33, 'renoir.elliott@cad.gov.jm', '4b096bdad84dc2e380131e44ae5844fca6fd156d4b315c7b22c10dfa188b2c9d', '2022-11-30 16:17:12', 'New'),
(34, 'renoir.elliott@cad.gov.jm', '0b2d1517eae725dcd2659def5877fa45e02a355c3db39677bfa52bd54c85f14a', '2022-11-30 16:18:12', 'New'),
(35, 'renoir.elliott@cad.gov.jm', '9583713ae5581e4fac39a9ff3b23977b26ca168af180462c4e264171124be488', '2022-11-30 16:18:16', 'New'),
(36, 'renoir.elliott@cad.gov.jm', '18dca4fa27b04fc877145bf70d4346d94e759375133084418164f033dd473db3', '2022-11-30 16:19:10', 'New'),
(37, 'renoir.elliott@cad.gov.jm', '6460179348a1e84535154fe6d5d89bf8776455353e0473315dc64eac481c9cbc', '2022-11-30 16:19:14', 'New'),
(38, 'renoir.elliott@cad.gov.jm', 'c97fb1f6cd910f5b077f3611c4f7655209aa8a970f976a270a65bf4107c20ec3', '2022-11-30 16:21:44', 'New'),
(39, 'renoir.elliott@cad.gov.jm', 'ccdd2a0e786c34b7fb5b71b09b06c4d3c62461b79e703a7274225cd0f7a31be5', '2022-11-30 16:21:53', 'New'),
(40, 'renoir.elliott@cad.gov.jm', '492adaf18cde49cf19dc89106d77962ecf41ddf03b7af65fe1b1650a9d2e1bc0', '2022-11-30 16:22:22', 'New');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `rolename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `rolename`) VALUES
(1, 'Inserter'),
(2, 'Certifier'),
(3, 'Authorizer'),
(4, 'System Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(10) NOT NULL,
  `location_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `trn` varchar(255) NOT NULL,
  `upkeep_id` int(11) NOT NULL,
  `officer_id` int(11) NOT NULL,
  `vehicle_model` varchar(255) NOT NULL,
  `vehicle_make` varchar(255) NOT NULL,
  `vehicle_chasisnum` int(11) NOT NULL,
  `vehicle_engine_num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `location_id`, `firstname`, `lastname`, `post_title`, `trn`, `upkeep_id`, `officer_id`, `vehicle_model`, `vehicle_make`, `vehicle_chasisnum`, `vehicle_engine_num`) VALUES
(10, 3, 'Jason', 'Brown', 'PS3', '123839393', 7, 2, 'Audi', 'Sedan', 1234567, 123456),
(11, 3, 'James', 'Brown', 'LS4', '125020202', 7, 1, 'Jaguar', 'wrwrw', 1234556, 123494),
(12, 1, 'Renoir', 'Elliott', 'IT/4', '125660782', 1, 1, 'Toyota', 'Sedan', 3940349, 3839303);

-- --------------------------------------------------------

--
-- Table structure for table `staff_payment`
--

CREATE TABLE `staff_payment` (
  `staff_payment_id` int(10) UNSIGNED NOT NULL,
  `staff_id` int(11) NOT NULL,
  `voucher_number` int(11) DEFAULT NULL,
  `year_travelled` varchar(255) NOT NULL,
  `month_travelled` varchar(255) NOT NULL,
  `mileage_km` int(11) NOT NULL,
  `passenger_km` int(11) NOT NULL,
  `toll_amt` int(11) NOT NULL,
  `subsistence_km` int(11) NOT NULL,
  `supper_days` int(11) NOT NULL,
  `refreshment_days` int(11) NOT NULL,
  `taxi_out_town` int(11) NOT NULL,
  `taxi_in_town` int(11) NOT NULL,
  `modified_by` varchar(255) NOT NULL,
  `payment_status` varchar(255) DEFAULT NULL,
  `certifier_remarks` varchar(255) NOT NULL,
  `approver_remarks` varchar(255) NOT NULL,
  `date_modified` datetime NOT NULL,
  `date_created` datetime NOT NULL,
  `date_certified` datetime NOT NULL,
  `certified_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `upkeep_type`
--

CREATE TABLE `upkeep_type` (
  `upkeep_id` int(11) NOT NULL,
  `upkeep_name` varchar(250) NOT NULL,
  `upkeep_value` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `upkeep_type`
--

INSERT INTO `upkeep_type` (`upkeep_id`, `upkeep_name`, `upkeep_value`) VALUES
(1, 'Fixed Upkeep Allowance', 141429),
(2, 'Fixed Walkfoot Allowance', 56572),
(3, 'Judges (Partially Owned)', 127845),
(4, '(Judges)Other Partially Owned Vehicle ', 70714),
(5, 'Commuted Allowance', 49754),
(6, 'Commuted Walkfoot Allowance', 22694),
(7, 'Full Allowance', 74577),
(8, 'Walkfoot Allowance', 30206);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `active` enum('yes','no') DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `last_modified` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `email`, `password`, `role_id`, `active`, `date_created`, `last_modified`, `modified_by`) VALUES
(12, 'Bob', 'Brown', 'bob.brown@cad.gov.jm', '8a9edbf0abe834ec1326f14dd4f8212ab71f7ebe1195c736469fbcff0082f5b2', 0, 'yes', '2022-11-16 16:48:53', '2022-11-15 10:09:33', ''),
(13, 'Insertor', 'Insertor', 'insertor.insertor@cad.gov.jm', '22f51df2462b82bc265656250b60aa13ad1417bc9cb6fb049ca726418df9a655', 1, 'no', '2022-12-01 15:03:52', '2022-11-15 10:09:33', ''),
(19, 'Joyce', 'Reid', 'joyce.reid@cad.gov.jm', '8a9edbf0abe834ec1326f14dd4f8212ab71f7ebe1195c736469fbcff0082f5b2', 4, 'yes', '2022-11-15 16:14:40', '2022-11-15 10:09:33', ''),
(20, 'Renoir', 'Elliott', 'renoir.elliott@cad.gov.jm', '9bb02434ddb6fc11cd164558f83c3c4776751563c81fadea63e388bfb4b64ebf', 4, 'yes', '2022-12-01 16:14:33', '2022-11-15 10:09:33', ''),
(23, 'John', 'James', 'john.james@cad.gov.jm', '8a9edbf0abe834ec1326f14dd4f8212ab71f7ebe1195c736469fbcff0082f5b2', 4, 'yes', '2022-11-15 17:20:04', '2022-11-15 17:19:04', ''),
(38, 'John', 'Brown', 'john.brown@cad.gov.jm', '9bb02434ddb6fc11cd164558f83c3c4776751563c81fadea63e388bfb4b64ebf', 1, 'yes', '2022-12-02 13:12:56', '2022-12-02 13:12:56', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `changes`
--
ALTER TABLE `changes`
  ADD PRIMARY KEY (`changes_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `officer_type`
--
ALTER TABLE `officer_type`
  ADD PRIMARY KEY (`officer_id`);

--
-- Indexes for table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`rate_id`);

--
-- Indexes for table `reset_email_request`
--
ALTER TABLE `reset_email_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `staff_payment`
--
ALTER TABLE `staff_payment`
  ADD PRIMARY KEY (`staff_payment_id`);

--
-- Indexes for table `upkeep_type`
--
ALTER TABLE `upkeep_type`
  ADD PRIMARY KEY (`upkeep_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `changes`
--
ALTER TABLE `changes`
  MODIFY `changes_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `officer_type`
--
ALTER TABLE `officer_type`
  MODIFY `officer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `rate_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reset_email_request`
--
ALTER TABLE `reset_email_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `staff_payment`
--
ALTER TABLE `staff_payment`
  MODIFY `staff_payment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `upkeep_type`
--
ALTER TABLE `upkeep_type`
  MODIFY `upkeep_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
