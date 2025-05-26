package com.api.api.Model.Rascunho;

public record OneData(Long rascunhoId, String assunto, String emailDestinatario, String corpo) {

    public OneData(Rascunho rascunho){
        this(rascunho.getRascunhoId(), rascunho.getAssunto(), rascunho.getEmailDestinatario(), rascunho.getCorpo());
    }
}

/*
"rascunhold": 1,
        "assunto": "subject",
        "emailDestinatario": "email",
        "corpo": "body"
 */