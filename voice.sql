/*
SQLyog - Free MySQL GUI v5.15
Host - 5.6.22 : Database - myvoice
*********************************************************************
Server version : 5.6.22
*/

SET NAMES utf8;

SET SQL_MODE='';

create database if not exists `myvoice`;

USE `myvoice`;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';

/*Table structure for table `accused` */

DROP TABLE IF EXISTS `accused`;

CREATE TABLE `accused` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `accused_name` varchar(100) NOT NULL,
  `accused_bu` varchar(150) DEFAULT NULL,
  `accused_city` varchar(100) DEFAULT NULL,
  `accused_location` varchar(150) DEFAULT NULL,
  `accused_empid` varchar(50) DEFAULT NULL,
  `accused_email` varchar(150) DEFAULT NULL,
  `complaint_id` varchar(50) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_email` varchar(150) DEFAULT NULL,
  `user_concern_details` text,
  `accused_dept` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

/*Data for the table `accused` */

insert into `accused` (`id`,`accused_name`,`accused_bu`,`accused_city`,`accused_location`,`accused_empid`,`accused_email`,`complaint_id`,`user_id`,`user_email`,`user_concern_details`,`accused_dept`) values (1,'sunil','bu1','Allahabad','Gurgaon','p-ni0043','of@gmail.com','427',422,NULL,NULL,'it'),(2,'Nikhil','Quatrro Global Service Pvt Ltd','Gurgaon','Gurgaon','QUA00235','nikhil@quatrro.com','432',419,NULL,NULL,'Technology'),(3,'mahesh','bu1','Allahabad','Gurgaon','p-ni23','','434',422,NULL,NULL,'it'),(4,'Hemlata Gupta','QBBS','Gurgaon','Mumbai','TEST4555','skyadav.india@gmail.com','437',419,NULL,NULL,'Finance '),(5,'Akash ','bu2','Allahabad','Gurgaon','','abhhishe@m.com','438',422,NULL,NULL,'it'),(6,'mukesh ','bu2','Allahabad','Gurgaon','p-ni001','','440',439,NULL,NULL,'it'),(7,'Manish Yadav','QGS Pvt Ltd','Gurgaon','Gurgaon','QUA99966','manish@gmail.com','443',NULL,NULL,NULL,'Technology'),(8,'XYZ','','','','','','444',NULL,NULL,NULL,'HR'),(9,'Joy','IT','Gurgaon','Gurgaon','QAT1222','joy@quatrro.com','447',NULL,NULL,NULL,'IT'),(10,'Sourav Sharma','QGS Pvt Ltd','Gurgaon','Gurgaon','QUA02356','sourav@gmail.com','448',NULL,NULL,NULL,'Technology'),(11,'aditya','IT','Delhi','Delhi','QA1234','adithya@gmail.com','450',NULL,NULL,NULL,'IT'),(12,'ira','Sales','Delhi','Delhi','QA12344','ira@gmail.com','451',NULL,NULL,NULL,'IT'),(13,'Tushar','','','','','','455',NULL,NULL,NULL,'Technology'),(14,'Atul','QGS','gurgaon','gurgaon','e5345','','456',NULL,NULL,NULL,'technology'),(15,'Bhavesh Garg','QGS Pvt Ltd','Gurgaon','Gurgaon','QUA30020','bhavesh.garg@quatrro.com','457',NULL,NULL,NULL,'Technology'),(16,'Tarun','QGS','Gurgaon','Gurgaon','QUa23654','tarun@gm,ail.com','458',NULL,NULL,NULL,'Technology'),(17,'Mike','IT','Delhi','Delhi','QA999','mike@gmial.com','459',NULL,NULL,NULL,'IT'),(18,'Mayank Raj','QGS ','Gurgaon','Gurgaon','QUA98562','mayank.raj@gmail.com','460',NULL,NULL,NULL,'Technology'),(19,'Aditya','QGS','Gurgaon','Gurgaon','QUA89567','adi@gmail.com','461',NULL,NULL,NULL,'Technology'),(20,'Testing Person','QGS','Gurgaon','Gurgaon','QUA56982','testing.person@quatrro.com','462',NULL,NULL,NULL,'Technology'),(21,'testing','','','','','','468',NULL,NULL,NULL,'testing');

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `sub_cat_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

/*Data for the table `category` */

insert into `category` (`id`,`client_id`,`sub_cat_id`,`name`,`status`) values (1,25,0,'Harrasment',1),(2,25,1,'Physical Advances',1),(3,26,1,'Demand / Request for sexual favors',1),(4,26,0,'Ethics',1),(5,27,4,'Corruption',1),(6,27,4,'Political Alingment',1),(7,28,0,'Disciplinary',1),(8,25,7,'Alcohol',1),(9,26,7,'Insubordination',1),(10,28,1,'Showing inappropriate video / images',1),(11,27,1,'Sexual comments',1),(12,27,1,'Misconduct of any physical / verbal / nonverbal',1),(13,25,1,'Force',0),(14,26,1,'Cyber Bullying',1),(15,28,7,'Asset Disaster',1),(16,25,7,'Physical Fight',1),(17,27,4,'Monetary Gain',1),(18,26,4,'Personal Intrest',1),(19,25,4,'Unethical Conduct',1),(20,28,0,'Other',1),(57,27,20,'Other',1),(58,27,1,'Other',1),(59,27,4,'Other',1),(60,27,7,'Other',1),(61,0,0,'',0);

/*Table structure for table `client_master` */

DROP TABLE IF EXISTS `client_master`;

