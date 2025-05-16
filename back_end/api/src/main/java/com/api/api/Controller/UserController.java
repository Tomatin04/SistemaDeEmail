package com.api.api.Controller;

import com.api.api.Infra.Service.InformationMessage;
import com.api.api.Model.User.CreateData;
import com.api.api.Model.User.User;
import com.api.api.Model.User.UserRepository;
import io.swagger.v3.oas.annotations.security.SecurityRequirement;
import jakarta.transaction.Transactional;
import jakarta.validation.Valid;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;
import org.springframework.web.util.UriComponentsBuilder;

@RestController
@RequestMapping("/api/usuarios")
@SecurityRequirement(name = "bearer-key")
public class UserController {

    @Autowired
    private UserRepository repository;

    @PostMapping
    @Transactional
    public ResponseEntity create(@RequestBody @Valid CreateData data, UriComponentsBuilder uriComponentsBuilder){
        var user = new User(data);
        repository.save(user);

        var uri = uriComponentsBuilder.path("api/usuarios/{id}").buildAndExpand(user.getId()).toUri();
        return ResponseEntity.created(uri).body(new InformationMessage("Sucesso ao criar o usuário"));
    }

    @GetMapping
    public ResponseEntity show (@RequestBody @Valid)
}
