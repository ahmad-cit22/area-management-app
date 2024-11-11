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

This application uses **Pest** for testing. 

To run the test suite, use the following command:

```bash
php artisan test
```

### Test Coverage 📝
- **Authentication Tests**:
    - Login view, login functionality, logout, and registration.
    - Real-time validation for username and password fields.

- **CRUD Tests**:
    - Tests for the Country, State, and City CRUD operations including listing, storing, editing, updating, and deleting records.

## Contributing 🤝

We welcome contributions to improve this project! If you want to contribute:

- Fork the repository.
- Create a new branch for your feature or bugfix.
- Commit your changes.
- Push your branch to your forked repository.
- Open a pull request with a description of the changes.

Please ensure your code passes all tests before submitting your pull request.

## License 📜

This project is licensed under the **MIT License**. See [LICENSE](LICENSE) for more details.

---

We hope you enjoy using the **Area Management CRUD Application**! If you encounter any issues or have any suggestions, feel free to open an issue or contribute to the project. Happy coding! 🚀
