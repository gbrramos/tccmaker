/*
SQLyog Community v13.1.5  (64 bit)
MySQL - 5.6.45-log : Database - tccmaker
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`tccmaker` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `tccmaker`;

/*Table structure for table `cache` */

DROP TABLE IF EXISTS `cache`;

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  UNIQUE KEY `cache_key_unique` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `cache` */

/*Table structure for table `comentarios_professor` */

DROP TABLE IF EXISTS `comentarios_professor`;

CREATE TABLE `comentarios_professor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `documentacao_id` int(11) DEFAULT NULL,
  `comentario` longtext,
  `nota` varchar(255) DEFAULT NULL,
  `autor_id` int(11) DEFAULT NULL,
  `created` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `comentarios_professor` */

insert  into `comentarios_professor`(`id`,`documentacao_id`,`comentario`,`nota`,`autor_id`,`created`,`created_at`,`updated_at`) values 
(15,10,'<p>212313131</p>','MB',5,'13/10/2020','2020-10-20 15:55:40','2020-10-13 16:20:10'),
(16,10,'<p>dadadadadad</p>','MB',5,'14/10/2020','2020-10-20 15:55:40','2020-10-14 13:37:13'),
(17,10,'<span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; letter-spacing: normal; text-align: justify;\"><font color=\"#000000\">B</font><span style=\"color: rgb(0, 0, 0); background-color: rgb(0, 255, 255);\">ut I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete </span><font color=\"#00ffff\">account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pur</font><span style=\"color: rgb(0, 0, 0); background-color: rgb(0, 255, 255);\">s</span><font color=\"#000000\">ues or desires to obtain pain of itself, because it </font><u style=\"color: rgb(0, 0, 0);\">is pain, but because occasionally circum</u><font color=\"#000000\">stances occur in which toil and pain can procure him some great pleasure. To take a trivial example</font></span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; letter-spacing: normal; text-align: justify; background-color: rgb(255, 255, 0);\"><font color=\"#000000\">, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who choose</font></span><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; letter-spacing: normal; text-align: justify;\">s to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?</span>',NULL,5,'14/10/2020','2020-10-20 15:55:42','2020-10-14 14:39:21');

/*Table structure for table `configuracoes` */

DROP TABLE IF EXISTS `configuracoes`;

CREATE TABLE `configuracoes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `parametro` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `configuracoes` */

/*Table structure for table `curso` */

DROP TABLE IF EXISTS `curso`;

CREATE TABLE `curso` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `curso` */

insert  into `curso`(`id`,`nome`,`slug`,`created_at`,`updated_at`) values 
(1,'Informática','info','2020-09-29 20:24:27','0000-00-00 00:00:00'),
(2,'Administração','adm','2020-09-29 20:24:40','0000-00-00 00:00:00'),
(3,'Automação Industrial','aut','2020-09-29 20:25:26','0000-00-00 00:00:00');

/*Table structure for table `documentacao_tcc` */

DROP TABLE IF EXISTS `documentacao_tcc`;

CREATE TABLE `documentacao_tcc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `equipe_id` int(11) DEFAULT NULL,
  `introducao` longtext,
  `resumo` longtext,
  `objetivo_geral` longtext,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `documentacao_tcc` */

insert  into `documentacao_tcc`(`id`,`equipe_id`,`introducao`,`resumo`,`objetivo_geral`,`created_at`,`updated_at`) values 
(1,14,'aiifajnijda	\r\n','jsaojsasas','aadadadadad','2020-10-27 11:27:24','0000-00-00 00:00:00');

/*Table structure for table `equipe_tcc` */

DROP TABLE IF EXISTS `equipe_tcc`;

CREATE TABLE `equipe_tcc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) DEFAULT NULL,
  `integrantes` longtext,
  `curso_id` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `sobre` longtext,
  `logo_id` int(11) DEFAULT NULL,
  `login` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `equipe_tcc` */

insert  into `equipe_tcc`(`id`,`titulo`,`integrantes`,`curso_id`,`id_user`,`sobre`,`logo_id`,`login`,`password`,`remember_token`,`created_at`,`updated_at`) values 
(10,'TccMaker Teste','Beatriz Lima, Cauã Melo, Gabriel Ramos, Gabriel Pires',1,26,'Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos. Lorem Ipsum sobreviveu não só a cinco séculos, como também ao salto para a editoração eletrônica, permanecendo essencialmente inalterado. Se popularizou na década de 60, quando a Letraset lançou decalques contendo passagens de Lorem Ipsum, e mais recentemente quando passou a ser integrado a softwares de editoração eletrônica como Aldus PageMaker.',10,'testetccmaker','$2y$10$78ChQIVbdUibV.TTbQgsoOmI0o8UmmC/VBBc8XHJJhy4uWvt2XZde',NULL,'2020-10-19 19:18:12','2020-10-19 19:18:12'),
(11,'testealuno','abdsi\\adadad',1,29,'adadad',12,'tccmaker','$2y$10$ZBh14.WKqyHum14JtEKOtuXItmj5BwBuEOC/LqMY8bKQnYVNa0jWO',NULL,'2020-10-22 10:36:14','2020-10-22 10:36:14'),
(12,'teste','adada',1,30,'adada',12,'tccmakerteste','$2y$10$J0rjgTYZ2FxMJ7z5D5ID..VapnM/hZWsgBvUkoTjn0XMsQiGF.M5.',NULL,'2020-10-22 10:37:50','2020-10-22 10:37:50'),
(13,'teste','teste123',1,31,'adadadaad',13,'tccmaker123','$2y$10$2Hudc9StnsN9dExX7LG9YOr74CFPgvQaCMSl1wbBZI1DHaAoyactq',NULL,'2020-10-26 11:51:12','2020-10-26 11:51:12'),
(14,'testetccinfo','integrantes',1,32,'adsadada',14,'testetccinfo','$2y$10$UgOLc4Ao4NW0JrxxXhxLv.F/Po82CHY2SQINrrsr1RSc3xBsPhTTq',NULL,'2020-10-26 11:53:35','2020-10-26 11:53:35');

