# Guía de Instalación de Laravel 9 en Windows con VS Code

A continuación encontrarás una guía paso a paso, desde cero, para instalar Laravel 9 en Windows y configurar tu entorno de desarrollo en Visual Studio Code (VS Code). Asumimos que el equipo está recién formateado, sin nada instalado.

---

## 1. Instalar PHP (usando XAMPP)

Laravel requiere PHP ≥ 8.0. La forma más sencilla en Windows es instalar **XAMPP**, que incluye Apache, PHP y MySQL en un solo paquete:

1. Ve a la página oficial de XAMPP:  
   https://www.apachefriends.org/es/index.html  
2. Haz clic en **“Download”** para Windows. El instalador pesa alrededor de 150 MB.  
3. Ejecuta el instalador descargado (`xampp-windows-x.y.z-installer.exe`) y sigue estos pasos:  
   - Acepta los términos de la licencia.  
   - Deja marcadas las casillas de **Apache**, **MySQL**, **PHP** y **phpMyAdmin**.  
   - Elige una carpeta de instalación (por ejemplo, `C:\\xampp`).  
   - Finaliza la instalación.  
4. Verifica que XAMPP esté funcionando:  
   - Abre el **Panel de Control de XAMPP**.  
   - Inicia **Apache** y **MySQL** haciendo clic en “Start” en cada uno; deberían quedar en color verde.  
   - Abre un navegador y navega a `http://localhost/`. Si aparece la página de bienvenida de XAMPP, PHP está correctamente instalado.

> **Nota:** Más adelante solo usaremos PHP por línea de comandos (CLI), pero tener XAMPP instalado facilita disponer de PHP y MySQL local.

---

## 2. Agregar PHP al PATH de Windows

Para poder invocar a PHP desde cualquier terminal (CMD o PowerShell), debemos añadir la carpeta `php` de XAMPP al **PATH** del sistema:

1. Abre el **Explorador de archivos** y navega a la carpeta donde instalaste XAMPP (por ejemplo, `C:\\xampp\\php`).  
2. Copia la ruta completa (`C:\\xampp\\php`).  
3. Presiona **Win + Pause/Break** (o busca “Editar las variables de entorno del sistema”).  
4. Haz clic en **“Variables de entorno…”**.  
5. En la sección “Variables del sistema”, selecciona la variable **Path** y haz clic en **“Editar…”**.  
6. Haz clic en **“Nuevo”** y pega la ruta `C:\\xampp\\php`.  
7. Acepta todos los diálogos para guardar.  

Para comprobar que PHP funciona:

- Abre una ventana de **CMD** o **PowerShell** nueva (muy importante: que sea nueva, para cargar el PATH actualizado).  
- Ejecuta:

  ```
  php -v
  ```

  Deberías ver algo como:

  ```
  PHP 8.x.x (cli) (built: …)
  Copyright (c) The PHP Group
  ```

---

## 3. Instalar Composer

Composer es el gestor de dependencias de PHP que Laravel utiliza para instalarse y actualizarse.

1. Ve a la página oficial de Composer:  
   https://getcomposer.org/download/  
2. Descarga el instalador **Composer-Setup.exe** para Windows.  
3. Ejecuta el instalador:  
   - Al preguntarte por la ubicación de PHP, apunta a la ruta donde está `php.exe` (por ejemplo, `C:\\xampp\\php\\php.exe`).  
   - Acepta la instalación global (para que `composer` esté disponible en cualquier terminal).  
4. Abre **CMD** o **PowerShell** nuevo y ejecuta:

   ```
   composer -V
   ```

   Deberías ver algo como:

   ```
   Composer version 2.x.x 202x-xx-xx xx:xx:xx
   ```

---

## 4. Instalar Git

Laravel y muchos proyectos modernos usan Git para el control de versiones. Además, algunos paquetes se instalan directamente desde repositorios Git.

1. Ve a la página oficial de Git para Windows:  
   https://git-scm.com/download/win  
2. Descarga el instalador (por ejemplo, `Git-2.x.x-64-bit.exe`) y ejecútalo.  
3. En la instalación, deja las opciones por defecto, a menos que tengas preferencias específicas. Asegúrate de que en “Adjusting your PATH environment” esté seleccionada la opción **Git from the command line and also from 3rd-party software**.  
4. Finaliza la instalación.  
5. Abre **CMD** o **PowerShell** y ejecuta:

   ```
   git --version
   ```

   Deberías ver algo como:

   ```
   git version 2.x.x.windows.x
   ```

---

## 5. Instalar Node.js y npm (Opcional)

Aunque Laravel 9 funciona sin Node.js para funcionalidades básicas, si quieres compilar assets (CSS/JS) usando Laravel Mix o Vite, necesitarás Node.js y npm.

