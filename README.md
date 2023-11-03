# Learning Y PROJECT

## Preparacion

primero instalar el manejador de paquetes [_COMPOSER_](https://getcomposer.org/)

Acceder a la carpeta raiz del proyecto desde la consola de comandos y ejecutar los siguientes comandos

```batch
composer install
```

## DB

- primero creamos la base de datos

```sql
    create database eyProyect;
```

- credentialstypes

```sql
create table credentialstypes(
    `id` int(11) NOT NULL,
    `description` varchar(50) NOT NULL,

    PRIMARY KEY(id)
);
```

- usuarios

```sql
CREATE TABLE `usuarios` (
    `id` int(11) NOT NULL,
    `name` varchar(60) NOT NULL,
    `user` varchar(40) NOT NULL,
    `mail` varchar(50) NOT NULL,
    `password` varchar(100) NOT NULL,
    `birthday` date NOT NULL,
    `tyc` varchar(10) NOT NULL,

    PRIMARY KEY (id)
);
```

- cursos

```sql
CREATE TABLE `cursos` (
    `id` int(11) NOT NULL,
    `profesor` int(11) NOT NULL,
    `nom_curso` varchar(40) NOT NULL,
    `descripcion` text DEFAULT NULL,

    PRIMARY KEY(id),

    CONSTRAINT user_curso
    FOREIGN KEY (profesor)
    REFERENCES usuarios(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);
```

- creador_curso

```sql
create table creador_curso( 
    id_user int(11) not null, 
    id_curso int(11) not null, 
    
    PRIMARY KEY(id_user, id_curso), 

    CONSTRAINT user_creador 
    FOREIGN KEY (id_user) 
    REFERENCES usuarios(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE, 
    
    CONSTRAINT curso_creador 
    FOREIGN KEY (id_curso) 
    REFERENCES cursos(id) 
    ON DELETE CASCADE
    ON UPDATE CASCADE
);
```

- credentials

```sql
create table credentials(
    id int AUTO_INCREMENT,
    id_user int(11) not null,
    credential_type int(11) not null DEFAULT 5,
    
    PRIMARY KEY (`id`, `id_user`),
    
    CONSTRAINT user_credential
    FOREIGN KEY (`id_user`) 
    REFERENCES usuarios (id)
    ON DELETE CASCADE
    ON UPDATE CASCADE,

    CONSTRAINT type_credential
    FOREIGN KEY (`credential_type`) 
    REFERENCES credentialstypes (id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);
```

- peticiones

```sql
create table peticiones( 
    id int AUTO_INCREMENT,
    id_user int(11) not null, 
    type int(11) not null, 

    PRIMARY KEY(id), 

    CONSTRAINT user_petition 
    FOREIGN KEY (id_user) 
    REFERENCES usuarios(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE, 
    
    CONSTRAINT user_credenType 
    FOREIGN KEY (type) 
    REFERENCES credentialstypes(id) 
    ON DELETE CASCADE
    ON UPDATE CASCADE
);
```

- usu_cur

```sql
CREATE TABLE `usu_cur` (
    `id` int(11) NOT NULL,
    `id_user` int(11) NOT NULL,
    `id_curso` int(11) NOT NULL,
    `estado` int(2) NOT NULL DEFAULT 0,

    PRIMARY KEY (id),

    CONSTRAINT user_uscur
    FOREIGN KEY (id_user)
    REFERENCES usuarios(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE,

    CONSTRAINT curso_uscur
    FOREIGN KEY (id_curso)
    REFERENCES cursos(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE

);
```
