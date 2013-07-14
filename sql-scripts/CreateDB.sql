CREATE TABLE IF NOT EXISTS `CHSEIS_Blocks` (
  `BlockCode` varchar(3) NOT NULL,
  `BlockName` varchar(20) NOT NULL,
  `MapID` int(11) NOT NULL,
  PRIMARY KEY (`BlockCode`)
);

CREATE TABLE IF NOT EXISTS `CHSEIS_MedTeam` (
  `BlockCode` varchar(3) NOT NULL,
  `UID` int(5) NOT NULL AUTO_INCREMENT,
  `Phone` varchar(12) NOT NULL,
  PRIMARY KEY (`UID`)
);

CREATE TABLE IF NOT EXISTS `CHSEIS_Schedule` (
  `SchID` int(11) NOT NULL AUTO_INCREMENT,
  `UID` int(5) NOT NULL,
  `InstName` varchar(50) NOT NULL,
  `InstType` varchar(20) NOT NULL,
  `InstCode` varchar(20) NOT NULL,
  `InstCatg` varchar(20) NOT NULL,
  `InstStndrd` varchar(20) NOT NULL,
  `EnrMale` int(11) NOT NULL,
  `EnrFem` int(11) NOT NULL,
  `VisitDate` date NOT NULL,
  `Phone` int(11) NOT NULL,
  `Mobile` int(11) NOT NULL,
  PRIMARY KEY (`SchID`)
);

CREATE TABLE `CHSEIS_Users` (
  `UserID` varchar(255) DEFAULT NULL,
  `UserName` varchar(255) DEFAULT NULL,
  `UserPass` varchar(255) DEFAULT NULL,
  `UserMapID` int(10) NOT NULL,
  `Remarks` varchar(255) DEFAULT NULL,
  `LoginCount` int(10) DEFAULT '0',
  `LastLoginTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Registered` tinyint(1) NOT NULL,
  `Activated` tinyint(1) NOT NULL,
  PRIMARY KEY (`UserMapID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `CHSEIS_Users` VALUES ('admin','Administrator','ceb6c970658f31504a901b89dcd3e461',0,NULL,14,'2013-05-03 22:47:45',1,1);

CREATE TABLE `CHSEIS_Visitors` (
  `ip` tinytext CHARACTER SET latin1,
  `vtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `vpage` tinytext CHARACTER SET latin1,
  `referrer` tinytext CHARACTER SET latin1,
  `uagent` text CHARACTER SET latin1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `CHSEIS_Visits` (
  `PageID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `PageURL` text NOT NULL,
  `VisitCount` bigint(20) NOT NULL DEFAULT '1',
  `LastVisit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `PageTitle` text,
  `VisitorIP` text NOT NULL,
  PRIMARY KEY (`PageID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `CHSEIS_logs` (
  `LogID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `SessionID` varchar(20) DEFAULT NULL,
  `IP` varchar(15) DEFAULT NULL,
  `Referrer` longtext,
  `UserAgent` longtext,
  `UserMapID` int(10) DEFAULT NULL,
  `URL` longtext,
  `Action` longtext,
  `Method` varchar(10) DEFAULT NULL,
  `URI` longtext,
  `AccessTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`LogID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;