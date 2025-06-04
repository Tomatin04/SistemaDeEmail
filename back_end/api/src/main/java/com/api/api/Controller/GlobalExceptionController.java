package com.api.api.Controller;

import com.api.api.Infra.Exception.UserException.UserExistException;
import com.api.api.Infra.Service.InformationMessage;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.HttpRequestMethodNotSupportedException;
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

}
