package com.api.api.Model.Email;

import com.api.api.Model.User.User;
import jakarta.transaction.Transactional;
import jakarta.validation.constraints.NotBlank;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Modifying;
import org.springframework.data.jpa.repository.Query;

import java.util.ArrayList;

public interface EmailRepository extends JpaRepository<Email, Long> {

    @Transactional
    @Modifying(clearAutomatically = true)
    @Query(value = """
            UPDATE emails SET status = :status WHERE email_id = :id
            """, nativeQuery = true)
    void setStatusLido(String status, Long id);

    ArrayList<Email> findAllByEmailRemetente(@NotBlank User email);

    ArrayList<Email> findAllByEmailDestinatarioOrderByEmailIdDesc(@NotBlank String email);

    @Transactional
    Email findEmailByEmailId(@NotBlank  Long id);
}
