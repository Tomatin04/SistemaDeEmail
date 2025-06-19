package com.api.api.Controller;

import com.api.api.Infra.Service.EmailUtil;
import com.api.api.Infra.Service.InformationMessage;
import com.api.api.Infra.Service.UserUtil;
import com.api.api.Model.Email.*;
import io.swagger.v3.oas.annotations.security.SecurityRequirement;
import jakarta.transaction.Transactional;
import jakarta.validation.Valid;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.util.ArrayList;
import java.util.stream.Collectors;

@RestController
@RequestMapping("/api/emails")
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
        var mail = repository.save(email);
        return ResponseEntity.ok(new ShowData("Email enviado com sucesso", new OneData(mail)));
    }

    @PostMapping("/{id}")
    @Transactional
    public ResponseEntity createWhitId(@PathVariable Long id, @RequestHeader("Authorization") String token){
        var email = emailUtil.createEmailByRascunho(id);
        var mail = repository.save(email);
        return ResponseEntity.ok(new ShowData("Email enviado com sucesso", new OneData(mail)));
    }


    @PutMapping("/{id}")
    @Transactional
    public ResponseEntity update(@PathVariable Long id, @RequestHeader("Authorization") String token){
        var email = emailUtil.findEmailToRead(id);
        return ResponseEntity.ok(new ShowData("Email marcado como lido", new OneData(email)));
    }


    @GetMapping
    public ResponseEntity showAll(@RequestHeader("Authorization") String token){
        ArrayList<Email> emails = repository.findAllByEmailDestinatarioOrderByEmailIdDesc(userUtil.getUserByToken(token).getEmail());
        ArrayList<EmailSandData> emailsSandData = (ArrayList<EmailSandData>) emails.stream().map(EmailSandData::new).collect(Collectors.toList());
        return ResponseEntity.ok(new ShowAllData("Email Encontrado", emailsSandData));
    }

    @GetMapping("/{id}")
    public  ResponseEntity show(@PathVariable Long id,@RequestHeader("Authorization") String token){
        var email = emailUtil.findEmailToRead(id);
        return ResponseEntity.ok(new ShowData("Email marcado como lido", new OneData(email)));
    }
}
