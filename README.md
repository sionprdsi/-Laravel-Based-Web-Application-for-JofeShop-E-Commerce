# JofeShop E-Commerce Web Application

## Summary

The **JofeShop E-Commerce Application** is designed to extend JoFe Bakery’s reach by providing a seamless online platform for customers to explore products, place orders, and communicate via WhatsApp. The application caters to three distinct user types—admin, visitor, and buyer—with unique functionalities for each role. It is built on Laravel, offering a smooth and efficient e-commerce experience.

## Key Features

- **Authentication**: Implemented Laravel’s built-in authentication system for login, logout, and registration, ensuring secure access for both customers and administrators.
- **Product Management**: Admins and customers can view, add, and manage product details, leveraging Laravel’s robust framework for product listings and orders.
- **Information Management**: Admins can manage website content, such as the homepage, 'About Us' information, and product descriptions, through a flexible content management system.
- **Data Management**: Efficiently manage product listings, user accounts, and order processing using Laravel’s powerful ORM (Eloquent). Admins can accept or reject orders via an intuitive interface.
- **Cart Functionality**: Integrated Laravel’s session management to allow users to add, modify, or remove products from their shopping cart seamlessly.
- **Order Management**: Admins can view, accept, or reject orders through a streamlined interface, utilizing Laravel’s MVC architecture for efficient order processing.

## Development Phases

1. **Requirement Phase**: Gathered and analyzed user requirements.
2. **Specification Phase**: Designed system architecture based on the gathered requirements.
3. **Architecture Design**: Created dynamic web interface designs using Figma.
4. **Code Phase**: Developed the application using PHP, integrating all features.
5. **Testing Phase**: Conducted comprehensive testing on features and databases.
6. **Finishing Phase**: Completed final refinements for deployment readiness.

## Technology Stack

- **Framework**: Laravel (PHP)
- **Frontend**: Bootstrap
- **Backend**: PHP
- **Database**: MySQL
- **Design Tool**: Figma

## Run Locally

To run this project locally, follow these steps:

1. Clone the repository:
    ```bash
    git clone https://github.com/your-username/JofeShop.git
    ```

2. Navigate to the project directory:
    ```bash
    cd JofeShop
    ```

3. Install dependencies:
    ```bash
    composer install
    ```

4. Set up the environment:
    - Create a `.env` file by copying the `.env.example` file.
    - Configure your database credentials in the `.env` file.

5. Run migrations to set up the database:
    ```bash
    php artisan migrate
    ```

6. Serve the application:
    ```bash
    php artisan serve
    ```

## Authors

- [@Sion Pardosi](https://github.com/sionprdsi)

## Skills & Technologies Used

- Laravel
- PHP Frameworks
- Bootstrap
- Back-End Web Development

## Demo

A live demo will be available soon.

---

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>
