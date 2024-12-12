CREATE TABLE clients
(
  name nvarchar(100) NOT NULL,
  Phone varchar(20) NOT NULL,
  sex nvarchar(20) NOT NULL,
  age INT NOT NULL,
  PRIMARY KEY (Phone)
);

CREATE TABLE invoice
(
  total_price INT NOT NULL,
  number_people INT NOT NULL,
  ID_HD VARCHAR(20) NOT NULL,
  phone varchar(20) NOT NULL,
  PRIMARY KEY (ID_HD),
  FOREIGN KEY (phone) REFERENCES clients(Phone)
);

CREATE TABLE rooms
(
  ID_Room VARCHAR(10) NOT NULL,
  gia INT NOT NULL,
  type INT NOT NULL,
  img VARCHAR(100) NOT NULL,
  PRIMARY KEY (ID_Room)
);

CREATE TABLE DM_services
(
  total_price INT NOT NULL,
  ID INT NOT NULL,
  phone varchar(20) NOT NULL,
  PRIMARY KEY (ID),
  FOREIGN KEY (phone) REFERENCES clients(Phone)
);

CREATE TABLE User
(
  password varchar(20) NOT NULL,
  phone_client varchar(20) NOT NULL,
  PRIMARY KEY (Phone_client),
  FOREIGN KEY (Phone_client) REFERENCES clients(Phone)
);

CREATE TABLE listroom
(
  ngayden DATE NOT NULL,
  ngaydi DATE NOT NULL,
  ID_room VARCHAR(10) NOT NULL,
  ID_HD VARCHAR(20) NOT NULL,
  PRIMARY KEY (ID_room, ID_HD),
  FOREIGN KEY (ID_room) REFERENCES rooms(ID_Room),
  FOREIGN KEY (ID_HD) REFERENCES invoice(ID_HD)
);

CREATE TABLE service
(
  ID_DV INT NOT NULL,
  name_service INT NOT NULL,
  price INT NOT NULL,
  ID INT NOT NULL,
  PRIMARY KEY (ID_DV),
  FOREIGN KEY (ID) REFERENCES DM_services(ID)
);