package com.api.api.Infra.Exception.UserException;

public class UserExistException extends RuntimeException {
    public UserExistException(String message) {
        super(message);
    }
}
