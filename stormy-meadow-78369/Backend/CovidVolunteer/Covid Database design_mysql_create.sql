CREATE TABLE `Contact` (
	`id` BINARY NOT NULL AUTO_INCREMENT,
	`Region` TEXT NOT NULL AUTO_INCREMENT,
	`Zone` TEXT NOT NULL AUTO_INCREMENT,
	`City` TEXT NOT NULL AUTO_INCREMENT,
	`SubCity` TEXT NOT NULL AUTO_INCREMENT,
	`Woreda` TEXT NOT NULL AUTO_INCREMENT,
	`House Number` TEXT NOT NULL AUTO_INCREMENT,
	`phone number` TEXT NOT NULL AUTO_INCREMENT,
	`Emergency contact` TEXT NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`)
);

CREATE TABLE `Language` (
	`id` BINARY NOT NULL AUTO_INCREMENT,
	`Name` TEXT NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`)
);

CREATE TABLE `Volunteer` (
	`id` BINARY NOT NULL AUTO_INCREMENT,
	`first name` TEXT NOT NULL AUTO_INCREMENT,
	`last name` TEXT NOT NULL AUTO_INCREMENT,
	`birth date` DATE NOT NULL AUTO_INCREMENT,
	`gender` TEXT NOT NULL AUTO_INCREMENT,
	`email` TEXT NOT NULL AUTO_INCREMENT,
	`contact_id` BINARY NOT NULL AUTO_INCREMENT,
	`password` TEXT NOT NULL AUTO_INCREMENT,
	`distance willing to travel` FLOAT NOT NULL AUTO_INCREMENT,
	`Educational level` VARCHAR(255) NOT NULL,
	`Employment status` VARCHAR(255) NOT NULL,
	`Disability status` BOOLEAN NOT NULL,
	`Goverment Id Image` TEXT NOT NULL,
	`Account status` BOOLEAN NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `Language_Volunteer` (
	`id` BINARY NOT NULL AUTO_INCREMENT,
	`language name` VARCHAR(255) NOT NULL,
	`volunteer id` TEXT NOT NULL AUTO_INCREMENT,
	`degree_proficency` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `volunteer_ available_on` (
	`id` BINARY NOT NULL AUTO_INCREMENT,
	`volunteer id` TEXT NOT NULL AUTO_INCREMENT,
	`time` VARCHAR(255) NOT NULL,
	`day` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `host/Organization` (
	`id` BINARY NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255) NOT NULL AUTO_INCREMENT,
	`email` TEXT NOT NULL AUTO_INCREMENT,
	`password` TEXT NOT NULL AUTO_INCREMENT,
	`website` TEXT NOT NULL AUTO_INCREMENT,
	`contact_id` BINARY NOT NULL AUTO_INCREMENT,
	`Account status` BOOLEAN NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `Opportunity` (
	`id` BINARY NOT NULL AUTO_INCREMENT,
	`name` TEXT NOT NULL AUTO_INCREMENT,
	`contact id` BINARY NOT NULL AUTO_INCREMENT,
	`status` BOOLEAN NOT NULL,
	`Activity Type` BINARY NOT NULL,
	`starting date` DATE NOT NULL AUTO_INCREMENT,
	`ending date` DATE NOT NULL AUTO_INCREMENT,
	`brief description` TEXT NOT NULL AUTO_INCREMENT,
	`requirment description` TEXT NOT NULL AUTO_INCREMENT,
	`minimum age` INT NOT NULL AUTO_INCREMENT,
	`organization id` BINARY NOT NULL AUTO_INCREMENT,
	`number of volunteer needed` INT NOT NULL,
	`current left volunteer` INT NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `applicant` (
	`id` BINARY NOT NULL AUTO_INCREMENT,
	`applicant id` BINARY NOT NULL AUTO_INCREMENT,
	`opportunity id` BINARY NOT NULL,
	`brief description` VARCHAR(255) NOT NULL,
	`status` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `opportunity_language_requirment` (
	`id` BINARY NOT NULL AUTO_INCREMENT,
	`opportunity id` BINARY NOT NULL AUTO_INCREMENT,
	`language name` VARCHAR(255) NOT NULL,
	`needed proficency level` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `approved_applicant` (
	`id` BINARY NOT NULL AUTO_INCREMENT,
	`applicant id` BINARY NOT NULL AUTO_INCREMENT,
	`brief description` VARCHAR(255) NOT NULL,
	`rating` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `Activity Type` (
	`id` BINARY NOT NULL AUTO_INCREMENT,
	`Name` TEXT NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`)
);

CREATE TABLE `volunteer_interest` (
	`id` BINARY NOT NULL AUTO_INCREMENT,
	`volunteer id` TEXT NOT NULL AUTO_INCREMENT,
	`Activity Id` BINARY NOT NULL,
	PRIMARY KEY (`id`)
);

ALTER TABLE `Volunteer` ADD CONSTRAINT `Volunteer_fk0` FOREIGN KEY (`contact_id`) REFERENCES `Contact`(`id`);

ALTER TABLE `Language_Volunteer` ADD CONSTRAINT `Language_Volunteer_fk0` FOREIGN KEY (`volunteer id`) REFERENCES `Volunteer`(`id`);

ALTER TABLE `volunteer_ available_on` ADD CONSTRAINT `volunteer_ available_on_fk0` FOREIGN KEY (`volunteer id`) REFERENCES `Volunteer`(`id`);

ALTER TABLE `host/Organization` ADD CONSTRAINT `host/Organization_fk0` FOREIGN KEY (`contact_id`) REFERENCES `Contact`(`id`);

ALTER TABLE `Opportunity` ADD CONSTRAINT `Opportunity_fk0` FOREIGN KEY (`contact id`) REFERENCES `Contact`(`id`);

ALTER TABLE `Opportunity` ADD CONSTRAINT `Opportunity_fk1` FOREIGN KEY (`Activity Type`) REFERENCES `Activity Type`(`id`);

ALTER TABLE `applicant` ADD CONSTRAINT `applicant_fk0` FOREIGN KEY (`applicant id`) REFERENCES `Volunteer`(`id`);

ALTER TABLE `applicant` ADD CONSTRAINT `applicant_fk1` FOREIGN KEY (`opportunity id`) REFERENCES `Opportunity`(`id`);

ALTER TABLE `opportunity_language_requirment` ADD CONSTRAINT `opportunity_language_requirment_fk0` FOREIGN KEY (`opportunity id`) REFERENCES `Opportunity`(`id`);

ALTER TABLE `approved_applicant` ADD CONSTRAINT `approved_applicant_fk0` FOREIGN KEY (`applicant id`) REFERENCES `applicant`(`id`);

ALTER TABLE `volunteer_interest` ADD CONSTRAINT `volunteer_interest_fk0` FOREIGN KEY (`volunteer id`) REFERENCES `Volunteer`(`id`);

ALTER TABLE `volunteer_interest` ADD CONSTRAINT `volunteer_interest_fk1` FOREIGN KEY (`Activity Id`) REFERENCES `Activity Type`(`id`);

