<?php

use yii\db\Migration;

class m180139_000001_init extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->_create_tables();
        echo 'DataBase created';
        return true;
    }

    private function _create_tables()
    {
        $this->execute("
			CREATE TABLE `data_types` (
			  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Идентификатор типа данных',
			  `name` varchar(32) NOT NULL COMMENT 'Наименование типа данных',
			  `description` varchar(255) DEFAULT NULL COMMENT 'Краткое описание типа данных',
			  PRIMARY KEY (`id`)
			) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
        ");

        $this->execute("
			CREATE TABLE `document` (
			  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Идентификатор документа',
			  `registrator` int(10) unsigned DEFAULT NULL COMMENT 'Идентификатор пользователя, регистрирующего документ',
			  `document_type` int(10) unsigned NOT NULL COMMENT 'Тип документа',
			  `document_form` int(10) unsigned NOT NULL COMMENT 'Форма документа',
			  `reg_date` date NOT NULL COMMENT 'Дата регистрации',
			  `execution_date` date DEFAULT NULL COMMENT 'Дата исполнения',
			  `reg_number` int(10) unsigned NOT NULL COMMENT 'Регистрационный номер',
			  `executor` int(10) unsigned DEFAULT NULL COMMENT 'Исполнитель',
			  PRIMARY KEY (`id`)
			) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;
        ");

        $this->execute("
			CREATE TABLE `document_type` (
			  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Идентификатор типа документа',
			  `name` varchar(32) NOT NULL COMMENT 'Тип документа',
			  `icon_class` varchar(32) NOT NULL COMMENT 'Класс для отображения иконки типа документа',
			  `description` varchar(255) NOT NULL COMMENT 'Краткое описание типа документа',
			  PRIMARY KEY (`id`)
			) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
        ");

        $this->execute("
				CREATE TABLE `widget` (
				  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Идентификатор виджета',
				  `name` varchar(64) NOT NULL COMMENT 'Наименование виджета',
				  `class` varchar(64) NOT NULL COMMENT 'Название виджета',
				  PRIMARY KEY (`id`)
				) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='Виджеты, доступные для отображения документов и форм';
        ");


        $this->execute("
			CREATE TABLE `document_form_params` (
			  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Идентификатор параметра формы документа',
			  `document_form` int(10) unsigned NOT NULL COMMENT 'Идентификатор формы документа',
			  `data_type` tinyint(3) unsigned NOT NULL COMMENT 'Идентификатор типа данных',
			  `name` varchar(255) NOT NULL COMMENT 'Наименование параметра формы',
			  `description` text NOT NULL COMMENT 'Описание параметра формы',
			  PRIMARY KEY (`id`)
			) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
        ");

        $this->execute("
			CREATE TABLE `document_param` (
			  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Идентификатор параметра формы документа',
			  `document_form` int(10) unsigned NOT NULL COMMENT 'Форма документа',
			  `document` int(10) unsigned NOT NULL COMMENT 'Документ',
			  `param` int(10) unsigned DEFAULT NULL,
			  `value` text COMMENT 'Значение',
			  PRIMARY KEY (`id`)
			) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8;
        ");

        $this->execute("
			CREATE TABLE `files` (
			  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Идентификатор файла',
			  `path` text NOT NULL COMMENT 'Путь к файлу на сервере',
			  `filename` text NOT NULL COMMENT 'Имя файла',
			  `extension` varchar(255) NOT NULL COMMENT 'Расширение файла',
			  PRIMARY KEY (`id`)
			) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
        ");

        $this->execute("
			CREATE TABLE `map` (
			  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
			  `workspace` int(10) unsigned NOT NULL,
			  `document` int(10) unsigned NOT NULL,
			  PRIMARY KEY (`id`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ");

        $this->execute("
			CREATE TABLE `menu` (
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `name` varchar(128) NOT NULL,
			  `parent` int(11) DEFAULT NULL,
			  `route` varchar(255) DEFAULT NULL,
			  `order` int(11) DEFAULT NULL,
			  `data` blob,
			  PRIMARY KEY (`id`),
			  KEY `parent` (`parent`),
			  CONSTRAINT `menu_ibfk_1`
				FOREIGN KEY (`parent`) 
				REFERENCES `menu` (`id`) 
				ON DELETE SET NULL ON UPDATE CASCADE
			) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ");

        $this->execute("
			CREATE TABLE `reports` (
			  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Идентификатор отчета',
			  `name` varchar(255) NOT NULL COMMENT 'Название отчета',
			  `query` text NOT NULL COMMENT 'SQL-запрос на составление отчета',
			  PRIMARY KEY (`id`)
			) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
        ");

        $this->execute("
			CREATE TABLE `user` (
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `username` varchar(255) NOT NULL,
			  `email` varchar(255) NOT NULL,
			  `password_hash` varchar(255) NOT NULL,
			  `auth_key` varchar(32) NOT NULL,
			  `confirmed_at` int(11) DEFAULT NULL,
			  `unconfirmed_email` varchar(255) DEFAULT NULL,
			  `blocked_at` int(11) DEFAULT NULL,
			  `registration_ip` varchar(45) DEFAULT NULL,
			  `created_at` int(11) NOT NULL,
			  `updated_at` int(11) NOT NULL,
			  `flags` int(11) NOT NULL DEFAULT '0',
			  `last_login_at` int(11) DEFAULT NULL,
			  `status` int(10) unsigned DEFAULT NULL,
			  `password_reset_token` varchar(255) DEFAULT NULL,
			  PRIMARY KEY (`id`),
			  UNIQUE KEY `user_unique_username` (`username`),
			  UNIQUE KEY `user_unique_email` (`email`)
			) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8
        ");

        $this->execute("
			CREATE TABLE `token` (
			  `user_id` int(11) NOT NULL,
			  `code` varchar(32) NOT NULL,
			  `created_at` int(11) NOT NULL,
			  `type` smallint(6) NOT NULL,
			  UNIQUE KEY `token_unique` (`user_id`,`code`,`type`),
			  CONSTRAINT `fk_user_token` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
			) ENGINE=InnoDB DEFAULT CHARSET=utf8
        ");

        $this->execute("
			CREATE TABLE `workspace` (
			  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Идентификатор рабочей области',
			  `name` varchar(255) NOT NULL COMMENT 'Наименование рабочей области',
			  `description` text COMMENT 'Описание рабочей области',
			  `author` int(10) unsigned DEFAULT NULL COMMENT 'Идентификатор создателя',
			  `ico` varchar(50) DEFAULT NULL,
			  PRIMARY KEY (`id`)
			) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='Наименование рабочей области';
        ");

        $this->execute("
			CREATE TABLE `workspace_child` (
			  `parent` int(10) unsigned NOT NULL,
			  `child` int(10) unsigned NOT NULL
			) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ");

        $this->execute("
			CREATE TABLE `document_form` (
			  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Идентификатор формы документа',
			  `document_type` int(10) unsigned NOT NULL COMMENT 'Идентификатор типа документа',
			  `widget` int(10) unsigned NOT NULL COMMENT 'Идентификатор виджета, отвечающего за отображение формы',
			  `name` varchar(32) NOT NULL COMMENT 'Наименование формы',
			  `description` text NOT NULL COMMENT 'Описание формы документа',
			  PRIMARY KEY (`id`),
			  KEY `widget` (`widget`),
			  KEY `document_type` (`document_type`),
			  CONSTRAINT `document_form_ibfk_1`
				FOREIGN KEY (`widget`)
				REFERENCES `widget` (`id`),
			  CONSTRAINT `document_form_ibfk_2`
				FOREIGN KEY (`document_type`)
				REFERENCES `document_type` (`id`)
			) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
        ");

        $this->execute("
			CREATE TABLE `profile` (
			  `user_id` int(11) NOT NULL,
			  `name` varchar(255) DEFAULT NULL,
			  `public_email` varchar(255) DEFAULT NULL,
			  `surname` varchar(255) DEFAULT NULL,
			  `patronymic` varchar(255) DEFAULT NULL,
			  `position` varchar(255) DEFAULT NULL,
			  `phone` varchar(10) DEFAULT NULL,
			  `comment` text,
			  PRIMARY KEY (`user_id`),
			  CONSTRAINT `fk_user_profile`
				FOREIGN KEY (`user_id`)
				REFERENCES `user` (`id`)
				ON DELETE CASCADE
			) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ");

        $this->execute("
			CREATE TABLE `social_account` (
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `user_id` int(11) DEFAULT NULL,
			  `provider` varchar(255) NOT NULL,
			  `client_id` varchar(255) NOT NULL,
			  `data` text,
			  `code` varchar(32) DEFAULT NULL,
			  `created_at` int(11) DEFAULT NULL,
			  `email` varchar(255) DEFAULT NULL,
			  `username` varchar(255) DEFAULT NULL,
			  PRIMARY KEY (`id`),
			  UNIQUE KEY `account_unique` (`provider`,`client_id`),
			  UNIQUE KEY `account_unique_code` (`code`),
			  KEY `fk_user_account` (`user_id`),
			  CONSTRAINT `fk_user_account`
				FOREIGN KEY (`user_id`)
				REFERENCES `user` (`id`)
				ON DELETE CASCADE
			) ENGINE=InnoDB DEFAULT CHARSET=utf8
        ");
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->_delete_tables();
        echo 'DataBase droped';
    }

    private function _delete_tables()
    {
        $this->execute("
			SET FOREIGN_KEY_CHECKS = 0;
				DROP TABLE IF EXISTS `data_types`;
				DROP TABLE IF EXISTS `document`;
				DROP TABLE IF EXISTS `document_form`;
				DROP TABLE IF EXISTS `document_form_params`;
				DROP TABLE IF EXISTS `document_param`;
				DROP TABLE IF EXISTS `document_type`;
				DROP TABLE IF EXISTS `files`;
				DROP TABLE IF EXISTS `map`;
				DROP TABLE IF EXISTS `menu`;
				DROP TABLE IF EXISTS `profile`;
				DROP TABLE IF EXISTS `reports`;
				DROP TABLE IF EXISTS `social_account`;
				DROP TABLE IF EXISTS `token`;
				DROP TABLE IF EXISTS `user`;
				DROP TABLE IF EXISTS `widget`;
				DROP TABLE IF EXISTS `workspace`;
				DROP TABLE IF EXISTS `workspace_child`;
			SET FOREIGN_KEY_CHECKS = 1;
		");
    }
}
