package com.api.api.Model.Email;

import jakarta.validation.constraints.Email;
import jakarta.validation.constraints.NotBlank;
import jakarta.validation.constraints.NotNull;
import org.aspectj.weaver.ast.Not;

public record CreateData(
        @NotNull @NotBlank
        String assunto,
        @NotNull @NotBlank @Email
        String emailDestinatario,
        @NotBlank @NotNull
        String corpo
) {
}


/*
{
    "assunto": "subject",
    "emailDestinatario": "email",
    "corpo": "body"
}
 */