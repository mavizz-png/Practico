# Modelo Entidad-Relación (MER) — Biblioteca Virtual

```mermaid
erDiagram
    ROLES ||--o{ USUARIOS : "tiene"
    CATEGORIAS ||--o{ ARTICULOS : "clasifica"
    AUTORES ||--o{ ARTICULOS : "escribe"
    EDITORIALES |o--o{ ARTICULOS : "publica"

    ROLES { int id_rol PK
            string nombre }
    USUARIOS { int id_usuario PK
               string nombre
               string email
               string password_hash
               datetime fecha_registro
               int id_rol FK }
    CATEGORIAS { int id_categoria PK
                 string nombre }
    AUTORES { int id_autor PK
              string nombre }
    EDITORIALES { int id_editorial PK
                  string nombre }
    ARTICULOS { int id_articulo PK
                string titulo
                text descripcion
                enum tipo
                string imagen
                decimal precio
                bool disponible
                bool destacado
                datetime fecha_alta
                int id_categoria FK
                int id_autor FK
                int id_editorial FK }
```

## Cardinalidades
- Un **rol** tiene muchos **usuarios**; un usuario tiene exactamente un rol (1:N).
- Una **categoría** clasifica muchos **artículos**; un artículo pertenece a una categoría (1:N).
- Un **autor** escribe muchos **artículos**; un artículo tiene un autor (1:N).
- Una **editorial** publica muchos **artículos**; un artículo puede no tener editorial (0..1 : N).

> Para entregar: dibujá este MER en draw.io / MySQL Workbench / Lucidchart (notación a elección de la cátedra) y subí la imagen a /docs. Podés ver este diagrama pegando el bloque en https://mermaid.live
