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
  digikit_slider_images INT(11) unsigned DEFAULT '0' NOT NULL,
  digikit_main_header VARCHAR(255) DEFAULT '' NOT NULL,
  digikit_main_subheader VARCHAR(255) DEFAULT '' NOT NULL,
  digikit_main_teaser text,
  digikit_main_text text,
  digikit_meta_company VARCHAR(255) DEFAULT '' NOT NULL,
  digikit_meta_business VARCHAR(255) DEFAULT '' NOT NULL,
  digikit_meta_employee VARCHAR(255) DEFAULT '' NOT NULL,
  digikit_meta_place VARCHAR (255) DEFAULT '' NOT NULL,
  digikit_meta_website VARCHAR (255) DEFAULT '' NOT NULL,
  digikit_category INT(11) DEFAULT '0' NOT NULL,
  digikit_link_one_title VARCHAR(255) DEFAULT '' NOT NULL,
  digikit_link_two_title VARCHAR(255) DEFAULT '' NOT NULL,
  digikit_link_three_title VARCHAR(255) DEFAULT '' NOT NULL,
  digikit_link_four_title VARCHAR(255) DEFAULT '' NOT NULL,
  digikit_link_five_title VARCHAR(255) DEFAULT '' NOT NULL,
  digikit_link_one VARCHAR(255) DEFAULT '' NOT NULL,
  digikit_link_two VARCHAR(255) DEFAULT '' NOT NULL,
  digikit_link_three VARCHAR(255) DEFAULT '' NOT NULL,
  digikit_link_four VARCHAR(255) DEFAULT '' NOT NULL,
  digikit_link_five VARCHAR(255) DEFAULT '' NOT NULL,
  digikit_link_similar_one_title VARCHAR(255) DEFAULT '' NOT NULL,
  digikit_link_similar_two_title VARCHAR(255) DEFAULT '' NOT NULL,
  digikit_link_similar_three_title VARCHAR(255) DEFAULT '' NOT NULL,
  digikit_link_similar_four_title VARCHAR(255) DEFAULT '' NOT NULL,
  digikit_link_similar_five_title VARCHAR(255) DEFAULT '' NOT NULL,
  digikit_link_similar_one VARCHAR(255) DEFAULT '' NOT NULL,
  digikit_link_similar_two VARCHAR(255) DEFAULT '' NOT NULL,
  digikit_link_similar_three VARCHAR(255) DEFAULT '' NOT NULL,
  digikit_link_similar_four VARCHAR(255) DEFAULT '' NOT NULL,
  digikit_link_similar_five VARCHAR(255) DEFAULT '' NOT NULL,
  digikit_downloads INT(11) unsigned DEFAULT '0' NOT NULL,
  digikit_videos INT(11) unsigned DEFAULT '0' NOT NULL
);

#
# TABLE structure FOR TABLE 'sys_file_reference'
#
CREATE TABLE sys_file_reference (
  thumbnail INT(11) unsigned DEFAULT '0' NOT NULL
);

#
# TABLE structure FOR TABLE 'tx_rkwdigikit_domain_model_contact'
#
CREATE TABLE tx_rkwdigikit_domain_model_contact (
  uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	name VARCHAR(255) DEFAULT '' NOT NULL,
	street VARCHAR(255) DEFAULT '' NOT NULL,
	city VARCHAR(255) DEFAULT '' NOT NULL,
  phone VARCHAR(255) DEFAULT '' NOT NULL,
	email VARCHAR(255) DEFAULT '' NOT NULL,
	for VARCHAR(255) DEFAULT '' NOT NULL,
	global tinyint(4) unsigned DEFAULT '0' NOT NULL,
	function VARCHAR(255) DEFAULT '' NOT NULL,

  tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,

  t3_origuid int(11) DEFAULT '0' NOT NULL,
	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,
	sorting int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
  KEY language (l10n_parent,sys_language_uid)
);

#
# TABLE structure FOR TABLE 'tx_rkwdigikit_domain_model_contact_mm'
#
CREATE TABLE tx_rkwdigikit_domain_model_contact_mm (
  uid_local int(11) unsigned DEFAULT '0' NOT NULL,
	uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);

#
# TABLE structure FOR TABLE 'tx_rkwdigikit_domain_model_tutorial'
#
CREATE TABLE tx_rkwdigikit_domain_model_tutorial (
  uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

  title VARCHAR(255) DEFAULT '' NOT NULL,
  intro_text text,
  intro_text_mobile text,
	media INT(11) unsigned DEFAULT '0' NOT NULL,
	media_mobile INT(11) unsigned DEFAULT '0' NOT NULL,

  tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,

  t3_origuid int(11) DEFAULT '0' NOT NULL,
	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,
	sorting int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
  KEY language (l10n_parent,sys_language_uid)
);