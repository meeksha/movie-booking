# Movie Booking System

A movie ticket booking project demonstrating movie selection, interactive seat booking, user registration and login, and database-backed booking operations using HTML, CSS, JavaScript, PHP, MySQL, and C.

## Overview

The Movie Booking System explores how movie ticket reservations can be implemented through both a browser-based interface and server-side programming.

The project includes an interactive booking interface where users select a movie, specify the number of tickets, choose seats, and receive a booking confirmation. It also contains PHP pages for displaying movies, registering users, authenticating users, and recording booking information in MySQL.

A separate C implementation demonstrates movie management and ticket allocation using a singly linked list.

## Features

### Interactive Movie Booking Interface

- Select a movie from the available options.
- Enter the number of tickets, with a maximum of 10 in the interface.
- Enter the user's name and email address.
- Dynamically generate a 5 × 5 seat-selection grid.
- Select and deselect seats.
- Validate that the number of selected seats matches the requested ticket count.
- Display a booking confirmation with the user's details and selected movie.

### PHP and MySQL Integration

- Retrieve movies and their genres from a MySQL database.
- Select a movie and open its ticket-booking page.
- Register users with passwords hashed using PHP's `password_hash()`.
- Authenticate users using `password_verify()` and PHP sessions.
- Insert booking records containing user ID, movie ID, booking time, and seat count.

### C-Based Ticket Booking

- Represent movies using a structure containing a name, available-seat count, and linked-list pointer.
- Add movies to a linked list.
- Display movie names and available seats.
- Book a ticket by movie name.
- Decrease the available-seat count when a booking succeeds.
- Handle unavailable seats and movie names that cannot be found.

## Technology Stack

| Technology | Role |
|---|---|
| HTML5 | Page structure and booking forms |
| CSS3 | Interface styling and seat-grid layout |
| JavaScript | Interactive seat selection and booking validation |
| PHP | Server-side processing, registration, login, and booking operations |
| MySQL | Movie, user, and booking data storage |
| C | Linked-list-based movie and seat management |

## Project Structure

```text
movie-booking/
├── index.html              # Interactive booking interface
├── index.php               # Displays movies from MySQL
├── styles.css              # Interface styling
├── script.js               # Seat selection and confirmation logic
├── book_ticket.php         # Movie-specific booking form
├── configure_booking.php   # Processes booking submissions
├── login.php               # User login
├── register.php            # User registration
├── movie_booking.c         # C-based booking demonstration
└── README.md
```

**Note:** The supplied PHP booking form refers to `confirm_booking.php`, while the uploaded booking-processing file is named `configure_booking.php`. These filenames must be reconciled before the PHP booking flow will work end to end.

## Getting Started

### Prerequisites

For the browser-based interface:
- A modern web browser.

For the PHP/MySQL implementation:
- PHP with the MySQLi extension.
- MySQL Server.
- A local PHP development environment, such as XAMPP.

For the C implementation:
- A C compiler, such as GCC.

### 1. Clone the repository

```bash
git clone https://github.com/meeksha/movie-booking.git
cd movie-booking
```

### 2. Run the interactive HTML, CSS, and JavaScript interface

Open `index.html` in a web browser.

Alternatively, use a local development server to serve the project files.

The interface supports movie selection, seat selection, ticket-count validation, and confirmation messages. In the current JavaScript implementation, seat availability is maintained in browser memory rather than persisted to a database.

### 3. Configure the PHP/MySQL implementation

Start Apache and MySQL through your local development environment, and place the project in the appropriate web-server directory.

The PHP files expect a local MySQL server with database credentials configured in the source code.

The supplied files reference two database names:

- `movie_booking_system` in `index.php` and `book_ticket.php`.
- `movie_booking` in `login.php` and `register.php`.

Configure the application to use a consistent database name and credentials before running it.

The required database tables include:

- `movies` — referenced for movie IDs, titles, and genres.
- `users` — referenced for user IDs, usernames, and password hashes.
- `bookings` — referenced for booking details.

A database schema or SQL setup script was not included among the supplied files. Create the required tables with compatible columns before testing the PHP pages.

### 4. Run the C program

Compile the C source using GCC:

```bash
gcc movie_booking.c -o movie_booking
```

Run the executable on Windows:

```bash
.\movie_booking.exe
```

The program initializes three sample movies, displays their available seats, attempts to book a ticket for `Movie 1`, and displays the updated seat count.

The current C program prints HTML-formatted output and includes a CGI-style content-type header. Compiling and running it directly demonstrates the booking logic, but does not by itself deploy it as a web application.

## Implementation Details

### Seat Selection

The JavaScript implementation uses a two-dimensional array to represent five rows of five seats. Selected seats are tracked separately, and booking is allowed only when the selected-seat count matches the requested ticket count.

### Database-Backed Booking

The PHP implementation retrieves movie information from MySQL and inserts booking records with a timestamp and seat count. The booking-processing script currently uses a fixed user ID rather than retrieving the authenticated user from the session.

### Linked List in C

The C implementation defines a `Movie` structure and maintains a linked list of movie records. Ticket booking searches the list by movie name and decrements the available-seat count when a seat is available.

## Limitations and Future Improvements

- Integrate the JavaScript interface with the PHP/MySQL backend.
- Persist selected seats and prevent double-booking across users.
- Standardize database names and connection settings.
- Connect booking operations to the authenticated user's session.
- Use prepared statements for SQL queries to reduce SQL injection risks.
- Add input validation, session access controls, and safer error handling.
- Provide a database initialization script and automated tests.
- Improve the C implementation's memory management and separate booking logic from HTML output.

## Learning Outcomes

This project demonstrates:

- Front-end development using HTML, CSS, and JavaScript.
- Form validation and interactive UI behavior.
- Server-side programming using PHP.
- MySQL database connectivity and record insertion.
- Password hashing and verification.
- Linked-list data structures and basic resource allocation in C.

