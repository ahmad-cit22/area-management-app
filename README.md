# Area Management CRUD Application 🌍

This is a Laravel 11-based web application designed to manage areas by handling three main entities: **Country**, **State**, and **City**. It provides a secure and user-friendly authentication system with real-time input validation using AJAX, enhancing user experience and utilizing modern web development practices.

## Features 🚀

### Authentication System 🔐
- **Secure Login & Registration** using Laravel Breeze, enhanced with AJAX for real-time form validation.
- **Password Reset** functionality to help users recover their accounts securely.
- Built-in **Session Management** and protections against common security vulnerabilities such as CSRF, XSS, and SQL Injection.

### CRUD Operations 🛠️
1. **Country Management**:
   - Create, Read, Update, and Delete countries.
   - Each country can have multiple states.
   
2. **State Management**:
   - Create, Read, Update, and Delete states.
   - Each state belongs to a specific country and can have multiple cities.
   
3. **City Management**:
   - Create, Read, Update, and Delete cities.
   - Each city is tied to a state.

### Database Relationships 📊
- **BelongsTo Relationship**:
   - A **State** belongs to a **Country**.
   - A **City** belongs to a **State**.
- **One-to-Many Relationship**:
   - A **Country** can have multiple **States**.
   - A **State** can have multiple **Cities**.
- SQL queries are optimized for performance to ensure a smooth experience.

### Responsive UI 🎨
- Built with **Bootstrap** for a clean and responsive design that adapts seamlessly to all devices.
- **AJAX-powered CRUD operations** to provide a fluid, page-less interaction experience, making the app feel fast and responsive.

## Installation 🛠️

### Step-by-Step Guide

1. **Clone the repository**:
    ```bash
    git clone https://github.com/ahmad-cit22/area-management-app.git
    cd area-management-app
    ```

2. **Install dependencies**:
    ```bash
    composer install
    npm install
    ```

3. **Set up your environment**:
    Copy the `.env.example` file to `.env`:
    ```bash
    cp .env.example .env
    ```

    Generate the application key:
    ```bash
    php artisan key:generate
    ```

4. **Configure your database**:
    Update the `.env` file with your database details:
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=area_management
    DB_USERNAME=your_username
    DB_PASSWORD=your_password
    ```

5. **Run migrations and seed the database**:
    ```bash
    php artisan migrate --seed
    ```

6. **Start the development server**:
    ```bash
    php artisan serve
    ```

7. **Compile front-end assets**:
    ```bash
    npm run dev
    ```

## Testing 🧪

This application uses **Pest** for testing, a delightful PHP testing framework that helps you write clear and expressive tests.

### Setup Instructions ⚙️

Before running the tests, ensure your environment is correctly configured:

1. **Ensure Pest is Installed**:  
   If Pest is not installed in your project yet, you can add it via Composer:
   ```bash
   composer require pestphp/pest --dev
   ```

2. **Initialize Pest**:  
   After installation, initialize Pest in your project:
   ```bash
   php artisan pest:install
   ```

3. **Create the `.env.testing` File**:  
   In the root directory of your project, create a `.env.testing` file with the following content:
   ```env
    APP_ENV=testing
    APP_KEY=base64:+EhHUCsv8cRrKva+QijNRmA7bf7Uk1FkBht5i1r0LdA=

    LOG_CHANNEL=stack
    LOG_LEVEL=debug

    DB_CONNECTION=sqlite
    DB_DATABASE=:memory:

    CACHE_DRIVER=array
    QUEUE_CONNECTION=sync
    SESSION_DRIVER=array
    MAIL_MAILER=log
   ```

4. **Generate the Application Key**:  
   If you haven't generated an application key yet, you can do so for your testing environment with:
   ```bash
   php artisan key:generate --env=testing
   ```

### Running Tests

Once your environment is set up, you can run the test suite using the following command:
```bash
php artisan test
```

This will run all of the application's test cases, including those for authentication and CRUD operations.

### Test Coverage 📝

The test suite covers the following:

#### **Authentication Tests** 🔑
- **Login View**: Ensures the login page is accessible.
- **Login Functionality**: Tests if users can log in with valid credentials.
- **Logout**: Verifies the logout functionality works correctly.
- **Registration**: Ensures users can register for a new account.
- **Real-time Validation**: Tests real-time input validation for name, email, username and password fields.

#### **CRUD Tests** 🛠️
- **Country CRUD Operations**:
  - Listing all countries.
  - Storing a new country.
  - Editing and updating existing country details.
  - Deleting a country.

- **State CRUD Operations**:
  - Listing all states.
  - Storing a new state.
  - Editing and updating state details.
  - Deleting a state.

- **City CRUD Operations**:
  - Listing all cities.
  - Storing a new city.
  - Editing and updating city details.
  - Deleting a city.

## Contributing 🤝

We welcome contributions to improve this project! If you want to contribute:

- Fork the repository.
- Create a new branch for your feature or bugfix.
- Commit your changes.
- Push your branch to your forked repository.
- Open a pull request with a description of the changes.

Please ensure your code passes all tests before submitting your pull request.

---

We hope you enjoy using the **Area Management CRUD Application**! If you encounter any issues or have any suggestions, feel free to open an issue or contribute to the project. Happy coding! 🚀
