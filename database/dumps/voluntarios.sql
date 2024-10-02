CREATE TABLE cabos_eleitorais (
    id CHAR(36) PRIMARY KEY,                    -- UUID como chave primária
    nome VARCHAR(255) NOT NULL,                 -- Nome do cabo eleitoral
    telefone VARCHAR(20),                       -- Telefone do cabo eleitoral
    email VARCHAR(255) UNIQUE,                  -- E-mail único do cabo eleitoral
    area_atuacao VARCHAR(255),                  -- Área onde o cabo eleitoral atua (região)
    data_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP  -- Data de registro do cabo eleitoral
);

CREATE TABLE usuarios (
    id CHAR(36) PRIMARY KEY,                    -- UUID como chave primária
    nome VARCHAR(255) NOT NULL,                 -- Nome completo do usuário
    email VARCHAR(255) NOT NULL UNIQUE,         -- E-mail (único)
    senha VARCHAR(255) NOT NULL,                -- Senha criptografada
    cidade VARCHAR(100),                        -- Cidade do usuário
    estado VARCHAR(50),                         -- Estado do usuário
    tipo_usuario ENUM('usuario', 'admin') DEFAULT 'usuario',  -- Tipo do usuário (padrão: usuário comum)
    perfil ENUM('comum', 'figura_publica', 'influenciador') DEFAULT 'comum',  -- Novo enum para categorizar o perfil
    id_cabo CHAR(36),                           -- UUID do cabo eleitoral (se aplicável)
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,  -- Data de criação do usuário
    FOREIGN KEY (id_cabo) REFERENCES cabos_eleitorais(id) ON DELETE SET NULL  -- Chave estrangeira referenciando cabos eleitorais
);

CREATE TABLE propostas (
    id CHAR(36) PRIMARY KEY,                    -- UUID como chave primária
    titulo VARCHAR(255) NOT NULL,               -- Título da proposta
    descricao TEXT NOT NULL,                    -- Descrição da proposta
    status ENUM('ativa', 'inativa') DEFAULT 'ativa',  -- Status da proposta
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP  -- Data de criação da proposta
);

CREATE TABLE contribuicoes (
    id CHAR(36) PRIMARY KEY,                    -- UUID como chave primária
    id_usuario CHAR(36) NOT NULL,               -- UUID do usuário que fez a contribuição
    id_proposta CHAR(36) NOT NULL,              -- UUID da proposta relacionada
    conteudo TEXT NOT NULL,                     -- Conteúdo da contribuição
    status ENUM('pendente', 'aprovada', 'rejeitada') DEFAULT 'pendente',  -- Status da contribuição (pendente, aprovada, rejeitada)
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,  -- Data de criação da contribuição
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id) ON DELETE CASCADE,  -- Chave estrangeira referenciando usuários
    FOREIGN KEY (id_proposta) REFERENCES propostas(id) ON DELETE CASCADE  -- Chave estrangeira referenciando propostas
);

CREATE TABLE comentarios_contribuicoes (
    id CHAR(36) PRIMARY KEY,                    -- UUID como chave primária
    id_usuario CHAR(36) NOT NULL,               -- UUID do usuário que fez o comentário
    id_contribuicao CHAR(36) NOT NULL,          -- UUID da contribuição relacionada
    conteudo TEXT NOT NULL,                     -- Conteúdo do comentário
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,  -- Data de criação do comentário
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id) ON DELETE CASCADE,  -- Chave estrangeira referenciando usuários
    FOREIGN KEY (id_contribuicao) REFERENCES contribuicoes(id) ON DELETE CASCADE  -- Chave estrangeira referenciando contribuições
);

CREATE TABLE publico_cabo (
    id CHAR(36) PRIMARY KEY,                    -- UUID como chave primária
    id_cabo CHAR(36) NOT NULL,                  -- UUID do cabo eleitoral que trouxe o público
    nome VARCHAR(255) NOT NULL,                 -- Nome do contato trazido
    telefone VARCHAR(20),                       -- Telefone do contato
    email VARCHAR(255),                         -- E-mail do contato
    cidade VARCHAR(100),                        -- Cidade do contato
    estado VARCHAR(50),                         -- Estado do contato
    data_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,  -- Data de registro do contato
    FOREIGN KEY (id_cabo) REFERENCES cabos_eleitorais(id) ON DELETE CASCADE  -- Chave estrangeira referenciando cabos eleitorais
);

