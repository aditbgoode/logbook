CREATE TABLE users (
     username VARCHAR(50) NOT NULL,
     password VARCHAR(50) NOT NULL,
     PRIMARY KEY (username)
);

CREATE TABLE ci_sessions (
     id INT(11) NOT NULL AUTO_INCREMENT,
     ip_address VARCHAR(20) NOT NULL,
     timestamp INT(10) NOT NULL,
     data blob NOT NULL,
     PRIMARY KEY (id)
);

CREATE TABLE table_log (
     log_id INT(11) NOT NULL AUTO_INCREMENT,
     log_time timestamp,
     log_username VARCHAR(50),
     log_tipe INT(11),
     log_desc VARCHAR(255),
     PRIMARY KEY (log_id)
);

CREATE TABLE rencana (
     id INT(11) NOT NULL AUTO_INCREMENT,
     username VARCHAR(50) NOT NULL,
     keterangan text NOT NULL,
     tanggal datetime,
     PRIMARY KEY (id)
);

CREATE TABLE laporan (
     id INT(11) NOT NULL AUTO_INCREMENT,
     username VARCHAR(50) NOT NULL,
     img1 VARCHAR(50),
     img2 VARCHAR(50),
     img3 VARCHAR(50),
     img4 VARCHAR(50),
     img5 VARCHAR(50),
     keterangan text NOT NULL,
     tanggal datetime,
     PRIMARY KEY (id)
);

	INSERT INTO users (username, password) VALUES
	('admin',MD5('admin'));