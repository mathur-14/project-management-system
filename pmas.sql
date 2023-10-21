SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
CREATE TABLE IF NOT EXISTS `admin` (
  `ID` char(5) NOT NULL,
  `password` char(5) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
INSERT INTO `admin` (`ID`, `password`) VALUES
('Melv', 'melv'),
('Abhi', 'abhi'),
('Soum', 'soum');
CREATE TABLE IF NOT EXISTS `faculty` (
  `f_id` varchar(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(25) NOT NULL,
  `qualification` varchar(200) NOT NULL,
  `domain` varchar(200) NOT NULL,
  `research` varchar(200) NOT NULL,
  `others` varchar(500) NOT NULL,
  PRIMARY KEY (`f_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
INSERT INTO `faculty` (`f_id`, `name`, `email`, `phone`, `password`, `qualification`, `domain`, `research`, `others`) VALUES
('1FD001', 'Vivia Mary John', 'vivm@gmail.com', '9867986798', '12312', 'M.Techa', 'Computer Science', 'php', 'asp'),
('1FD002', 'Jhansi Rani P', 'jrani@gmail.com', '9812386798', '12312', 'Ph.D', 'Computer Science', 'Data Structures', 'Machine Learning'),
('1FD003', 'M Lakshman', 'mlak@gmail.com', '9867983458', '12312', 'M.Techa', 'Electrical and Electronics', 'High Voltage Engineering', 'Electrical power utilization'),
('1FD004', 'Sharmila KP', 'shar@gmail.com', '9867986956', '12312', 'Ph.D', 'Electronics and Communications', 'Verilog HDL', 'COA');
CREATE TABLE IF NOT EXISTS `mail` (
  `mail_id` int(5) NOT NULL AUTO_INCREMENT,
  `s_id` varchar(10) NOT NULL,
  `f_id` varchar(10) NOT NULL,
  `msg` varchar(250) NOT NULL,
  PRIMARY KEY (`mail_id`),
  KEY `s_id` (`s_id`,`f_id`),
  KEY `f_id` (`f_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;
INSERT INTO `mail` (`mail_id`, `s_id`, `f_id`, `msg`) VALUES
(100, '1CR17CS05', '1FD001', 'clarification of doubts can be done on Monday'),
(101, '1CR17CS06', '1FD002', 'Be regular to class'),
(102, '1CR17CS05', '1FD002', 'clarification of doubts can be done on Monday'),
(103, '1CR17EC08', '1FD004', 'Academic improvement needed'),
(104, '1CR17IS04', '1FD003', 'Keep up the good work'),
(105, '1CR17TC10', '1FD004', 'clarification of doubts can be done on Monday');
CREATE TABLE IF NOT EXISTS `meeting` (
  `meeting_id` int(5) NOT NULL AUTO_INCREMENT,
  `f_id` varchar(10) NOT NULL,
  `s_id` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `desc` varchar(200) NOT NULL,
  PRIMARY KEY (`meeting_id`),
  KEY `f_id` (`f_id`,`s_id`),
  KEY `s_id` (`s_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;
INSERT INTO `meeting` (`meeting_id`, `f_id`, `s_id`, `date`, `time`, `desc`) VALUES
(10, '1FD001', '1CR17CS05', '2019-06-15', '08:57:00', 'Academic Performance'),
(11, '1FD002', '1CR17TC09', '2020-07-25', '09:15:00', 'Club Activity'),
(12, '1FD004', '1CR17IS04', '2019-10-05', '09:30:00', 'Project Suggestion'),
(13, '1FD001', '1CR17EE02', '2018-06-15', '10:15:00', 'Project Suggestion'),
(14, '1FD003', '1CR17IS04', '2020-06-10', '12:30:00', 'Academic Performance.');
CREATE TABLE IF NOT EXISTS `project` (
  `p_id` varchar(10) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `domain` varchar(20) DEFAULT NULL,
  `s_id` varchar(10) DEFAULT NULL,
  `f_id` varchar(10) DEFAULT NULL,
  `ppf` varchar(200) NOT NULL,
  `psf` varchar(200) NOT NULL,
  `remark` varchar(500) NOT NULL,
  PRIMARY KEY (`p_id`),
  KEY `f_id` (`f_id`),
  KEY `s_id` (`s_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
INSERT INTO `project` (`p_id`, `name`, `domain`, `s_id`, `f_id`, `ppf`, `psf`, `remark`) VALUES
('pcse01', 'Railway Management System', 'DBMS', '1CR17CS06', '1FD001', 'gantt chart f.pdf', '', 'Excellent report!'),
('pise02', 'Detection of Fake News', 'Machine Language', '1CR17IS04', '1FD002', 'gantt chart f.pdf', '', 'Can do better'),
('ptce03', 'Digital Delay Timer', 'Verilog', '1CR17TC10', '1FD003', '', 'CSFF-SDM.doc', 'Average');
CREATE TABLE IF NOT EXISTS `request` (
  `request_id` int(10) NOT NULL AUTO_INCREMENT,
  `s_id` varchar(10) NOT NULL,
  `f_id` varchar(10) NOT NULL,
  PRIMARY KEY (`request_id`),
  KEY `s_id` (`s_id`),
  KEY `f_id` (`f_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=795 ;
INSERT INTO `request` (`request_id`, `s_id`, `f_id`) VALUES
(1, '1CR17TC10', '1FD001'),
(4, '1CR17CS05', '1FD002'),
(3, '1CR17CS06', '1FD001');
CREATE TABLE IF NOT EXISTS `student` (
  `s_id` varchar(10) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(25) NOT NULL,
  `year` varchar(10) NOT NULL,
  `stream` varchar(15) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
INSERT INTO `student` (`s_id`, `name`, `email`, `phone`, `password`, `year`, `stream`) VALUES
('1CR17EE01', 'Katherine Adams', 'katha@gmAIl.com', '9985634767', 'kath', '2017', 'EEE'),
('1CR17EE02', 'Faizan Ahmed', 'faiz@gamial.com', '9985630967', 'faiz', '2017', 'EEE'),
('1CR17IS03', 'Pooja Sharma', 'pooj@gamial.com', '9946634767', 'pooj', '2018', 'ISE'),
('1CR17IS04', 'Mehul Kumar', 'mehul@gmail.com', '9985600767', 'mehu', '2019', 'ISE'),
('1CR17CS05', 'Anitha Sanai', 'anitha@gmail.com', '8985634767', 'anit', '2016', 'CSE'),
('1CR17CS06', 'Immanuel Rego', 'imma@gmail.com', '9981134767', 'imma', '2017', 'CSE'),
('1CR17EC07', 'Mahima Vora', 'mahi@gmail.com', '9985634700', 'mahi', '2018', 'ECE'),
('1CR17EC08', 'Jessica Oliver', 'jessi@gmail.com', '9980034767', 'jess', '2018', 'ECE'),
('1CR17TC09', 'Akhil Sharma', 'akhi@gmail.com', '9985634767', 'akhi', '2017', 'TCE'),
('1CR17TC10', 'Syeda Kauser', 'syed@gmail.com', '9985634767', 'syed', '2019', 'TCE');
CREATE TABLE IF NOT EXISTS `st_mail` (
  `s_mail_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` varchar(10) NOT NULL,
  `f_id` varchar(10) NOT NULL,
  `mag` varchar(250) NOT NULL,
  PRIMARY KEY (`s_mail_id`),
  KEY `s_id` (`s_id`,`f_id`),
  KEY `f_id` (`f_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;
INSERT INTO `st_mail` (`s_mail_id`, `s_id`, `f_id`, `mag`) VALUES
(50, '1CR17TC10', '1FD001', 'Maam, I will be absent for a week'),
(51, '1CR17EE02', '1FD003', 'When can i clear doubts'),
(52, '1CR17CS05', '1FD002', 'I was marked absent although i was present today'),
(53, '1CR17TC10', '1FD002', 'Maam, I will be absent for a week');
CREATE TABLE IF NOT EXISTS `marks` (
    `m_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` varchar(10) NOT NULL,
`f_id` varchar(10) NOT NULL,
    `p_id` varchar(10) NOT NULL,
  `marks` int(11) DEFAULT NULL,
  PRIMARY KEY (`m_id`),
    KEY `s_id` (`s_id`),
  KEY `f_id` (`f_id`),
    KEY `p_id` (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;
INSERT INTO `marks` (`m_id`, `s_id`, `f_id`, `p_id`, `marks`) VALUES
(1, '1CR17TC10', '1FD003', 'ptce03', 82),
(2, '1CR17IS04', '1FD002', 'pise02', 77),
(3, '1CR17CS06', '1FD001', 'pcse01', 93);
CREATE TABLE IF NOT EXISTS `review` (
    `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` varchar(10) NOT NULL,
`f_id` varchar(10) NOT NULL,
    `p_id` varchar(10) NOT NULL,
  `rev_no` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`r_id`),
    KEY `s_id` (`s_id`),
  KEY `f_id` (`f_id`),
    KEY `p_id` (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;
CREATE TABLE IF NOT EXISTS `revmarks` (
    `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` varchar(10) NOT NULL,
`f_id` varchar(10) NOT NULL,
    `p_id` varchar(10) NOT NULL,
  `rev1` int(11) DEFAULT 0,
    `rev2` int(11) DEFAULT 0,
    `rev3` int(11) DEFAULT 0,
    `rev4` int(11) DEFAULT 0,
    `rev5` int(11) DEFAULT 0,
  `rev_no` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`r_id`),
    KEY `s_id` (`s_id`),
  KEY `f_id` (`f_id`),
    KEY `p_id` (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;
INSERT INTO `review` (`r_id`, `s_id`, `f_id`, `p_id`, `rev_no`) VALUES
(1, '1CR17TC10', '1FD003', 'ptce03', 2),
(2, '1CR17IS04', '1FD002', 'pise02', 3),
(3, '1CR17CS06', '1FD001', 'pcse01', 1);
INSERT INTO `revmarks` (`r_id`, `s_id`, `f_id`, `p_id`,  `rev_no`) VALUES
(1, '1CR17TC10', '1FD003', 'ptce03', 2),
(2, '1CR17IS04', '1FD002', 'pise02', 3),
(3, '1CR17CS06', '1FD001', 'pcse01', 1);
ALTER TABLE `mail`
  ADD CONSTRAINT `makey1` FOREIGN KEY (`s_id`) REFERENCES `student` (`s_id`),
  ADD CONSTRAINT `makey2` FOREIGN KEY (`f_id`) REFERENCES `faculty` (`f_id`);
ALTER TABLE `meeting`
  ADD CONSTRAINT `mkey1` FOREIGN KEY (`f_id`) REFERENCES `faculty` (`f_id`);
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `student` (`s_id`),
  ADD CONSTRAINT `project_ibfk_2` FOREIGN KEY (`f_id`) REFERENCES `faculty` (`f_id`);
ALTER TABLE `request`
  ADD CONSTRAINT `fkey1` FOREIGN KEY (`s_id`) REFERENCES `student` (`s_id`),
  ADD CONSTRAINT `fkey2` FOREIGN KEY (`f_id`) REFERENCES `faculty` (`f_id`);
ALTER TABLE `st_mail`
  ADD CONSTRAINT `m1` FOREIGN KEY (`s_id`) REFERENCES `student` (`s_id`),
  ADD CONSTRAINT `m2` FOREIGN KEY (`f_id`) REFERENCES `faculty` (`f_id`);  
ALTER TABLE `marks`
  ADD CONSTRAINT `marks1` FOREIGN KEY (`s_id`) REFERENCES `student` (`s_id`),
  ADD CONSTRAINT `marks2` FOREIGN KEY (`f_id`) REFERENCES `faculty` (`f_id`),
  ADD CONSTRAINT `marks3` FOREIGN KEY (`p_id`) REFERENCES `project` (`p_id`);
ALTER TABLE `review`
  ADD CONSTRAINT `rev1` FOREIGN KEY (`s_id`) REFERENCES `student` (`s_id`),
  ADD CONSTRAINT `rev2` FOREIGN KEY (`f_id`) REFERENCES `faculty` (`f_id`),
  ADD CONSTRAINT `rev3` FOREIGN KEY (`p_id`) REFERENCES `project` (`p_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