CREATE TABLE interacao_publico (
    id CHAR(36) PRIMARY KEY,                    -- UUID como chave primária
    id_publico_cabo CHAR(36) NOT NULL,          -- UUID do contato do público relacionado
    tipo_interacao ENUM('criacao_conta', 'contribuicao', 'inscricao_evento', 'doacao') NOT NULL,  -- Tipo de interação
    descricao TEXT,                             -- Descrição da interação
    data_interacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,  -- Data da interação
    FOREIGN KEY (id_publico_cabo) REFERENCES publico_cabo(id) ON DELETE CASCADE  -- Chave estrangeira referenciando o público
);

CREATE TABLE eventos (
    id CHAR(36) PRIMARY KEY,                    -- UUID como chave primária
    titulo VARCHAR(255) NOT NULL,               -- Título do evento
    descricao TEXT NOT NULL,                    -- Descrição do evento
    data_evento DATE NOT NULL,                  -- Data do evento
    hora_evento TIME NOT NULL,                  -- Hora do evento
    local VARCHAR(255),                         -- Local onde o evento acontecerá
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP  -- Data de criação do evento
);

CREATE TABLE inscricoes_eventos (
    id CHAR(36) PRIMARY KEY,                    -- UUID como chave primária
    id_usuario CHAR(36) NOT NULL,               -- UUID do usuário que se inscreveu
    id_evento CHAR(36) NOT NULL,                -- UUID do evento relacionado
    data_inscricao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,  -- Data da inscrição
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id) ON DELETE CASCADE,  -- Chave estrangeira referenciando usuários
    FOREIGN KEY (id_evento) REFERENCES eventos(id) ON DELETE CASCADE  -- Chave estrangeira referenciando eventos
);

CREATE TABLE voluntarios (
    id CHAR(36) PRIMARY KEY,                      -- UUID como chave primária
    id_usuario CHAR(36) NOT NULL,                 -- UUID do usuário voluntário (relacionado à tabela `usuarios`)
    area_atuacao VARCHAR(255) NOT NULL,           -- Área de atuação do voluntário
    nivel_engajamento ENUM('iniciante', 'intermediario', 'avancado') DEFAULT 'iniciante',  -- Nível de engajamento do voluntário
    total_pessoas_captadas INT DEFAULT 0,         -- Número de pessoas cadastradas pelo voluntário
    data_inscricao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,  -- Data de inscrição do voluntário
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id) ON DELETE CASCADE  -- Chave estrangeira para a tabela `usuarios`
);

CREATE TABLE currais_eleitorais (
    id CHAR(36) PRIMARY KEY,                      -- UUID como chave primária
    id_voluntario CHAR(36) NOT NULL,              -- UUID do voluntário que cadastrou o eleitor
    nome_eleitor VARCHAR(255) NOT NULL,           -- Nome do eleitor
    titulo_eleitor VARCHAR(20) NOT NULL UNIQUE,   -- Título de eleitor (chave única para evitar duplicação)
    telefone VARCHAR(20),                         -- Telefone do eleitor
    email VARCHAR(255),                           -- E-mail do eleitor (opcional)
    cidade VARCHAR(100),                          -- Cidade onde o eleitor reside
    estado VARCHAR(50),                           -- Estado onde o eleitor reside
    status_validacao ENUM('pendente', 'confirmado') DEFAULT 'pendente',  -- Status de validação do eleitor
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,  -- Data de cadastro do eleitor
    FOREIGN KEY (id_voluntario) REFERENCES voluntarios(id) ON DELETE CASCADE  -- Chave estrangeira para a tabela `voluntarios`
);

CREATE TABLE interacao_currais (
    id CHAR(36) PRIMARY KEY,                      -- UUID como chave primária
    id_eleitor CHAR(36) NOT NULL,                 -- UUID do eleitor captado (referência à tabela `currais_eleitorais`)
    tipo_interacao ENUM('criacao_conta', 'contribuicao', 'inscricao_evento', 'doacao') NOT NULL,  -- Tipo de interação realizada pelo eleitor
    descricao TEXT,                               -- Descrição da interação
    data_interacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,  -- Data da interação
    FOREIGN KEY (id_eleitor) REFERENCES currais_eleitorais(id) ON DELETE CASCADE  -- Chave estrangeira para a tabela `currais_eleitorais`
);

CREATE TABLE doacoes (
    id CHAR(36) PRIMARY KEY,                    -- UUID como chave primária
    id_usuario CHAR(36) NOT NULL,               -- UUID do usuário que fez a doação
    valor DECIMAL(10, 2) NOT NULL,              -- Valor da doação
    metodo_pagamento ENUM('cartao', 'boleto', 'transferencia') NOT NULL,  -- Método de pagamento usado
    status_pagamento ENUM('pendente', 'confirmado', 'cancelado') DEFAULT 'pendente',  -- Status do pagamento
    data_doacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,  -- Data da doação
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id) ON DELETE CASCADE  -- Chave estrangeira referenciando usuários
);