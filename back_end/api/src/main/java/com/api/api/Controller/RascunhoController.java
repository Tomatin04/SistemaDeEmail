package com.api.api.Controller;

import com.api.api.Infra.Service.InformationMessage;
import com.api.api.Infra.Service.UserUtil;
import com.api.api.Model.Rascunho.CreateData;
import com.api.api.Model.Rascunho.Rascunho;
import com.api.api.Model.Rascunho.RascunhoRepository;
import io.swagger.v3.oas.annotations.security.SecurityRequirement;
import jakarta.transaction.Transactional;
import jakarta.validation.Valid;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

@RestController
@RequestMapping("/api/rascunho")
@SecurityRequirement(name = "bearer-key")
public class RascunhoController {

    @Autowired
    private RascunhoRepository repository;

    @Autowired
    private UserUtil userUtil;

    @PostMapping
    @Transactional
    public ResponseEntity create (@RequestBody @Valid CreateData data, @RequestHeader("Authorization")  String token){
        var rascunho = new Rascunho(data, userUtil.getUserByToken(token));
        repository.save(rascunho);
        return ResponseEntity.ok(new InformationMessage("Rascunho criado com sucesso"));
    }

}
