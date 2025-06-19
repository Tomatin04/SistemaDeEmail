package com.api.api.Infra.Service;

import com.api.api.Infra.Exception.EmailException.EmailNotFind;
import com.api.api.Infra.Exception.UserException.UserExistException;
import com.api.api.Infra.Securety.TokenService;
import com.api.api.Model.User.CreateData;
import com.api.api.Model.User.User;
import com.api.api.Model.User.UserRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

@Service
public class UserUtil {

    @Autowired
    private UserRepository userRepository;

    @Autowired
    private TokenService tokenService;

    public User getUserByToken(String token){
        String clearToken = token.replace("Bearer ", "");
        var user = userRepository.findById(tokenService.getIdFromToken(clearToken)).orElseThrow();
        return user;

    }

    public Long getIdFromToken(String token){
        String clearToken = token.replace("Bearer ", "");
        Long id = tokenService.getIdFromToken(clearToken);
        return id;
    }

    public Boolean userValid(String email){
        if(userRepository.findByEmail(email) != null)return userRepository.isUserActive(email);
        throw new EmailNotFind("Email não registrado");
    }

    public User checkInfoNewUser(CreateData data){
        if(userRepository.findByEmail(data.email()) != null) throw new UserExistException("Usuario já cacastrado com esse e-mail");
        return new User(data);
    }


}
