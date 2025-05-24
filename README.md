# Person Registration System (Laravel 10)

A simple web application to manage person records for a financial institution. Built using Laravel 10, Bootstrap 5, and Chart.js.

---

## 🔧 Features

- User authentication with roles (Data Entry & Viewer)
- Person registration with full details (name, NIC, DOB, gender, etc.)
- Edit, delete, and search functionality
- Dynamic dashboard with:
  - Total person count
  - Bar chart of religion-wise registration
  - Pie charts for age groups and birth months
- AJAX-powered search
- Form validation with feedback
- Responsive design using Bootstrap

---

## 🚀 Installation

## Install dependencies:

run following command in terminal

-composer install
-npm install && npm run dev

## Create .env file and set DB credentials:

run following command in terminal

-cp .env.example .env
-php artisan key:generate

## Update env database cofigurations
DB_DATABASE=person_system
DB_USERNAME=root
DB_PASSWORD=

## Import database in phpmyadmin

Create new database named "person_system"
Then import assignment.sql file in folder named "db"

## run application

run following command in terminal
-php artisan serve

## login as data entry

username - admin@gmail.com
password - 00000000

## login as viewer

username - user@gmail.com
password - 00000000