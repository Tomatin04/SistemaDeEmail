package com.api.api.Model.Rascunho;

import jakarta.validation.constraints.Email;
import jakarta.validation.constraints.NotBlank;

public record CreateData(
        @NotBlank
        String assunto,
        @Email
        @NotBlank
        String emailDestinatario,
        @NotBlank
        String corpo
) {
}
