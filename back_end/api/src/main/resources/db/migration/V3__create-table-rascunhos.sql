create table rascunhos(

    rascunhoId bigint not null auto_increment,
    email_destinatario varchar(128) ,
    assunto varchar(80),
    email_remetente varchar(128) not null,
    corpo LONGTEXT,


    primary key(rascunhoId),
    FOREIGN KEY (email_remetente) REFERENCES users(email)

);

