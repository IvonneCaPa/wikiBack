# ITA-Wiki Backend

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-11.x-red.svg" alt="Laravel Version">
  <img src="https://img.shields.io/badge/PHP-8.2+-blue.svg" alt="PHP Version">
  <img src="https://img.shields.io/badge/License-MIT-green.svg" alt="License">
</p>

## 📋 Descripción

ITA-Wiki es una plataforma de documentación colaborativa desarrollada con Laravel que permite a los estudiantes y desarrolladores compartir, organizar y descubrir recursos educativos relacionados con diferentes tecnologías y lenguajes de programación.

## ✨ Características Principales

- **Gestión de Recursos**: Crear, editar y organizar recursos educativos con categorías y etiquetas
- **Sistema de Roles**: Gestión de roles de usuario con autenticación mediante GitHub
- **Bookmarks y Likes**: Sistema de marcadores y me gusta para recursos favoritos
- **Pruebas Técnicas**: Gestión de pruebas técnicas por lenguaje de programación
- **API RESTful**: Documentación completa con Swagger/OpenAPI
- **Autenticación OAuth**: Integración con GitHub para autenticación de usuarios
- **Docker**: Configuración completa para desarrollo y producción

## 🛠️ Tecnologías Utilizadas

- **Backend**: Laravel 11.x
- **Base de Datos**: MySQL 8.4
- **PHP**: 8.2+
- **Documentación API**: L5-Swagger
- **Autenticación**: Laravel Socialite (GitHub OAuth)
- **Contenedores**: Docker & Docker Compose
- **Testing**: PHPUnit

## 📦 Instalación

### Prerrequisitos

- Docker y Docker Compose
- Git
- Composer (opcional, para desarrollo local)

### Instalación con Docker (Recomendado)

1. **Clonar el repositorio**
   ```bash
   git clone <url-del-repositorio>
   cd ita-wiki-backend
   ```

2. **Configurar variables de entorno**
   ```bash
   cp .env.example .env
   # Editar .env con tus configuraciones
   ```

3. **Levantar los contenedores**
   ```bash
   make up
   ```

4. **Ejecutar migraciones y seeders**
   ```bash
   docker exec -it php php artisan migrate --seed
   ```

5. **Generar clave de aplicación**
   ```bash
   docker exec -it php php artisan key:generate
   ```

### Instalación Local

1. **Instalar dependencias**
   ```bash
   composer install
   npm install
   ```

2. **Configurar base de datos**
   ```bash
   php artisan migrate --seed
   ```

3. **Iniciar servidor de desarrollo**
   ```bash
   php artisan serve
   ```

## 🚀 Comandos Útiles

### Docker
```bash
make up          # Levantar contenedores
make down        # Detener contenedores
make clean       # Limpiar todo (contenedores, imágenes, volúmenes)
make serve       # Iniciar servidor Laravel
make cache-clear # Limpiar caché
make route-clear # Limpiar caché de rutas
```

### Artisan
```bash
php artisan migrate              # Ejecutar migraciones
php artisan migrate:rollback     # Revertir migraciones
php artisan db:seed              # Ejecutar seeders
php artisan route:list           # Listar rutas
php artisan make:controller      # Crear controlador
php artisan make:model           # Crear modelo
```

## 📚 Estructura del Proyecto

```
ita-wiki-backend/
├── app/
│   ├── Console/Commands/        # Comandos Artisan personalizados
│   ├── Http/
│   │   ├── Controllers/         # Controladores de la API
│   │   ├── Requests/            # Form Requests para validación
│   │   └── Middleware/          # Middleware personalizado
│   ├── Models/                  # Modelos Eloquent
│   ├── Observers/               # Observadores de modelos
│   ├── Providers/               # Service Providers
│   ├── Rules/                   # Reglas de validación personalizadas
│   └── Services/                # Servicios de negocio
├── database/
│   ├── factories/               # Factories para testing
│   ├── migrations/              # Migraciones de base de datos
│   └── seeders/                 # Seeders para datos iniciales
├── docker/                      # Configuración de Docker
├── routes/
│   └── api.php                  # Rutas de la API
├── tests/                       # Tests automatizados
└── storage/
    └── api-docs/                # Documentación de la API
```

## 🔌 Endpoints de la API

### Autenticación
- `GET /api/auth/github/redirect` - Redirigir a GitHub OAuth
- `GET /api/auth/github/callback` - Callback de GitHub OAuth
- `POST /api/login` - Login con GitHub ID
- `POST /api/login-node` - Login con Node ID

