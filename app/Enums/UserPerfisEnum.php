<?php

namespace App\Enums;

enum UserPerfisEnum: string
{
    case SEGUIDOR = 'Seguidor';
    case FIGURA_PUBLICA = 'Figura Pública';
    case INFLUENCIADOR = 'Influenciador';
    case CANDIDATO = 'Candidato';
    
    
}