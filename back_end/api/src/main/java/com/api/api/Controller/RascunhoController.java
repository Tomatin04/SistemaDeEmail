package com.api.api.Controller;

import com.api.api.Infra.Service.InformationMessage;
import com.api.api.Infra.Service.UserUtil;
import com.api.api.Model.Rascunho.*;

import io.swagger.v3.oas.annotations.info.Info;
import io.swagger.v3.oas.annotations.security.SecurityRequirement;
import jakarta.transaction.Transactional;
import jakarta.validation.Valid;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.util.ArrayList;
import java.util.List;
import java.util.stream.Collectors;

@RestController
@RequestMapping("/api/rascunhos")
@SecurityRequirement(name = "bearer-key")
public class RascunhoController {

    @Autowired
    private RascunhoRepository repository;

    @Autowired
    private UserUtil userUtil;

    @PostMapping
    @Transactional
    public ResponseEntity create (@RequestBody  CreateData data, @RequestHeader("Authorization")  String token){
        var rascunho = new Rascunho(data, userUtil.getUserByToken(token));
        var ras = repository.save(rascunho);
        return ResponseEntity.ok(new ShowData("Rascunho criado", new OneData(ras)));
    }

    @PutMapping("/{rascungoId}")
    @Transactional
    public ResponseEntity update (@PathVariable Long rascungoId, @RequestBody @Valid UpdateData data, @RequestHeader("Authorization")  String token){

        var rascunho = repository.findByRascunhoId(rascungoId);
        rascunho.salvarRascunho(data);
        return ResponseEntity.ok(new ShowData("Rascunho salvo com sucesso com sucesso", new OneData(rascunho)));
    }

    @GetMapping("/{rascunhoId}")
    public ResponseEntity get(@PathVariable Long rascunhoId, @RequestHeader("Authorization")  String token){
        var rascunho = repository.findByRascunhoId(rascunhoId);
        return ResponseEntity.ok(new ShowData("Rascunho localizado", new OneData(rascunho)));
    }

    @GetMapping()
    public ResponseEntity show(@RequestHeader("Authorization")  String token){
       ArrayList<OneData> rascunhos =  repository.findAllByEmailRemetente(userUtil.getUserByToken(token));
       return ResponseEntity.ok(new ShowAllData("Rascunho localizado", rascunhos));
       //return null;
    }

    @DeleteMapping("/{rascunhoId}")
    @Transactional
    public ResponseEntity delete(@PathVariable Long rascunhoId, @RequestHeader("Authorization")  String token){
        repository.deleteByRascunhoId(rascunhoId);
        return ResponseEntity.ok(new InformationMessage("Rascunho deletado com sucesso"));
    }

}
