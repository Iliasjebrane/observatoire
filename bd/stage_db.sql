-- drop database if exists ck_obs_urbain;

CREATE DATABASE IF NOT EXISTS `ck_obs_urbain` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `ck_obs_urbain`;

-- 
drop table if exists connexions;
drop table if exists operations;
drop table if exists users;
drop table if exists roles;
drop table if exists rapports;
drop table if exists populations;
drop table if exists partenaires;
drop table if exists articles;


-- roles table

create table  roles(
	id int primary key AUTO_INCREMENT not null,
  name_fr varchar(40) not null,
  name_ar varchar(40) default null,
  code varchar(3) not null,
  description_fr TEXT default null,
  description_ar TEXT default null,
  is_deleted boolean not null default false
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
 
-- insert some roles
insert into roles values (1,'SUPER ADMIN',default,'SA','Accès total à toutes les fonctionnalités',default,default);
insert into roles values (2,'CHEF DE SERVICE',default,'CS',"Accès total à toutes les fonctionnalités sauf la partie d'administration",default,default);
insert into roles values (3,'CELLULE 1',default,'ART','Mise à jour des articles',default,default);
insert into roles values (4,'CELLULE 2',default,'RPT','Mise à jour des rapports',default,default);
insert into roles values (5,'CELLULE 3',default,'STC','Mise à jour des statistiques',default,default);


-- users table

create table users(
	id int primary key auto_increment not null,
	nom_fr varchar(40) default null,
	nom_ar varchar(40) not null,
  prenom_fr varchar(40) default null,
  prenom_ar varchar(40) not null,
  username varchar(100) unique not null,
  password varchar(100) not null,
  email varchar(100) unique not null,
  tele varchar(15) not null,
  is_active boolean not null default true ,
  role_id int not null,
  is_deleted boolean not null default false,
  foreign key (role_id) references roles(id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- insert super admin user
-- password = 'admin'
insert into users(nom_fr,prenom_fr,username,password,email,tele,role_id) values('nom_sa','prenom_sa','admin','$2y$10$Xv3\/bDEg9gu4Eb3Q.5tkWOuW\/37YUzFcELvBNBsJWoTaUiyBwTn7K','admin@admin.com','0666666666',1);

insert into users(nom_fr,prenom_fr,username,password,email,tele,role_id) values('nom_cs','prenom_cs','user_cs','$2y$10$Xv3\/bDEg9gu4Eb3Q.5tkWOuW\/37YUzFcELvBNBsJWoTaUiyBwTn7K','user_cs@admin.com','0666666666',2);
insert into users(nom_fr,prenom_fr,username,password,email,tele,role_id) values('nom_art','prenom_art','user_art','$2y$10$Xv3\/bDEg9gu4Eb3Q.5tkWOuW\/37YUzFcELvBNBsJWoTaUiyBwTn7K','user_art@admin.com','0666666666',3);
insert into users(nom_fr,prenom_fr,username,password,email,tele,role_id) values('nom_rpt','prenom_rpt','user_rpt','$2y$10$Xv3\/bDEg9gu4Eb3Q.5tkWOuW\/37YUzFcELvBNBsJWoTaUiyBwTn7K','user_rpt@admin.com','0666666666',4);
insert into users(nom_fr,prenom_fr,username,password,email,tele,role_id) values('nom_stc','prenom_stc','user_stc','$2y$10$Xv3\/bDEg9gu4Eb3Q.5tkWOuW\/37YUzFcELvBNBsJWoTaUiyBwTn7K','user_stc@admin.com','0666666666',5);

-- create connexions table
CREATE TABLE connexions (
  id INT NOT NULL AUTO_INCREMENT,
  user_id int NOT NULL,
  nom_complet VARCHAR(100),
  role VARCHAR(100),
  description TEXT default NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  is_deleted boolean not null default false,
  PRIMARY KEY (id),
  FOREIGN KEY (user_id) REFERENCES users(id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- create operations table
CREATE TABLE operations (
  id INT NOT NULL AUTO_INCREMENT,
  user_id int NOT NULL,
  user_nom_complet VARCHAR(100) NOT NULL,
  table_name VARCHAR(50) NOT NULL,
  row_id int not null,
  action ENUM("insert",'update','delete'), -- insert | update | delete
  description TEXT default NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  is_deleted boolean not null default false,
  PRIMARY KEY (id),
  FOREIGN KEY (user_id) REFERENCES users(id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- create table articles
CREATE TABLE articles (
  id INT NOT NULL AUTO_INCREMENT,
  title_ar VARCHAR(255) not null,
  title_fr VARCHAR(255) default NULL,
  description_ar TEXT not null,
  description_fr TEXT default NULL,
  image varchar(255) default null,
  is_deleted boolean not null default false,
  primary KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- create table partenaires  
CREATE TABLE partenaires (
  id INT NOT NULL AUTO_INCREMENT,
  intitule VARCHAR(255) not null ,
  adresse VARCHAR(255) not null,
  tele varchar(20) not null,
  image varchar(255) default null,
  is_deleted boolean not null default false,
  primary KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- create table populations
CREATE TABLE populations(
  id INT NOT NULL AUTO_INCREMENT,
  type ENUM ('H','F',"S","M"),
  number int not null,
  date date not null,
  is_deleted boolean not null default false,
  primary KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- create table rapports
CREATE TABLE rapports(
  id INT NOT NULL AUTO_INCREMENT,
  intitule VARCHAR(255) not null ,
  annee int not null,
  piece_jointe varchar(300) not null,
  description text default null,
  is_deleted boolean not null default false,
  primary KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin;




