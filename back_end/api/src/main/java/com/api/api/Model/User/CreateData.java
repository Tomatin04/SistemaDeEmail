package com.api.api.Model.User;

import jakarta.validation.constraints.Email;
import jakarta.validation.constraints.NotBlank;
import jakarta.validation.constraints.NotNull;

public record CreateData(
        @NotBlank
        String nome,
        @NotBlank @Email
        String email,
        @NotNull
        String senha
) {
}
