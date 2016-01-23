-- Create Table: Student
--------------------------------------------------------------------------------
CREATE TABLE Student
(
	`Student_ID` INT NOT NULL AUTO_INCREMENT
	,PRIMARY KEY (Student_ID)
	,`F_Name` VARCHAR(250)  NULL 
	,`L_Name` VARCHAR(250)  NULL 
	,`Occupation` VARCHAR(250)  NULL 
	,`Email` VARCHAR(250)  NULL 
	,`Password` VARCHAR(250) NOT NULL 
	,`Phone` VARCHAR(250)  NULL 
	,`Address 1` VARCHAR(250)  NULL 
	,`Address 2` VARCHAR(250)  NULL 
	,`City` VARCHAR(250)  NULL 
	,`State_Province` VARCHAR(250)  NULL 
	,`Country` VARCHAR(250)  NULL 
	,`Zip_Code` VARCHAR(250)  NULL 
)
ENGINE=INNODB



-- Create Table: Staff
--------------------------------------------------------------------------------
CREATE TABLE Staff
(
	`Staff_ID` INT NOT NULL AUTO_INCREMENT
	,PRIMARY KEY (Staff_ID)
	,`F_Name` VARCHAR(250)  NULL 
	,`L_Name` VARCHAR(250)  NULL 
	,`Title` VARCHAR(250)  NULL 
	,`Department` VARCHAR(250)  NULL 
	,`Email` VARCHAR(250)  NULL 
	,`Password` VARCHAR(250)  NULL 
	,`Phone` VARCHAR(250)  NULL 
	,`Address 1` VARCHAR(250)  NULL 
	,`Address 2` VARCHAR(250)  NULL 
	,`City` VARCHAR(250)  NULL 
	,`State` VARCHAR(250)  NULL 
	,`Country` VARCHAR(250)  NULL 
	,`Zip_Code` VARCHAR(250)  NULL 
)
ENGINE=INNODB



-- Create Table: Notes
--------------------------------------------------------------------------------
CREATE TABLE Notes
(
	`Note_ID` INT NOT NULL AUTO_INCREMENT
	,PRIMARY KEY (Note_ID)
	,`Staff_ID` INT  NULL AUTO_INCREMENT
	,`Student_ID` INT  NULL AUTO_INCREMENT
	,`Appointment_ID` INT  NULL AUTO_INCREMENT
	,`Notes` VARCHAR(10000)  NULL 
)
ENGINE=INNODB



-- Create Table: Appointments
--------------------------------------------------------------------------------
CREATE TABLE Appointments
(
	`Appointment_ID` INT NOT NULL AUTO_INCREMENT
	,PRIMARY KEY (Appointment_ID)
	,`Appointment_Title` VARCHAR(250)  NULL 
	,`Student_ID` INT NOT NULL 
	,`Staff_ID` INT NOT NULL 
	,`Reason` VARCHAR(250)  NULL 
    ,`Location` VARCHAR(250) NULL
	,`Start_Time` DATETIME  NULL 
	,`End_Time` DATETIME  NULL 
	,`Date_Scheduled` DATETIME  NULL 
	,`Confirmed` BIT NOT NULL 
)
ENGINE=INNODB



-- Create Foreign Key: Staff.Staff_ID -> Appointments.Staff_ID
ALTER TABLE Staff ADD FOREIGN KEY (Staff_ID) REFERENCES Appointments(Staff_ID);


-- Create Foreign Key: Notes.Staff_ID -> Staff.Staff_ID
ALTER TABLE Notes ADD FOREIGN KEY (Staff_ID) REFERENCES Staff(Staff_ID);


-- Create Foreign Key: Appointments.Appointment_ID -> Notes.Appointment_ID
ALTER TABLE Appointments ADD FOREIGN KEY (Appointment_ID) REFERENCES Notes(Appointment_ID);


-- Create Foreign Key: Notes.Student_ID -> Student.Student_ID
ALTER TABLE Notes ADD FOREIGN KEY (Student_ID) REFERENCES Student(Student_ID);


-- Create Foreign Key: Student.Student_ID -> Appointments.Student_ID
ALTER TABLE Student ADD FOREIGN KEY (Student_ID) REFERENCES Appointments(Student_ID);
