   
CREATE TABLE IF NOT EXISTS `link` (   
  `id` int(11) NOT NULL AUTO_INCREMENT,   
          `titre` text NOT NULL,   
                  `message` text NOT NULL,   
                  `elem` int(11) NOT NULL,   
                  KEY `id` (`id`)   
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0   
        