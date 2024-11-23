# MK-Furniture - Furniture Showroom Management System

![Laravel Logo](logo.png)

[![Build Status](https://img.shields.io/travis/gothinkster/laravel-realworld-example-app/master.svg)](https://travis-ci.org/gothinkster/laravel-realworld-example-app) [![GitHub stars](https://img.shields.io/github/stars/Ahmadkadoura/MK-Furniture.svg)](https://github.com/Ahmadkadoura/MK-Furniture/stargazers) [![GitHub license](https://img.shields.io/github/license/Ahmadkadoura/MK-Furniture.svg)](https://raw.githubusercontent.com/Ahmadkadoura/MK-Furniture/master/LICENSE)

> **MK-Furniture** is a web-based Furniture Showroom Management System designed to handle product operations and showcase furniture items on the homepage.

---

## Features

- **Product Management**:  
  - Add, update, delete, and organize products in various categories.  
- **Product Display**:  
  - Show furniture items on the homepage in an organized and visually appealing manner.  
- **Search and Filter**:  
  - Enable users to search for products and filter them by types or other attributes.
- **API Layer**:  
  - Built using Repository and Trait design patterns for scalability and clean architecture

---

## Getting Started

## Installation

Please check the official Laravel installation guide for server requirements before you start. Official Documentation

Alternative installation is possible without local dependencies relying on Docker.

Clone the repository 

   git clone https://github.com/Ahmadkadoura/MK-Furniture.git


Switch to the repo folder

    cd MK-Furniture

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate


Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

**TL;DR command list**

   git clone https://github.com/Ahmadkadoura/MK-Furniture.git
   cd Swis-Project
   composer install
   cp .env.example .env
   php artisan key:generate
    
**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve

## Database seeding

**Populate the database with seed data with relationships which includes users, articles, comments, tags, favorites and follows. This can help you to quickly start testing the api or couple a frontend and start using it with ready content.**

Run the database seeder and you're done

    php artisan db:seed
    
