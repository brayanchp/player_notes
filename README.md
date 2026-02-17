# Player Notes

Proyecto Laravel 12 + Livewire 4 para manejar un **Historial de Notas de Jugador**.

Permite:  
- Crear notas por jugador  
- Listar todas las notas con paginación  
- Validación y permisos de administrador  

---

## Requisitos

- PHP 8.2+  
- Composer  
- MySQL / MariaDB  
- Node.js 18+ y npm o yarn  

---

## Instalación

1. Clonar el repositorio

```bash
git clone https://github.com/brayanchp/player_notes.git
cd player_notes
```
2. Instalar dependencias
```bash
composer install
npm install
```
3. Copiar el archivo de entorno

```bash
cp .env.example .env
```

4. Generar la clave de la aplicación

```bash
php artisan key:generate
```

5. Configurar las variables de entorno en tu archivo `.env` y ajusta según tu entorno local
6. Ejecutar migraciones y seeders
```bash
php artisan migrate --seed
```
 7. Correr proyecto
```bash
    composer run dev
```
