package com.api.api.Model.User;

import jakarta.validation.constraints.Email;
import jakarta.validation.constraints.NotBlank;
import jakarta.validation.constraints.Pattern;

public record UpdateData(
        String nome,
        @Pattern(regexp = "^(?=.*[a-z])(?=.*[A-Z])(?=.*\\\\d)(?=.*[^a-zA-Z0-9]).{8,80}$") @NotBlank
        String senha
) {
}
