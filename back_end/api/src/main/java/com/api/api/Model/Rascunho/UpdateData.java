package com.api.api.Model.Rascunho;

import jakarta.validation.constraints.Email;
import jakarta.validation.constraints.NotBlank;
import jakarta.validation.constraints.NotNull;

public record UpdateData(
        @NotNull
        @NotBlank
        Long rascunhoId,
        @NotBlank
        String assunto,
        @Email
        @NotBlank
        String emailDestinatario,
        @NotBlank
        String corpo
) {
}
