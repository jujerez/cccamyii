------------------------------
-- Archivo de base de datos --
------------------------------

DROP TABLE IF EXISTS usuarios CASCADE;

CREATE TABLE usuarios
(
      id                 BIGSERIAL    PRIMARY  KEY
    , nombre             VARCHAR(255) NOT NULL UNIQUE
    , password           VARCHAR(255) NOT NULL
    , email              VARCHAR(255) NOT NULL UNIQUE
    , token_acti         VARCHAR(255)
    , token_clave        VARCHAR(255)
    , auth_key           VARCHAR(255)
);

INSERT INTO usuarios (nombre, password, email)
    VALUES ('juan',  crypt('juan', gen_salt('bf', 10)), 'juanantonio.jerez@iesdonana.org')
         , ('pepe', crypt('pepe', gen_salt('bf', 13)), 'pepe@gmail.com')
         , ('jose', crypt('jose', gen_salt('bf', 13)), 'jose@gmail.com')
         ,  ('ana', crypt('ana', gen_salt('bf', 13)), 'ana@gmail.com');


DROP TABLE IF EXISTS clientes CASCADE;
CREATE TABLE clientes
(
    id          bigserial     PRIMARY KEY
  , nombre      varchar(255)  NOT NULL 
  , telefono    varchar(9)    NOT NULL
  , direccion   varchar(255)  CONSTRAINT ck_direccion_no_vacia
                              CHECK (direccion != '')
  , nota        varchar(255)  CONSTRAINT ck_nota_no_vacia
                              CHECK (nota != '')
  

);


DROP TABLE IF EXISTS clines CASCADE;
CREATE TABLE clines
(
    id          bigserial     PRIMARY KEY
  , servidor    varchar(255)  NOT NULL
  , puerto      numeric(5)    NOT NULL
  , usuario     varchar(255)  NOT NULL
  , password    varchar(255)  NOT NULL
  , fecha_alta  date          NOT NULL
  , cliente_id  bigint        REFERENCES clientes (id)
                              ON DELETE NO ACTION ON UPDATE CASCADE
);

INSERT INTO clientes (nombre, telefono, direccion, nota)
VALUES ('Juan Antonio', '666777666', 'C/ Sevilla nº5', 'Llamar antes de ir')
     , ('Pepe', '666777666', 'C/ Sevilla nº5', 'Cuidado con los perros en su parcela');

INSERT INTO clines (servidor, puerto, usuario, password, fecha_alta, cliente_id )
VALUES ('10.255.255.254', '65535', 'usuario', '999999', '2019-09-22', 1)
     , ('10.255.255.254', '65535', 'dfvs', 'asdf', '2019-09-23', 1)
     , ('10.255.255.254', '65000', 'hjkl', 'jklñ', '2019-09-24', 2)
     , ('10.255.255.254', '65535', 'qwer', 'uiop', '2019-09-25', NULL);