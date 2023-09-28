# Learning Y PROJECT

## DB

- usuarios

```sql

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

- credentials

```sql
create table peticiones(
    id int AUTO_INCREMENT,
    id_user int(11) not null,
    id_cred int(11) not null,
    estado tinyint not null,
    
    PRIMARY KEY (`id`),
    
    CONSTRAINT user_petition
    FOREIGN KEY (`id_user`)
    REFERENCES usuarios(`id`),
    
    CONSTRAINT credentials_petition
    FOREIGN KEY (`id_cred`)
    REFERENCES credentials(`id`)
);
```
