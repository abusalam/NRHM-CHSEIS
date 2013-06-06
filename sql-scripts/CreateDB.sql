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