CREATE TABLE `client_master` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_type` varchar(50) NOT NULL,
  `bu_id` int(4) NOT NULL,
  `industry_id` int(11) NOT NULL,
  `client_code` varchar(255) NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `zip` int(6) DEFAULT NULL,
  `email_id` varchar(100) DEFAULT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `mobile` varchar(16) DEFAULT NULL,
  `fax` varchar(16) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `logo` varchar(255) NOT NULL,
  `cp_name` varchar(100) DEFAULT NULL,
  `cp_email_id` varchar(100) DEFAULT NULL,
  `cp_mobile` varchar(16) NOT NULL,
  `created_by` int(4) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(4) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL,
  `activation_date` datetime NOT NULL,
  `deactivation_date` datetime NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `client_master` */

/*Table structure for table `complaintdetails` */

DROP TABLE IF EXISTS `complaintdetails`;

CREATE TABLE `complaintdetails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `complaint_id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `meeting_date` varchar(30) DEFAULT NULL,
  `note` text,
  `attendees` varchar(150) DEFAULT NULL,
  `comments_attendes` text,
  `next_meeting` varchar(30) DEFAULT NULL,
  `document_upload_date` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

/*Data for the table `complaintdetails` */

insert into `complaintdetails` (`id`,`user_id`,`complaint_id`,`image`,`meeting_date`,`note`,`attendees`,`comments_attendes`,`next_meeting`,`document_upload_date`,`created`,`modified`) values (1,358,427,'1533813374_358_1.jpg',NULL,'this is displinary spoc',NULL,NULL,NULL,'2018-08-09 00:00:00','2018-08-09 16:46:14','2018-08-09 16:46:14'),(2,418,432,'1533820161_418_1.xlsx',NULL,'',NULL,NULL,NULL,'2018-08-09 00:00:00','2018-08-09 18:39:21','2018-08-09 18:39:21'),(3,418,432,'1533824646_418_1.xlsx',NULL,'',NULL,NULL,NULL,'2018-08-09 00:00:00','2018-08-09 19:54:06','2018-08-09 19:54:06'),(4,418,432,'1533824726_418_1.xlsx,1533824726_418_2.xlsx',NULL,'',NULL,NULL,NULL,'2018-08-09 00:00:00','2018-08-09 19:55:26','2018-08-09 19:55:26'),(5,420,432,'1533825335_420_1.xlsx',NULL,'Notes text goes here',NULL,NULL,NULL,NULL,'2018-08-09 20:05:35','2018-08-09 20:05:35'),(6,420,432,NULL,NULL,'Notes text goes here',NULL,NULL,NULL,NULL,'2018-08-09 20:07:43','2018-08-09 20:07:43'),(7,418,432,'',NULL,'notes text goes here...',NULL,NULL,NULL,'2018-08-10 00:00:00','2018-08-10 21:04:16','2018-08-10 21:04:16'),(8,417,443,NULL,NULL,'Case is genuine and need to be investigate properly and accurately',NULL,NULL,NULL,NULL,'2018-08-14 13:06:30','2018-08-14 13:06:30'),(9,418,443,'',NULL,'Panel is assigned against the case and they will investigate it further',NULL,NULL,NULL,'2018-08-14 00:00:00','2018-08-14 13:11:02','2018-08-14 13:11:02'),(10,420,443,NULL,NULL,'I have read all the details',NULL,NULL,NULL,NULL,'2018-08-14 13:12:21','2018-08-14 13:12:21'),(11,423,443,NULL,'14 08 2018, 12:16 PM','I have read all the details about the case','420,423','need to discuss on the case based on our reports','16 08 2018, 1:16 PM',NULL,'2018-08-14 13:16:24','2018-08-14 13:16:24'),(12,424,443,'',NULL,'close complaint',NULL,NULL,NULL,'2018-08-14 00:00:00','2018-08-14 14:39:24','2018-08-14 14:39:24'),(13,418,432,'1534839121_418_1.png,1534839121_418_2.png',NULL,'',NULL,NULL,NULL,NULL,'2018-08-21 08:12:01','2018-08-21 08:12:01'),(14,423,456,'1534937866_423_1.jpg','22 08 2018, 5:07 PM','sadf','417,421,420','sdf','23 08 2018, 5:07 PM',NULL,'2018-08-22 11:37:46','2018-08-22 11:37:46'),(15,423,457,'1535006189_423_1.jpg,1535006189_423_2.jpg','23 08 2018, 12:06 PM','sdfg','421,418','asdf','24 08 2018, 12:06 PM',NULL,'2018-08-23 06:36:29','2018-08-23 06:36:29'),(16,420,457,'1535006253_420_1.docx',NULL,'Final testing harassment module',NULL,NULL,NULL,NULL,'2018-08-23 06:37:33','2018-08-23 06:37:33'),(17,421,457,'1535006470_421_1.jpg',NULL,'Comment from sidhhartha',NULL,NULL,NULL,NULL,'2018-08-23 06:41:10','2018-08-23 06:41:10'),(18,424,457,NULL,NULL,'Testing complaint fromSmiriti side',NULL,NULL,NULL,NULL,'2018-08-23 06:41:13','2018-08-23 06:41:13'),(19,421,457,NULL,NULL,'Comment from sidhhartha',NULL,NULL,NULL,NULL,'2018-08-23 06:41:30','2018-08-23 06:41:30'),(20,421,457,'1535006539_421_1.jpg',NULL,'Test comment',NULL,NULL,NULL,NULL,'2018-08-23 06:42:19','2018-08-23 06:42:19'),(21,423,459,NULL,'23 08 2018, 3:12 PM','asd','418','asd','23 08 2018, 3:13 PM',NULL,'2018-08-23 09:43:12','2018-08-23 09:43:12'),(22,420,460,NULL,NULL,'Final case testing from Nidhi side as panel member',NULL,NULL,NULL,NULL,'2018-08-23 11:46:34','2018-08-23 11:46:34'),(23,421,460,'1535024893_421_1.jpg',NULL,'comment from siddharth account',NULL,NULL,NULL,NULL,'2018-08-23 11:48:13','2018-08-23 11:48:13'),(24,423,460,NULL,'23 08 2018, 5:21 PM','Case is genuine','421,423,418','needs to get more information about the case from the user who filed the case','24 08 2018, 5:22 PM',NULL,'2018-08-23 11:52:44','2018-08-23 11:52:44'),(25,424,460,NULL,NULL,'Case review from Smriti side',NULL,NULL,NULL,NULL,'2018-08-23 11:53:55','2018-08-23 11:53:55');

/*Table structure for table `complaints` */

DROP TABLE IF EXISTS `complaints`;

CREATE TABLE `complaints` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `complaint_id` varchar(60) DEFAULT NULL,
  `emp_id` varchar(60) DEFAULT NULL,
  `user_type` varchar(60) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `assigned_to` varchar(60) DEFAULT NULL,
  `assigned_role` varchar(60) DEFAULT NULL,
  `assigned_to_hr` int(1) DEFAULT '0',
  `notes` text,
  `superwisor_complaint_accept_date` varbinary(50) DEFAULT NULL,
  `assign_email` varchar(50) DEFAULT NULL,
  `assign_status` varchar(50) DEFAULT NULL,
  `enquiry_letter` text,
  `enquiry_ack` text,
  `investigation_report` varchar(150) DEFAULT NULL,
  `allow_close` int(1) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

/*Data for the table `complaints` */

insert into `complaints` (`id`,`user_id`,`complaint_id`,`emp_id`,`user_type`,`status`,`assigned_to`,`assigned_role`,`assigned_to_hr`,`notes`,`superwisor_complaint_accept_date`,`assign_email`,`assign_status`,`enquiry_letter`,`enquiry_ack`,`investigation_report`,`allow_close`,`created`,`modified`) values (1,365,'427',NULL,NULL,'2',NULL,NULL,0,NULL,'2018-08-09',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL),(2,365,'432',NULL,NULL,'2',NULL,NULL,0,NULL,'2018-08-09',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(3,365,'432',NULL,NULL,'0','418','7',0,NULL,'2018-08-09','Perineeta.Malhotra@quatrro.com','1','1533824726_Employee info.xlsx','1533824726_Employee info.xlsx',NULL,1,NULL,NULL),(4,365,'427',NULL,NULL,'0','358','8',0,NULL,'2018-08-09','ds@quatrro.com','1','1533813374_Chrysanthemum.jpg','1533813374_Hydrangeas.jpg',NULL,0,NULL,NULL),(5,365,'427',NULL,NULL,'0','360','10',0,NULL,'2018-08-09',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL),(6,417,'434',NULL,NULL,'2',NULL,NULL,0,NULL,'2018-08-09',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL),(7,417,'432',NULL,NULL,'0','418','7',0,NULL,'2018-08-09',NULL,NULL,'1533824726_Employee info.xlsx','1533824726_Employee info.xlsx',NULL,1,NULL,NULL),(8,417,'434',NULL,NULL,'0','418','7',0,NULL,'2018-08-09',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL),(9,417,'437',NULL,NULL,'2',NULL,NULL,0,NULL,'2018-08-09',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL),(10,417,'440',NULL,NULL,'2',NULL,NULL,0,NULL,'2018-08-10',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL),(11,417,'438',NULL,NULL,'3',NULL,NULL,0,'this is not geniwin','2018-08-10',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL),(12,417,'443',NULL,NULL,'2',NULL,NULL,0,NULL,'2018-08-14',NULL,NULL,NULL,NULL,NULL,1,'2018-08-14 13:01:10','2018-08-14 13:01:10'),(13,417,'443',NULL,NULL,'0','418','7',0,NULL,'2018-08-14','Perineeta.Malhotra@quatrro.com','1',NULL,NULL,NULL,1,'2018-08-14 13:05:29','2018-08-14 13:05:29'),(14,417,'441',NULL,NULL,'2',NULL,NULL,0,NULL,'2018-08-14',NULL,NULL,NULL,NULL,NULL,0,'2018-08-14 13:06:18','2018-08-14 13:06:18'),(15,417,'442',NULL,NULL,'2',NULL,NULL,0,NULL,'2018-08-14',NULL,NULL,NULL,NULL,NULL,0,'2018-08-14 13:06:48','2018-08-14 13:06:48'),(16,417,'442',NULL,NULL,'2',NULL,NULL,0,NULL,'2018-08-14',NULL,NULL,NULL,NULL,NULL,0,'2018-08-14 13:07:36','2018-08-14 13:07:36'),(17,443,'443',NULL,NULL,'15','424',NULL,1,'','2018-08-14','Smriti.Balhara@quatrro.com','1',NULL,NULL,NULL,0,'2018-08-14 14:38:40','2018-08-14 14:38:40'),(18,443,'443',NULL,NULL,'15','424',NULL,1,'','2018-08-14',NULL,NULL,NULL,NULL,NULL,0,'2018-08-14 15:25:26','2018-08-14 15:25:26'),(19,425,'448',NULL,NULL,'2',NULL,NULL,0,NULL,'2018-08-14',NULL,NULL,NULL,NULL,NULL,0,'2018-08-14 17:22:44','2018-08-14 17:22:44'),(20,425,'448',NULL,NULL,'0','426','9',0,NULL,'2018-08-14',NULL,NULL,NULL,NULL,NULL,0,'2018-08-14 17:23:02','2018-08-14 17:23:02'),(21,425,'448',NULL,NULL,'0','420','5',0,NULL,'2018-08-14',NULL,NULL,NULL,NULL,NULL,0,'2018-08-14 17:27:09','2018-08-14 17:27:09'),(22,417,'449',NULL,NULL,'2',NULL,NULL,0,NULL,'2018-08-17',NULL,NULL,NULL,NULL,NULL,0,'2018-08-17 13:58:15','2018-08-17 13:58:15'),(23,417,'449',NULL,NULL,'0','418','7',0,NULL,'2018-08-17','Perineeta.Malhotra@quatrro.com','1',NULL,NULL,NULL,0,'2018-08-17 13:59:01','2018-08-17 13:59:01'),(24,417,'450',NULL,NULL,'2',NULL,NULL,0,NULL,'2018-08-17',NULL,NULL,NULL,NULL,NULL,1,'2018-08-17 14:18:11','2018-08-17 14:18:11'),(25,417,'450',NULL,NULL,'0','418','7',0,NULL,'2018-08-17','Perineeta.Malhotra@quatrro.com','1',NULL,NULL,NULL,1,'2018-08-17 14:19:01','2018-08-17 14:19:01'),(26,450,'450',NULL,NULL,'9','424',NULL,1,'','2018-08-17','Smriti.Balhara@quatrro.com','1',NULL,NULL,NULL,0,'2018-08-17 14:33:16','2018-08-17 14:33:16'),(27,425,'451',NULL,NULL,'2',NULL,NULL,0,NULL,'2018-08-17',NULL,NULL,NULL,NULL,NULL,0,'2018-08-17 14:43:58','2018-08-17 14:43:58'),(28,425,'451',NULL,NULL,'0','418','7',0,NULL,'2018-08-17',NULL,NULL,NULL,NULL,NULL,0,'2018-08-17 14:48:10','2018-08-17 14:48:10'),(29,417,'450',NULL,NULL,'0','0','Choose an option',0,NULL,'2018-08-18',NULL,NULL,NULL,NULL,NULL,0,'2018-08-18 07:15:03','2018-08-18 07:15:03'),(30,417,'450',NULL,NULL,'0','0','Choose an option',0,NULL,'2018-08-18',NULL,NULL,NULL,NULL,NULL,0,'2018-08-18 07:20:18','2018-08-18 07:20:18'),(31,417,'450',NULL,NULL,'0','0','Choose an option',0,NULL,'2018-08-18',NULL,NULL,NULL,NULL,NULL,0,'2018-08-18 07:21:10','2018-08-18 07:21:10'),(32,417,'450',NULL,NULL,'0','0','Choose an option',0,NULL,'2018-08-18',NULL,NULL,NULL,NULL,NULL,0,'2018-08-18 07:21:40','2018-08-18 07:21:40'),(33,417,'450',NULL,NULL,'0','0','Choose an option',0,NULL,'2018-08-18',NULL,NULL,NULL,NULL,NULL,0,'2018-08-18 07:22:53','2018-08-18 07:22:53'),(34,417,'450',NULL,NULL,'0','418','Choose an option',0,NULL,'2018-08-18',NULL,NULL,NULL,NULL,NULL,0,'2018-08-18 07:27:11','2018-08-18 07:27:11'),(35,417,'450',NULL,NULL,'0','418','7',0,NULL,'2018-08-18',NULL,NULL,NULL,NULL,NULL,0,'2018-08-18 07:46:25','2018-08-18 07:46:25'),(36,425,'452',NULL,NULL,'2',NULL,NULL,0,NULL,'2018-08-18',NULL,NULL,NULL,NULL,NULL,1,'2018-08-18 08:31:38','2018-08-18 08:31:38'),(37,425,'452',NULL,NULL,'0','420','9',0,NULL,'2018-08-18','Nidhi.Jain@quatrro.com','1',NULL,NULL,NULL,1,'2018-08-18 08:44:38','2018-08-18 08:44:38'),(38,452,'452',NULL,NULL,'9','421',NULL,1,'Please close','2018-08-18','Siddharth.Gupta@quatrro.com','1',NULL,NULL,NULL,0,'2018-08-18 09:43:54','2018-08-18 09:43:54'),(39,446,'453',NULL,NULL,'2',NULL,NULL,0,NULL,'2018-08-18',NULL,NULL,NULL,NULL,NULL,1,'2018-08-18 09:46:10','2018-08-18 09:46:10'),(40,446,'453',NULL,NULL,'0','421','8',0,NULL,'2018-08-18','Siddharth.Gupta@quatrro.com','1',NULL,NULL,NULL,1,'2018-08-18 09:46:27','2018-08-18 09:46:27'),(41,453,'453',NULL,NULL,'9','417',NULL,1,'Please close','2018-08-18','Swati.Menon@quatrro.com','1',NULL,NULL,NULL,0,'2018-08-18 09:58:37','2018-08-18 09:58:37'),(42,425,'454',NULL,NULL,'2',NULL,NULL,0,NULL,'2018-08-18',NULL,NULL,NULL,NULL,NULL,1,'2018-08-18 10:19:10','2018-08-18 10:19:10'),(43,425,'454',NULL,NULL,'0','420','9',0,NULL,'2018-08-18','Nidhi.Jain@quatrro.com','1',NULL,NULL,NULL,1,'2018-08-18 10:19:22','2018-08-18 10:19:22'),(44,417,'455',NULL,NULL,'2',NULL,NULL,0,NULL,'2018-08-21',NULL,NULL,NULL,NULL,NULL,0,'2018-08-21 10:19:14','2018-08-21 10:19:14'),(45,417,'455',NULL,NULL,'9','418','7',0,NULL,'2018-08-21','Perineeta.Malhotra@quatrro.com','1',NULL,NULL,NULL,0,'2018-08-21 10:19:52','2018-08-21 10:19:52'),(46,417,'456',NULL,NULL,'2',NULL,NULL,0,NULL,'2018-08-22',NULL,NULL,NULL,NULL,'1535030949_418_1.jpg',1,'2018-08-22 09:37:53','2018-08-22 09:37:53'),(47,417,'456',NULL,NULL,'0','418','7',0,NULL,'2018-08-22','Perineeta.Malhotra@quatrro.com','1',NULL,NULL,'1535030949_418_1.jpg',1,'2018-08-22 09:38:55','2018-08-22 09:38:55'),(48,456,'456',NULL,NULL,'9','424',NULL,1,'asdfsdf','2018-08-22','Smriti.Balhara@quatrro.com','1',NULL,NULL,'1535030949_418_1.jpg',0,'2018-08-22 12:56:16','2018-08-22 12:56:16'),(49,456,'456',NULL,NULL,'10','424',NULL,1,'','2018-08-22','Smriti.Balhara@quatrro.com','1',NULL,NULL,'1535030949_418_1.jpg',0,'2018-08-22 12:58:00','2018-08-22 12:58:00'),(50,417,'457',NULL,NULL,'2',NULL,NULL,0,NULL,'2018-08-23',NULL,NULL,NULL,NULL,'1535024300_423_1.jpg',1,'2018-08-23 06:15:58','2018-08-23 06:15:58'),(51,417,'457',NULL,NULL,'0','418','7',0,NULL,'2018-08-23','Perineeta.Malhotra@quatrro.com','1',NULL,NULL,'1535024300_423_1.jpg',1,'2018-08-23 06:17:19','2018-08-23 06:17:19'),(52,457,'457',NULL,NULL,'10','424',NULL,1,'fgh','2018-08-23','Smriti.Balhara@quatrro.com','1',NULL,NULL,'1535024300_423_1.jpg',0,'2018-08-23 06:44:12','2018-08-23 06:44:12'),(53,425,'458',NULL,NULL,'2',NULL,NULL,0,NULL,'2018-08-23',NULL,NULL,NULL,NULL,'1535034520_430_1.jpg',1,'2018-08-23 06:54:22','2018-08-23 06:54:22'),(54,425,'458',NULL,NULL,'0','420','9',0,NULL,'2018-08-23','Nidhi.Jain@quatrro.com','1',NULL,NULL,'1535034520_430_1.jpg',1,'2018-08-23 06:54:48','2018-08-23 06:54:48'),(55,458,'458',NULL,NULL,'10','421',NULL,1,'asdf','2018-08-23','Siddharth.Gupta@quatrro.com','1',NULL,NULL,'1535034520_430_1.jpg',0,'2018-08-23 07:00:30','2018-08-23 07:00:30'),(56,417,'459',NULL,NULL,'2',NULL,NULL,0,NULL,'2018-08-23',NULL,NULL,NULL,NULL,NULL,1,'2018-08-23 07:46:07','2018-08-23 07:46:07'),(57,417,'459',NULL,NULL,'0','418','7',0,NULL,'2018-08-23','Perineeta.Malhotra@quatrro.com','1',NULL,NULL,NULL,1,'2018-08-23 07:46:29','2018-08-23 07:46:29'),(58,459,'459',NULL,NULL,'17','424',NULL,1,'sd','2018-08-23','Smriti.Balhara@quatrro.com','1',NULL,NULL,NULL,0,'2018-08-23 09:43:51','2018-08-23 09:43:51'),(59,417,'460',NULL,NULL,'2',NULL,NULL,0,NULL,'2018-08-23',NULL,NULL,NULL,NULL,NULL,1,'2018-08-23 11:41:05','2018-08-23 11:41:05'),(60,417,'460',NULL,NULL,'0','418','7',0,NULL,'2018-08-23','Perineeta.Malhotra@quatrro.com','1',NULL,NULL,NULL,1,'2018-08-23 11:41:43','2018-08-23 11:41:43'),(61,460,'460',NULL,NULL,'10','424',NULL,1,'','2018-08-23','Smriti.Balhara@quatrro.com','1',NULL,NULL,NULL,0,'2018-08-23 12:06:21','2018-08-23 12:06:21'),(62,425,'461',NULL,NULL,'2',NULL,NULL,0,NULL,'2018-08-23',NULL,NULL,NULL,NULL,'1535030495_420_1.jpg',1,'2018-08-23 13:14:57','2018-08-23 13:14:57'),(63,425,'461',NULL,NULL,'0','420','9',0,NULL,'2018-08-23','Nidhi.Jain@quatrro.com','1',NULL,NULL,'1535030495_420_1.jpg',1,'2018-08-23 13:15:33','2018-08-23 13:15:33'),(64,461,'461',NULL,NULL,'10','421',NULL,1,'','2018-08-23','Siddharth.Gupta@quatrro.com','1',NULL,NULL,'1535030495_420_1.jpg',0,'2018-08-23 13:19:58','2018-08-23 13:19:58'),(65,446,'462',NULL,NULL,'2',NULL,NULL,0,NULL,'2018-08-23',NULL,NULL,NULL,NULL,'1535032384_420_1.jpg',1,'2018-08-23 13:40:56','2018-08-23 13:40:56'),(66,446,'462',NULL,NULL,'0','421','8',0,NULL,'2018-08-23','Siddharth.Gupta@quatrro.com','1',NULL,NULL,'1535032384_420_1.jpg',1,'2018-08-23 13:41:15','2018-08-23 13:41:15'),(67,462,'462',NULL,NULL,'10','417',NULL,1,'','2018-08-23','Swati.Menon@quatrro.com','1',NULL,NULL,'1535032384_420_1.jpg',0,'2018-08-23 13:51:42','2018-08-23 13:51:42'),(68,417,'468',NULL,NULL,'2',NULL,NULL,0,NULL,'2018-08-31',NULL,NULL,NULL,NULL,NULL,1,'2018-08-31 13:13:24','2018-08-31 13:13:24'),(69,417,'468',NULL,NULL,'0','418','7',0,NULL,'2018-08-31','Perineeta.Malhotra@quatrro.com','1',NULL,NULL,NULL,1,'2018-08-31 13:13:50','2018-08-31 13:13:50'),(70,468,'468',NULL,NULL,'10','424',NULL,1,'','2018-08-31','Smriti.Balhara@quatrro.com','1',NULL,NULL,NULL,0,'2018-08-31 13:24:47','2018-08-31 13:24:47');

/*Table structure for table `cstatus` */

DROP TABLE IF EXISTS `cstatus`;

CREATE TABLE `cstatus` (
  `id` int(11) unsigned NOT NULL,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `cust_id` int(11) NOT NULL,
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Manage all customer complaint status';

/*Data for the table `cstatus` */

insert into `cstatus` (`id`,`name`,`cust_id`,`status`) values (1,'Filed',0,'1'),(2,'Accepted',0,'1'),(4,'Not Applicable',0,'1'),(5,'Panel Assigned',0,'1'),(6,'Inquiry Letter Issued',0,'1'),(7,'Respondent Response Pending',0,'1'),(8,'Respondent Response Received',0,'1'),(9,'Investigation In Progress',0,'1'),(10,'Investigation Closed',0,'1'),(11,'Inquiry Report In Progress',0,'1'),(12,'Inquiry Report Closed',0,'1'),(13,'Implementation of Recommendations In Progress',0,'1'),(14,'Implementation of Recommendations Closed',0,'1'),(15,'Closed',0,'1'),(16,'Rejected',0,'1'),(17,'Action Closed',0,'1');

/*Table structure for table `images` */

DROP TABLE IF EXISTS `images`;

CREATE TABLE `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

