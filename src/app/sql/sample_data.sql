insert into regions (id, name) values (1, 'Region 01');
insert into regions (id, name) values (2, 'Region 02');

insert into universities (id, name, region_id) values (1, 'University 01', 1);
insert into universities (id, name, region_id) values (2, 'University 02', 2);
insert into universities (id, name, region_id) values (3, 'University 03', 1);
insert into universities (id, name, region_id) values (4, 'University 04', 2);

insert into programs (id, name, university_id) values (1, 'Program 01', 1);
insert into programs (id, name, university_id) values (2, 'Program 02', 2);
insert into programs (id, name, university_id) values (3, 'Program 03', 1);
insert into programs (id, name, university_id) values (4, 'Program 04', 2);

insert into classrooms (id, name, program_id) values (1, 'Classroom 01', 1);
insert into classrooms (id, name, program_id) values (2, 'Classroom 02', 2);

insert into children (id, ID_number, first_name, last_name, classroom_id) values (1, 1000, 'Juan', 'Gonzalez', 1);
insert into children (id, ID_number, first_name, last_name, classroom_id) values (3, 1005, 'Luis', 'Mora', 2);
insert into children (id, ID_number, first_name, last_name, classroom_id) values (4, 1007, 'Maria', 'Soto', 2);
insert into children (id, ID_number, first_name, last_name, classroom_id) values (5, 1001, 'Pedro', 'Castro', 1);
insert into children (id, ID_number, first_name, last_name, classroom_id) values (6, 2000, 'Ed', 'Harris', 1);

insert into users (id, first_name, last_name, role_name, classroom_id, university_id, region_id, username, password, email_address, old_password) values (1, 'Team', 'Lead', 'TEAM_LEAD', 1, null, null, 'lead', '7c85254ecd7564f70c246a308ccaf00190274d5790134496b3c6dcf4a7c0b4de', 'test@test.com', '7c85254ecd7564f70c246a308ccaf00190274d5790134496b3c6dcf4a7c0b4de');
insert into users (id, first_name, last_name, role_name, classroom_id, university_id, region_id, username, password, email_address, old_password) values (2, 'Site', 'Manager', 'SITE_MANAGER', null, 1, null, 'manager', '7c85254ecd7564f70c246a308ccaf00190274d5790134496b3c6dcf4a7c0b4de', 'test@test.com', '7c85254ecd7564f70c246a308ccaf00190274d5790134496b3c6dcf4a7c0b4de');
insert into users (id, first_name, last_name, role_name, classroom_id, university_id, region_id, username, password, email_address, old_password) values (3, 'Project', 'Director', 'PROJECT_DIRECTOR', null, null, 1, 'director', '7c85254ecd7564f70c246a308ccaf00190274d5790134496b3c6dcf4a7c0b4de', 'test@test.com', '7c85254ecd7564f70c246a308ccaf00190274d5790134496b3c6dcf4a7c0b4de');
insert into users (id, first_name, last_name, role_name, classroom_id, university_id, region_id, username, password, email_address, old_password) values (4, 'National', 'Research', 'NATIONAL_RESEARCH', null, null, null, 'national', '7c85254ecd7564f70c246a308ccaf00190274d5790134496b3c6dcf4a7c0b4de', 'test@test.com', '7c85254ecd7564f70c246a308ccaf00190274d5790134496b3c6dcf4a7c0b4de');
insert into users (id, first_name, last_name, role_name, classroom_id, university_id, region_id, username, password, email_address, old_password) values (5, 'Admin', 'Admin', 'ADMIN', 1, 1, 1, 'admin', '7c85254ecd7564f70c246a308ccaf00190274d5790134496b3c6dcf4a7c0b4de', 'test@test.com', '7c85254ecd7564f70c246a308ccaf00190274d5790134496b3c6dcf4a7c0b4de');
insert into users (id, first_name, last_name, role_name, classroom_id, university_id, region_id, username, password, email_address, old_password) values (6, 'Corp', 'Member', 'CORP_MEMBER', 1, null, null, 'corp', '7c85254ecd7564f70c246a308ccaf00190274d5790134496b3c6dcf4a7c0b4de', 'test@test.com', '7c85254ecd7564f70c246a308ccaf00190274d5790134496b3c6dcf4a7c0b4de');

insert into attendances (id, session_number, session_date, child_id, assisted) values (1, 1, '2013-04-15 00:00:00', 1, 0);
insert into attendances (id, session_number, session_date, child_id, assisted) values (7, 2, '2012-12-14 00:00:00', 1, 1);
insert into attendances (id, session_number, session_date, child_id, assisted) values (8, 3, '2012-12-14 00:00:00', 1, 1);
insert into attendances (id, session_number, session_date, child_id, assisted) values (9, 1, '2013-04-23 00:00:00', 6, 1);
insert into attendances (id, session_number, session_date, child_id, assisted) values (10, 2, '2013-03-20 00:00:00', 6, 1);
insert into attendances (id, session_number, session_date, child_id, assisted) values (11, 3, '2013-04-24 00:00:00', 6, 1);
insert into attendances (id, session_number, session_date, child_id, assisted) values (12, 1, '2013-04-23 00:00:00', 5, 1);
insert into attendances (id, session_number, session_date, child_id, assisted) values (13, 2, '2013-03-20 00:00:00', 5, 1);
insert into attendances (id, session_number, session_date, child_id, assisted) values (14, 3, '2013-04-23 00:00:00', 5, 1);
insert into attendances (id, session_number, session_date, child_id, assisted) values (15, 4, '2013-04-23 00:00:00', 5, 1);
insert into attendances (id, session_number, session_date, child_id, assisted) values (16, 5, '2013-03-20 00:00:00', 5, 1);

insert into user_attendances (id, session_date, hours, user_id) values (1, '2013-05-21 00:00:00', 1.0, 1);
insert into user_attendances (id, session_date, hours, user_id) values (2, '2013-04-24 00:00:00', 1.5, 1);
insert into user_attendances (id, session_date, hours, user_id) values (3, '2013-04-15 00:00:00', 2.0, 1);
insert into user_attendances (id, session_date, hours, user_id) values (4, '2013-04-15 00:00:00', 2.5, 1);
insert into user_attendances (id, session_date, hours, user_id) values (9, '2013-04-15 00:00:00', 3.7, 1);
insert into user_attendances (id, session_date, hours, user_id) values (10, '2013-04-15 00:00:00', 3.6, 1);
insert into user_attendances (id, session_date, hours, user_id) values (11, '2013-04-15 00:00:00', 1.0, 6);
insert into user_attendances (id, session_date, hours, user_id) values (12, '2013-04-15 00:00:00', 2.0, 6);
insert into user_attendances (id, session_date, hours, user_id) values (13, '2013-04-15 00:00:00', 5.0, 6);
insert into user_attendances (id, session_date, hours, user_id) values (18, '2013-04-16 00:00:00', 5.5, 6);
insert into user_attendances (id, session_date, hours, user_id) values (19, '2013-04-16 00:00:00', 23.0, 6);
insert into user_attendances (id, session_date, hours, user_id) values (20, '2013-04-22 00:00:00', 4.0, 1);
insert into user_attendances (id, session_date, hours, user_id) values (21, '2013-04-22 00:00:00', 2.0, 1);
