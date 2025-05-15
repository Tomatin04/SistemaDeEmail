package com.email.mail.domain.users;

import jakarta.persistence.*;
import jakarta.validation.constraints.Email;
import lombok.*;


@Table(name = "users")
@Entity(name = "user")
@Getter
@Setter
@NoArgsConstructor
@AllArgsConstructor
@EqualsAndHashCode(of = "id")
public class User {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;

    private String username;
    private String password;

    @Email
    private String email;

}
