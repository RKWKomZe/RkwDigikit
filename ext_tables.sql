#
# Table structure for table 'sys_category'
#
CREATE TABLE sys_category (
  digikit_level_one_image INT(11) unsigned DEFAULT '0' NOT NULL,
  digikit_level_one_settings VARCHAR(255) DEFAULT '' NOT NULL,
  digikit_level_two_title_override VARCHAR(255) DEFAULT '' NOT NULL,
  digikit_level_two_position VARCHAR(255) DEFAULT '' NOT NULL,
  digikit_level_three_title_override VARCHAR(255) DEFAULT '' NOT NULL,
  digikit_level_three_position VARCHAR(255) DEFAULT '' NOT NULL
);