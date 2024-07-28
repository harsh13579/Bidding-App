# Bidding App

### Created by: Harsh Prasad and Kunal Billade

---

## Table of Contents

- [Overview](#overview)
- [Features](#features)
- [Goals](#goals)
- [Prerequisites](#prerequisites)
- [Installation](#installation)
- [Usage](#usage)
- [Database Schema](#database-schema)
- [Application Flow](#application-flow)
- [Technologies Used](#technologies-used)
- [Contributing](#contributing)
- [License](#license)

---

## Overview

The **Bidding App** is a full-stack web application developed using the Laravel PHP framework. It allows users to participate in an online bidding system, enabling them to register, create auction items, and place bids on items of interest. The application provides a comprehensive solution for managing auctions, bids, and user interactions within a dynamic and responsive web interface.

---

## Features

- **User Authentication:** 
  - Implementation of secure user registration and login using bcrypt password hashing implementation
  
- **Auction Item Management:**
  - Functionality for users to create, view, update, and delete auction items. Each item includes a title, description, starting bid, and an end date for bidding.

- **Bidding Functionality:**
  - Mechanisms for placing bids on auction items, viewing current highest bids, and displaying bid history.
  - Real-time notifications for users when they are outbid, enhancing user engagement.

- **User Interface:**
  - A dynamic home page displaying a list of auction items with their current highest bids.
  - Detailed auction item pages showing bid history and providing bidding forms.
  - A profile page allowing users to manage personal information and view their auction activities.
- **Forgot Password**
  - Implemented forgot password functionality to assist users when they're unable to login to their accounts.
  - Password reset link will be sent to the user's registered email from where the user will be able to change their password.
 
- **Outbid Email**
  - The user who has bid on a product will receive an email if someone bids more than them
  - This functionality allows the users to check their bid status
  - This functionality will be active only if the user subscribed to receive the outbid emails while signing up

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

## Prerequisites

Before setting up and running the Bidding App, ensure that your development environment meets the following requirements:

1. **PHP:**
   - Install PHP version 7.3 or later. You can download it from the [official PHP website](https://www.php.net/downloads).

2. **Composer:**
   - Ensure Composer is installed to manage PHP dependencies. Download it from the [official Composer website](https://getcomposer.org/download/).

3. **Laravel Framework:**
   - The Bidding App is built on Laravel, so ensure you have installed Laravel globally. Follow the [Laravel installation guide](https://laravel.com/docs/9.x/installation) for instructions.

   ```bash
   composer global require laravel/installer
   ```

4. **Local Server:**
   - Use XAMPP, WAMP, or a similar local server environment to run PHP applications and manage MySQL databases. 

   - **XAMPP:** [Download XAMPP](https://www.apachefriends.org/index.html)
   - **WAMP:** [Download WAMP](https://www.wampserver.com/en/)

5. **Database:**
   - Ensure MySQL or MariaDB is set up and running. Create a database for the application, and keep the credentials handy for configuration.


Once you have these prerequisites installed and configured, you can proceed with the installation steps to set up the Bidding App on your local machine.

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

4. **Storage Link:**

   - Link the application to the storage using the command
   
     ```bash
     php artisan storage:link
     ```
   - After linking storage, add your own default profile picture as `default_profile.png` in `storage/Profile_Pics/` folder

5. **Run database migrations:**

   ```bash
   php artisan migrate
   ```

6. **Run the application:**

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

---

## Database Schema

The `bidding_app` database consists of several tables that manage user information, auction items, bids, and reviews. Here's a detailed look at each table:

### 1. **`users` Table:**

This table stores user-related data, including authentication details and profile information.

| Column             | Type    | Description                                  |
|--------------------|---------|----------------------------------------------|
| `id`               | BigInt | Primary key, auto-incremented.               |
| `first_name`       | String  | User's first name.                           |
| `last_name`        | String  | User's last name.                            |
| `email`            | String  | User's email address, must be unique.        |
| `password`         | String  | Password hashed using bcrypt.                |
| `profile_pic`      | String  | Path to the user's profile picture.          |
| `email_subscription` | Boolean | Indicates if the user is subscribed to email updates. |
| `created_at`       | Timestamp | Automatically managed creation timestamp. |
| `updated_at`       | Timestamp | Automatically managed update timestamp.   |

### 2. **`products` Table:**

This table holds information about the auction items that users can bid on.

| Column      | Type       | Description                                              |
|-------------|------------|----------------------------------------------------------|
| `id`        | BigInt    | Primary key, auto-incremented.                           |
| `timestamp` | Timestamp  | Used for ordering products.                              |
| `prod_name` | String     | Name of the product.                                     |
| `user`      | String     | Email of the user who posted the product.                |
| `photo`     | String     | Path to the product photo; photo name includes timestamp.|
| `description` | String   | Detailed description of the product.                     |
| `minbid`    | Integer    | Minimum bid amount required for the product.             |
| `curbid`    | Integer    | Current highest bid on the product.                      |
| `enddate`   | DateTime   | Expiration date of the product in the auction.           |

### 3. **Dynamic Bid and Review Tables:**

When a product is added by the user, two tables specific to that product are dynamically created: a bid table and a review table.

#### **Bid Table (e.g., `bid_{{prod_name}}_{{product_id}}`):**

This table captures all bids placed on a specific product.

| Column     | Type     | Description                                             |
|------------|----------|---------------------------------------------------------|
| `id`       | BigInt  | Primary key, auto-incremented.                          |
| `amount`   | Integer  | Bid amount placed by the user.                          |
| `email`    | String   | Email of the user who placed the bid.                   |
| `timestamp` | Timestamp | Used for ordering bids.                                |

#### **Review Table (e.g., `review_{{prod_name}}_{{product_id}}`):**

This table stores reviews given by users for a specific product.

| Column     | Type     | Description                                             |
|------------|----------|---------------------------------------------------------|
| `id`       | BigInt  | Primary key, auto-incremented.                          |
| `email`    | String   | Email of the user who reviewed the product.             |


| `stars`    | Integer  | Rating out of 5 given by the user.                      |
| `review`   | String   | Text review provided by the user.                       |
| `profile_pic` | String | Path to the user's Profile Picture                   |
| `timestamp` | Timestamp | Used for ordering reviews.                             |

---

## Application Flow

Here's how the application handles user interaction and bidding processes:

### Landing Page

When users first access the application, they land on the **Home Page**, which displays all the products currently under auction. This page is accessible to everyone, even if they are not logged in.

- **Product Listings:** The home page lists all auction items, including details such as the product name, current bid, and auction end date.

- **Guest Browsing:** Visitors can browse auction items without logging in, providing an overview of available products.

### User Interaction

#### Bidding Actions

If a user, while not logged in, attempts to perform any bid actions on the home page:

- **Login/Sign-Up Redirect:** They are redirected to the login page, where they can log in if they have an account or sign up to create a new one.

- **Successful Login:** Once logged in, users are redirected to the **Auctions Page**.

### Auctions Page

On the Auctions Page, users can interact with auction items and place bids:

- **Interactive Bidding:** The page loops over the `products` table, showing all available auction items.

- **Bid Now:** When a user clicks "Bid Now" for a particular item:
  - **Modal Form:** A modal form opens, pre-fetching product details such as the product name, current bid, and auction end date, displayed as a countdown timer.
  - **Bid Validation:** Users must place a bid higher than the current bid.

  - **Error Handling:** If the bid is not higher, they are redirected back to the Auctions Page with an error message stating that they cannot place a bid less than the current bid.

  - **Successful Bidding:** If the bid is higher, a success message is displayed, and the bid is stored in the product's dedicated bid table.

### MyAuctions Page

Users have the ability to manage their auction listings:

- **Product Management:** Users can add new products for auction, specifying details such as the product name, minimum bid, photo, and the auction's end date and time.

- **Auction Deletion:** Users can delete their auction listings once they have expired.

### User Profile

The application provides a profile section where users

 can manage their account information:

- **Profile Management:** Users can update their profile photo, password, first name, and last name, ensuring a personalized experience.

---

## Technologies Used

- **Backend:** Laravel PHP Framework
- **Frontend:** HTML, CSS, JavaScript, Bootstrap
- **Database:** MySQL

---

## Contributing

Contributions are welcome! Please follow these steps to contribute:

1. Fork the repository.
2. Create a new branch (`git checkout -b feature/your-feature`).
3. Make your changes and commit them (`git commit -am 'Add some feature'`).
4. Push to the branch (`git push origin feature/your-feature`).
5. Create a new Pull Request.

---

## License

This project is licensed under the GNU General Public License - see the [LICENSE](LICENSE) file for details.

---
