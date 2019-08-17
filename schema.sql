CREATE DATABASE `doingsdone`;

USE `doingsdone`;

CREATE TABLE user (
id INT NOT NULL AUTO_INCREMENT,
dateRegistration TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
email VARCHAR(100) NOT NULL,
name VARCHAR(50) NOT NULL,
password VARCHAR(255) NOT NULL,
PRIMARY KEY (id),
INDEX uName (name),
UNIQUE INDEX (email)
) ENGINE=InnoDB;

CREATE TABLE project (
	id INT NOT NULL AUTO_INCREMENT,
	userId INT NOT NULL,
	name VARCHAR(100),
	PRIMARY KEY (id),
	INDEX pName (name),
	INDEX fkUserProject (userId),
	CONSTRAINT fkUserProject FOREIGN KEY (userId) REFERENCES user (id)
) ENGINE=InnoDB;

CREATE TABLE task (
	id INT NOT NULL AUTO_INCREMENT,
	userId INT NOT NULL,
	projectId INT NOT NULL,
	createdDate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	taskStatus TINYINT NOT NULL DEFAULT 0,
	name VARCHAR(255) NOT NULL,
	fileUrl VARCHAR(100),
	termDate TIMESTAMP,
	PRIMARY KEY (id),
	INDEX tCreatedDate (createdDate),
	INDEX tName (name),
	INDEX tTermDate (termDate),
	INDEX fkUserTask (userId),
	INDEX fkProjectTask (projectId),
	CONSTRAINT fkProjectTask FOREIGN KEY (projectId) REFERENCES project (id),
	CONSTRAINT fkUserTask FOREIGN KEY (userId) REFERENCES user (id)
) ENGINE=InnoDB;