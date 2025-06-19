package com.api.api.Model.Rascunho;

import jakarta.validation.constraints.Email;
import jakarta.validation.constraints.NotBlank;
import jakarta.validation.constraints.NotNull;

public record UpdateData(
        
        Long rascunhoId,
        String assunto,
        @Email
        String emailDestinatario,
        String corpo
) {
}
