Hotel Management System (HotelOps)

A web application for hotel staff to manage rooms, guests, check-ins and check-outs, extra charges, stock and reports. Built as a team project (Year 2) with PHP, MySQL, JavaScript, HTML and CSS.

Status: learning / coursework project. See Known limitations for what I would improve.

Features
Staff login / logout and change password
Dashboard with a sidebar menu shared by all pages
File Maintenance – add, amend and delete records for rooms, guests, staff and stock
Check-in / Check-out of guests
Extras – record extra charges (e.g. bar, restaurant) against a guest's current stay
Stock control – place orders with suppliers, receive goods, remove stock
Reports – guest stays and orders
Tech stack
Layer	Technology
Front end	HTML, CSS, vanilla JavaScript
Back end	PHP (mysqli)
Database	MySQL / MariaDB
Dev setup	XAMPP (Apache + MySQL), phpMyAdmin
Project structure
Web Project/
├── index.php                 # Dashboard (checks the login session)
├── login_screen.php          # Staff login
├── auth.php                  # Session check helper
├── db.inc.php                # Database connection
├── sidebar.php               # Shared navigation menu
├── change_pass/              # Change password
├── checkin_checkout/         # Check-in and check-out
├── extras/                   # Extra charges for a guest stay
├── file_maintenance/
│   ├── room_maintenance/     # add_room / amend_room / delete_room
│   ├── guest_maintenance/
│   ├── staff_maintenance/
│   ├── stock_maintenance/
│   ├── add_amend_delete.js   # Shared form behaviour
│   └── add_amend_delete.css  # Shared form styles
├── stock_control/            # place_orders / receive_goods / remove_stock
├── reports/                  # guest_stays / orders_report
└── logout/
Getting started
Prerequisites
XAMPP (or any Apache + PHP 8 + MySQL stack)
Installation
Copy the project into your web server folder so the path matches the links in sidebar.php:
   C:\xampp\htdocs\Student 4\draft\Web Project\

(The menu uses absolute paths starting with /Student 4/draft/Web Project/. If you place the project elsewhere, update the links in sidebar.php.)

Create the database. Start Apache and MySQL in XAMPP, open phpMyAdmin and create a database, then import the schema file:
   database/schema.sql
Configure the connection. Copy db.inc.example.php to db.inc.php and enter your own credentials:
php
   $hostname = "localhost";
   $username = "your_db_user";
   $password = "your_db_password";
   $dbname   = "your_database_name";

db.inc.php is listed in .gitignore and must never be committed.

Open the app in your browser:
   http://localhost/Student%204/draft/Web%20Project/login_screen.php
My contribution

This was a team project; the work was split into modules by our mentor. I was responsible for:

Room Maintenance – add, amend and delete rooms
Add: form with client-side validation, server-side duplicate room number check, new rooms start as Free
Amend: dropdown of active rooms, JavaScript fills the form, view/amend toggle, confirmation before saving
Delete: soft delete (a RoomDeletedFlag is set instead of removing the row, so guest history is preserved); occupied rooms cannot be deleted (checked in JavaScript and again on the server)
Extras – choose a staff member and a current guest stay, pick an area and item with a dependent dropdown (JavaScript), and save the charge
Helped teammates integrate their modules before the deadline
Known limitations & roadmap

I know about these issues and would fix them in the next iteration:

 Use prepared statements everywhere. Most scripts use mysqli_real_escape_string, and one amend script still builds SQL from raw input.
 Hash passwords with password_hash() / password_verify() (they are currently stored as plain text).
 Protect every page. auth.php exists but is only applied to the dashboard; it should be included at the top of every protected page.
 Move credentials out of the repository (environment variables or a git-ignored config file).
 Add a UNIQUE constraint on the room number in the database instead of relying on a SELECT check, and handle re-adding numbers of soft-deleted rooms.
 Validate on the server too, not only in the browser.
 Separate the back end from the UI – a JSON API (PHP or Python) with a React front end.
 Add automated tests.
What I learned
Designing a multi-module web app with shared layout, database connection and styles
CRUD with PHP and MySQL, including soft deletes and cross-table queries (JOIN)
Client-side and server-side validation, and why both are needed
Working in a team: splitting modules, integrating code and handling a tight deadline
Security basics: SQL injection, password storage and access control
