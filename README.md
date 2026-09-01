# Nous Technologies — Portal de Clientes & UI WHMCS

Plataforma moderna de gestión de clientes y servicios de infraestructura cloud, hosting, dominios, facturación y soporte técnico, desarrollada con **Laravel 13**, **Livewire 4**, **Tailwind CSS v4** y arquitectura preparada para consumir la API de **WHMCS**.

---

## Características Principales

- **Dashboard General**: Estadísticas en tiempo real de servicios activos, facturas pendientes, dominios registrados, tickets abiertos y alertas proactivas de vencimiento.
- **Mis Servicios**: Administración de servidores VPS, servidores dedicados y hosting compartido, con modal de consola interactiva TTY para VPS.
- **Dominios**: Portafolio de dominios registrados, estado de bloqueo, auto-renovación, fechas de expiración y buscador interactivo de disponibilidad WHOIS.
- **Facturación y Pagos**: Historial detallado de facturas pagadas, pendientes y vencidas, con generación y **descarga de facturas en formato PDF**.
- **Tickets de Soporte**: Sistema de soporte técnico con apertura de tickets, categorización por departamento/prioridad e historial de mensajes.
- **Programa de Afiliados**: Panel de referidos con enlace personalizado, estadísticas de conversión, cálculo de comisiones (20%) y solicitud de retiros.
- **Modo Oscuro / Claro**: Interfaz reactiva adaptable mediante Tailwind CSS y Alpine.js con persistencia en `localStorage`.
- **Integración WHMCS**: Servicio `WhmcsService` preparado para consumir la API oficial de WHMCS en cuanto se la obtenga.

---

## Stack Tecnológico

- **Backend**: [PHP 8.4+](https://php.net/) & [Laravel 13](https://laravel.com/)
- **Frontend Reactivo**: [Livewire 4](https://livewire.laravel.com/) & [Alpine.js](https://alpinejs.dev/)
- **Componentes UI**: [Livewire Flux](https://flux.livewire.com/)
- **Estilos**: [Tailwind CSS v4](https://tailwindcss.com/)
- **Autenticación**: [Laravel Fortify](https://laravel.com/docs/fortify)
- **Generación de PDFs**: [Laravel DomPDF](https://github.com/barryvdh/laravel-dompdf)
- **Testing**: [Pest PHP 4](https://pestphp.com/)
- **Formato de Código**: [Laravel Pint](https://laravel.com/docs/pint)

---

## Requisitos Previos

Asegúrate de contar con los siguientes componentes instalados en tu entorno de desarrollo:

- **PHP** >= 8.3 (Recomendado 8.4) con extensiones `pdo`, `mbstring`, `openssl`, `curl`, `xml`, `zip`, `sqlite3` o `pgsql`.
- **Composer** >= 2.x
- **Node.js** >= 18.x y **NPM**
- **Base de Datos**: SQLite (por defecto) o PostgreSQL / MySQL

---

## Instalación 

### 1. Clonar el repositorio
```bash
git clone https://github.com/NousTI/UI-Clientes-WHCMS.git
cd UI-Clientes-WHCMS
```

### 2. Instalar dependencias de PHP y JavaScript
```bash
composer install
npm install
```

### 3. Configuración del entorno (`.env`)
Copia el archivo de ejemplo y genera la clave de la aplicación:
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Configurar variables de WHMCS (Opcional)
En tu archivo `.env`, puedes definir las credenciales de tu instalación de WHMCS:
```dotenv
WHMCS_URL=https://tu-whmcs.com
WHMCS_IDENTIFIER=tu_api_identifier
WHMCS_SECRET=tu_api_secret
```

### 5. Migraciones y Datos de Prueba (Seeders)
Ejecuta las migraciones y carga los datos de prueba preconfigurados:
```bash
php artisan migrate --seed
```

> [!NOTE]
> El seeder crea un usuario demo para pruebas:
> - **Email:** `test@example.com`
> - **Contraseña:** `password`

### 6. Compilar Assets y Levantar el Servidor

Puedes iniciar el entorno de desarrollo concurrente con:
```bash
composer run dev
```

O en terminales separadas:
```bash
# Terminal 1: Servidor Laravel
php artisan serve

# Terminal 2: Servidor Vite
npm run dev
```

Accede a la aplicación en tu navegador en: `http://localhost:8000`.

---

## Pruebas Automatizadas

El proyecto cuenta con una suite completa de pruebas unitarias y de integración construida con **Pest PHP**:

```bash
# Ejecutar toda la suite de pruebas
php artisan test --compact

# Ejecutar una prueba específica
php artisan test --compact tests/Feature/DashboardTest.php
```

---

## Calidad de Código y Formateo

Para verificar y aplicar automáticamente los estándares de código con **Laravel Pint**:

```bash
vendor/bin/pint --format agent
```

---

## Estructura del Proyecto

```text
├── app/
│   ├── Http/
│   │   ├── Controllers/       # Controladores (DashboardController)
│   │   └── Requests/          # Form Requests (StoreTicketRequest)
│   ├── Models/                # Modelos Eloquent (User, Service, Domain, Invoice, Ticket, Referral)
│   ├── Providers/             # Service Providers (AppServiceProvider, FortifyServiceProvider)
│   ├── Services/              # Servicios de Integración (WhmcsService)
│   └── View/Composers/        # View Composers (AlertComposer)
├── database/
│   ├── factories/             # Factories para pruebas y seeders
│   ├── migrations/            # Esquema de base de datos
│   └── seeders/               # Datos de prueba iniciales
├── resources/
│   ├── css/                   # Estilos Tailwind CSS v4
│   ├── js/                    # Scripts frontend
│   └── views/                 # Plantillas Blade (dashboard, components, layouts, pdf)
├── routes/
│   ├── web.php                # Rutas web del portal de clientes
│   └── settings.php           # Rutas de perfil y configuración de usuario
└── tests/
    └── Feature/               # Pruebas funcionales de autenticación y dashboard
```

---


