# Bloque 01: acceso a la administración

## Problema observado

El acceso guardaba el usuario en `$_SESSION['identity']`, pero la administración
buscaba `$_SESSION['admin']`. Por eso una cuenta administradora veía el menú y,
al abrir usuarios o categorías, recibía `string(5) "entra"`. Había además otras
interrupciones `var_dump()` y `die()` en el controlador y el modelo.

## Qué cambia y por qué

1. `Utils::hasRole()` consulta el rol de `identity`. Una sola fuente evita
   que el menú y los controladores interpreten la sesión de formas distintas.
2. `index.php` comprueba permisos antes de cargar cabecera y barra lateral.
   Ocultar un enlace no basta: también se revisa la petición al servidor.
3. Usuarios y categorías dejan de detenerse por instrucciones de depuración.
4. Las rutas de administración exigen administrador. La edición personal
   comprueba el ID y conserva el rol de un usuario que no es administrador.
5. El acceso renueva el identificador de sesión y conserva los roles técnicos.
   El saludo al responsable no debe sustituir su rol por `Señor`.
6. La creación administrativa guarda y valida el rol elegido.
7. Una sección ausente responde con 404 y un mensaje legible. Esto no implementa
   los módulos de noticias o torneos.
8. Apache bloquea rutas que contienen componentes ocultos, como `.git` o `.env`.
   Las pruebas PHP se ejecutan solo por consola.

## Cómo comprobarlo sin modificar datos

- Iniciar sesión con una cuenta administradora.
- Abrir Gestionar Usuarios y Gestionar Categorías: deben aparecer las tablas.
- Abrir Mi Perfil y Editar Perfil, sin guardar.
- Cerrar sesión y abrir `usuario/gestion`: debe solicitar acceso.
- Ejecutar `powershell -File tests/check-access.ps1` desde el proyecto.
  La prueba usa sesiones ficticias y no conecta con la base de datos.

La prueba comprueba además que un jugador no abra la administración, no edite
otro usuario y no cambie su rol enviando otro valor desde un formulario.

## Resultado de la comprobación local

Se comprobaron en XAMPP el inicio de sesión, las tablas de usuarios y categorías,
la apertura del perfil y su formulario de edición, el mensaje para noticias no
implementadas y la redirección al acceso al abrir usuarios después de cerrar
sesión. No se guardaron formularios ni se borraron registros durante esta
comprobación. Las 19 pruebas aisladas de permisos pasaron.

## Qué queda pendiente

Este bloque no es una revisión de seguridad completa. Siguen pendientes:
tokens CSRF, borrado mediante POST, consultas preparadas, escape de salidas,
validación completa de formularios, registro público, instalación reproducible
de la base de datos y recuperación de contraseña. Los pagos siguen pendientes
de revisión y pruebas en sandbox.

No se cambia el esquema ni se migran datos en este bloque. Las tablas en otra
computadora deben coincidir con la base realmente usada; el SQL antiguo aún
no es una exportación actualizada.
