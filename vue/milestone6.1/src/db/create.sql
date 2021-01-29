/*
Contains all of the statements made to create all tables.
*/

{ user }

CREATE TABLE user (

	userID INT NOT NULL AUTO_INCREMENT,
	email VARCHAR(20),
	passhash TEXT,
	profilePic VARCHAR(100),
	bio TEXT,
	isAdmin INT NOT NULL DEFAULT 0,

	CONSTRAINT PK_userID PRIMARY KEY (userID)

);

{ listing }

CREATE TABLE listing (

	listingID INT NOT NULL AUTO_INCREMENT,
	userID INT NOT NULL,
	uploadDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	description TEXT,
	productName VARCHAR(30),
	category VARCHAR(20),
	isSold INT DEFAULT 0,

	CONSTRAINT PK_listingID PRIMARY KEY (listingID),
	CONSTRAINT FK_userID FOREIGN KEY (userID) references user(userID)
);

{ message }

CREATE TABLE messages (
	messageID INT NOT NULL AUTO_INCREMENT,
	userID INT NOT NULL,
	recipientID INT NOT NULL,
	message TEXT,
	
);

{ session }

CREATE TABLE session (

	sessionID VARCHAR(100) NOT NULL,
	userId INT NOT NULL,
	sessionVariable TEXT,
	lastUpdated TIMESTAMP NOT NULL,

	CONSTRAINT PK_sessionID PRIMARY KEY (sessionID),
	CONSTRAINT PK_userID FOREIGN KEY (userID) REFERENCES user(userID)
);

{ review }

CREATE TABLE review (

	reviewID INT NOT NULL AUTO_INCREMENT,
	userID INT NOT NULL,
	reviewedUserID INT NOT NULL,
	title VARCHAR(30) NOT NULL,
	description TEXT NOT NULL,
	rating INT NOT NULL,
	uploadDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

	CONSTRAINT PK_reviewID PRIMARY KEY (reviewID),
	CONSTRAINT FK_userID FOREIGN KEY (userID) references user(userID),
	CONSTRAINT FK_reviewedUserID FOREIGN KEY (reviewedUserID) references user(userID)

);
