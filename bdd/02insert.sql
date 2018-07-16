use sistema;

CREATE UNIQUE INDEX unq_usuario ON admin_usuarios (NOMBRE_USUARIO);

insert into admin_modulos values(default,'Seguridad');
insert into admin_modulos values(default,'Parámetros');
insert into admin_modulos values(default,'Módulo 1');
insert into admin_modulos values(default,'Módulo 2');