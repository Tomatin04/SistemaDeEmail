package com.api.api.Model.User;

import jakarta.validation.constraints.Email;
import jakarta.validation.constraints.NotBlank;
import jakarta.validation.constraints.NotNull;
import jakarta.validation.constraints.Pattern;

public record CreateData(
        @NotBlank
        String nome,
        @NotBlank @Email
        String email,
        @NotNull @Pattern(regexp = "^(?=.*[a-z])(?=.*[A-Z])(?=.*\\\\d)(?=.*[^a-zA-Z0-9]).{8,80}$")
        String senha
) {
}
