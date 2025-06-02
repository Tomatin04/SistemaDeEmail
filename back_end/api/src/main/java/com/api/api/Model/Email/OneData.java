package com.api.api.Model.Email;

public record OneData(Long emailId, String assunto, String emailRemetente, String emailDestinatario, String corpo, Status status, String dataEnvio) {

    public OneData(Email email){
        this(email.getEmailId(), email.getAssunto(), email.getEmailRemetente().getEmail(), email.getEmailDestinatario(), email.getCorpo(),
                email.getStatus(), email.getDataEnvio().toString());
    }
}