/*Data for the table `images` */

insert into `images` (`id`,`user_id`,`image`) values (1,427,'1533809486_Chrysanthemum.jpg'),(2,427,'1533809486_Desert.jpg'),(3,432,'1533811033_abused.jpg'),(4,432,'1533811033_demo.docx'),(5,432,'1533811033_airline.xls'),(6,434,'1533816349_Chrysanthemum.jpg'),(7,434,'1533816349_Lighthouse.jpg'),(8,437,'1533830169_Rahul CV.doc'),(9,437,'1533830169_3rd floor new seat plan.csv'),(10,438,'1533887120_Chrysanthemum.jpg'),(11,438,'1533887120_Tulips.jpg'),(12,440,'1533887885_Lighthouse.jpg'),(13,440,'1533887885_Lighthouse.jpg'),(14,441,'1533896469_HR Product_Tracker.xlsx'),(15,441,'1533896469_Employee info.xlsx'),(16,442,'1533905672_121098'),(17,443,'1534231787_abused.jpg'),(18,443,'1534231787_demo.docx'),(19,443,'1534231787_airline.xls'),(20,447,'1534240969_mail.png'),(21,448,'1534241785_demo.docx'),(22,448,'1534241785_airline.xls'),(23,450,'1534515458_Lighthouse.jpg'),(24,451,'1534516668_Lighthouse.jpg'),(25,455,'1534846732_abused.jpg'),(26,456,'1534930615_abused.jpg'),(27,457,'1535004935_abused.jpg'),(28,457,'1535004935_Capture.JPG'),(29,459,'1535010297_Lighthouse.jpg'),(30,460,'1535024440_demo.docx'),(31,460,'1535024440_37031.jpg'),(32,460,'1535024440_Capture.JPG'),(33,460,'1535024440_airline.xls'),(34,460,'1535024440_Errors in Unit testing.docx');

