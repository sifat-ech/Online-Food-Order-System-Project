# Online Food Order System

## Table of Contents
- [Introduction](#introduction)
- [Features](#features)
- [Technologies Used](#technologies-used)
- [Installation](#installation)
  - [Prerequisites](#prerequisites)
  - [Database Setup](#database-setup)
  - [Configuration](#configuration)
- [Usage](#usage)
- [Contact](#contact)

## Introduction
The **Online Food Order System** is a web-based application that allows users to browse menus, search for specific dishes, and place orders online. This project aims to streamline the food ordering process for both customers and restaurant staff.

## Features
- **User Registration and Login**: Secure authentication for users.
- **Menu Browsing**: View available dishes with descriptions and prices.
- **Search Functionality**: Quickly find dishes by name or category.
- **Order Management**: Add items to a cart and place orders.
- **Admin Panel**: Manage menu items, view orders, and update statuses.

## Technologies Used
- **Frontend**: HTML, CSS, JavaScript
- **Backend**: PHP
- **Database**: MySQL
- **Version Control**: Git

## Installation

### Prerequisites
- **Web Server**: Apache or similar
- **PHP**: Version 7.4 or higher
- **MySQL**: Version 5.7 or higher
- **Git**: For version control

### Database Setup
1. **Create the Database**:
   - Log in to your MySQL server:
     ```bash
     mysql -u [username] -p
     ```
   - Create a new database:
     ```sql
     CREATE DATABASE food_order_system;
     ```
   - Exit the MySQL prompt:
     ```bash
     exit
     ```

2. **Import the Database Schema**:
   - Navigate to the directory containing the SQL file:
     ```bash
     cd path/to/your/project/database
     ```
   - Import the schema:
     ```bash
     mysql -u [username] -p food_order_system < food_order_system.sql
     ```

### Configure Database Connection

1. **Open the `config/db.php` file**:
   ```php
   <?php
   $servername = "localhost";
   $username = "your_username";
   $password = "your_password";
   $dbname = "food_order_system";

   // Create connection
   $conn = new mysqli($servername, $username, $password, $dbname);

   // Check connection
   if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   }
   ?>


### Configuration
1. **Clone the Repository**:
   ```bash
   git clone https://github.com/sifat-ech/Online-Food-Order-System-Project.git
   cd Online-Food-Order-System-Project


### Usage

#### User

- **Register or Log In**: Create a new account or log in with existing credentials.
- **Browse Menu**: Explore the available dishes and add desired items to your cart.
- **Place Order**: Review your cart and proceed to checkout to finalize your order.

#### Admin

- **Log In**: Access the admin panel using administrator credentials.
- **Manage Menu Items**: Add, edit, or delete dishes as needed.
- **Monitor Orders**: View incoming orders and update their statuses accordingly.

### Contact

For any questions or suggestions, please contact:

- **Name**: Sifat Ech
- **Email**: [your.email@example.com](mailto:safayetsifat117@gmail.com)
- **GitHub**: [sifat-ech](https://github.com/sifat-ech)

