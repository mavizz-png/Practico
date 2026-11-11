# Glosario de datos
> Copiá estos datos en la plantilla del Drive (carpeta Base de Datos), respetando su estructura.

| Tabla | Campo | Tipo | Tamaño | Clave | Nulo | Descripción |
|---|---|---|---|---|---|---|
| roles | id_rol | INT | - | PK | No | Identificador del rol |
| roles | nombre | VARCHAR | 30 | UNIQUE | No | Nombre del rol (Administrador, Usuario) |
| usuarios | id_usuario | INT | - | PK | No | Identificador del usuario |
| usuarios | nombre | VARCHAR | 80 | - | No | Nombre del usuario |
| usuarios | email | VARCHAR | 120 | UNIQUE | No | Correo, se usa para iniciar sesión |
| usuarios | password_hash | VARCHAR | 255 | - | No | Contraseña cifrada (bcrypt) |
| usuarios | fecha_registro | DATETIME | - | - | No | Fecha de alta |
| usuarios | id_rol | INT | - | FK→roles | No | Rol asignado |
| categorias | id_categoria | INT | - | PK | No | Identificador de la categoría |
| categorias | nombre | VARCHAR | 60 | UNIQUE | No | Nombre de la categoría |
| autores | id_autor | INT | - | PK | No | Identificador del autor |
| autores | nombre | VARCHAR | 100 | - | No | Nombre del autor |
| editoriales | id_editorial | INT | - | PK | No | Identificador de la editorial |
| editoriales | nombre | VARCHAR | 100 | - | No | Nombre de la editorial |
| articulos | id_articulo | INT | - | PK | No | Identificador del artículo |
| articulos | titulo | VARCHAR | 150 | - | No | Título |
| articulos | descripcion | TEXT | - | - | Sí | Descripción / sinopsis |
| articulos | tipo | ENUM | - | - | No | libro, revista, audiolibro, comic, manga |
| articulos | imagen | VARCHAR | 255 | - | Sí | URL o ruta de la portada |
| articulos | precio | DECIMAL | 10,2 | - | Sí | Precio |
| articulos | disponible | TINYINT | 1 | - | No | 1 = disponible, 0 = no |
| articulos | destacado | TINYINT | 1 | - | No | 1 = aparece en "Destacados" |
| articulos | fecha_alta | DATETIME | - | - | No | Fecha de carga |
| articulos | id_categoria | INT | - | FK→categorias | No | Categoría |
| articulos | id_autor | INT | - | FK→autores | No | Autor |
| articulos | id_editorial | INT | - | FK→editoriales | Sí | Editorial |
