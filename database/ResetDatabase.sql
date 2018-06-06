delete from message;
delete from enrollment;
delete from grades;
delete from course;
delete from programme;
delete from user;

alter table message auto_increment = 1;
alter table enrollment auto_increment = 1; 
alter table grades auto_increment = 1;
alter table course auto_increment = 1;
alter table programme auto_increment = 1;
alter table user auto_increment = 1;