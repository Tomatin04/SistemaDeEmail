package com.api.api.Infra.Exception.EmailException;

public class EmailNotFind extends RuntimeException {
    public EmailNotFind(String message) {
        super(message);
    }
}
