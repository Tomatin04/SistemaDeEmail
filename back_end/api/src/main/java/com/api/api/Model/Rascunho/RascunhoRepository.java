package com.api.api.Model.Rascunho;

import com.api.api.Model.User.User;
import io.lettuce.core.dynamic.annotation.Param;
import jakarta.validation.constraints.NotBlank;
import jakarta.validation.constraints.NotNull;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;


import java.util.ArrayList;
import java.util.List;

public interface RascunhoRepository extends JpaRepository<Rascunho, Long> {

    Rascunho findByRascunhoId(@NotNull @NotBlank Long aLong);

    ArrayList<OneData> findAllByEmailRemetente(@NotBlank User email);

    void deleteByRascunhoId(Long rascunhoId);
}
