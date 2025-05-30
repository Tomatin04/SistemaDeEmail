create table emails(

    email_id bigint not null auto_increment,
    email_destinatario varchar(128) not null,
    assunto varchar(128) not null,
    corpo varchar(128) not null,
    email_remetente varchar(128) not null,
    status varchar(80) not null,
    data_envio varchar(100) not null,

    primary key(email_id),
    FOREIGN KEY (email_remetente) REFERENCES users(email)

);

