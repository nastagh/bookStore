# BookStore

---

## 🇪🇸 Español

### 📖 Descripción del Proyecto

BookStore es una aplicación web distribuida desarrollada como proyecto final académico. La aplicación simula una tienda online de libros donde los usuarios pueden explorar libros, gestionar pedidos y los administradores pueden controlar el catálogo mediante un panel de gestión.

El proyecto sigue la arquitectura **MVC** (Modelo-Vista-Controlador) utilizando PHP, MySQL y una **API REST** independiente, incorporando autenticación mediante **JWT** y control de acceso por roles.

### 🏗 Arquitectura

- Arquitectura MVC personalizada
- API REST desacoplada
- Comunicación mediante JavaScript (Fetch)

### ⚙️ Tecnologías Utilizadas

- PHP 8+
- MySQL
- JavaScript (Fetch)
- Autenticación JWT
- API REST
- HTML5 & SCSS
- Diseño responsive

### 🔐 Autenticación y Roles

El sistema incluye:

- Registro de usuarios
- Login y Logout
- Validación de token JWT
- Control de acceso por roles

**Roles disponibles:**

| Rol            | Descripción                          |
|----------------|--------------------------------------|
| Usuario        | Compra, carrito y pedidos            |
| Administrador  | Gestión del catálogo (categorías y libros) |

Cada petición protegida verifica el token y el rol.

### 👤 Funcionalidades del Usuario

**Sin iniciar sesión:**

- Ver página principal
- Explorar categorías y libros
- Leer artículos del blog

**Después del login como Usuario:**

- Añadir libros al carrito
- Ver y gestionar pedidos
- Cambiar cantidades
- Cálculo automático del precio total
- Cabecera personalizada

### 👑 Funcionalidades del Administrador

**Después del login como Administrador:**

- Acceso al Catálogo
- Crear, editar y eliminar **categorías** y **libros**
- Los administradores no pueden usar el carrito

### 📚 Página Blog

Incluye artículos relacionados con lectura, hábitos y literatura.

### 🔄 API REST

Permite operaciones sobre:

- Libros
- Categorías
- Usuarios

### 📱 Diseño Responsive

Todas las páginas están adaptadas a diferentes tamaños de pantalla.

### 🚀 Instalación

1. **Importar la base de datos:** `bookstore.sql`
2. Configurar servidor local (XAMPP, WAMP, etc.).
3. Abrir en el navegador:

   ```
   http://localhost/Certificado/bookStore/index.php
   ```

### 🔑 Cuentas de Prueba

**Usuario:**

- **email:** `alice@gmail.com`
- **password:** `1245`

**Administrador:**

- **email:** `admin@gmail.com`
- **password:** `1245`

---

## 🇬🇧 English

### 📖 Project Description

BookStore is a full-stack distributed web application developed as a final academic project. The application implements an online bookstore where users can browse books, manage orders, and administrators can control the catalog through a dedicated management panel.

The project follows the **MVC** (Model–View–Controller) architecture using PHP, MySQL, and a separated **REST API**, integrating authentication with **JWT** tokens and role-based access control.

### 🏗 Architecture

- MVC architecture (custom implementation)
- REST API located in a separate folder
- Client-side interaction using JavaScript (Fetch API)

### ⚙️ Technologies Used

- PHP 8+
- MySQL
- JavaScript (Fetch)
- JWT Authentication
- REST API
- HTML5 & SCSS
- Responsive Design
- MVC Architecture

### 🔐 Authentication & Roles

The system includes:

- User registration
- Login & Logout
- JWT token validation
- Role-based authorization

**Roles:**

| Role           | Description                                |
|----------------|--------------------------------------------|
| User           | Cart, orders, and purchases                 |
| Administrator  | Catalog management (categories and books)  |

Every protected request verifies the token and user role.

### 👤 User Features

**Without login:**

- View homepage
- Browse categories and books
- Read blog articles

**After login as User:**

- Add books to cart
- View and manage orders
- Modify book quantities
- Automatic total price calculation
- Personalized header interface

### 👑 Admin Features

**After login as Administrator:**

- Access Catalog Management
- Create, edit, and delete **categories** and **books**
- Admins cannot create orders or use the cart

### 📚 Blog Page

The application includes a blog section where users can read articles related to reading habits, books, and literature.

### 🔄 REST API

The REST API allows interaction with:

- Books
- Categories
- Users

### 📱 Responsive Design

All pages are adaptive and optimized for different screen sizes.

### 🚀 Installation

1. **Import database:** `bookstore.sql`
2. Configure local server (XAMPP/WAMP).
3. Open in browser:

   ```
   http://localhost/Certificado/bookStore/index.php
   ```

### 🔑 Demo Accounts

**User:**

- **email:** `alice@gmail.com`
- **password:** `1245`

**Admin:**

- **email:** `admin@gmail.com`
- **password:** `1245`
