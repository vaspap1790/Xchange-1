--
-- Table structure for table User
--

CREATE TABLE `USER` (
    userId int NOT NULL AUTO_INCREMENT,
    email varchar(50) NOT NULL,
    username varchar(50) NOT NULL,
    firstname varchar(50),
    lastname varchar(50),
	password varchar(255) NOT NULL,
	dateTime_ varchar(19),
	country varchar(100),
	address varchar(100),
	description varchar(500),
    PRIMARY KEY (userId)
);

--
-- Table structure for table CATEGORY
--

CREATE TABLE `CATEGORY` (
	categoryId int NOT NULL AUTO_INCREMENT,
	name varchar(100),	
	dateTime_ varchar(19),
	description varchar(500),	
	PRIMARY KEY (categoryId)
);


--
-- Table structure for table ITEM
--

CREATE TABLE `ITEM` (
	itemId int NOT NULL AUTO_INCREMENT,
	name varchar(500),
	description varchar(500),
	dateTime_ varchar(19),
	userId int NOT NULL,
	categoryId int NOT NULL,
	PRIMARY KEY (itemId),
	foreign key (userId) references USER (userId),
	foreign key (categoryId) references CATEGORY (categoryId)
);


--
-- Table structure for table PHOTO
--

CREATE TABLE `PHOTO` (
	photoId int NOT NULL AUTO_INCREMENT,
	name varchar(255),
	userId int,
	categoryId int,
	itemId int,
	dateTime_ varchar(19),
	PRIMARY KEY (photoId),
	foreign key (userId) references USER (userId),
	foreign key (categoryId) references CATEGORY (categoryId),
	foreign key (itemId) references ITEM (itemId)
);


--
-- Table structure for table RATING
--

CREATE TABLE `RATING` (
	ratingId int NOT NULL AUTO_INCREMENT,
	rating int,
	dateTime_ varchar(19),
	comments varchar(255),
	userRatingId int NOT NULL,
	userRatedId int NOT NULL,
	PRIMARY KEY (ratingId),
	foreign key (userRatingId) references USER (userId),
	foreign key (userRatedId) references USER (userId)
);


--
-- Table structure for table REQUEST
--

CREATE TABLE `REQUEST` (
	requestId int NOT NULL AUTO_INCREMENT,
	dateTime_ varchar(19),
	itemOfferedId int NOT NULL,
	itemRequestedId int NOT NULL,
	requesterId int NOT NULL,
	ownerId int NOT NULL,
	status varchar(10) default 'pending',
	message varchar(500),
	PRIMARY KEY (requestId),	
	foreign key (itemOfferedId) references ITEM (itemId),
	foreign key (itemRequestedId) references ITEM (itemId),
	foreign key (requesterId) references USER (userId),
	foreign key (ownerId) references USER (userId)
);

--
-- Table structure for table FAVORITE
--

CREATE TABLE `FAVORITE` (
	itemId int NOT NULL,
	userId int NOT NULL,
	primary key (itemId, userId),
	foreign key (itemId) references ITEM (itemId),
	foreign key (userId) references USER (userId)
);











