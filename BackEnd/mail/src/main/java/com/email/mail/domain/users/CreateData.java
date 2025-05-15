package com.email.mail.domain.users;

import jakarta.validation.constraints.Email;
import jakarta.validation.constraints.NotBlank;
import jakarta.validation.constraints.NotNull;

public record CreateData(
        @NotBlank
        String username,
        @NotBlank @Email
        String email,
        @NotNull
        String password
) {
}
