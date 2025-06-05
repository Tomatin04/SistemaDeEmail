package com.api.api.Infra.Service;

import com.api.api.Infra.Exception.EmailException.EmailNotFind;
import com.api.api.Model.Email.Email;
import com.api.api.Model.Email.EmailRepository;
import com.api.api.Model.Email.Status;
import com.api.api.Model.Rascunho.RascunhoRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

@Service
public class EmailUtil {

    @Autowired
    private RascunhoRepository rascunhoRepository;

    @Autowired
    private EmailRepository emailRepository;

    public Email createEmailByRascunho(Long id){
        var rascunho = rascunhoRepository.findByRascunhoId(id);
        rascunhoRepository.deleteByRascunhoId(id);
        return new Email(rascunho);
    }

    public Email findEmailToRead(Long id){
        var email = emailRepository.findEmailByEmailId(id);
        if(email == null) throw new EmailNotFind("Email não econtrado");
        emailRepository.setStatusLido(Status.LIDO.toString(), id);
        return  emailRepository.getReferenceById(id);
    }
}
