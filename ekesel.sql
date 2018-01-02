-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2018 at 10:02 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ekesel`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`ekesel`@`localhost` PROCEDURE `count_totaladminaccount` ()  Begin
SELECT COUNT(idadmin) FROM adminacc;
END$$

CREATE DEFINER=`ekesel`@`localhost` PROCEDURE `count_totaldepartmentlist` ()  Begin
SELECT COUNT(iddepartment) FROM departmentlist;
END$$

CREATE DEFINER=`ekesel`@`localhost` PROCEDURE `count_totalsubjectlist` ()  Begin
SELECT COUNT(idsubject) FROM subjectlist;
END$$

CREATE DEFINER=`ekesel`@`localhost` PROCEDURE `delete_adminaccount` (IN `UNinputad` VARCHAR(100))  BEGIN
DELETE FROM adminacc WHERE usernameadmin = UNinputad;
END$$

CREATE DEFINER=`ekesel`@`localhost` PROCEDURE `delete_department` (IN `INdepartmentID` INT)  BEGIN
DELETE FROM departmentlist WHERE iddepartment = INdepartmentID;
END$$

CREATE DEFINER=`ekesel`@`localhost` PROCEDURE `delete_subject` (IN `INSubjectID` INT)  BEGIN
DELETE FROM subjectlist WHERE idsubject = INSubjectID;
END$$

CREATE DEFINER=`ekesel`@`localhost` PROCEDURE `insert_adminaccout` (IN `inadminusername` VARCHAR(100), IN `inadminpassword` VARCHAR(1000), IN `inadminname` VARCHAR(1000))  BEGIN
INSERT INTO adminacc (usernameadmin, passwordadmin, namaadmin) VALUES (inadminusername, inadminpassword, inadminname) ;
END$$

CREATE DEFINER=`ekesel`@`localhost` PROCEDURE `insert_newdepartment` (IN `INdepartmentname` VARCHAR(100))  BEGIN
INSERT into departmentlist (namedepartment) VALUES(INdepartmentname) ;
END$$

CREATE DEFINER=`ekesel`@`localhost` PROCEDURE `insert_newsubject` (IN `INSubjectName` VARCHAR(100), IN `INSubecttype` VARCHAR(100), IN `INSubjectgrade` VARCHAR(100), IN `INSubjectdepartment` VARCHAR(100))  NO SQL
BEGIN
insert into subjectlist (subjectname, subjecttype, subjectgrade, subjectdepartment) VALUES(INSubjectName, INSubecttype, INSubjectgrade, INSubjectdepartment);
END$$

CREATE DEFINER=`ekesel`@`localhost` PROCEDURE `select_adminaccountforedit` (IN `UNinputad` VARCHAR(100), OUT `UNoutputad` VARCHAR(100), OUT `NMoutputad` VARCHAR(1000), OUT `IDoutputad` INT)  BEGIN
SELECT usernameadmin, namaadmin, idadmin INTO UNoutputad, NMoutputad, IDoutputad from adminacc WHERE usernameadmin = UNinputad ;
END$$

CREATE DEFINER=`ekesel`@`localhost` PROCEDURE `select_adminaccountoverview` (IN `start_from` INT, IN `limitdata` INT)  BEGIN
SELECT * FROM adminacc ORDER BY idadmin ASC LIMIT start_from, limitdata ;
End$$

CREATE DEFINER=`ekesel`@`localhost` PROCEDURE `select_adminlogin` (IN `UNinputad` VARCHAR(100), IN `PWinputad` VARCHAR(1000))  BEGIN
SELECT * FROM adminacc WHERE usernameadmin = UNinputad AND passwordadmin = PWinputad ;
END$$

CREATE DEFINER=`ekesel`@`localhost` PROCEDURE `select_departmentforedit` (IN `INDepartmentNameFind` VARCHAR(100), OUT `OUTDepartmentIdFind` INT, OUT `OUTDepartmentname` VARCHAR(100))  BEGIN
select iddepartment, namedepartment INTO OUTDepartmentIdFind, OUTDepartmentname FROM departmentlist where namedepartment = INDepartmentNameFind ;
END$$

CREATE DEFINER=`ekesel`@`localhost` PROCEDURE `select_departmentforoption` ()  BEGIN
SELECT namedepartment from departmentlist;
END$$

CREATE DEFINER=`ekesel`@`localhost` PROCEDURE `select_departmentlistoverview` (IN `start_from` INT, IN `limitdata` INT)  BEGIN
SELECT * FROM departmentlist ORDER BY iddepartment ASC LIMIT start_from, limitdata ;
End$$

CREATE DEFINER=`ekesel`@`localhost` PROCEDURE `select_subjectforedit` (IN `INSubjectNameFind` VARCHAR(100), OUT `OUTSubjectIdFind` INT, OUT `OUTSubjecttypefind` ENUM('normative','productive'), OUT `OUTSubjectGradefind` ENUM('10','11','12'), OUT `OUTSubjectDepartmentFind` VARCHAR(100), OUT `OUTsubjectname` VARCHAR(100))  BEGIN
select idsubject, subjecttype, subjectgrade, subjectdepartment, subjectname into OUTSubjectIdFind, OUTSubjecttypefind, OUTSubjectGradefind, OUTSubjectDepartmentFind, OUTsubjectname FROM subjectlist where subjectname = INSubjectNameFind ;
End$$

CREATE DEFINER=`ekesel`@`localhost` PROCEDURE `select_subjectlistoverview` (IN `start_from` INT, IN `limitdata` INT)  BEGIN
SELECT * FROM subjectlist ORDER BY idsubject ASC LIMIT start_from, limitdata ;
End$$

CREATE DEFINER=`ekesel`@`localhost` PROCEDURE `update_editadminaccount` (IN `UNinput` VARCHAR(100), IN `NMinput` VARCHAR(1000), IN `PWinput` VARCHAR(1000), IN `IDinput` INT(100))  BEGIN
Update adminacc SET usernameadmin = UNinput, passwordadmin = PWinput, namaadmin = NMinput WHERE idadmin = IDinput;
End$$

CREATE DEFINER=`ekesel`@`localhost` PROCEDURE `update_editadminaccountnopw` (IN `UNinputad` VARCHAR(100), IN `NMinputad` VARCHAR(1000), IN `IDinputad` INT(100))  BEGIN
Update adminacc SET usernameadmin = UNinputad, namaadmin = NMinputad WHERE idadmin = IDinputad;
End$$

CREATE DEFINER=`ekesel`@`localhost` PROCEDURE `update_editdepartment` (IN `INDepartmentNAME` VARCHAR(100), IN `INDepartmentID` INT)  BEGIN
Update departmentlist SET namedepartment = INDepartmentNAME WHERE iddepartment = INDepartmentID;
End$$

CREATE DEFINER=`ekesel`@`localhost` PROCEDURE `update_subject` (IN `INSubjectType` ENUM('normative','productive'), IN `INSubjectName` VARCHAR(100), IN `INSubjectGrade` ENUM('10','11','12'), IN `INSUbjectDepartment` VARCHAR(100), IN `INSubjectID` INT)  BEGIN
UPDATE subjectlist set subjectname = INSubjectName, subjecttype = INSubjectType, subjectgrade = INSubjectGrade, subjectdepartment = INSUbjectDepartment WHERE idsubject = INSubjectID;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `adminacc`
--

CREATE TABLE `adminacc` (
  `idadmin` int(11) NOT NULL,
  `usernameadmin` varchar(1000) NOT NULL,
  `passwordadmin` varchar(1000) NOT NULL,
  `namaadmin` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminacc`
