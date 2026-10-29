# Academia de Fútbol Fusión Quebrada Grande

Aplicación PHP con MySQL/MariaDB y Apache, actualmente en desarrollo.

## Trabajo por bloques

Cada bloque tiene una explicación, una comprobación y un commit independiente.
Ver [docs/BLOQUE-01.md](docs/BLOQUE-01.md).
Los commits guardan versiones locales; `git push` las sincroniza con GitHub.
GitHub conserva el código: no ejecuta esta aplicación PHP ni copia la base de
datos de XAMPP.

## Continuar desde otra computadora

1. Instalar Git y XAMPP con PHP y MySQL/MariaDB.
2. Desde `C:\xampp\htdocs`, ejecutar:

   ```powershell
   git clone https://github.com/Juanca0001/FusionQG.git FusionQuebradaGrande
   cd FusionQuebradaGrande
   git switch codex/bloque-01-permisos
   ```

3. Copiar `config/.env.example` como `config/.env` y completar los valores
   privados localmente. No incluir ese archivo en commits.
4. Configurar `config/db.php` y ajustar `BASE_URL` en `config/parameters.php`.
   La URL local actual es `http://localhost:8080/FusionQuebradaGrande/`.
5. Importar una copia compatible de la base de datos. El SQL incluido está
   pendiente de actualización y todavía no reproduce toda la aplicación.
   No publicar exportaciones con datos personales.
6. Iniciar Apache y MySQL/MariaDB y abrir la URL configurada.

## Rutina de Git

Comprobar `git status` antes de trabajar. Si la carpeta está limpia, traer
los cambios con `git pull --ff-only`. Después de comprobar un bloque:

```powershell
git diff
git add ruta/del/archivo
git commit -m "fix: descripcion concreta del bloque"
git push
```

Revisar los archivos añadidos antes del commit. Evitar editar el mismo bloque
en dos computadoras a la vez.

## Pruebas

```powershell
powershell -File tests/check-access.ps1
```

La prueba no necesita base de datos. Si PHP está en otra ruta, establecer
la variable `PHP_BIN` antes de ejecutarla.

## Configuración privada e historial

`config/.env` queda fuera de las nuevas versiones. Existía en commits anteriores:
ignorarlo ahora no retira esas copias. Si contenía credenciales reales, deben
revocarse o renovarse en el proveedor y revisarse por separado la limpieza del
historial. No se ha reescrito el historial compartido.
