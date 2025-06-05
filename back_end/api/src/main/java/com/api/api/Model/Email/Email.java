package com.api.api.Model.Email;

import com.api.api.Model.Rascunho.Rascunho;
import com.api.api.Model.User.User;
import com.fasterxml.jackson.annotation.JsonBackReference;
import jakarta.persistence.*;
import jdk.jfr.Enabled;
import lombok.AllArgsConstructor;
import lombok.EqualsAndHashCode;
import lombok.Getter;

import lombok.NoArgsConstructor;

import java.time.LocalDate;

@Table(name = "emails")
@Entity(name = "Email")
@Getter

@AllArgsConstructor
@NoArgsConstructor
@EqualsAndHashCode(of = "emailId")
public class Email {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long emailId;

    private String assunto;
    @Lob
    private String corpo;
    private String emailDestinatario;

    @ManyToOne(fetch = FetchType.LAZY)
    @JoinColumn(name = "email_remetente", referencedColumnName = "email")
    @JsonBackReference
    private User emailRemetente;

    @Enumerated(EnumType.STRING)
    private Status status;

    private LocalDate dataEnvio;


    public Email(CreateData data, User user){
        this.assunto = data.assunto();
        this.corpo = data.corpo();
        this.emailDestinatario = data.emailDestinatario();
        this.emailRemetente = user;

        dataEnvio = LocalDate.now();
        status = Status.ENVIADO;
    }

    public Email(Rascunho rascunho){
        this.assunto = rascunho.getAssunto();
        this.emailDestinatario = rascunho.getEmailDestinatario();
        this.corpo = rascunho.getCorpo();
        this.emailRemetente = rascunho.getEmailRemetente();

        dataEnvio = LocalDate.now();
        status = Status.ENVIADO;
    }



}
