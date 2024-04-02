# Les Trois Frères E-commerce Website

Welcome to the Les Trois Frères E-commerce Website, a straightforward yet fully-functional e-commerce platform built with PHP, HTML, and CSS. This project is structured in a procedural programming style, featuring complete Create, Read, Update, Delete (CRUD) functionalities essential for e-commerce operations.

## Project Overview

The Les Trois Frères website allows for product browsing, cart management, user authentication, and admin functionalities to manage products. Although built without object-oriented PHP, it follows a clear and organized structure ensuring maintainability and scalability.

## Features

- **Product Management**: Admins can add, update, view, and delete products from the inventory.
- **User Authentication**: Supports user registration, login, and session management.
- **Shopping Cart**: Users can add items to their cart, view it, update item quantities, and remove items.
- **Order Processing**: Facilitates the checkout process and order history tracking for users.

## Installation

To get the Les Trois Frères E-commerce Website running on your local environment, follow these steps:

1. Clone the repository:
   ```
   git clone https://github.com/zakariabouachra/lesTroisfreres.git
   ```
2. Import the basededonne.sql file into your MySQL database to set up the required database and tables.
3. Modify the connexion.php file to match your database connection details (host, database name, username, password).
4. Deploy the website on a local server that supports PHP (like XAMPP, WAMP, MAMP, or Laravel Valet).
5. Access the website through your local server's URL.
   
## Project Structure

**CRUD**: Contains PHP scripts for handling CRUD operations for the products.
**Site**: Stores the main PHP files for the website's front end, including the home page, product listing, and login system.
**connexion.php**: Manages the database connection.
**index.php**: The main entry point for the website.

## Contributing

Contributions to the Les Trois Frères E-commerce Website are welcome. To contribute:

1. Fork the project
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request
