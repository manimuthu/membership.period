DROP TABLE IF EXISTS `civicrm_membershipperiod`;

-- /*******************************************************
-- *
-- * civicrm_membershipperiod
-- *
-- * FIXME
-- *
-- *******************************************************/
CREATE TABLE `civicrm_membershipperiod` (


     `id` int unsigned NOT NULL AUTO_INCREMENT  COMMENT 'Unique MyEntity ID',
     `membership_id` int unsigned    COMMENT 'FK to Membership',
     `start_date` date NOT NULL   COMMENT 'Period start date',
     `end_date` date NOT NULL   COMMENT 'Period end date' 
,
    PRIMARY KEY ( `id` )
 
 
,          CONSTRAINT FK_civicrm_membershipperiod_membership_id FOREIGN KEY (`membership_id`) REFERENCES `civicrm_membership`(`id`) ON DELETE CASCADE  
)  ENGINE=InnoDB DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci  ;

