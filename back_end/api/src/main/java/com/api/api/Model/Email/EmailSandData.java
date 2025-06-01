package com.api.api.Model.Email;

public record EmailSandData(Long emailId, String assunto , String corpo, String emailDestinatario, String emailRemetente, Status status, String dataEnvio) {

    public EmailSandData(Email email){
        this(email.getEmailId(), email.getAssunto(), email.getCorpo(), email.getEmailDestinatario(), email.getEmailRemetente().getEmail(),
                email.getStatus(), email.getDataEnvio().toString());
    }
}
/*

private Long emailId;

    private String assunto;
    private String corpo;
    private String emailDestinatario;

    @ManyToOne(fetch = FetchType.LAZY)
    @JoinColumn(name = "email_remetente", referencedColumnName = "email")
    @JsonBackReference
    private User emailRemetente;

    @Enumerated(EnumType.STRING)
    private Status status;

    private LocalDate dataEnvio;
 */