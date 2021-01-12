
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
	description varchar(500),
    PRIMARY KEY (userId)
);

--
-- Data for table User
--

INSERT INTO `USER` (`userId`, `email`, `username`, `firstname`, `lastname`, `password`, `dateTime_`, `description`) VALUES
(1, 'esgiefe@gmail.com', 'eefe1', 'Ezgi', 'Efe', '$2y$10$kRiekRuvQvwRJgvWoa0RKu54n30seWJmopCa6uaUUmGFJ5UAHM3NW', '2020-12-30 23:52:07', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(2, 'dimpappas@gmail.com', 'jimpri3st', 'Dimitris', 'Pappas', '$2y$10$kRiekRuvQvwRJgvWoa0RKu54n30seWJmopCa6uaUUmGFJ5UAHM3NW', '2020-12-30 23:53:07', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(3, 'vaspap1790@gmail.com', 'vaspap1790', 'Vasilis', 'Papadimitrakopoulos', '$2y$10$kRiekRuvQvwRJgvWoa0RKu54n30seWJmopCa6uaUUmGFJ5UAHM3NW', '2020-12-30 23:54:07', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(4, 'bla@gmail.com', 'bla', 'Bla', 'BlaLast', '$2y$10$kRiekRuvQvwRJgvWoa0RKu54n30seWJmopCa6uaUUmGFJ5UAHM3NW', '2020-12-30 23:54:07', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(5, 'blabla@gmail.com', 'blabla', 'Blabla', 'BlablaLast', '$2y$10$kRiekRuvQvwRJgvWoa0RKu54n30seWJmopCa6uaUUmGFJ5UAHM3NW', '2020-12-30 23:54:07', 'Lorem Ipsum is simply dummy text of the printing and typesetting '),
(6, 'techbla@gmail.com', 'techbla', 'Techbla', 'TechblaLast', '$2y$10$kRiekRuvQvwRJgvWoa0RKu54n30seWJmopCa6uaUUmGFJ5UAHM3NW', '2020-12-30 23:54:07', 'Lorem Ipsum is simply dummy text of the printing and typesetting '),
(7, 'artbla@gmail.com', 'artbla', 'Artbla', 'ArtblaLast', '$2y$10$kRiekRuvQvwRJgvWoa0RKu54n30seWJmopCa6uaUUmGFJ5UAHM3NW', '2020-12-30 23:54:07', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.');

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
-- Data for table CATEGORY
--

INSERT INTO `CATEGORY` (`categoryId`, `name`, `datetime_`, `description`) VALUES
(1, 'Books', '2020-12-30 23:54:07', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
(2, 'Business and Industrial', '2020-12-30 23:54:07', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
(3, 'Clothing, Shoes & Accesories', '2020-12-30 23:54:07', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
(4, 'Collectibles', '2020-12-30 23:54:07', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
(5, 'Consumer Electronics', '2020-12-30 23:54:07', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
(6, 'Crafts', '2020-12-30 23:54:07', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
(7, 'Dolls & Bears', '2020-12-30 23:54:07', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
(8, 'Home & Garden', '2020-12-30 23:54:07', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
(9, 'Motors', '2020-12-30 23:54:07', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
(10, 'Pets', '2020-12-30 23:54:07', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
(11, 'Sports Mem, Cards, Fan Shop', '2020-12-30 23:54:07', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
(12, 'Toys & Hobbies', '2020-12-30 23:54:07', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
(13, 'Antiques', '2020-12-30 23:54:07', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
(14, 'Computer/Tables & Networking', '2020-12-30 23:54:07', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.');


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
-- Data for table ITEM
--

INSERT INTO `ITEM` (`itemId`, `name`, `datetime_`, `userId`, `categoryId`, `description`) VALUES
(1, 'Nice Book 1', '2020-12-30 23:54:07', '1', '1' , 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(2, 'Nice Book 2', '2020-12-30 23:54:07', '1', '1' , 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.' ),
(3, 'Nice Book 3', '2020-12-30 23:54:07', '2', '1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(4, 'Nice Book 4', '2020-12-30 23:54:07', '3', '1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(5, 'Mobile Phone', '2020-12-30 23:54:07', '3', '14', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(6, 'Tablet 1', '2020-12-30 23:54:07', '1', '1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(7, 'Tablet 2', '2020-12-30 23:54:07', '1', '1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(8, 'Mobile', '2020-12-30 23:54:07', '2', '1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(9, 'Tablet 4', '2020-12-30 23:54:07', '2', '1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(10, 'Mobile 2', '2020-12-30 23:54:07', '3', '1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(11, 'Nice Book 5', '2020-12-30 23:54:07', '3', '14', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(12, 'Nice Book 6', '2020-12-30 23:54:07', '1', '14', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(13, 'Nice Book 7', '2020-12-30 23:54:07', '1', '14', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(14, 'Nice Book 8', '2020-12-30 23:54:07', '2', '14', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(15, 'Nice Book 9', '2020-12-30 23:54:07', '2', '14', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(16, 'Nice Book 10', '2020-12-30 23:54:07', '3', '14', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(17, 'Nice Book 11', '2020-12-30 23:54:07', '3', '14', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.');


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
-- Data for table PHOTO
--

INSERT INTO `PHOTO` (`photoId`, `name`, `userId`, `categoryId`, `itemId`, `datetime_`) VALUES
(1, 'avatarEE.png', '1', null, null, '2020-12-30 23:54:07'),
(2, 'avatarDP.png', '2', null, null, '2020-12-30 23:54:07'),
(3, 'avatarVP.png', '3', null, null, '2020-12-30 23:54:07'),
(4, 'book1.jpg', null, null, '1', '2020-12-30 23:54:07'),
(5, 'book2.jpg', null, null, '2', '2020-12-30 23:54:07'),
(6, 'book3.jpg', null, null, '3', '2020-12-30 23:54:07'),
(7, 'book4.jpg', null, null, '4', '2020-12-30 23:54:07'),
(8, 'mobile1.jpg', null, null, '5', '2020-12-30 23:54:07'),
(9, 'tablet1.jpg', null, null, '6', '2020-12-30 23:54:07'),
(10, 'tablet2.jpg', null, null, '7', '2020-12-30 23:54:07'),
(11, 'mobileNew.jpg', null, null, '8', '2020-12-30 23:54:07'),
(12, 'mobile1.jpg', null, null, '9', '2020-12-30 23:54:07'),
(13, 'mobileNew.jpg', null, null, '10', '2020-12-30 23:54:07'),
(14, 'book4.jpg', null, null, '11', '2020-12-30 23:54:07'),
(15, 'book3.jpg', null, null, '12', '2020-12-30 23:54:07'),
(16, 'book3.jpg', null, null, '13', '2020-12-30 23:54:07'),
(17, 'book1.jpg', null, null, '14', '2020-12-30 23:54:07'),
(18, 'book2.jpg', null, null, '15', '2020-12-30 23:54:07'),
(19, 'book1.jpg', null, null, '16', '2020-12-30 23:54:07'),
(20, 'book2.jpg', null, null, '17', '2020-12-30 23:54:07'),
(21, 'defaultAvatar.png', '4', null, null, '2020-12-30 23:54:07'),
(22, 'defaultAvatar.png', '5', null, null, '2020-12-30 23:54:07'),
(23, 'defaultAvatar.png', '6', null, null, '2020-12-30 23:54:07'),
(24, 'defaultAvatar.png', '7', null, null, '2020-12-30 23:54:07');



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
-- Data for table RATING
--

INSERT INTO `RATING` (`ratingId`, `rating`, `datetime_`, `comments`, `userRatingId`, `userRatedId`) VALUES
(1, '4', '2020-12-30 23:54:07', 'Very Good' ,'2', '1'),
(2, '4', '2020-12-30 23:54:07', 'Very Good' ,'3', '1'),
(3, '4', '2020-12-30 23:54:07', 'Very Good!' ,'4', '1'),
(4, '4', '2020-12-30 23:54:07', 'Very Good' ,'5', '1'),
(5, '4', '2020-12-30 23:54:07', 'Very Good' ,'6', '1'),
(6, '2', '2020-12-30 23:54:07', 'Bad...' ,'1', '2'),
(7, '5', '2020-12-30 23:54:07', 'Excellent' ,'3', '2'),
(8, '1', '2020-12-30 23:54:07', 'Very Bad!' ,'4', '2'),
(9, '5', '2020-12-30 23:54:07', 'Excellent' ,'5', '2'),
(10, '3', '2020-12-30 23:54:07', 'Good', '6', '2'),
(11, '4', '2020-12-30 23:54:07', 'Very Good' ,'1', '3'),
(12, '4', '2020-12-30 23:54:07', 'Very Good' ,'2', '3'),
(13, '2', '2020-12-30 23:54:07', 'Bad...' ,'4', '3'),
(14, '4', '2020-12-30 23:54:07', 'Very Good' ,'5', '3'),
(15, '1', '2020-12-30 23:54:07', 'Very Bad!' ,'6', '3'),
(16, '5', '2020-12-30 23:54:07', 'Excellent!!!' ,'7', '3');


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
-- Data for table REQUEST
--

INSERT INTO `REQUEST` (`requestId`, `datetime_`, `itemOfferedId`, `itemRequestedId`, `requesterId`, `ownerId`, `status`, `message`) VALUES
(1, '2020-12-30 23:54:07', '1' ,'4', '1', '3', 'pending', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(2, '2020-12-31 23:54:07', '2' ,'5', '1', '3', 'pending', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(3, '2020-12-31 23:54:07', '6' ,'10', '1', '3', 'pending', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(4, '2020-12-31 23:54:07', '7' ,'11', '1', '3', 'pending', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(5, '2020-12-31 23:54:07', '3' ,'16', '2', '3', 'pending', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(6, '2020-12-31 23:54:07', '8' ,'4', '2', '3', 'pending', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(7, '2020-12-31 23:54:07', '9' ,'5', '2', '3', 'pending', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.');

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

--
-- Data for table FAVORITE
--

INSERT INTO `FAVORITE` (`itemId`, `userId`) VALUES
(3,1),
(8,1),
(1,2),
(2,2),
(1,3),
(2,3),
(3,3);











