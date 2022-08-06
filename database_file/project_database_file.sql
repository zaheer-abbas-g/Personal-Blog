/*
SQLyog Ultimate v12.5.0 (64 bit)
MySQL - 10.4.22-MariaDB : Database - 15778_zaheer_ahmed
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`15778_zaheer_ahmed` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `15778_zaheer_ahmed`;

/*Table structure for table `blog` */

DROP TABLE IF EXISTS `blog`;

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `blog_title` int(11) DEFAULT NULL,
  `post_per_page` int(11) DEFAULT NULL,
  `blog_background_image` text DEFAULT NULL,
  `blog_status` enum('Active','InActive') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`blog_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `blog` */

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_title` varchar(100) DEFAULT NULL,
  `category_description` text DEFAULT NULL,
  `category_status` enum('Active','InActive') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `category` */

insert  into `category`(`category_id`,`category_title`,`category_description`,`category_status`,`created_at`,`updated_at`) values 
(1,' eLearning Industry','At eLearning Industry you will find the best collection of eLearning articles, eLearning concepts, eLearning software, and eLearning resources. It is the largest online community of elearning professionals in the industry, and was created first and foremost as a knowledge-sharing platform to help elearning professionals and instructional designers connect in a safe online community.','Active','2022-05-11 10:28:19','2022-05-23 10:25:41'),
(2,'Educators Blog','WeAreTeachers is an online community for educators committed to one of the toughest, most rewarding jobs out there. Our Mission is to promote innovation in education through collaboration and connection to the most effective classroom resources.','InActive','2022-05-11 10:32:20','2022-05-12 10:32:14'),
(3,'helo','At eLearning Industry you will find the best collection of eLearning articles, eLearning concepts, eLearning software, and eLearning resources. It is the largest online community of elearning professionals in the industry, and was created first and foremost as a knowledge-sharing platform to help elearning professionals and instructional designers connect in a safe online community.','Active','2022-05-16 09:22:41','2022-05-23 10:08:55'),
(4,'world','At eLearning Industry you will find the best collection of eLearning articles, eLearning concepts, eLearning software, and eLearning resources. It is the largest online community of elearning professionals in the industry, and was created first and foremost as a knowledge-sharing platform to help elearning professionals and instructional designers connect in a safe online community.','Active','2022-05-23 09:51:42','2022-05-23 10:09:30'),
(5,'completed work ','completed work to make sure it meets the initial requirements for word count, formatting, level, etc. Once done, all sources are evaluated for credibility and reviewed for grammar, spelling, and punctuation mistakes.','InActive','2022-05-24 09:50:11','2022-05-24 09:50:18');

/*Table structure for table `post` */

DROP TABLE IF EXISTS `post`;

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_id` int(11) DEFAULT NULL,
  `post_title` varchar(200) NOT NULL,
  `post_summary` text NOT NULL,
  `post_description` longtext NOT NULL,
  `featured_image` text DEFAULT NULL,
  `post_status` enum('Active','InActive') DEFAULT NULL,
  `is_comment_allowed` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`post_id`),
  KEY `blog_id` (`blog_id`),
  CONSTRAINT `post_ibfk_1` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`blog_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4;

/*Data for the table `post` */