--

INSERT INTO `adminacc` (`idadmin`, `usernameadmin`, `passwordadmin`, `namaadmin`) VALUES
(1, 'davidraendyka', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'David Raendyka'),
(7, 'admin101', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'admin1'),
(9, 'admin2', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'admin2'),
(11, 'admin3', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'admin3'),
(12, 'admin4', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'admin4'),
(14, 'admin7', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'admin7'),
(15, 'admin8', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'admin8'),
(16, 'admin9', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'admin9'),
(17, 'admin10', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'admin10'),
(20, 'admin777', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'admin777'),
(21, 'david', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'david'),
(22, 'admin11', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'admin11'),
(23, 'adminbaru', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'Admin baru'),
(24, 'adminlama', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'Admin Lama');

-- --------------------------------------------------------

--
-- Table structure for table `departmentlist`
--

CREATE TABLE `departmentlist` (
  `iddepartment` int(11) NOT NULL,
  `namedepartment` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departmentlist`
--

INSERT INTO `departmentlist` (`iddepartment`, `namedepartment`) VALUES
(3, 'teknik pemesinan'),
(4, 'teknik komputer jaringan'),
(5, 'teknik kendaraan ringan'),
(6, 'teknik gambar bangunan'),
(7, 'teknik instalasi pembangkit tenaga listrik'),
(8, 'teknik elektronika komunikasi');

-- --------------------------------------------------------

--
-- Table structure for table `subjectlist`
--

CREATE TABLE `subjectlist` (
  `idsubject` int(100) NOT NULL,
  `subjecttype` enum('normative','productive') NOT NULL,
  `subjectgrade` enum('10','11','12') DEFAULT NULL,
  `subjectdepartment` varchar(100) DEFAULT NULL,
  `subjectname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjectlist`
--

INSERT INTO `subjectlist` (`idsubject`, `subjecttype`, `subjectgrade`, `subjectdepartment`, `subjectname`) VALUES
(13, 'productive', '12', 'teknik komputer jaringan', 'administrasi server'),
(15, 'productive', '10', 'teknik komputer jaringan', 'jaringan dasar'),
(16, 'productive', '10', 'teknik komputer jaringan', 'sistem komputer'),
(17, 'productive', '10', 'teknik gambar bangunan', 'gambar teknik bangunan'),
(18, 'normative', '', '', 'matematika'),
(19, 'normative', '', '', 'bahasa indonesia'),
(20, 'normative', '', '', 'pendidikan agama islam'),
(21, 'normative', '', '', 'pendidikan agama kristen'),
(22, 'normative', '', '', 'seni budaya'),
(23, 'normative', '', '', 'fisika'),
(24, 'normative', '', '', 'bahasa inggris'),
(25, 'normative', '', '', 'pendidikan kewarganegaraan'),
(26, 'normative', '', '', 'sejarah indonesia'),
(27, 'normative', '', '', 'pendidikan olahraga');

-- --------------------------------------------------------

--
-- Table structure for table `teacheracc`
--

CREATE TABLE `teacheracc` (
  `idguru` int(11) NOT NULL,
  `usernameteacher` varchar(100) NOT NULL,
  `passwordteacher` varchar(1000) NOT NULL,
  `teachername` varchar(1000) NOT NULL,
  `lessontype` enum('adaptive','normative') NOT NULL,
  `subject1` varchar(100) NOT NULL,
  `subject2` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminacc`
--
ALTER TABLE `adminacc`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `departmentlist`
--
ALTER TABLE `departmentlist`
  ADD PRIMARY KEY (`iddepartment`);

--
-- Indexes for table `subjectlist`
--
ALTER TABLE `subjectlist`
  ADD PRIMARY KEY (`idsubject`);

--
-- Indexes for table `teacheracc`
--
ALTER TABLE `teacheracc`
  ADD PRIMARY KEY (`idguru`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminacc`
--
ALTER TABLE `adminacc`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `departmentlist`
--
ALTER TABLE `departmentlist`
  MODIFY `iddepartment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `subjectlist`
--
ALTER TABLE `subjectlist`
  MODIFY `idsubject` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `teacheracc`
--
ALTER TABLE `teacheracc`
  MODIFY `idguru` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
