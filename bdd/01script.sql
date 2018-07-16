/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     31/7/2016 20:43:08                           */
/*==============================================================*/
create database sistema;

use sistema;

drop table if exists ADMIN_MODULOS;

drop table if exists ADMIN_PERMISOS;

drop table if exists ADMIN_ROLES;

drop table if exists ADMIN_USUARIOS;

/*==============================================================*/
/* Table: ADMIN_MODULOS                                         */
/*==============================================================*/
create table ADMIN_MODULOS
(
   ID_MODULO            integer not null auto_increment,
   NOMBRE_MODULO        varchar(50) not null,
   primary key (ID_MODULO)
);

/*==============================================================*/
/* Table: ADMIN_PERMISOS                                        */
/*==============================================================*/
create table ADMIN_PERMISOS
(
   ID_ROL               integer not null,
   ID_MODULO            integer not null,
   PRIORIDAD            integer not null,
   primary key (ID_ROL, ID_MODULO)
);

/*==============================================================*/
/* Table: ADMIN_ROLES                                           */
/*==============================================================*/
create table ADMIN_ROLES
(
   ID_ROL               integer not null auto_increment,
   DESCRIPCION          varchar(30) not null,
   primary key (ID_ROL)
);

/*==============================================================*/
/* Table: ADMIN_USUARIOS                                        */
/*==============================================================*/
create table ADMIN_USUARIOS
(
   ID_USUARIO           integer not null auto_increment,
   NOMBRES              varchar(30) not null,
   APELLIDOS            varchar(30) not null,
   CORREO_ELECTRONICO   varchar(100) not null,
   TELEFONO             varchar(30) not null,
   NOMBRE_USUARIO       varchar(30) not null,
   CLAVE                varchar(200) not null,
   ESTADO               varchar(2) not null,
   FECHA_REGISTRO       datetime not null,
   ID_ROL               integer not null,
   FOTOGRAFIA           varchar(100),
   primary key (ID_USUARIO)
);

alter table ADMIN_PERMISOS add constraint FK_REFERENCE_2 foreign key (ID_ROL)
      references ADMIN_ROLES (ID_ROL) on delete restrict on update restrict;

alter table ADMIN_PERMISOS add constraint FK_REFERENCE_3 foreign key (ID_MODULO)
      references ADMIN_MODULOS (ID_MODULO) on delete restrict on update restrict;

alter table ADMIN_USUARIOS add constraint FK_REFERENCE_1 foreign key (ID_ROL)
      references ADMIN_ROLES (ID_ROL) on delete restrict on update restrict;
