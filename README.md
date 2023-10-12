# Learning Y PROJECT

## DB

- usuarios

```sql
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `user` varchar(40) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `birthday` date NOT NULL,
  `tyc` varchar(10) NOT NULL
);
```

- credentials

```sql
create table credentials(
    id int AUTO_INCREMENT,
    id_user int(11) not null,
    credential_type int(2) not null,
    
    PRIMARY KEY (`id`, `id_user`),
    
    CONSTRAINT user_credential
    FOREIGN KEY (`id_user`) 
    REFERENCES usuarios (id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);
```

- cursos

```sql

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
    REFERENCES usuarios(id), 
    
    CONSTRAINT user_credenType 
    FOREIGN KEY (type) 
    REFERENCES credentialstypes(id) 
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
    REFERENCES usuarios(id), 
    
    CONSTRAINT curso_creador 
    FOREIGN KEY (id_curso) 
    REFERENCES cursos(id) 
);
```
