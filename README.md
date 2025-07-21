# Hi, I'm Hkmt! 👋

# Mokaab SaaS Platform 🏗️

![Laravel](https://img.shields.io/badge/Laravel-12-red?style=for-the-badge&logo=laravel)
![MySQL](https://img.shields.io/badge/Database-MySQL-blue?style=for-the-badge&logo=mysql)
![Bootstrap](https://img.shields.io/badge/UI-Bootstrap_5-purple?style=for-the-badge&logo=bootstrap)
![SaaS](https://img.shields.io/badge/Type-SaaS-green?style=for-the-badge&logo=spring)

**Mokaab** is a multi-tenant SaaS platform tailored for **construction material and finishing companies** to showcase their catalogs (menu-style) in a professional and structured way. Each company gets its own subdomain with a personalized menu, allowing them to manage their products, categories, pricing, and branding.

The platform is designed to help companies move away from PDF catalogs and WhatsApp messages, and into a smart, mobile-friendly, centralized system.

---

## 🌍 Live Demo

👉 [https://demo.mokaab_menu_saas.com/](https://mokaab.eu.org/)

---

## 🚀 Features

- Multi-tenant architecture (each company has its own subdomain and data)
- Dynamic product catalog with sections (tiles, marble, ceramics, paint, accessories...)
- Product attributes support (size, color, finish type)
- Image gallery and spec sheets per product
- Company-specific branding (logos, cover, contact info)
- Public mini-website for customers to browse and search
- Admin panel per company to manage products and settings
- Super admin panel to manage companies, billing, and global settings
- Fully responsive mobile-first design

---

## 📸 Screenshots

![Company Home Page](./screenshots/screenshot-home.png)
![Product Listing](./screenshots/screenshot-products.png)
![Product Details](./screenshots/screenshot-details.png)
![Company Admin Panel](./screenshots/screenshot-admin.png)
![Add Product](./screenshots/screenshot-add-product.png)
![Super Admin Panel](./screenshots/screenshot-superadmin.png)

---

## 🧱 Tech Stack

**Frontend:** Blade, Bootstrap 5  
**Backend:** Laravel 12  
**Database:** MySQL  
**Multi-Tenancy:** Single-DB, subdomain-based

---

## ✅ Requirements

- PHP >= 8.2
- Composer
- MySQL
- Node.js & npm

---

## 🧪 Run Locally

Clone the project:

```bash
  git clone https://github.com/7akoom/mokaab_menu_saas.git
```

Navigate to project directory:

```bash
    cd mokaab_menu_saas
```

Install dependencies:

```bash
     composer install
      npm install
```

Setup environment:

```bash
       cp .env.example .env
      php artisan key:generate
      php artisan migrate --seed
```

Start the server:

```bash
   php artisan serve
```

## 🔐 Multi-Tenancy Notes

- Companies are created via super admin.
- Each company is assigned a subdomain like: company1.mokaab.com
- Data is isolated per company using company_id and middleware.

## 👨‍💻 About Me 

[@7akoom](https://www.github.com/7akoom)

I'm Hkmt, a passionate full-stack developer specialized in Laravel and modern JS frameworks. I focus on scalable SaaS solutions with elegant UI/UX for real business needs.

Buildify is my latest project to help construction supply companies digitize their catalogs and streamline their customer experience.

## 🛠 Skills
Laravel, Blade, Bootstrap, MySQL, React, REST APIs, SaaS Design

## 🔗 Links
[![linkedin](https://img.shields.io/badge/linkedin-0A66C2?style=for-the-badge&logo=linkedin&logoColor=white)](https://www.linkedin.com/in/hkmt-ali/)

