CREATE TABLE IF NOT EXISTS `eavAttr` (
  `entity` bigint(20) unsigned NOT NULL,
  `attribute` varchar(250) NOT NULL,
  `value` text NOT NULL,
  KEY `ikEntity` (`entity`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;