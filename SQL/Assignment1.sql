create DATABASE Assignment1 ;
use Assignment1 ;

	create TABLE Department (
	dept_id int Auto_Increment,
	dept_name varchar(50) unique not null,
	dept_description varchar(255) unique not null,
	PRIMARY key(dept_id)
	);

	create TABLE User (
	user_id int NOT NULL AUTO_INCREMENT,
	email varchar(255) unique not null, 
	username varchar(50) unique not null,
	password varchar(255) not null,
	registration_date DATETIME DEFAULT CURRENT_TIMESTAMP,
	dept_id int,
	PRIMARY key(user_id),
	FOREIGN key (dept_id) REFERENCES Department(dept_id)
	);
	
	create TABLE Course (
	course_id int Auto_Increment,
	course_name varchar(50) unique not null,
	course_description varchar(255) unique not null,
	instructor_name varchar(255) unique not null,
	credit_hours int,
	dept_id int,
	PRIMARY key(course_id),
	FOREIGN key (dept_id) REFERENCES Department(dept_id)
	);
	
	/*
	Departments
	*/
	INSERT into Department (dept_name, dept_description) values ("Computer", "Student study Computer");
	INSERT into Department (dept_name, dept_description) values ("Electircal", "Student study Electircal");
	INSERT into Department (dept_name, dept_description) values ("Mechnical", "Student study Mechnical");
	INSERT into Department (dept_name, dept_description) values ("Production", "Student study Production");
	
	/*
	Courses
	*/
	INSERT into Course (course_name, course_description, instructor_name, credit_hours, dept_id) values ("Programming", "Student study Programming course", "Saleh", 4, 2);
	INSERT into Course (course_name, course_description, instructor_name, credit_hours, dept_id) values ("Circuits", "Student study Circuits course", "Fahar", 3, 1);
	INSERT into Course (course_name, course_description, instructor_name, credit_hours, dept_id) values ("Fluids", "Student study Fluids course", "Zein", 3, 4);
	INSERT into Course (course_name, course_description, instructor_name, credit_hours, dept_id) values ("Casting", "Student study Casting course", "Abdullah", 4, 3);	
	
	