ALTER TABLE `hospital`.`coupon_codes`   
  ADD COLUMN `hospital_id` INT(11) NULL AFTER `id`;
  
  /* ward managemtn */
  
CREATE TABLE `ward_name` (
  `w_id` int(11) NOT NULL AUTO_INCREMENT,
  `hos_id` int(11) DEFAULT NULL,
  `ward_name` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `create_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`w_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1

  
CREATE TABLE `ward_type` (
  `ward_id` int(11) NOT NULL AUTO_INCREMENT,
  `hos_id` int(11) DEFAULT NULL,
  `ward_type` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `create_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`ward_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1

CREATE TABLE `ward_floors` (
  `w_f_id` INT(11) NOT NULL AUTO_INCREMENT,
  `hos_id` INT(11) DEFAULT NULL,
  `ward_floor` VARCHAR(250) DEFAULT NULL,
  `status` INT(11) DEFAULT '1',
  `create_at` DATETIME DEFAULT NULL,
  `created_by` INT(11) DEFAULT NULL,
  PRIMARY KEY (`w_f_id`)
) ENGINE=INNODB DEFAULT CHARSET=latin1



CREATE TABLE `ward_room_type` (
  `w_r_t_id` INT(11) NOT NULL AUTO_INCREMENT,
  `hos_id` INT(11) DEFAULT NULL,
  `room_type` VARCHAR(250) DEFAULT NULL,
  `status` INT(11) DEFAULT '1',
  `create_at` DATETIME DEFAULT NULL,
  `created_by` INT(11) DEFAULT NULL,
  PRIMARY KEY (`w_r_t_id`)
) ENGINE=INNODB DEFAULT CHARSET=latin1

CREATE TABLE `ward_room_number` (
  `w_r_n_id` INT(11) NOT NULL AUTO_INCREMENT,
  `hos_id` INT(11) DEFAULT NULL,
  `room_num` VARCHAR(250) DEFAULT NULL,
  `status` INT(11) DEFAULT '1',
  `create_at` DATETIME DEFAULT NULL,
  `created_by` INT(11) DEFAULT NULL,
  PRIMARY KEY (`w_r_n_id`)
) ENGINE=INNODB DEFAULT CHARSET=latin1



CREATE TABLE `ward_room_beds` (
  `r_b_id` int(11) NOT NULL AUTO_INCREMENT,
  `hos_id` int(11) DEFAULT NULL,
  `w_r_n_id` int(11) DEFAULT NULL,
  `bed` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `create_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`r_b_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1


/* patient check ip or op purose

ALTER TABLE `staging_ehealth`.`patient_billing`   
  ADD COLUMN `patient_type` INT(11) NULL  COMMENT '1=ip;0=op' AFTER `p_id`;
  
ALTER TABLE `hospital`.`patient_billing`   
  CHANGE `patient_type` `patient_type` INT(11) DEFAULT 1  NULL  COMMENT '1=ip;0=op';

ALTER TABLE `hospital`.`ward_room_number`   
  ADD COLUMN `bed_count` VARCHAR(250) NULL AFTER `room_num`;
  
 ALTER TABLE `hospital`.`ward_room_number`   
  ADD COLUMN `f_id` INT(11) NULL AFTER `hos_id`;

  
  
