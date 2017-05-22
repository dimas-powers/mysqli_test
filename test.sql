SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for obj_contracts
-- ----------------------------
DROP TABLE IF EXISTS `obj_contracts`;
CREATE TABLE `obj_contracts` (
  `id_contract` int(11) NOT NULL AUTO_INCREMENT,
  `id_customer` int(11) DEFAULT NULL,
  `number` varchar(255) DEFAULT NULL,
  `date_sign` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `staff_number` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_contract`),
  KEY `id_customer` (`id_customer`),
  CONSTRAINT `contacts_customer` FOREIGN KEY (`id_customer`) REFERENCES `obj_customers` (`id_customer`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of obj_contracts
-- ----------------------------
INSERT INTO `obj_contracts` VALUES ('1', '1', '54', '2017-05-15 10:56:53', '5665');

-- ----------------------------
-- Table structure for obj_customers
-- ----------------------------
DROP TABLE IF EXISTS `obj_customers`;
CREATE TABLE `obj_customers` (
  `id_customer` int(255) NOT NULL AUTO_INCREMENT,
  `name_customer` varchar(250) DEFAULT NULL,
  `company` enum('company_1','company_2','company_3') DEFAULT NULL,
  PRIMARY KEY (`id_customer`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of obj_customers
-- ----------------------------
INSERT INTO `obj_customers` VALUES ('1', 'Bob', 'company_1');
INSERT INTO `obj_customers` VALUES ('2', 'Ben', 'company_2');

-- ----------------------------
-- Table structure for obj_services
-- ----------------------------
DROP TABLE IF EXISTS `obj_services`;
CREATE TABLE `obj_services` (
  `id_service` int(255) NOT NULL AUTO_INCREMENT,
  `id_contract` int(255) DEFAULT NULL,
  `title_service` varchar(250) DEFAULT NULL,
  `status` enum('work','connecting','disconnected') DEFAULT NULL,
  PRIMARY KEY (`id_service`),
  KEY `service_contacts` (`id_contract`),
  CONSTRAINT `service_contacts` FOREIGN KEY (`id_contract`) REFERENCES `obj_contracts` (`id_contract`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of obj_services
-- ----------------------------
INSERT INTO `obj_services` VALUES ('1', '1', 'weteryert', 'connecting');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Vitalik', '28');
INSERT INTO `users` VALUES ('2', 'Bob', '5');
INSERT INTO `users` VALUES ('3', 'Max', '18');
SET FOREIGN_KEY_CHECKS=1;
