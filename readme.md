# WEB-BASED LIBRARY MANAGEMENT SYSTEM

PROJECT REQUIREMENTS
Background
Australian University is outsourcing their development of a web-based library management system to facilitate the browsing, borrowing of books in the university library.

The university library consists of books in several languages and genres including books from a variety of publishers and authors.

The University wants the web-based library management system that incorporates responsive design so that it is compatible with smartphones and laptops. They want the library management system to have the clean, professional look and feel typical of modern web applications.

Problem statement

Gelos Enterprises has been engaged to help Australian University develop their web-based library management system. As a web developer at Gelos Enterprises you have been tasked with the development of this web-based library management system.

It is expected that the tasks involved will follow the software development lifecycle including requirements gathering, design, build and testing phases.

Functional requirements
A business analyst working for Gelos has conducted some requirements gathering with the client and confirmed the following initial requirements

The web-based library management system shall provide the following functionality:

1. Sign-up
2. Log-in
3. Browse and borrow a book (Members)
4. Return or delete a book (Admin only)
5. Edit book details (Admin only)
6. Log-out.

Additional details on these requirements are included below

Functionality Description Related Data
Signup Create a new Member user on the system

    •	Member ID (system generated)

• Member type (possible values Member or Admin, assigned by system, default Member)
• First Name
• Last Name
• Email address (Member username)
• Password
• Re-type Password
Login Authenticate member or admin login credentials and login user into library management system • Email address (Member username)
• Password
Browse and borrow books Provide functions to browse and borrow a book.

Available to all logged in users only. For each book display the following details:
• Book cover (image)
• Book title
• Author
• Publisher
• Language
• Category

Borrowed books are to be recorded with the following data
• Member ID
• Book ID
• Borrowed date
• Return due date

Returns due are due within 21 days
Edit book details Provide functions to edit/update book details

Available to admin logged in users only. For a book selected display and update the following details:
• Book title
• Author
• Publisher
• Language
• Category
Return or delete a book Provide functions to return or delete a book

Available to admin logged in users only. For a book selected display the following details:
• Book title
• Author
• Publisher
• Language
• Category

Based on Book borrowing status
• If on loan, allow return
• If available for loan, allow delete



## Features

- Modern layout with custom colors/styles/backgrounds
- Responsive design
- Sticky navbar with style changes on scroll
- Bootstrap modals
- Form & input styles
- Testimonials
- Contact page with Google Map

## Usage

This website is built with [Bootstrap](https://getbootstrap.com/) and [Sass](https://sass-lang.com/). It uses [Font Awesome](https://fontawesome.com/) for icons.

In order to customize this website, you need to install [Node.js](https://nodejs.org/en/). Then, clone this repository and run:

```bash
npm install
```

This will install Bootstrap, Sass and Font Awesome. To build your CSS files from Sass, run:

```bash
npm run sass:build
```

To watch your Sass files for changes, run:

```bash
npm run sass:watch
```

You can add Bootstrap variables to the `bootstrap.scss` file. You can look at the file `node_modules/bootstrap/dist/scss/_variables.scss` for a list of all the variables. Do NOT edit the `variables.scss` file directly, as it will be overwritten when you update Bootstrap.

To add your own custom styles, use the `styles.scss` file.
