package com.api.api.Model.Rascunho;

import com.fasterxml.jackson.annotation.JsonInclude;

@JsonInclude(JsonInclude.Include.NON_NULL)
public record ShowData(String mensagem, OneData rascunho) {
}
