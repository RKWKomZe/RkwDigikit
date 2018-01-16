#
# TABLE structure FOR TABLE 'sys_category'
#
CREATE TABLE sys_category (
  digikit_level_one_title_override VARCHAR(255) DEFAULT '' NOT NULL,
  digikit_level_one_image INT(11) unsigned DEFAULT '0' NOT NULL,
  digikit_level_one_settings VARCHAR(255) DEFAULT '' NOT NULL,
  digikit_level_two_title_override VARCHAR(255) DEFAULT '' NOT NULL,
  digikit_level_two_position VARCHAR(255) DEFAULT '' NOT NULL,
  digikit_level_three_title_override VARCHAR(255) DEFAULT '' NOT NULL,
  digikit_level_three_position VARCHAR(255) DEFAULT '' NOT NULL,
  digikit_info_image INT(11) unsigned DEFAULT '0' NOT NULL,
  digikit_info_title VARCHAR(255) DEFAULT '' NOT NULL,
  digikit_info_text text
);

#
# TABLE structure FOR TABLE 'pages'
#
CREATE TABLE pages (
  digikit_meta_company VARCHAR(255) DEFAULT '' NOT NULL,
  digikit_meta_business VARCHAR(255) DEFAULT '' NOT NULL,
  digikit_meta_employee VARCHAR(255) DEFAULT '' NOT NULL,
  digikit_meta_place VARCHAR (255) DEFAULT 'D-' NOT NULL,
  digikit_meta_website VARCHAR (255) DEFAULT '' NOT NULL,
  digikit_meta_map INT(11) unsigned DEFAULT '0' NOT NULL,
  digikit_category INT(11) DEFAULT '0' NOT NULL
);