1. Ve a https://nodejs.org/es/ y descarga la **versión LTS** para Windows.  
2. Ejecuta el instalador y deja las opciones por defecto.  
3. Abre **CMD** o **PowerShell** y verifica:

   ```
   node -v
   npm -v
   ```

   Debes ver las versiones instaladas, por ejemplo `v18.x.x` para Node y `8.x.x` para npm.

---

## 6. Instalar Visual Studio Code (VS Code)

Para editar tu código Laravel, es recomendable usar **Visual Studio Code**:

1. Ve a https://code.visualstudio.com/ y descarga el instalador de **Windows**.  
2. Ejecútalo y sigue los pasos. Marca las casillas para:  
   - **Add “Open with Code” action to Windows Explorer file context menu**  
   - **Add “Open with Code” action to Windows Explorer directory context menu**  
   - **Add to PATH** (para poder usar `code` en la terminal).  
3. Una vez instalado, abre VS Code. Opcionalmente, instala las extensiones recomendadas:  
   - **PHP Intelephense** (autocompletado y análisis de PHP).  
   - **Laravel Blade Snippets** (trabajo con Blade).  
   - **ESLint** y **Prettier** (para JavaScript/CSS).  
   - **GitLens** (información de Git integrada).  

---

## 7. Crear el proyecto Laravel 9

Con PHP, Composer y Git listos, vamos a generar un nuevo proyecto de Laravel 9:

1. Abre **CMD** o **PowerShell** y navega a la carpeta donde quieras tener tus proyectos. Por ejemplo:

   ```
   cd C:\\Users\\TuUsuario\\Documents\\Proyectos
   ```

2. Ejecuta el siguiente comando para crear un proyecto de Laravel 9 (sustituye `catalogo-virtual` por el nombre que desees):

   ```
   composer create-project laravel/laravel:^9.0 catalogo-virtual
   ```

   Composer descargará Laravel 9 y todas sus dependencias en la carpeta `catalogo-virtual`.  

3. Al terminar, ingresa al directorio del proyecto:

   ```
   cd catalogo-virtual
   ```

4. Inicializa un repositorio Git (opcional si aún no lo has hecho):

   ```
   git init
   git add .
   git commit -m "Instalación inicial Laravel 9"
   ```

5. Abre el proyecto en VS Code con el comando (desde la raíz `catalogo-virtual`):

   ```
   code .
   ```

---

## 8. Configurar el entorno de Laravel

1. Dentro de VS Code, en la raíz del proyecto verás un archivo llamado `.env.example`.  
2. Haz una copia renombrada a `.env`:  
   - En VS Code, abre la vista del explorador de archivos (ícono de carpeta).  
   - Haz clic derecho sobre `.env.example` → **“Rename”** → cambia a `.env`.  
3. Genera la clave de aplicación de Laravel (APP_KEY) desde la terminal integrada de VS Code (o CMD/PowerShell):

   ```
   php artisan key:generate
   ```

   Esto rellenará el campo `APP_KEY` en el archivo `.env`.  

4. Ajusta la conexión a base de datos en `.env`:  
   Si usas **MySQL** de XAMPP, los valores por defecto suelen ser:

   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=nombre_de_tu_bd
   DB_USERNAME=root
   DB_PASSWORD=
   ```

   - Antes de esto, crea la base de datos en phpMyAdmin (por ejemplo, `catalogo_virtual_db`).

---

## 9. Iniciar el servidor de desarrollo y verificar

1. En la terminal (integrada o CMD/PowerShell) y desde la carpeta raíz `catalogo-virtual`, ejecuta:

   ```
   php artisan serve
   ```

   Verás algo como:

   ```
   Starting Laravel development server: http://127.0.0.1:8000
   ```

2. Abre un navegador y ve a `http://127.0.0.1:8000`. Si todo está correcto, verás la página de bienvenida de Laravel.

---

## 10. Configurar compilación de assets (opcional si se instalo nodeJS)

Si piensas usar Laravel Mix o Vite para frontend (CSS, JS, etc.):

1. Instala las dependencias de Node desde la raíz del proyecto:

   ```
   npm install
   ```

2. Para compilar assets en modo desarrollo:

   ```
   npm run dev
   ```

   O para compilar y minificar para producción:

   ```
   npm run build
   ```

3. En `resources/js/` y `resources/css/` ya tienes archivos de ejemplo que Laravel proporciona. Puedes editarlos según tu módulo de catálogo.

---

## 11. Comprobar integración en VS Code

Dentro de VS Code asegúrate de:

- Que la terminal integrada abra **PowerShell**, **CMD** o **Git Bash**, donde puedas ejecutar comandos `php`, `composer`, `npm` y `git`.  
- Haber instalado las extensiones de VS Code mencionadas (PHP Intelephense, Blade Snippets, etc.) para autocompletado y resaltado de sintaxis.  
- (Opcional) Configurar el **debugger** si quieres depurar código PHP (requiere instalar y configurar Xdebug, pero es opcional en un inicio).

