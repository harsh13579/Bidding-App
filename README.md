# Bidding App

### Created by: Harsh Prasad and Kunal Billade

---

## Table of Contents

- [Overview](#overview)
- [Features](#features)
- [Goals](#goals)
- [Installation](#installation)
- [Usage](#usage)
- [Technologies Used](#technologies-used)
- [Contributing](#contributing)
- [License](#license)

---

## Overview

The **Bidding App** is a full-stack web application developed using the Laravel PHP framework. It allows users to participate in an online bidding system, enabling them to register, create auction items, and place bids on items of interest. The application provides a comprehensive solution for managing auctions, bids, and user interactions within a dynamic and responsive web interface.

---

## Features

- **User Authentication:** 
  - Implementation of secure user registration and login using Laravel's built-in authentication system.
  
- **Auction Item Management:**
  - Functionality for users to create, view, update, and delete auction items. Each item includes a title, description, starting bid, and an end date for bidding.

- **Bidding Functionality:**
  - Mechanisms for placing bids on auction items, viewing current highest bids, and displaying bid history.
  - Real-time notifications for users when they are outbid, enhancing user engagement.

- **User Interface:**
  - A dynamic home page displaying a list of auction items with their current highest bids.
  - Detailed auction item pages showing bid history and providing bidding forms.
  - A profile page allowing users to manage personal information and view their auction activities.

---

## Goals

The primary goal of the Bidding App is to build a robust and scalable web application that evaluates end-to-end development skills, focusing on the following aspects:

- **Full-Stack Development:** 
  - Design and implement a complete application with both backend and frontend components, ensuring seamless interaction between them.

- **User Management:** 
  - Develop a secure and efficient system for user authentication and authorization, leveraging Laravel's features.

- **Auction and Bidding Logic:** 
  - Create a reliable and intuitive auction management system, handling item listings, bidding processes, and bid tracking.

- **Responsive Design:** 
  - Implement a responsive and user-friendly interface that provides a smooth user experience across various devices and screen sizes.

---

## Installation

To set up the Bidding App locally, follow these steps:

1. **Clone the repository:**

   ```bash
   git clone https://github.com/username/bidding-app.git
   cd bidding-app
   ```

2. **Install dependencies:**

   ```bash
   composer install
   npm install
   ```

3. **Set up the environment:**

   - Copy the `.env.example` file to `.env`:

     ```bash
     cp .env.example .env
     ```

   - Generate an application key:

     ```bash
     php artisan key:generate
     ```

   - Update the `.env` file with your database credentials.

4. **Run database migrations:**

   ```bash
   php artisan migrate
   ```

5. **Run the application:**

   ```bash
   php artisan serve
   ```

---

## Usage

### Setting Up

1. **Environment Configuration:**
   - Ensure that the `.env` file is properly configured with your local database settings and other environment variables.
  
2. **Database Setup:**
   - Run the migrations to set up the database schema:

     ```bash
     php artisan migrate
     ```

### Running the Application

- **Development Server:**
  - Start the Laravel development server:

    ```bash
    php artisan serve
    ```

- **Accessing the Application:**
  - Open your web browser and navigate to `http://localhost:8000` to access the application.


## Technologies Used

- **Backend:**
  - Laravel PHP Framework

- **Frontend:**
  - HTML, CSS, JavaScript

- **Database:**
  - MySQL

- **Real-Time Features:**
  - Laravel Echo and Pusher for real-time notifications

- **Authentication:**
  - Laravel's built-in authentication system

- **Development Tools:**
  - Composer for dependency management
  - Laravel Mix for asset compilation
  - PHPUnit for testing

---

## Contributing

Contributions are welcome! To contribute to the Bidding App, follow these steps:

1. **Fork the repository.**
2. **Create a new branch** for your feature or bug fix:

   ```bash
   git checkout -b feature-name
   ```

3. **Make your changes** and commit them:

   ```bash
   git commit -m "Description of changes"
   ```

4. **Push to your branch:**

   ```bash
   git push origin feature-name
   ```

5. **Create a pull request** on GitHub to have your changes reviewed and merged.

### Coding Guidelines

- Use meaningful commit messages and keep commits small and focused.
- Write tests for new features and bug fixes to ensure code quality.

---

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
