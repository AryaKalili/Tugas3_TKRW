create database login;

use login;

create table `user` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(50),
  `password` varchar(50),
  `status` varchar(50),
  PRIMARY KEY(`id`)
);