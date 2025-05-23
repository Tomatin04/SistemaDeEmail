package com.api.api.Infra.Doc;

import io.swagger.v3.oas.models.Components;
import io.swagger.v3.oas.models.OpenAPI;
import io.swagger.v3.oas.models.info.License;
import io.swagger.v3.oas.models.security.SecurityScheme;
import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.Configuration;
import io.swagger.v3.oas.models.info.Info;
import io.swagger.v3.oas.models.info.Contact;

@Configuration
public class ConfigSpringSwatter {
    @Bean
    public OpenAPI customOpenAPI(){
        return new OpenAPI().components(new Components()
                .addSecuritySchemes("bearer-key", new SecurityScheme().type(SecurityScheme.Type.HTTP).scheme("bearer").bearerFormat("JWT")))
                .info(new Info()
                        .title("E-mail API")
                        .description("Api do back-end responsavel por lidar com os processo de envio e recebimento de e-mail")
                        .contact(new Contact().name("Time Backend").email("matheus.srebe@outlook.com"))
                        .license(new License().name("Apache 2.0").url("http://voll.med/api/licenca")));
    }
}