### Recursos
- `GET /api/resources` - Listar recursos
- `POST /api/resources` - Crear recurso (deprecated)
- `POST /api/v2/resources` - Crear recurso (nueva versión)
- `GET /api/v2/resources` - Obtener recurso específico
- `PUT /api/resources/{id}` - Actualizar recurso

### Roles
- `POST /api/roles` - Crear rol
- `PUT /api/roles` - Actualizar rol
- `POST /api/roles-node` - Crear rol con Node ID
- `PUT /api/roles-node` - Actualizar rol con Node ID

### Bookmarks
- `GET /api/bookmarks/{github_id}` - Obtener bookmarks de usuario
- `POST /api/bookmarks` - Crear bookmark
- `DELETE /api/bookmarks` - Eliminar bookmark

### Likes
- `GET /api/likes/{github_id}` - Obtener likes de usuario
- `POST /api/likes` - Crear like
- `DELETE /api/likes` - Eliminar like

### Etiquetas
- `GET /api/tags` - Listar etiquetas
- `GET /api/tags/frequency` - Frecuencia de etiquetas
- `GET /api/tags/category-frequency` - Frecuencia por categoría
- `GET /api/tags/by-category` - Etiquetas por categoría

### Pruebas Técnicas
- `POST /api/technicaltests` - Crear prueba técnica

## 🗄️ Base de Datos

### Tablas Principales

- **users**: Usuarios del sistema
- **roles**: Roles de usuario (estudiante, profesor, etc.)
- **resources**: Recursos educativos
- **tags**: Etiquetas para categorizar recursos
- **bookmarks**: Marcadores de usuarios
- **likes**: Me gusta de usuarios
- **technical_tests**: Pruebas técnicas
- **roles_node**: Roles con Node ID de GitHub

### Categorías de Recursos

- Node
- React
- Angular
- JavaScript
- Java
- Fullstack PHP
- Data Science
- BBDD

## 🧪 Testing

```bash
# Ejecutar todos los tests
php artisan test

# Ejecutar tests específicos
php artisan test --filter ResourceTest

# Ejecutar tests con cobertura
php artisan test --coverage
```

## 📖 Documentación de la API

La documentación de la API está disponible en:
- **Swagger UI**: `http://localhost:8000/api/documentation`
- **JSON**: `http://localhost:8000/docs/api-docs.json`

## 🔧 Configuración

### Variables de Entorno Importantes

```env
APP_NAME=ITA-Wiki
APP_ENV=local
APP_KEY=base64:...
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=user
DB_PASSWORD=password

GITHUB_CLIENT_ID=your-github-client-id
GITHUB_CLIENT_SECRET=your-github-client-secret
GITHUB_REDIRECT_URI=http://localhost:8000/api/auth/github/callback
```

## 🚀 Despliegue

### Railway
El proyecto incluye configuración para despliegue en Railway con `railway.json`.

### Docker Production
```bash
# Construir imagen de producción
docker build -t ita-wiki-backend .

# Ejecutar en producción
docker run -p 8000:8000 ita-wiki-backend
```

## 🤝 Contribución

1. Fork el proyecto
2. Crear una rama para tu feature (`git checkout -b feature/AmazingFeature`)
3. Commit tus cambios (`git commit -m 'Add some AmazingFeature'`)
4. Push a la rama (`git push origin feature/AmazingFeature`)
5. Abrir un Pull Request

## 📝 Licencia

Este proyecto está bajo la Licencia MIT. Ver el archivo `LICENSE` para más detalles.

## 👥 Contribuidores

- Luis Vicente
- Jordi Morillo
- Juan Valdivia
- Raquel Martínez
- Stéphane Carteaux
- Diego Chacón
- Óscar Anguera
- Rossana Liendo
- Constanza Gómez
- Xavier R
- Sergio López
- Frank Pulido (@frankpulido)
- Raquel Patiño
- Anna Mercado
- Lena Prado
- Kawsu Nagib
- Simón Menendez Bravo
- Ivonne Cantor Páez

## 📞 Soporte

Para soporte técnico o preguntas sobre el proyecto, por favor contacta al equipo de desarrollo o abre un issue en el repositorio.

---

**ITA-Wiki** - Plataforma de documentación colaborativa para la comunidad de desarrolladores.