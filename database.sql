CREATE DATABASE IF NOT EXISTS blog;

CREATE TABLE user(
    id  int(13) auto_increment not null,
    role    varchar(20),
    name    varchar(255),
    surname varchar(255),
    email   varchar(255),
    password    varchar(255),
    image   varchar(255),
    CONSTRAINT pk_user PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE category(
    id  int(13) auto_increment not null,
    name    varchar(255),
    description   text,
    CONSTRAINT pk_category PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE tag(
    id  int(13) auto_increment not null,
    name    varchar(255),
    description   text,
    CONSTRAINT pk_tag PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE entry(
    id  int(13) auto_increment not null,
    id_user    int(13),
    id_category    int(13),
    title   varchar(250),
    content text,
    image varchar(250),
    status varchar(20),
    CONSTRAINT pk_entry PRIMARY KEY(id),
    CONSTRAINT fk_entry_id_user FOREIGN KEY(id_user) REFERENCES user(id),
    CONSTRAINT fk_entry_id_category FOREIGN KEY(id_category) REFERENCES category(id)
)ENGINE=InnoDb;

CREATE TABLE entry_tag(
    id  int(13) auto_increment not null,
    id_entry int(13),
    id_tag  int(13),
    CONSTRAINT pk_entry_Tag PRIMARY KEY(id),
    CONSTRAINT fk_entry_tag_id_entry FOREIGN KEY(id_entry) REFERENCES entry(id),
    CONSTRAINT fk_entry_tag_id_tag FOREIGN KEY(id_tag) REFERENCES tag(id)
)ENGINE=InnoDb;