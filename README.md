# SAC-UNID
Sistema de Apartado de Cañones - Unid Campus Cancún

## Prerrequisitos
Antes de comenzar a realizar cambios sobre el proyecto necesitas contar con los siguientes requisitos.

### GIT
Obvio

### Xampp o equivalente
Distribución de Apache gratuita y fácil de instalar que contiene MariaDB, PHP y Perl.

**Descarga:** https://www.apachefriends.org/es/download.html

### Composer
Administrador de paquetes para PHP.

**Descarga:** https://getcomposer.org/download/ 

### Comprueba tu instalación de composer.
Ejecuta en la consola de comandos la instrucción:

```
composer
```
Si composer se ha instalado correctamente en tu equipo, se debería mostrar la versión y comandos disponibles para composer.

### Instala las dependencias 
1. Para comenzar, abre una consola de comandos en el directorio del proyecto.
2. Ejecuta el comando:
```
composer install
```
## Cómo subir un cambio en 10 pasos 
1. Crea un Fork el proyecto.
2. Descarga el Fork creado.
3. Abre GIT BASH (Se instala con GIT) y navega hasta el directorio del repositorio.
4. Ejecuta el comando: 
```
git remote add upstream https://github.com/MarioDMC/SAC-UNID.git
```
5. Haz Fetch de Upstream y seguidamente Checkout en la rama "dev"(verificando que la rama se encuentra actualizada, si no realiza el paso 8.).
6. Crea una nueva Branch en base a "dev" y nómbrala  empleando la siguiente nomenclatura:

"Nombre de equipo UC/RV/SE/GS/LH" - "Tu nombre" - "Descripción muy breve del cambio separada por guiones"

Equipos: 
* **Usuarios y Cañones:** UC
* **Reservaciones:** RV
* **Niveles, Servicios y Entradas:** SE
* **Salones y Grados:** SG
* **Logs y Horarios:** LH

7. Realiza tu cambio, haz un Commit y súbelo (Push) a tu rama "dev" de Origin.
8. Verifica que la rama "dev" de Upstream esté actualizada con los últimos cambios, si no lo está, haz un pull de Upstream con Rebase. (hacerlo con merge creará un commit adicional, soluciona los conflictos antes si es necesario).
9. Crea un Pull Request hacía la rama "dev" el repositorio original con la rama que creaste en tu Fork (Asegúrate de incluir tus cambios en un solo Commit no múltiples).
10. Espera la aprobación de tu PR y realiza los cambios necesarios que sean solicitados. Puedes reiniciar el index de tu branch para poder incluir los nuevos cambios en un solo commit haciendo: 
```
git reset --mixed "Hash del commit previo a todos tus cambios" 
```
y guardar tus cambios nuevamente.

## Contribuidores
**Project Owner:** Mario Morales
### Team Usuarios y Cañones
**Team Leader:** Karen Alvarez

**Miembros:**
* Diana González
* Daniel Rojas
* Mario Morales

### Team Reservaciones
**Team Leader:** Luis Martinez

**Miembros:**
* Gabriel Fonseca
* Hugo Arroyo
* Moises Caamal

### Team Niveles, Servicios y Entradas:
**Team Leader:** Alan Cauich

**Miembros:**
* Ruben Tellez
* Armando Robles
* Luis Vazquez

### Team Salones y Grados:
**Team Leader:** Luis Torres

**Miembros:**
* Edier Cab
* Maximiliano Leyva
* 
### Team SLogs y Horarios::
**Team Leader:** Carlos Maldonado

**Miembros:**
* Eduardo Ojeda
* Isaac Gamboa 





















