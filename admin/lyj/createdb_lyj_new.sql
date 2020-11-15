

-- 1. CREATE TABLE


-- 1-1) CREATE ADDRESS TABLE

Create table ADDRESS(
	city varchar(10) NOT NULL,
	address varchar(20) NOT NULL,
	Primary key(city, address)
)DEFAULT CHARSET=utf8 COLLATE utf8_general_ci;


-- 1-1-1) CREATE INDEX
Create index address_index on ADDRESS(address);


-- 1-2) CREATE RESTAURANT TABLE

Create table RESTAURANT(
	id int AUTO_INCREMENT NOT NULL,
	p_id int NOT NULL,
	name varchar(30) NOT NULL,
	rate DECIMAL(2,1) NOT NULL
	visit_num int NOT NULL,
	address varchar(20) NOT NULL,
	Primary key(id),
	foreign key(address) references ADDRESS(address) on delete cascade on update cascade
)DEFAULT CHARSET=utf8 COLLATE utf8_general_ci;


-- 1-3) CREATE CUSTOMER TABLE

Create table CUSTOMER(
	cus_id int AUTO_INCREMENT,
	age varchar(15) CHECK(age IN('teenager','youth','middle_age','old_age')),
	sex varchar(1) CHECK(sex IN('F','M'),
	Primary key(cus_id)
)DEFAULT CHARSET=utf8 COLLATE utf8_general_ci;


-- 1-4 ) CREATE VISIT_LOG TABLE

Create table VISIT_LOG(
	id int AUTO_INCREMENT,
	date date DEFAULT "2020-11-07",
	cus_id int NOT NULL,
	res_id int NOT NULL,
	rate DECIMAL(2,1) DEFAULT 5,
	Primary key(id),
	foreign key(cus_id) references CUSTOMER(cus_id) on delete cascade on update cascade,
	foreign key(res_id) references RESTARANT(id) on delete cascade on update cascade
)DEFAULT CHARSET=utf8 COLLATE utf8_general_ci;


-- 2. CREATE INDEX

