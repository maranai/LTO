ALTER TABLE
    attendances MODIFY COLUMN session_number VARCHAR(5) NOT NULL;

update users set classroom_id = null, university_id = null, region_id = null where username = 'admin';

-- 09/05/2013 --
CREATE
    TABLE user_attendance_children
    (
        id BIGINT NOT NULL AUTO_INCREMENT,
        user_attendance_id BIGINT,
        child_id BIGINT,
        PRIMARY KEY (id)
    )
    ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE
    user_attendance_children ADD CONSTRAINT user_attendance_children_fk1 FOREIGN KEY (
    user_attendance_id) REFERENCES user_attendances (id);
ALTER TABLE
    user_attendance_children ADD CONSTRAINT user_attendance_children_fk2 FOREIGN KEY (
    child_id) REFERENCES children (id);

--20/05/2013--
update attendances set assisted = 0 where assisted = 2;