insert  into `post`(`post_id`,`blog_id`,`post_title`,`post_summary`,`post_description`,`featured_image`,`post_status`,`is_comment_allowed`,`created_at`,`updated_at`) values 
(1,NULL,'Education','  Education System in pakistan           ','                                           Education in Pakistan is overseen by the Federal Ministry of Education and the provincial governments, whereas the federal government mostly assists in curriculum development, accreditation and in the financing of research and development. Article 25-A of Constitution of Pakistan obligates the state to provide free and compulsory quality education to children of the age group 5 to 16 years. \"The State shall provide free and compulsory education to all children of the age of five to sixteen years in such a manner as may be determined by law,\r\n                    ','reg.jpg','',0,'2022-05-24 10:53:40','2022-05-24 10:39:21'),
(34,NULL,'Foods','Foods That Are Super Healthy        ','         \r\n     1. Apples\r\nApples are high in fiber, vitamin C, and numerous antioxidants. They are very filling and make the perfect snack if you find yourself hungry between meals.\r\n2. Avocados\r\nAvocados are different from most other fruits because they’re loaded with healthy fats instead of carbs. They are not only creamy and tasty but also high in fiber, potassium, and vitamin C.\r\n3. Bananas\r\n\r\nBananas are among the world’s best sources of potassium. They’re also high in vitamin B6 and fiber and are convenient and portable.\r\n\r\n                       \r\n                       \r\n                       \r\n                    ','food.jpg','Active',0,'2022-05-24 10:44:13','2022-05-24 10:44:13'),
(41,NULL,'Benefits of Planting Trees','Most often we plant trees to provide shade and beautify our landscapes. These are great benefits but trees also provide other less obvious benefits    ','\r\n    Trees make life nicer. It has been shown that spending time among trees and green spaces reduces the amount of stress that we carry around with us in our daily lives.\r\n    Hospital patients have been shown to recover from surgery more quickly when their hospital room offered a view of trees.\r\n    Children have been shown to retain more of the information taught in schools if they spend some of their time outdoors in green spaces.\r\n    Trees are often planted as living memorials or reminders of loved ones or to commemorate significant events in our lives.\r\n\r\n                       \r\n                       \r\n                       \r\n                    ','trees.webp','InActive',1,'2022-05-24 10:48:10','2022-05-24 10:48:10'),
(45,NULL,' Tourism in Pakistan','The Land Of Adventure And Nature','rom the mighty stretches of the Karakorams in the North to the vast alluvial delta of the Indus River in the South, Pakistan remains a land of high adventure and nature. Trekking, mountaineering, white water rafting, wild boar hunting, mountain and desert jeep safaris, camel and yak safaris, trout fishing and bird watching, are a few activities, which entice the adventure and nature lovers to Pakistan\r\n                    ','tourism.jpg','InActive',1,'2022-05-24 10:53:39','2022-05-24 10:53:39'),
(46,NULL,'Tecnology','What is Information Technology (IT)    ','Information Technology (IT) is a popular career field for network professionals who manage the underlying computing infrastructure of a business.\r\nIT jobs are varied and the salary can be lucrative, but many IT workers say they get into the field because they love technology.  Network professionals in IT enjoy working with cutting-edge technology and helping to solve business problems using technology solutions.\r\n                       \r\n                    ','it.jpg','InActive',0,'2022-05-24 10:58:50','2022-05-24 10:58:50');

/*Table structure for table `post_atachment` */

DROP TABLE IF EXISTS `post_atachment`;

