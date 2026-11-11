# Pasaje a tablas

**roles** (<u>id_rol</u>, nombre)

**usuarios** (<u>id_usuario</u>, nombre, email, password_hash, fecha_registro, #id_rol)
- id_rol → roles.id_rol

**categorias** (<u>id_categoria</u>, nombre)

**autores** (<u>id_autor</u>, nombre)

**editoriales** (<u>id_editorial</u>, nombre)

**articulos** (<u>id_articulo</u>, titulo, descripcion, tipo, imagen, precio, disponible, destacado, fecha_alta, #id_categoria, #id_autor, #id_editorial)
- id_categoria → categorias.id_categoria
- id_autor → autores.id_autor
- id_editorial → editoriales.id_editorial (NULL permitido)

Subrayado = clave primaria · # = clave foránea.
