package com.api.api.Model.Rascunho;

import com.api.api.Model.User.User;
import jakarta.persistence.*;
import jakarta.validation.constraints.Email;
import lombok.*;

@Table(name = "rascunhos")
@Entity(name = "Rascunho")
@Getter

@NoArgsConstructor
@AllArgsConstructor
@EqualsAndHashCode(of = "rascunhoId")
public class Rascunho {

    @Id @GeneratedValue(strategy = GenerationType.IDENTITY)  @Column(name = "rascunhoId")
    private Long rascunhoId;

    @Email
    private String emailDestinatario;

    private String assunto;
    private String corpo;

    @Email
    @ManyToOne(fetch = FetchType.LAZY)
    @JoinColumn(name = "emailRemetente", referencedColumnName = "email")
    private User emailRemetente;

    public Rascunho(CreateData data, User creator){
        this.emailDestinatario = data.emailDestinatario();
        this.assunto = data.assunto();
        this.corpo = data.corpo();
        this.emailRemetente = creator;
    }

    public void salvarRascunho(UpdateData data){
        if(data.assunto() != null){this.assunto = data.assunto();}
        if(data.corpo() != null){this.corpo = data.corpo();}
        if(data.emailDestinatario() != null){this.emailDestinatario = data.emailDestinatario();}
    }

}