/*Table structure for table `panels` */

DROP TABLE IF EXISTS `panels`;

CREATE TABLE `panels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `complaint_id` int(10) NOT NULL,
  `is_scribe` enum('1','0') DEFAULT '0',
  `is_accepted` int(11) NOT NULL DEFAULT '0',
  `i_status` tinyint(1) DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

/*Data for the table `panels` */

insert into `panels` (`id`,`user_id`,`complaint_id`,`is_scribe`,`is_accepted`,`i_status`,`status`,`created`,`modified`) values (1,421,432,'0',1,0,0,'2018-08-09 16:40:51','2018-08-09 16:45:43'),(2,420,432,'0',1,0,0,'2018-08-09 16:44:52','2018-08-09 18:29:43'),(3,423,432,'1',1,0,0,'2018-08-09 16:45:08','2018-08-09 18:28:31'),(4,429,427,'0',0,0,0,'2018-08-09 16:47:00','2018-08-09 16:47:00'),(5,421,427,'0',0,0,0,'2018-08-09 17:28:59','2018-08-09 17:28:59'),(6,420,443,'0',1,1,0,'2018-08-14 13:08:29','2018-08-14 14:37:08'),(7,423,443,'1',1,1,0,'2018-08-14 13:09:30','2018-08-14 15:25:26'),(8,429,443,'0',1,1,0,'2018-08-14 13:53:30','2018-08-14 14:37:21'),(9,420,449,'0',1,0,0,'2018-08-17 14:00:52','2018-08-17 14:01:57'),(10,421,449,'0',0,0,0,'2018-08-17 14:01:07','2018-08-17 14:01:07'),(11,423,449,'1',0,0,0,'2018-08-17 14:01:21','2018-08-17 14:01:21'),(12,420,450,'0',1,1,0,'2018-08-17 14:24:44','2018-08-17 14:32:46'),(13,421,450,'0',1,1,0,'2018-08-17 14:25:16','2018-08-17 14:32:08'),(14,423,450,'1',1,0,0,'2018-08-17 14:25:28','2018-08-17 14:33:16'),(15,418,450,'0',1,1,0,'2018-08-18 08:27:21','2018-08-18 08:27:21'),(16,424,452,'0',1,1,0,'2018-08-18 09:14:39','2018-08-18 09:29:39'),(17,429,452,'0',1,1,0,'2018-08-18 09:14:48','2018-08-18 09:30:03'),(18,430,452,'1',1,1,0,'2018-08-18 09:15:05','2018-08-18 09:43:54'),(19,424,453,'0',1,1,0,'2018-08-18 09:49:21','2018-08-18 09:58:00'),(21,420,453,'1',1,1,0,'2018-08-18 09:50:01','2018-08-18 09:58:37'),(22,429,453,'0',1,1,0,'2018-08-18 09:56:13','2018-08-18 09:58:11'),(23,424,454,'0',1,1,0,'2018-08-18 10:19:44','2018-08-23 14:27:13'),(24,429,454,'0',1,0,0,'2018-08-18 10:19:53','2018-08-18 10:20:48'),(25,430,454,'1',1,0,0,'2018-08-18 10:20:00','2018-08-18 10:24:08'),(26,420,455,'0',1,0,0,'2018-08-21 10:20:56','2018-08-21 10:30:31'),(27,421,455,'0',1,0,0,'2018-08-21 10:21:04','2018-08-21 10:30:48'),(28,423,455,'1',1,0,0,'2018-08-21 10:26:29','2018-08-21 10:30:19'),(29,424,455,'0',1,0,0,'2018-08-22 08:18:25','2018-08-23 14:27:27'),(30,417,455,'0',0,0,0,'2018-08-22 08:19:15','2018-08-22 08:19:15'),(31,417,456,'0',1,1,0,'2018-08-22 09:39:33','2018-08-22 12:06:26'),(33,421,456,'0',1,1,0,'2018-08-22 09:39:57','2018-08-22 11:41:23'),(34,423,456,'1',1,1,0,'2018-08-22 09:40:16','2018-08-22 12:58:00'),(35,420,456,'0',1,1,0,'2018-08-22 09:40:52','2018-08-22 11:41:41'),(36,420,457,'0',1,1,0,'2018-08-23 06:17:56','2018-08-23 06:43:31'),(37,421,457,'0',1,1,0,'2018-08-23 06:18:06','2018-08-23 06:43:45'),(38,423,457,'1',1,0,0,'2018-08-23 06:18:21','2018-08-23 06:21:14'),(39,424,457,'0',1,1,0,'2018-08-23 06:18:42','2018-08-23 06:43:14'),(40,424,458,'0',1,1,0,'2018-08-23 06:55:15','2018-08-23 06:59:24'),(41,429,458,'0',1,1,0,'2018-08-23 06:55:27','2018-08-23 06:59:28'),(42,430,458,'1',1,0,0,'2018-08-23 06:55:36','2018-08-23 06:57:45'),(43,421,458,'0',1,1,0,'2018-08-23 06:55:50','2018-08-23 07:00:14'),(44,420,459,'0',1,1,0,'2018-08-23 07:47:51','2018-08-23 09:43:38'),(45,423,459,'1',1,0,0,'2018-08-23 07:47:58','2018-08-23 09:42:40'),(46,420,460,'0',1,1,0,'2018-08-23 11:43:30','2018-08-23 11:55:09'),(47,421,460,'0',1,1,0,'2018-08-23 11:43:38','2018-08-23 11:55:20'),(48,423,460,'1',1,0,0,'2018-08-23 11:43:48','2018-08-23 11:48:32'),(49,424,460,'0',1,1,0,'2018-08-23 11:44:06','2018-08-23 11:55:54'),(50,424,461,'0',1,1,0,'2018-08-23 13:16:07','2018-08-23 13:18:30'),(51,429,461,'0',1,1,0,'2018-08-23 13:16:15','2018-08-23 13:18:53'),(52,430,461,'1',1,0,0,'2018-08-23 13:16:50','2018-08-23 13:17:48'),(53,424,462,'0',1,1,0,'2018-08-23 13:49:58','2018-08-23 13:51:07'),(54,429,462,'0',1,1,0,'2018-08-23 13:50:06','2018-08-23 13:51:15'),(55,420,462,'1',1,0,0,'2018-08-23 13:50:13','2018-08-23 13:50:48'),(56,420,468,'0',1,1,0,'2018-08-31 13:20:32','2018-08-31 13:22:30'),(57,421,468,'0',1,1,0,'2018-08-31 13:20:42','2018-08-31 13:22:43'),(58,423,468,'1',1,1,0,'2018-08-31 13:20:52','2018-08-31 13:24:47');

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` tinyint(8) NOT NULL AUTO_INCREMENT,
  `cust_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `roles` */

insert into `roles` (`id`,`cust_id`,`name`,`status`) values (1,0,'Admin','1'),(2,0,'Super Admin','1'),(3,0,'MVM (Harassment)','1'),(4,0,'HR','1'),(5,0,'Panel Member','1'),(6,0,'Scribe','1'),(7,0,'Preciding Officer(Harassment)','1'),(8,0,'Preciding Officer(Disciplinary)','1'),(9,0,'Preciding Officer(Ethics)','1'),(10,0,'Preciding Officer(Other)','1'),(11,0,'CHRO','1'),(12,0,'MVM (Disciplinary)','1'),(13,0,'MVM (Ethics)','1'),(14,0,'Email Notification','1');

/*Table structure for table `tats` */

DROP TABLE IF EXISTS `tats`;

CREATE TABLE `tats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `complaint_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `inquiry_letter_issued` int(11) DEFAULT NULL,
  `inquiry_ack_upload` int(11) DEFAULT NULL,
  `invest_report_upload` int(11) DEFAULT NULL,
  `bhr_action` int(11) DEFAULT NULL,
  `complaint_close` int(11) DEFAULT NULL,
  `date` datetime NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tats` */

