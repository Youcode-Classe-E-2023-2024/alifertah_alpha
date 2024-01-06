create table users
(
    users_id       bigint auto_increment
        primary key,
    users_email    varchar(255) not null,
    users_password text         not null,
    users_username varchar(255) null,
);

CREATE TABLE password_recovery (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    token VARCHAR(255) NOT NULL
);