# MyBlog 

MyBlog is a simplistic blog platform, designed to provide a hands-on introduction to PHP, SQL, and Docker. The platform allows for basic user authentication and post creation, with some added administrative functionalities. It is important to note that the primary goal of this project was to grasp the basics of back-end development. Therefore, it does not include any CSS or frontend styling.

## Getting Started

To get a local copy up and running, follow these steps:

### Prerequisites

It is assumed that you have these installed and working :

- Docker
- PHP
- MySQL Server

### Installation

1. Clone the repo.
- git clone https://github.com/TheKyyn/projetBack.git

2. In the root directory of the project, build and run the Docker containers.
- docker-compose up


## Usage

Once you have your local copy up and running, you can interact with the blog through the various PHP files in the project.

- `index.php`: The homepage of the blog where users can choose to login or register.
- `login.php`: Page for user login. If a user attempts to login while already logged in, they will be redirected back to the homepage.
- `register.php`: Page for user registration.
- `logout.php`: Page for user logout.
- `posts.php`: Page for viewing, creating, updating, and deleting posts. Only logged in users can access this page.

The project includes a `functions.php` file, which houses the functions for user registration, login, admin checking, and post management (creation, retrieval, updating, and deletion).

The Docker configuration for the project can be found in the `docker-compose.yml` file and the Dockerfile.

## Built With

- PHP
- MySQL
- Docker

## Acknowledgements

This project was built as a simple introduction to back-end development with PHP, SQL, and Docker. It is a basic platform, focusing purely on functionality, without any frontend styling or CSS. Its aim is to provide a clear and uncomplicated illustration of how these technologies can be used to build a web application.

Please note that the blog is connected to a MySQL database. In this version, the MySQL root password is stored as an environment variable for Docker. Be sure to replace this with your actual password in a secure and production-ready application.

## Contact

If you have any question, feel free to contact me via email : devkyyn@gmail.com

Project Link: [https://github.com/TheKyyn/projetBack](https://github.com/TheKyyn/projetBack)
