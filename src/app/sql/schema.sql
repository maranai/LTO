DROP TABLE IF EXISTS `regions`;
CREATE TABLE `regions` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `universities`;
CREATE TABLE `universities` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `region_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `university_ix1` (`region_id`),
  CONSTRAINT `university_fk1` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `programs`;
CREATE TABLE `programs` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `university_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `program_ix1` (`university_id`),
  CONSTRAINT `program_fk1` FOREIGN KEY (`university_id`) REFERENCES `universities` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `classrooms`;
CREATE TABLE `classrooms` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `program_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `classroom_ix1` (`program_id`),
  CONSTRAINT `classroom_fk1` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `children`;
CREATE TABLE `children` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `ID_number` bigint(20) DEFAULT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `classroom_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `classroom_id` (`classroom_id`),
  CONSTRAINT `child_fk1` FOREIGN KEY (`classroom_id`) REFERENCES `classrooms` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `attendances`;
CREATE TABLE `attendances` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `session_number` int(11) NOT NULL,
  `session_date` datetime NOT NULL,
  `child_id` bigint(20) NOT NULL,
  `assisted` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `attendance_fk1` (`child_id`),
  CONSTRAINT `attendance_fk1` FOREIGN KEY (`child_id`) REFERENCES `children` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `role_name` varchar(100) NOT NULL,
  `classroom_id` bigint(20) DEFAULT NULL,
  `university_id` bigint(20) DEFAULT NULL,
  `region_id` bigint(20) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `old_password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_ix1` (`classroom_id`),
  KEY `user_ix2` (`university_id`),
  KEY `user_ix3` (`region_id`),
  CONSTRAINT `user_fk1` FOREIGN KEY (`classroom_id`) REFERENCES `classrooms` (`id`),
  CONSTRAINT `user_fk2` FOREIGN KEY (`university_id`) REFERENCES `universities` (`id`),
  CONSTRAINT `user_fk3` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `user_attendances`;
CREATE TABLE `user_attendances` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `session_date` datetime DEFAULT NULL,
  `hours` float DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_attendances_fk1` (`user_id`),
  CONSTRAINT `user_attendances_fk1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

