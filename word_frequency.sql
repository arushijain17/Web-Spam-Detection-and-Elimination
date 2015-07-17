DROP TABLE IF EXISTS /*_*/word_frequency;

CREATE TABLE /*_*/word_frequency (
  `wf_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `wf_word` varchar(100) DEFAULT NULL,
  `wf_spam` int(10) unsigned NOT NULL,
  `wf_ham` int(10) unsigned NOT NULL,
  PRIMARY KEY (`wf_id`),
) /*$wgDBTableOptions*/;

CREATE INDEX  /*i*/word_frequency_word ON /*_*/word_frequency(wf_word);