/*Table structure for table `logo` */

DROP TABLE IF EXISTS `logo`;

CREATE TABLE `logo` (
  `id` int(11) NOT NULL,
  `media_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `logo` */

/*Table structure for table `media` */

DROP TABLE IF EXISTS `media`;

CREATE TABLE `media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `alt` varchar(255) DEFAULT NULL,
  `folder_parent` varchar(255) DEFAULT NULL,
  `folder` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

/*Data for the table `media` */

insert  into `media`(`id`,`file`,`type`,`alt`,`folder_parent`,`folder`,`created_at`,`updated_at`) values 
(6,'1602016531-92824.jpg','jpg',NULL,NULL,'uploads/img/profiles','2020-10-06 17:35:31','2020-10-06 17:35:31'),
(7,'1602016643-92824.jpg','jpg',NULL,NULL,'uploads/img/profiles','2020-10-06 17:37:23','2020-10-06 17:37:23'),
(8,'1602353612-92824.jpg','jpg',NULL,NULL,'uploads/img/logos','2020-10-10 15:13:32','2020-10-10 15:13:32'),
(9,'1602855135-download.png','png',NULL,NULL,'uploads/img/logos','2020-10-16 10:32:15','2020-10-16 10:32:15'),
(10,'1603145843-download.png','png',NULL,NULL,'uploads/img/logos','2020-10-19 19:17:23','2020-10-19 19:17:23'),
(11,'1603373431-download.png','png',NULL,NULL,'uploads/img/profiles','2020-10-22 10:30:31','2020-10-22 10:30:31'),
(12,'1603373763-download.png','png',NULL,NULL,'uploads/img/logos','2020-10-22 10:36:03','2020-10-22 10:36:03'),
(13,'1603723855-download.png','png',NULL,NULL,'uploads/img/logos','2020-10-26 11:50:55','2020-10-26 11:50:55'),
(14,'1603724002-download.png','png',NULL,NULL,'uploads/img/logos','2020-10-26 11:53:22','2020-10-26 11:53:22');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `migrations` */

/*Table structure for table `objetivos_especificos` */

DROP TABLE IF EXISTS `objetivos_especificos`;

CREATE TABLE `objetivos_especificos` (
  `id` int(11) NOT NULL,
  `documentacao_id` int(11) DEFAULT NULL,
  `descricao` longtext,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `objetivos_especificos` */

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `type` enum('super_admin','admin','member') DEFAULT 'admin',
  `media_id` int(11) DEFAULT NULL,
  `curso_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`password`,`remember_token`,`slug`,`type`,`media_id`,`curso_id`,`created_at`,`updated_at`) values 
(5,'MasterAdmin','masteradmin@gmail.com','$2y$10$rWFuQAC9x6zgedN5CMg9ueL268wwJALChrYFUf/7sSoP/8w1ra60i',NULL,NULL,'super_admin',NULL,1,'2020-07-15 15:41:18','2020-07-15 15:41:18'),
(26,'TccMaker Teste','testetccmaker','$2y$10$78ChQIVbdUibV.TTbQgsoOmI0o8UmmC/VBBc8XHJJhy4uWvt2XZde',NULL,'tccmaker teste','member',10,1,'2020-10-19 19:18:12','2020-10-19 19:18:12'),
(27,'TesteProfessor','testeprofessor@gmail.com','$2y$10$78ChQIVbdUibV.TTbQgsoOmI0o8UmmC/VBBc8XHJJhy4uWvt2XZde',NULL,'teste_professor','admin',10,1,NULL,NULL),
(28,'Teste user model empresa','gabriel@gmail.com','$2y$10$ShPcW4/bzKqEmCjcWcl18uIadjBJhA5aS62.w8AK07YsBu3s3LsWe',NULL,'teste-user-model-empresa','admin',11,1,'2020-10-22 10:31:29','2020-10-22 10:31:29'),
(32,'testetccinfo','testetccinfo','$2y$10$UgOLc4Ao4NW0JrxxXhxLv.F/Po82CHY2SQINrrsr1RSc3xBsPhTTq',NULL,'testetccinfo','member',14,1,'2020-10-26 11:53:35','2020-10-26 11:53:35');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
