create database tagBeSill;
use tagBeSill;
create table Status(
	id int unsigned NOT NULL AUTO_INCREMENT primary key,
    label varchar(255) not null,
    description blob not null
)engine=InnoDB;

create table Category(
	id int unsigned NOT NULL AUTO_INCREMENT primary key,
    label varchar(255) not null,
    description blob not null
)engine=InnoDB;

create table Project(
	id	int unsigned NOT NULL AUTO_INCREMENT primary key auto_increment,
    title varchar(255) not null,
    description blob not null,
    image varchar(255) default null,
    publishingDate timestamp default null,
    creationDate timestamp not null default current_timestamp,
    updatedAt timestamp not null default current_timestamp,
    statusId int unsigned not null,
    foreign key (statusId) references Status (id)
)engine=InnoDB;

create table ProjectCategory(
	projectId int unsigned not null,
    categoryId int unsigned not null,
    foreign key(projectId) references Project(id),
	foreign key(categoryId) references Category(id)
)engine=InnoDB;

insert into category(label, description) values
	('Management','fdskahfudsfda afd ada fdajf'),
    ('ERP','fdskahfudsfda afd ada fdajf'),
    ('DMZ','fdskahfudsfda afd ada fdajf');
    
insert into status(label, description) values
	('Analysis','jfhejfdjsffdsf fdsfdsa q'),
    ('In progress','jfhejfdjsffdsf fdsfdsa q'),
    ('Blocked','jfhejfdjsffdsf fdsfdsa q'),
    ('Out of budget','jfhejfdjsffdsf fdsfdsa q');
    
insert into project(title, description, image, publishingDate, statusId) values
	('wf3pm','fdj djahfjda fed','img/myPicture1.png',now(), 1),
    ('forgeNet','fdj djahfjda fed','img/myPicture2.png',now(), 3);
    
insert into projectCategory values
	(1,1),
    (2,2),
    (2,3);