CREATE TABLE `post_atachment` (
  `post_atachment_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) DEFAULT NULL,
  `post_attachment_title` varchar(200) DEFAULT NULL,
  `post_attachment_path` text DEFAULT NULL,
  `is_active` enum('Active','InActive') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`post_atachment_id`),
  KEY `fk1` (`post_id`),
  CONSTRAINT `fk1` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `post_atachment` */

/*Table structure for table `post_category` */

DROP TABLE IF EXISTS `post_category`;

CREATE TABLE `post_category` (
  `post_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`post_category_id`),
  KEY `post_id` (`post_id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `post_category_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `post_category_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `post_category` */

/*Table structure for table `role` */

DROP TABLE IF EXISTS `role`;

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_type` varchar(50) NOT NULL,
  `is_active` enum('Active','InActive') DEFAULT 'Active',
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `role` */

insert  into `role`(`role_id`,`role_type`,`is_active`) values 
(1,'admin','Active'),
(2,'user','Active');

/*Table structure for table `setting` */

DROP TABLE IF EXISTS `setting`;

CREATE TABLE `setting` (
  `setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `setting_key` varchar(100) DEFAULT NULL,
  `setting_value` varchar(100) DEFAULT NULL,
  `setting_status` enum('Active','InActive') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`setting_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `setting_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `setting` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` text NOT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `user_image` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `is_approved` enum('Pending','Approved','Rejected') DEFAULT 'Pending',
  `is_active` enum('Active','InActive') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user` */

insert  into `user`(`user_id`,`role_id`,`first_name`,`last_name`,`email`,`password`,`gender`,`date_of_birth`,`user_image`,`address`,`is_approved`,`is_active`,`created_at`,`updated_at`) values 
(40,1,'asif','khan','asif@gmail.com','asif123','Female','2022-06-01','admin_logo.png','karachi pakistan sindh','Approved','Active','2022-05-23 09:20:32','2022-05-20 09:12:56'),
(41,2,'ameen','ali','ameen@gmail.com','ameen123','Male','2022-05-09','PIC.jpg','ghotki','Rejected','InActive','2022-05-24 09:46:56','2022-05-24 09:46:56'),
(45,2,'zaheer','abbas','zaheer@gmail.com','zaheer123','Male','2022-05-10','PIC.jpg','jamshoro\r\n','Approved','Active','2022-05-24 12:17:26','2022-05-24 09:47:08'),
(46,2,'asad','khan','asad@gmail.com','asd123','Male','2022-05-09','admin_logo.png','','Pending','InActive','2022-05-24 12:17:53','2022-05-24 09:47:21'),
(48,2,'ameen','ahmed','ameen@gmail.com','ali123','Male','2022-05-19','abbas.jpg','Ghotki sindh pakistan','Approved','Active','2022-05-23 12:27:02','2022-05-23 12:27:02'),
(49,1,'noor','hassan','noor@gmail.com','noor123','Female','2022-02-15','admin_logo.png','','Approved','Active','2022-05-23 09:41:06','2022-05-23 09:41:06'),
(50,1,'umar','khan','umar@gmail.com','kamran123','Male','2022-05-17','PIC.jpg','jamshoro','Approved','Active','2022-05-23 09:46:02','2022-05-23 09:46:02'),
(51,2,'imran','ali','imran@gmail.com','12345','Male','2022-05-20','PIC.jpg','jamshoro socity phase one','Approved','Active','2022-05-24 12:30:54',NULL);

/*Table structure for table `user_blog_following` */

DROP TABLE IF EXISTS `user_blog_following`;

CREATE TABLE `user_blog_following` (
  `follow_id` int(11) NOT NULL AUTO_INCREMENT,
  `follower_id` int(11) DEFAULT NULL,
  `blog_following_id` int(11) DEFAULT NULL,
  `status` enum('Followed','Unfollowed') DEFAULT 'Followed',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`follow_id`),
  KEY `blog_following_id` (`blog_following_id`),
  KEY `follower_id` (`follower_id`),
  CONSTRAINT `user_blog_following_ibfk_1` FOREIGN KEY (`blog_following_id`) REFERENCES `blog` (`blog_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_blog_following_ibfk_2` FOREIGN KEY (`follower_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user_blog_following` */

insert  into `user_blog_following`(`follow_id`,`follower_id`,`blog_following_id`,`status`,`created_at`,`updated_at`) values 
(1,NULL,NULL,'Unfollowed','2022-05-24 12:18:41','2022-05-12 11:40:51');

/*Table structure for table `user_feedback` */

DROP TABLE IF EXISTS `user_feedback`;

CREATE TABLE `user_feedback` (
  `feedback_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `feedback` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`feedback_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `user_feedback_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user_feedback` */

insert  into `user_feedback`(`feedback_id`,`user_id`,`user_name`,`user_email`,`feedback`,`created_at`,`updated_at`) values 
(1,NULL,'Ali','ali@gmail.com','Good','2022-05-12 11:39:28','2022-05-12 11:39:28'),
(2,48,'sdf','zaheer@gmail.com','asdf','2022-05-23 12:42:15','2022-05-23 12:42:15'),
(3,48,'sdf','zaheer@gmail.com','asdf','2022-05-23 12:43:03','2022-05-23 12:43:03'),
(4,48,'sdf','zaheer@gmail.com','asdf','2022-05-23 12:43:25','2022-05-23 12:43:25'),
(5,48,'sdf','zaheer@gmail.com','asdf','2022-05-23 12:43:38','2022-05-23 12:43:38'),
(6,48,'sdf','zaheer@gmail.com','asdf','2022-05-23 12:43:47','2022-05-23 12:43:47'),
(7,48,'sdf','zaheer@gmail.com','asdf','2022-05-23 12:44:17','2022-05-23 12:44:17'),
(8,48,'sdf','zaheer@gmail.com','asdf','2022-05-23 12:44:27','2022-05-23 12:44:27'),
(22,48,'zaheer','zaheer@gmail.com','Excellent','2022-05-23 12:54:07','2022-05-23 12:54:07'),
(36,NULL,'unknown','unknown@gmail.com','goood','2022-05-23 13:14:27','2022-05-23 13:13:56'),
(37,NULL,'unknown','unknown@gmail.com','goood','2022-05-23 13:17:40','2022-05-23 13:17:40'),
(38,NULL,'aaaa','aa@a','pppppppppppppppppp','2022-05-23 13:18:17','2022-05-23 13:18:17'),
(39,NULL,'aaaa','aa@a','pppppppppppppppppp','2022-05-23 13:19:23','2022-05-23 13:19:23');

/*Table structure for table `user_post_comment` */

DROP TABLE IF EXISTS `user_post_comment`;

CREATE TABLE `user_post_comment` (
  `post_comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `First Name` text DEFAULT NULL,
  `is_active` enum('Active','InActive') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`post_comment_id`),
  KEY `user_id` (`user_id`),
  KEY `post_id` (`post_id`),
  CONSTRAINT `user_post_comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_post_comment_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user_post_comment` */

insert  into `user_post_comment`(`post_comment_id`,`post_id`,`user_id`,`First Name`,`is_active`,`created_at`) values 
(1,NULL,NULL,NULL,'Active','2022-05-12 11:03:29');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
