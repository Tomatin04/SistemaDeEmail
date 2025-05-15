create table users(

    id bigint not null auto_increment,
    email varchar(128) not null,
    password varchar(80) not null unique,
    username varchar(128) not null,

    primary key(id)

);