/*Table structure for table `team` */

DROP TABLE IF EXISTS `team`;

CREATE TABLE `team` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

/*Data for the table `team` */

insert into `team` (`id`,`category_id`,`role_id`,`user_id`,`created`,`modified`) values (1,1,3,417,'2018-08-17 13:28:31','2018-08-17 13:28:31'),(2,1,7,418,'2018-08-17 13:28:42','2018-08-17 13:28:42'),(5,1,6,423,'2018-08-17 13:35:54','2018-08-17 13:35:54'),(6,1,4,424,'2018-08-17 13:36:15','2018-08-17 13:36:15'),(7,4,13,425,'2018-08-17 13:36:31','2018-08-17 13:36:31'),(8,4,9,420,'2018-08-17 13:36:43','2018-08-17 13:36:43'),(9,4,5,424,'2018-08-17 13:37:12','2018-08-17 13:37:12'),(10,4,5,429,'2018-08-17 13:37:12','2018-08-17 13:37:12'),(11,4,6,430,'2018-08-17 13:37:21','2018-08-17 13:37:21'),(12,4,4,421,'2018-08-17 13:37:35','2018-08-17 13:37:35'),(13,7,12,446,'2018-08-17 13:38:32','2018-08-17 13:38:32'),(14,7,8,421,'2018-08-18 09:40:56','2018-08-18 09:40:56'),(15,7,5,424,'2018-08-18 09:48:30','2018-08-18 09:48:30'),(16,7,5,429,'2018-08-18 09:48:30','2018-08-18 09:48:30'),(17,7,6,420,'2018-08-18 09:48:58','2018-08-18 09:48:58'),(22,1,5,420,'2018-08-31 13:20:12','2018-08-31 13:20:12'),(23,1,5,421,'2018-08-31 13:20:12','2018-08-31 13:20:12');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(10) NOT NULL AUTO_INCREMENT,
  `complaint_id` varchar(50) DEFAULT NULL,
  `user_type` varchar(100) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `empid` varchar(255) DEFAULT NULL,
  `confirmed` tinyint(1) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(150) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `bu` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `work_location` varchar(100) DEFAULT NULL,
  `c_title` varchar(150) DEFAULT NULL,
  `c_subject` varchar(255) DEFAULT NULL,
  `other_issue` varchar(255) DEFAULT NULL,
  `c_option` varchar(100) DEFAULT NULL,
  `c_tried_r_own` varchar(100) DEFAULT NULL,
  `notes` text,
  `concern_details` text,
  `position` varchar(200) DEFAULT NULL,
  `attach_data` varchar(255) DEFAULT NULL,
  `policy_agreed` varchar(1) DEFAULT '1',
  `first_access` varchar(10) DEFAULT NULL,
  `last_access` bigint(10) DEFAULT NULL,
  `lastip` varchar(45) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `complaint_id_rejection` text,
  `complaint_id_status` int(4) DEFAULT '0',
  `upload` varchar(255) DEFAULT NULL,
  `video_upload` varchar(255) DEFAULT NULL,
  `user_id` varchar(50) DEFAULT NULL,
  `severity` varchar(50) DEFAULT NULL,
  `complaint_id_genrate_date` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=469 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert into `users` (`id`,`complaint_id`,`user_type`,`role`,`empid`,`confirmed`,`name`,`username`,`password`,`pass`,`email`,`mobile`,`bu`,`department`,`city`,`work_location`,`c_title`,`c_subject`,`other_issue`,`c_option`,`c_tried_r_own`,`notes`,`concern_details`,`position`,`attach_data`,`policy_agreed`,`first_access`,`last_access`,`lastip`,`status`,`complaint_id_rejection`,`complaint_id_status`,`upload`,`video_upload`,`user_id`,`severity`,`complaint_id_genrate_date`) values (363,NULL,'1','1','QUA65245',1,'Admin','admin@quatrro.com','$2y$10$1Z3IKYL2W.HbzAwrBtbnNuP6PDCVoMKshjuPu0UP5QtEyGC5P6nzm','Passw0rd','admin@quatrro.com','8090025343','IT',NULL,'Gurgaon','Guragon',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','2018-07-31',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),(366,NULL,'2','2','QUA00068',1,'Super Admin','sa@quatrro.com','$2y$10$AvHB03bBHOmqzc/q2rnFwe73q73HEatvzGdvPWwe9TVQsJh3wNqZC','pass','sa@quatrro.com','8090025343','IT',NULL,'Gurgaon','Guragon',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','2018-07-31',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),(417,NULL,'3','3','QUA00365',1,'Swati Menon','Swati.Menon@quatrro.com','$2y$10$uK09fH7ulsEiVnJDNLqLBu8BQcDSWnfEuf3ugRawWWFoH8yX9lpoG','Myvoice@007','Swati.Menon@quatrro.com','','QGS Pvt Ltd',NULL,'Gurgaon','Gurgaon',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,'1',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),(418,NULL,'7','7','QUA00266',1,'Perineeta Malhotra','Perineeta.Malhotra@quatrro.com','$2y$10$PBlovtE1pM7jEMshBApMAuoKk.enV7rTA.hSzcEoXHOSVIHKFDwbq','Myvoice@007','Perineeta.Malhotra@quatrro.com','','QGS Pvt Ltd',NULL,'Gurgaon','Gurgaon',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,'1',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),(419,NULL,'Reg_user','Accuser','QUA03876',1,'Sanjeev Yadav','sanjeev.yadav@quatrro.com','$2y$10$AvHB03bBHOmqzc/q2rnFwe73q73HEatvzGdvPWwe9TVQsJh3wNqZC','pass','sanjeev.yadav@quatrro.com','9582402696','Quatrro Global Serveces Pvt Ltd',NULL,'Gurgaon','Gurgaon',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','2018-08-09',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),(420,NULL,'5','5','QUA98564',1,'Nidhi Panesar','nidhi.panesar@quatrro.com','$2y$10$5zeteaUT/arC5fxOKYoi/uG63Z26mlU5zqgUHtinDWL0TACaHKDru','Myvoice@007','nidhi.panesar@quatrro.com','9874563215','QGS Pvt Ltd',NULL,'Thane','Thane',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'EMPLOYEE',NULL,'1',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),(421,NULL,'5','5','',1,'Siddharth Gupta','Siddharth.Gupta@quatrro.com','$2y$10$rwwHtTtWTHkz7u5fgQndC.FcGrwTiDrP64lD/58icWPQEUXswRgTa','Myvoice@007','Siddharth.Gupta@quatrro.com','','QGS Pvt Ltd',NULL,'Gurgaon','Gurgaon',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,'1',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),(423,NULL,'6','6','',1,'Sunidhi Gupta','Sunidhi.Gupta@quatrro.com','$2y$10$SAS2S8rdt4UA8FxE8X7qc.y3KbLAyOlf0pJHDXcFXUG.cRmWRdoDa','Myvoice@007','Sunidhi.Gupta@quatrro.com','','QGS Pvt Ltd',NULL,'Gurgaon','Gurgaon',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,'1',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),(424,NULL,'4','4','',1,'Smriti Balhara','Smriti.Balhara@quatrro.com','$2y$10$CauR5GczSDh9dCnjBjya/en7QmvQISGBe/edmYth8l5isBtxV.f6G','Myvoice@007','Smriti.Balhara@quatrro.com','','QGS Pvt Ltd',NULL,'Gurgaon','Gurgaon',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,'1',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),(425,NULL,'13','13','',1,'Pooja Chopra','pooja.chopra@quatrro.com','$2y$10$TVxXIGDTr0J.npmU00WI7.LgPq.Zj/ipfjWcNyxkSb4Va9FlT4GrG','Myvoice@007','pooja.chopra@quatrro.com','','QGS Pvt Ltd',NULL,'Gurgaon','Gurgaon',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,'1',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),(427,'MV9399',NULL,NULL,'p-ni0022',1,'Abhishek Gupta',NULL,NULL,NULL,'abhishek@accessti.com','7503275011','',NULL,'Gurgaon','Allahabad','cab driver is misbehavior with me','7','9','Yes','Yes',NULL,'Please explain your complaint to us',NULL,NULL,'1',NULL,NULL,NULL,'5',NULL,1,NULL,NULL,'422',NULL,'2018-08-09'),(429,NULL,'4','4','',1,'Dhanya Menon','dhanya.menon@quatrro.com','$2y$10$fOAyW79hdUVREzLeV5ZskOEjKOE21Ov4m14UmIsuBqgq2OY0KnDqi','Myvoice@007','Dhanya.Menon@quatrro.com','','QGS Pvt Ltd',NULL,'Gurgaon','Gurgaon',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,'1',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),(430,NULL,'6','6','',1,'Bhawana Kainth','Bhawana.kainth@quatrro.com','$2y$10$1XW0tex0uFwwKs4MKNrHfOKPvx8RdQWoZSY84tAchflJzXQxA3DmO','Myvoice@007','bhawana.kainth@quatrro.com','','QGS Pvt Ltd',NULL,'Gurgaon','Gurgaon',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,'1',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),(432,'MV6726',NULL,NULL,'QUA03876',NULL,'Sanjeev Yadav',NULL,NULL,NULL,'sanjeev.yadav@quatrro.com','9582402696','Quatrro Global Serveces Pvt Ltd',NULL,'Gurgaon','Gurgaon','Sexually Abused ','1','12','Yes','Yes',NULL,'Sexual abuse, also referred to as molestation, is usually undesired sexual behavior by one person upon another. It is often perpetrated using force or by taking advantage of another. When force is immediate, of short duration, or infrequent, it is called sexual assault. The offender is referred to as a sexual abuser or molester.',NULL,NULL,'1',NULL,NULL,NULL,'2',NULL,1,NULL,NULL,'419','High','2018-08-09'),(434,'MV8435',NULL,NULL,'p-ni0022',NULL,'Abhishek Gupta',NULL,NULL,NULL,'abhishek@accessti.com','7503275011','',NULL,'Gurgaon','Allahabad','fight with arvind','7','16','Yes','Yes',NULL,'Please explain your complaint to us. Know that anything you say is completely confidential so please feel free to be specific about your concern and elaborate the issue.',NULL,NULL,'1',NULL,NULL,NULL,'2',NULL,1,NULL,NULL,'422',NULL,'2018-08-09'),(437,'MV9631',NULL,NULL,'QUA03876',NULL,'Sanjeev Yadav',NULL,NULL,NULL,'sanjeev.yadav@quatrro.com','9582402696','Quatrro Global Serveces Pvt Ltd',NULL,'Gurgaon','Gurgaon','political criticism in office','4','6','No','Yes',NULL,'Political critics encourage readers to forget about aesthetics and personal responses, and think about the texts political roots.\r\nPolitical critics encourage readers to forget about aesthetics and personal responses, and think about the texts political roots.\r\nPolitical critics encourage readers to forget about aesthetics and personal responses, and think about the texts political roots.\r\nPolitical critics encourage readers to forget about aesthetics and personal responses, and think about the texts political roots.\r\nPolitical critics encourage readers to forget about aesthetics and personal responses, and think about the texts political roots.',NULL,NULL,'1',NULL,NULL,NULL,'2',NULL,1,NULL,NULL,'419','High','2018-08-09'),(438,'MV6834',NULL,NULL,'p-ni0022',NULL,'Abhishek Gupta',NULL,NULL,NULL,'abhishek@accessti.com','7503275011','',NULL,'Gurgaon','Allahabad','senior is abuse talking with me','4','6','Yes','Yes',NULL,'Please explain your complaint to us. Know that anything you say is completely confidential so please feel free to be specific about your concern and elaborate the issue. This will help us during the investigation',NULL,NULL,'1',NULL,NULL,NULL,'16','this is not geniwin',1,NULL,NULL,'422',NULL,'2018-08-10'),(439,NULL,'Reg_user','Accuser','p-ni002',1,'Abhi2','abhishekkumargupta33@gmail.com','$2y$10$HMT7naU/TF6.Ddg8z3/hQuam6E5IotH9LVhrGNtfVuOWXeHBWlwda','P23160000','abhishekkumargupta33@gmail.com','7503275011','',NULL,'Gurgaon','Gurgaon',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','2018-08-10',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),(440,'MV0872',NULL,NULL,'p-ni002',NULL,'Abhi2',NULL,NULL,NULL,'abhishekkumargupta33@gmail.com','7503275011','',NULL,'Gurgaon','Gurgaon','senior  person is misbehave with me','7','9','Yes','Yes',NULL,'Please explain your complaint to us. Know that anything you say is completely confidential so please feel free to be specific about your concern and elaborate the issue. This will help us during the investigation. ',NULL,NULL,'1',NULL,NULL,NULL,'2',NULL,1,NULL,NULL,'439',NULL,'2018-08-10'),(441,'MV5068','Unregister','Accuser','',1,'Sanjeev Yadav','',NULL,NULL,'sanjeev.yadav@quatrro.com','','',NULL,'Gurgaon','Gurgaon','','1','58','Yes','No',NULL,'na',NULL,NULL,'1','2018-08-10',NULL,NULL,'2',NULL,1,NULL,NULL,NULL,NULL,'2018-08-10'),(442,'MV4482','Unregister','Accuser','',1,'Sanjeev yadav','',NULL,NULL,'skyadav.india@gmail.com','','',NULL,'Gurgaon','Gurgaon','','1','11','Yes','Yes',NULL,'Test test',NULL,NULL,'1','2018-08-10',NULL,NULL,'2',NULL,1,NULL,NULL,NULL,NULL,'2018-08-10'),(444,'MV3101','Unregister','Accuser','',1,'Perineeta','Perineeta',NULL,NULL,'perineeta@gmail.com','9810879876','',NULL,'Gurgaon','Gurgaon','','1','2','No','No',NULL,'test case',NULL,NULL,'1','2018-08-14',NULL,NULL,'1',NULL,1,NULL,NULL,NULL,NULL,'2018-08-14'),(446,NULL,'12','12','',1,'Siddharth das','siddharth.das@quatrro.com','$2y$10$sNFdfrC8AEkXOixio19Csu8JlvtlFzpHqVbbh6YvkgQzDW0WzZWY6','Myvoice@007','siddharth.das@quatrro.com','','QGS Pvt Ltd',NULL,'Gurgaon','Gurgaon',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,'1',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),(447,'MV8365','Unregister','Accuser','QAT34677',1,'mike','mike',NULL,NULL,'mike@quatrro.com','7894561253','IT',NULL,'Gurgaon','Gurgaon','Team leader is alcoholic and had a fight with me','7','8','No','',NULL,'Please explain your complaint to us. Know that anything you say is completely confidential so please feel free to be specific about your complaint and elaborate the issue. This will help us during the investigation. You may also attach any relevant documents/audio/video files that you feel we should read / hear / see\r\n',NULL,NULL,'1','2018-08-14',NULL,NULL,'1',NULL,1,NULL,NULL,NULL,NULL,'2018-08-14'),(450,'MV1256','Unregister','Accuser','QUA89548',1,'Mike','Mike',NULL,NULL,'mike@gmail.com','7894561230','IT',NULL,'Delhi','Delhi','Harassment by manager Udhyog','1','2','No','',NULL,'Please explain your complaint to us. Know that anything you say is completely confidential so please feel free to be specific about your complaint and elaborate the issue. This will help us during the investigation. You may also attach any relevant documents/audio/video files that you feel we should read / hear / see\r\n\r\n\r\n',NULL,NULL,'1','2018-08-17',NULL,NULL,'9',NULL,1,NULL,NULL,NULL,'High','2018-08-17'),(451,'MV9808','Unregister','Accuser','QA12213',1,'vimal','vimal',NULL,NULL,'vimal@gmail.com','7845784578','IT',NULL,'Delhi','Delhi','Ethics Complaint','4','5','Yes','Yes',NULL,'Please explain your complaint to us. Know that anything you say is completely confidential so please feel free to be specific about your complaint and elaborate the issue. This will help us during the investigation. You may also attach any relevant documents/audio/video files that you feel we should read / hear / see\r\n',NULL,NULL,'1','2018-08-17',NULL,NULL,'2',NULL,1,NULL,NULL,NULL,NULL,'2018-08-17'),(453,'MV3122','Unregister','Accuser','',0,'','',NULL,NULL,'testing3@gmail.com','','',NULL,'','','Testing 3 ','7','9','Yes','Yes',NULL,'testing3',NULL,NULL,'1','2018-08-18',NULL,NULL,'9',NULL,1,NULL,NULL,NULL,NULL,'2018-08-18'),(468,'MV4515','Unregister','Accuser','QUA32156',1,'Anamika Singh','Anamika Singh',NULL,NULL,'testing@gmail.com','987562456','QGS Pvt Ltd',NULL,'Gurgaon','Gurgaon','Testing complaint','1','3','No','',NULL,'testing complaint ',NULL,NULL,'1','2018-08-31',NULL,NULL,'15',NULL,1,NULL,NULL,NULL,'High','2018-08-31');

