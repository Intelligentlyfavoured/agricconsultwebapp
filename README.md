# Agrik-Consult: Cultivating Food Security Solutions with Expert Guidance


## Introduction
Agrik-Consult addresses the significant challenges in the agricultural industry due to the shortage of expert guidance. This shortage impacts decisions on crop selection, planting techniques, pest management, and soil health. Without access to informed advice, farmers struggle to make optimal choices, leading to reduced crop yields, diminished produce quality, and increased vulnerability to pests and diseases.
=======
<p align="left">
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

Agrik-Consult is a web-based application designed to seamlessly connect farmers with credible agricultural consultants. Using advanced matchmaking algorithms, the platform efficiently pairs farmers with consultants tailored to their specific needs and environmental conditions. The application promotes transparency and accountability by allowing users to review and rate consultant services, fostering a collaborative ecosystem aimed at improving agricultural practices and outcomes.

Additionally, the application features a robust Q&A forum where farmers can pose inquiries and receive timely responses from a diverse pool of consultants. By integrating technology and expert knowledge, Agrik-Consult empowers farmers with the resources and support necessary to optimize their farming practices, increase productivity, and achieve sustainable agricultural success.

## Project Setup/Installation Instructions

### Prerequisites
Before you begin, make sure you have the following installed on your computer:
- [**PHP**](https://www.php.net/downloads.php)[**PHP**] (version 7.3 or higher)
- [**Composer**](https://getcomposer.org/download/)[**Composer**] (a tool for managing PHP dependencies)
- [**Node.js**](https://nodejs.org/en/download/package-manager)[**Node.js**] and [**npm**](https://www.npmjs.com/) (for managing JavaScript dependencies)

### Step-by-Step Installation Guide

1. **Clone the Repository**
    - Open your terminal or command prompt.
    - Run the following command to clone the repository to your local machine:
      ```bash
      git clone (https://github.com/Intelligentlyfavoured/agricconsultwebapp.git)
      ```
    - Navigate to the project directory:
      ```bash
      cd agrik-consult
      ```

2. **Install PHP Dependencies**
    - Run the following command to install the necessary PHP packages:
      ```bash
      composer install
      ```

3. **Install JavaScript Dependencies**
    - Run the following command to install the necessary JavaScript packages:
      ```bash
      npm install
      ```

4. **Set Up Environment Configuration**
    - Copy the example environment configuration file:
      ```bash
      cp .env.example .env
      ```
    - Generate an application key:
      ```bash
      php artisan key:generate
      ```
    - Open the `.env` file in a text editor and set up your database configuration.

5. **Set Up the Database**
    - Run the following command to create the necessary tables in your database:
      ```bash
      php artisan migrate
      ```
    - Seed the database with initial data:
      ```bash
      php artisan db:seed
      ```

6. **Build Frontend Assets**
    - Run the following command to compile the frontend assets:
      ```bash
      npm run dev
      ```

7. **Start the Development Server**
    - Run the following command to start the application:
      ```bash
      php artisan serve
      ```
    - Open your web browser and navigate to `http://localhost:8000` to view the application.

## Usage Instructions

### How to Run
To start the application, use the following command:
```bash
php artisan serve
```
Then, open your web browser and go to `http://localhost:8000`.

### Examples

- **Register as a Farmer**
  - Navigate to the registration page.
  - Select 'Farmer' as your role.
  - Fill in the required details and submit the form.

- **Register as a Consultant**
  - Navigate to the registration page.
  - Select 'Consultant' as your role.
  - Provide your expertise details and submit the form.

- **Post a Question**
  - Log in as a farmer.
  - Go to the Q&A forum and post your question.

- **Provide a Response**
  - Log in as a consultant.
  - Go to the Q&A forum and respond to questions posted by farmers.

### Input/Output
- **Input**: Registration details for farmers and consultants, questions in the Q&A forum, reviews, and ratings.
- **Output**: Matched consultant profiles, answers in the Q&A forum, consultant ratings, and reviews.

## Project Structure

### Overview
The project is organized into several main folders:
- **app**: Contains the core application code.
- **bootstrap**: Contains files for bootstrapping the application.
- **config**: Configuration files for the application.
- **database**: Database migrations, factories, and seeders.
- **public**: Publicly accessible files, including the entry point for the application.
- **resources**: Views, CSS, and JavaScript assets.
- **routes**: Route definitions.
- **storage**: Storage for compiled templates, file uploads, and logs.
- **tests**: Test cases.
- **vendor**: Composer dependencies.

### Key Files
- **app/Http/Controllers**: Contains the controllers for handling HTTP requests.
- **app/Models**: Contains the Eloquent models (database models).
- **database/migrations**: Contains the database migration files (used to create tables).
- **resources/views**: Contains the Blade templates for the frontend (HTML templates).
- **routes/web.php**: Contains the route definitions for the web interface.

### Folder Structure
```plaintext
.
├── README.md
├── app
│   ├── Actions
│   │   └── Fortify
│   ├── Http
│   │   ├── Controllers
│   │   └── Middleware
│   ├── Livewire
│   │   ├── AgrikChat.php
│   │   ├── Chart
│   │   ├── Consultant
│   │   ├── Farmer
│   │   └── Welcome.php
│   ├── Models
│   │   ├── Consultant.php
│   │   ├── Farmer.php
│   │   ├── Notification.php
│   │   ├── Recommendation.php
│   │   ├── Schedule.php
│   │   └── User.php
│   ├── Providers
│   │   ├── AppServiceProvider.php
│   │   └── FortifyServiceProvider.php
│   └── View
│       └── Components
├── artisan
├── bootstrap
│   ├── app.php
│   ├── cache
│   │   ├── config.php
│   │   ├── packages.php
│   │   └── services.php
│   └── providers.php
├── bun.lockb
├── composer.json
├── composer.lock
├── config
│   ├── app.php
│   ├── auth.php
│   ├── cache.php
│   ├── database.php
│   ├── filesystems.php
│   ├── fortify.php
│   ├── logging.php
│   ├── mail.php
│   ├── queue.php
│   ├── services.php
│   └── session.php
├── database
│   ├── database.sqlite
│   ├── factories
│   │   └── UserFactory.php
│   └── seeders
│       ├── ConsultantSeeder.php
│       ├── DatabaseSeeder.php
│       └── FarmerSeeder.php
├── package.json
├── phpunit.xml
├── postcss.config.js
├── public
│   ├── build
│   │   ├── assets
│   │   └── manifest.json
│   ├── favicon.ico
│   ├── index.php
│   ├── robots.txt
│   └── storage
│       ├── avatar
│       └── avatars
├── resources
│   ├── css
│   │   └── app.css
│   ├── js
│   │   ├── app.js
│   │   └── bootstrap.js
│   └── views
│       ├── auth
│       ├── components
│       ├── landing.blade.php
│       ├── livewire
│       └── welcome.blade.php
├── routes
│   ├── console.php
│   └── web.php
├── storage
│   ├── app
│   │   ├── livewire-tmp
│   │   └── public
│   ├── framework
│   │   ├── cache
│   │   ├── sessions
│   │   ├── testing
│   │   └── views
│   └── logs
│       └── laravel.log
├── tailwind.config.js
├── tests
│   ├── Feature
│   │   └── ExampleTest.php
│   ├── TestCase.php
│   └── Unit
│       └── ExampleTest.php
└── vite.config.js

47 directories, 56 files
```

## Additional Sections

### Project Status
The project is currently in progress.

### Known Issues
- Some features may not yet be fully implemented.
- Potential performance issues with large datasets.

### Acknowledgements
- [Laravel Framework](https://laravel.com/)
- [Bootstrap](https://getbootstrap.com/)
- [Livewire](https://laravel-livewire.com/)

### License
This project is licensed under the MIT License - see the LICENSE file for details.

## Contact Information
For questions or feedback, please open an issue on the GitHub repository.
