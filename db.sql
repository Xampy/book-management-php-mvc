

CREATE TABLE users (
	user_id BIGINT UNSIGNED AUTO_INCREMENT,
	fullname VARCHAR(200) NOT NULL,
	username VARCHAR(300) NOT NULL,
	sexe VARCHAR(1) NOT NULL,
	birthday DATE NOT NULL,
	email TEXT,

	PRIMARY KEY(user_id),

	CONSTRAINT unique_username
		UNIQUE (username),

	CONSTRAINT unique_fullname 
		UNIQUE (fullname),

	CONSTRAINT unique_user
		UNIQUE (username, fullname)

)Engine=INNODB;

#Test user
INSERT INTO users(
	fullname,
	username,
	sexe,
	birthday,
	email) 
VALUES(
	'Yao Maxime KAYI',
	'xampy',
	'M',
	NOW(),
	'x@gmail.com'
);


CREATE TABLE logins(
	login_id BIGINT UNSIGNED AUTO_INCREMENT,
	pass TEXT NOT NULL,
	user_id BIGINT UNSIGNED NOT NULL,

	PRIMARY KEY(login_id),

	CONSTRAINT fk_user_login 
		FOREIGN KEY (user_id)
		REFERENCES users(user_id)

)Engine=INNODB;


CREATE TABLE books (
	book_id BIGINT UNSIGNED AUTO_INCREMENT,
	title VARCHAR(200) NOT NULL,
	description TEXT NOT NULL,
	author VARCHAR(200) NOT NULL,
	page_cover TEXT,
	shop_link TEXT,
	user_id BIGINT UNSIGNED,

	PRIMARY KEY(book_id),


	CONSTRAINT fk_user_books
		FOREIGN KEY(user_id)
		REFERENCES users(user_id),

	CONSTRAINT unique_title
		UNIQUE (title)


)Engine=INNODB;


