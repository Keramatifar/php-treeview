
CREATE TABLE IF NOT EXISTS `hk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `hk`
--

INSERT INTO `hk` (`id`, `title`, `parent_id`) VALUES
(1, 'Software', 0),
(2, 'Programming', 1),
(3, 'Web', 2),
(4, 'Windows', 2),
(5, 'Graphic', 1),
(6, 'Photoshop', 5),
(7, 'Freehand', 5),
(8, 'PHP', 3),
(9, 'ASP.NET', 3),
(10, 'Hardware', 0),
(11, 'Network', 0),
(12, 'Monitor', 10),
(13, 'LCD', 12),
(14, 'CRT', 12);