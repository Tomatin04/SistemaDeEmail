package com.api.api.Controller;

import com.api.api.Infra.Exception.EmailException.EmailNotFind;
import com.api.api.Infra.Exception.UserException.UserExistException;
import com.api.api.Infra.Service.InformationMessage;
import jakarta.persistence.PersistenceException;
import org.springframework.dao.DataAccessException;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.security.core.AuthenticationException;
import org.springframework.web.HttpRequestMethodNotSupportedException;
import org.springframework.web.bind.MethodArgumentNotValidException;
import org.springframework.web.bind.annotation.ExceptionHandler;
import org.springframework.web.bind.annotation.ResponseStatus;
import org.springframework.web.bind.annotation.RestControllerAdvice;
import org.springframework.web.context.request.WebRequest;
import org.springframework.web.servlet.NoHandlerFoundException;

@RestControllerAdvice
public class GlobalExceptionController {

    @ExceptionHandler(NoHandlerFoundException.class)
    public ResponseEntity handleNoHandlerFound(NoHandlerFoundException ex, WebRequest request){
        return ResponseEntity.status(HttpStatus.NOT_FOUND).body(new InformationMessage("Endpoint não encontrado"));
    }

    @ExceptionHandler(HttpRequestMethodNotSupportedException.class)
    public ResponseEntity handleMethhodNotAllow(HttpRequestMethodNotSupportedException ex ){
        return ResponseEntity.status(HttpStatus.METHOD_NOT_ALLOWED).body(new InformationMessage("Metodo não mapeado"));
    }

    @ExceptionHandler(UserExistException.class)
    public ResponseEntity handleUserExist(UserExistException ex){
        return ResponseEntity.status(HttpStatus.BAD_REQUEST).body(new InformationMessage("Não foi possivel cadastrar o usuário"));
    }

    @ExceptionHandler(EmailNotFind.class)
    public ResponseEntity handleEmailNotFind(EmailNotFind ex){
        return  ResponseEntity.status(HttpStatus.NOT_FOUND).body(new InformationMessage("Email não encontrado"));
    }

    @ExceptionHandler(DataAccessException.class)
    public ResponseEntity handleDataAccessException(DataAccessException ex){
        return ResponseEntity.status(HttpStatus.INTERNAL_SERVER_ERROR).body(new InformationMessage("ERRO INTERNO RELACIONADO AO ACESSO AO BD"));
    }

    @ExceptionHandler(PersistenceException.class)
    public ResponseEntity handlePersistenceException(PersistenceException ex){
        return ResponseEntity.status(HttpStatus.INTERNAL_SERVER_ERROR).body(new InformationMessage("ERRO DE PERSISTENCIA"));
    }

    @ExceptionHandler(AuthenticationException.class)
    public ResponseEntity handleAuthenticationException(AuthenticationException ex){
        return ResponseEntity.status(HttpStatus.UNAUTHORIZED).body(new InformationMessage("Credenciais Incorretas"));
    }

    @ExceptionHandler(MethodArgumentNotValidException.class)
    public ResponseEntity handleMethodArgumentNotValidException(MethodArgumentNotValidException ex){
        return ResponseEntity.status(HttpStatus.BAD_REQUEST).body(new InformationMessage("Campos invalidos"));
    }

}
