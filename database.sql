CREATE DATABASE IF NOT EXISTS booking_db;
USE booking_db;

CREATE TABLE IF NOT EXISTS users(
id int(255) auto_increment not null,
name varchar(250),
surname varchar(255),
email varchar(250),
password varchar(250),
role varchar(100),
image varchar(250),
created_at datetime,
updated_at datetime,
remember_token varchar(250),
CONSTRAINT PK_USERS PRIMARY KEY(id)
)Engine=InnoDb;

INSERT INTO users VALUES(null,'pp','pepo','pepe@pepe.com','pass','usuario','null',CURDATE(),CURDATE(),'null');
INSERT INTO users VALUES(null,'marta','mena','marta@mena.com','pass','usuario','null',CURDATE(),CURDATE(),'null');
INSERT INTO users VALUES(null,'Peter','lenio','peter@peter.com','pass','usuario','null',CURDATE(),CURDATE(),'null');



CREATE TABLE IF NOT EXISTS clients(
id int(255) auto_increment not null,
name varchar(250),
surname varchar(255),
address varchar(255),
telephone varchar(250),
email varchar(250),
created_at datetime,
updated_at datetime,
CONSTRAINT PK_CLIENTS PRIMARY KEY(id)
)Engine=InnoDb;

INSERT INTO clients VALUES(null,'Eduard','Pinto','La fayette 23','3131313','edu@edu.com',CURDATE(),CURDATE());
INSERT INTO clients VALUES(null,'Pastora','Glez','Goya 23','91232323','pastora@pastora.com',CURDATE(),CURDATE());
INSERT INTO clients VALUES(null,'Emilio','Diaz','Calle s/n','912324422','emil@emil.com',CURDATE(),CURDATE());


CREATE TABLE IF NOT EXISTS bookings(
id int(255) auto_increment not null,
user_id int(255) not null,
client_id int(255) not null,
type varchar(100),
room int,
date_in datetime,
date_out datetime,
comments text,
created_at datetime,
updated_at datetime,
CONSTRAINT PK_BOOKINGS PRIMARY KEY(id),
CONSTRAINT FK_USERS FOREIGN KEY(user_id)REFERENCES users(id),
CONSTRAINT FK_CLIENTS FOREIGN KEY(client_id)REFERENCES clients(id)
)Engine=InnoDb;

INSERT INTO bookings VALUES(null,1,1,'pension completa',234,null,null,null,CURDATE(),CURDATE());
INSERT INTO bookings VALUES(null,3,2,'desayuno',321,null,null,null,CURDATE(),CURDATE());
INSERT INTO bookings VALUES(null,2,3,'desayuno',456,null,null,null,CURDATE(),CURDATE());


CREATE TABLE IF NOT EXISTS bills(
id int(255) auto_increment not null,
client_id int(255) not null,
days int(100),
room_price int(250),
others text,
payed float(100,2),
total float(100,2),
created_at datetime,
updated_at datetime,
CONSTRAINT PK_BILLS PRIMARY KEY(id),
CONSTRAINT FK_CLIENTS FOREIGN KEY(client_id)REFERENCES clients(id)
)Engine=InnoDb;


INSERT INTO bills VALUES(null,1,3,120,null,200,350,CURDATE(),CURDATE());
INSERT INTO bills VALUES(null,3,2,120,null,89,240,CURDATE(),CURDATE());
INSERT INTO bills VALUES(null,2,6,120,null,200,720,CURDATE(),CURDATE());