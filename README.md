# 📝 PHP Blog System

## 📌 Overview
This project is a simple blog system developed using **PHP and MySQL** as a **university learning project**.

The main goal of this project was to understand core backend concepts such as authentication, CRUD operations, database interaction, and basic admin management.

> ⚠️ Note: PHP is not my primary backend stack. My main focus is Python and Django, and this project was created for educational purposes.

---

## ✨ Features
- 🔐 Simple user authentication (Login / Logout)
- 🛠 Admin panel
- ➕ Create, edit and delete blog posts
- 💬 Comment system for each post
- ✅ Comments are displayed only after admin approval
- 🗄 MySQL database integration

---

## ⚠️ Project Notes
- This project mainly focuses on backend functionality.
- Some pages are **not fully responsive**.
- Some styles are written as **internal CSS** and may not follow a fully structured styling approach.
- The project was developed as part of university coursework and is not intended as a production-ready system.

---

## 🧰 Technologies Used
- PHP
- MySQL
- HTML / CSS
- XAMPP

---

## 🗃 Database
The database file is included in the repository:

```
/database/blog_new.sql
```

You need to import this file before running the project.

---

## ✅ Requirements
Before running the project, make sure you have installed:

- XAMPP (Apache & MySQL enabled)

---

## 🚀 Installation & Setup

### 1️⃣ Clone the repository
```bash
git clone https://github.com/fatemeh-code-official/Blog-CMS-php.git
```

---

### 2️⃣ Move project to XAMPP directory
Copy the project folder into:

```
xampp/htdocs/
```

---

### 3️⃣ Create Database
1. Open **phpMyAdmin**
2. Create a new database (for example: `blog_db`)
3. Select the database
4. Go to **Import**
5. Choose the file:

```
database/blog_new.sql
```

6. Click **Go**

---

### 4️⃣ Configure Database Connection
Open the database configuration file and make sure credentials match your local XAMPP setup:

```php
localhost
root
(no password by default in XAMPP)
```

---

### 5️⃣ Run the Project
Start **Apache** and **MySQL** from XAMPP control panel, then open:

```
http://127.0.0.1/booksin/blog_home.php
```

---

## 📚 Purpose
This project was created for learning purposes to better understand backend development fundamentals before moving to more structured frameworks.
