## Tables

	-- --------------------------------------------------------

	--
	-- Table structure for table `client`
	--

	CREATE TABLE IF NOT EXISTS `client` (
	  `id` varchar(100) NOT NULL,
	  `name` varchar(20) NOT NULL,
	  `added_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	  `contact` varchar(50) NOT NULL,
	  PRIMARY KEY (`id`)
	) ENGINE=InnoDB DEFAULT CHARSET=latin1;

	-- --------------------------------------------------------

	--
	-- Table structure for table `inform`
	--

	CREATE TABLE IF NOT EXISTS `inform` (
	  `inform_id` int(11) NOT NULL AUTO_INCREMENT,
	  `report_id` int(11) NOT NULL,
	  `added_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	  `email` varchar(50) NOT NULL,
	  PRIMARY KEY (`inform_id`),
	  KEY `report_id` (`report_id`),
	  KEY `email` (`email`)
	) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

	-- --------------------------------------------------------

	--
	-- Table structure for table `report`
	--

	CREATE TABLE IF NOT EXISTS `report` (
	  `formatted_address` varchar(100) NOT NULL,
	  `country` varchar(100) NOT NULL,
	  `admin_area_level_1` varchar(100) NOT NULL,
	  `admin_area_level_2` varchar(100) NOT NULL,
	  `sublocality` varchar(100) NOT NULL,
	  `latitude` double NOT NULL,
	  `longitude` double NOT NULL,
	  `report_id` int(11) NOT NULL AUTO_INCREMENT,
	  `category` varchar(20) NOT NULL,
	  `description` varchar(120) NOT NULL,
	  `email` varchar(50) NOT NULL,
	  `picture` varchar(100) NOT NULL,
	  `added_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	  PRIMARY KEY (`report_id`),
	  KEY `email` (`email`)
	) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

	-- --------------------------------------------------------

	--
	-- Table structure for table `token`
	--

	CREATE TABLE IF NOT EXISTS `token` (
	  `added_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	  `client` varchar(50) NOT NULL,
	  `token` varchar(100) NOT NULL,
	  `email` varchar(50) NOT NULL,
	  `id` int(11) NOT NULL AUTO_INCREMENT,
	  PRIMARY KEY (`id`),
	  KEY `email` (`email`)
	) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

	-- --------------------------------------------------------

	--
	-- Table structure for table `update`
	--

	CREATE TABLE IF NOT EXISTS `update` (
	  `update_id` int(11) NOT NULL AUTO_INCREMENT,
	  `report_id` int(11) NOT NULL,
	  `description` varchar(500) NOT NULL,
	  `updated_by` varchar(100) NOT NULL,
	  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	  `status` varchar(20) NOT NULL,
	  PRIMARY KEY (`update_id`),
	  KEY `report_id` (`report_id`)
	) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

	-- --------------------------------------------------------

	--
	-- Table structure for table `user`
	--

	CREATE TABLE IF NOT EXISTS `user` (
	  `id` int(11) NOT NULL AUTO_INCREMENT,
	  `email` varchar(50) NOT NULL,
	  `name` varchar(50) NOT NULL,
	  `password` varchar(200) NOT NULL,
	  `added_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	  `verified` tinyint(4) NOT NULL DEFAULT '0',
	  `salt` varchar(50) NOT NULL,
	  PRIMARY KEY (`id`),
	  KEY `email` (`email`)
	) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

	-- --------------------------------------------------------

	--
	-- Table structure for table `vote`
	--

	CREATE TABLE IF NOT EXISTS `vote` (
	  `vote_id` int(11) NOT NULL AUTO_INCREMENT,
	  `report_id` int(11) NOT NULL,
	  `added_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	  `email` varchar(100) NOT NULL,
	  PRIMARY KEY (`vote_id`),
	  KEY `report_id` (`report_id`),
	  KEY `email` (`email`)
	) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

	--
	-- Constraints for dumped tables
	--

	--
	-- Constraints for table `inform`
	--
	ALTER TABLE `inform`
	  ADD CONSTRAINT `inform_ibfk_2` FOREIGN KEY (`email`) REFERENCES `user` (`email`) ON UPDATE CASCADE,
	  ADD CONSTRAINT `inform_ibfk_1` FOREIGN KEY (`report_id`) REFERENCES `report` (`report_id`) ON UPDATE CASCADE;

	--
	-- Constraints for table `report`
	--
	ALTER TABLE `report`
	  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user` (`email`) ON UPDATE CASCADE;

	--
	-- Constraints for table `token`
	--
	ALTER TABLE `token`
	  ADD CONSTRAINT `token_ibfk_1` FOREIGN KEY (`email`) REFERENCES `report` (`email`) ON UPDATE CASCADE;

	--
	-- Constraints for table `update`
	--
	ALTER TABLE `update`
	  ADD CONSTRAINT `update_ibfk_1` FOREIGN KEY (`report_id`) REFERENCES `report` (`report_id`) ON UPDATE CASCADE;

	--
	-- Constraints for table `vote`
	--
	ALTER TABLE `vote`
	  ADD CONSTRAINT `vote_ibfk_2` FOREIGN KEY (`email`) REFERENCES `user` (`email`) ON UPDATE CASCADE,
	  ADD CONSTRAINT `vote_ibfk_1` FOREIGN KEY (`report_id`) REFERENCES `report` (`report_id`) ON UPDATE CASCADE;

	/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
	/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
	/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

	--
	-- Table structure for table `user`
	--

	CREATE TABLE IF NOT EXISTS `user` (
	  `id` int(11) NOT NULL AUTO_INCREMENT,
	  `email` varchar(50) NOT NULL,
	  `name` varchar(50) NOT NULL,
	  `password` varchar(200) NOT NULL,
	  `added_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	  `verified` tinyint(4) NOT NULL DEFAULT '0',
	  `salt` varchar(50) NOT NULL,
	  PRIMARY KEY (`id`)
	) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

	-- --------------------------------------------------------

	--
	-- Table structure for table `vote`
	--

	CREATE TABLE IF NOT EXISTS `vote` (
	  `vote_id` int(11) NOT NULL AUTO_INCREMENT,
	  `report_id` int(11) NOT NULL,
	  `added_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	  `email` varchar(100) NOT NULL,
	  PRIMARY KEY (`vote_id`)
	) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;