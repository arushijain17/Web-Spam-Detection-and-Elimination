DROP TABLE IF EXISTS /*_*/spam_ham_texts;

CREATE TABLE /*_*/spam_ham_texts (
  `sht_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sht_spam` tinyint(1) DEFAULT NULL,
  `sht_text` mediumblob NOT NULL,
  PRIMARY KEY (`sht_id`)
) /*$wgDBTableOptions*/;