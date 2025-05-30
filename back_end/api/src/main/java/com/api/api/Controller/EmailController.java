package com.api.api.Controller;

import com.api.api.Infra.Service.EmailUtil;
import com.api.api.Infra.Service.InformationMessage;
import com.api.api.Infra.Service.UserUtil;
import com.api.api.Model.Email.CreateData;
import com.api.api.Model.Email.Email;
import com.api.api.Model.Email.EmailRepository;
import io.swagger.v3.oas.annotations.security.SecurityRequirement;
import jakarta.transaction.Transactional;
import jakarta.validation.Valid;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.util.ArrayList;

@RestController
@RequestMapping("/api/email")
@SecurityRequirement(name = "bearer-key")
public class EmailController {

    @Autowired
    private EmailRepository repository;

    @Autowired
    private EmailUtil emailUtil;

    @Autowired
    private UserUtil userUtil;

    @PostMapping
    @Transactional
    public ResponseEntity create (@RequestBody @Valid CreateData data, @RequestHeader("Authorization")  String token){
        var email = new Email(data, userUtil.getUserByToken(token));
        email = repository.save(email);
        return ResponseEntity.ok(new InformationMessage("Email salbo \n" + email));
    }

    @PostMapping("/{id}")
    @Transactional
    public ResponseEntity createWhitId(@PathVariable Long id, @RequestHeader("Authorization") String token){
        var email = emailUtil.createEmailByRascunho(id);
        email = repository.save(email);
        return ResponseEntity.ok(new InformationMessage("Email salbo \n" + email));
    }

    @PutMapping("/{id}")
    @Transactional
    public ResponseEntity update(@PathVariable Long id, @RequestHeader("Authorization") String token){
        var email = emailUtil.readEmail(id);
        return ResponseEntity.ok(new InformationMessage("Email salbo \n" + email));
    }

    @GetMapping
    public ResponseEntity showAll(@RequestHeader("Authorization") String token){
        ArrayList<Email> emails = repository.findAllByEmailRemetente(userUtil.getUserByToken(token));
        return ResponseEntity.ok(new InformationMessage("Email salbo \n" + emails));
    }

    @GetMapping("/{id}")
    public  ResponseEntity show(@PathVariable Long id,@RequestHeader("Authorization") String token){
        var email = repository.findById(id);
        return ResponseEntity.ok(email);
    }
}