/*Table structure for table `witns` */

DROP TABLE IF EXISTS `witns`;

CREATE TABLE `witns` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wi_name` varchar(255) DEFAULT NULL,
  `wi_bu` varchar(255) DEFAULT NULL,
  `wi_city` varchar(255) DEFAULT NULL,
  `wi_location` varchar(255) DEFAULT NULL,
  `wi_empid` varchar(255) DEFAULT NULL,
  `wi_email_id` varchar(255) DEFAULT NULL,
  `a_useremail` varchar(100) DEFAULT NULL,
  `relationship` varchar(255) DEFAULT NULL,
  `user_id` varchar(20) DEFAULT NULL,
  `user_complaint_id` int(11) DEFAULT NULL,
  `user_concern_details` text,
  `phone` varchar(50) DEFAULT NULL,
  `remark` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `witns` */

insert into `witns` (`id`,`wi_name`,`wi_bu`,`wi_city`,`wi_location`,`wi_empid`,`wi_email_id`,`a_useremail`,`relationship`,`user_id`,`user_complaint_id`,`user_concern_details`,`phone`,`remark`) values (1,'neha','bu2','thane','chennai','p-ni99','w1@m.com',NULL,'Brother','422',427,NULL,'7503275011',''),(2,'Vipin Goyal','Quatrro Global Service Pvt ltd','Gurgaon','Gurgaon','QUA00321','vipin.goyal@quatrro.com',NULL,'Colleauge','419',432,NULL,'9874562533',''),(3,'aman','bu2','Allhabad','Gurgaon','p-0bi004','bu@m.com',NULL,'','422',434,NULL,'7503275011',''),(4,'Aman Yadav','QMS','Pune','Thane','TEST7653','skyadav.india@gmail.com',NULL,'NA','419',437,NULL,'4569782133',''),(5,'priya','bu3','Allhabad','Gurgaon','','',NULL,'','422',438,NULL,'7503275011',''),(6,'Niraj','bu4','Allhabad','Gurgaon','p-0bi004','',NULL,'','439',440,NULL,'7503275011',''),(7,'Parminder Singh','QGS Pvt Ltd','Gurgaon','Gurgaon','QUA88874','parminder@quatrro.com',NULL,'Colleauge','',443,NULL,'undefined',''),(8,'Mahesh yadav','QGS Pvt.Ltd','Gurgaon','Gurgaon','QUA00214','mahesh@gmail.com',NULL,'Colleauge','',448,NULL,'undefined',''),(9,'Mahesh','','','','','',NULL,'','',455,NULL,'undefined',''),(10,'Aman','','','','','',NULL,'','',456,NULL,'undefined',''),(11,'Mahesh Bhatt','QGS Pvt Ltd','Gurgaon','Gurgaon','qua96859','mahesh.bhatt@quatrro.com',NULL,'Colleauge','',457,NULL,'undefined',''),(12,'Vishal','QGS','Gurgaon','Gurgaon','Qua98756','vishal@gmail.com',NULL,'witnessed','',458,NULL,'undefined',''),(13,'Avinash','QGS','Gurgaon','Gurgaon','QUA87878','avinash@gmail.com',NULL,'Colleauge','',460,NULL,'undefined',''),(14,'Rajesh','QGS','Gurgain','Gurgaon','QUA98745','rajesh@gmail.com',NULL,'Colleauge',NULL,460,NULL,'9876543234','Witnessed'),(15,'Alert','','','','','',NULL,'','',461,NULL,'undefined',''),(16,'Testing Person','QGS','Gurgaon','Gurgaon','QUA23658','TESTING.PERSON@QUATRRO.COM',NULL,'','',462,NULL,'undefined',''),(17,'testing','','','','','',NULL,'','',468,NULL,'undefined','');

SET SQL_MODE=@OLD_SQL_MODE;