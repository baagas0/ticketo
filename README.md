<p align="center">
  <a href="https://github.com/hiskiapp/course">
    <img src="https://indiepartnership.com/wp-content/uploads/2020/09/icon.png" alt="Logo" width="80" height="80">
  </a>

  <h3 align="center">Ticketo</h3>

  <p align="center">
    Sistem pemesanan tiket pesawat dengan pembayaran otomatis dari tripay
  </p>
</p>



<!-- TABLE OF CONTENTS -->
## Table of Contents

* [Getting Started](#getting-started)
  * [Installation](#installation)
* [To Do List](#to-do-list)
* [Acknowledgements](#acknowledgements)

### Built With
* [HTML 5](https://www.w3schools.com/html/)
* [Bootstrap 5](https://getbootstrap.com/docs/5.0/getting-started/introduction/)



<!-- GETTING STARTED -->
## Getting Started

repository ini merupakan salah satu project saya yang menggunakan framework dari laravel
Clone repository https://github.com/baagas0/ticketo.git

### Prerequisites
-   Git CLI

### Installation

1. Open the terminal, navigate to your directory (htdocs or www or public_html).
```bash
git clone https://github.com/baagas0/ticketo.git
cd ticketo
composer install
```

2. Setting the database configuration, open .env file at project root directory
```
DB_DATABASE=**your_db_name**
DB_USERNAME=**your_db_user**
DB_PASSWORD=**password**
```

3. Install Panel
```bash
php artisan key:generate
php artisan migrate:fresh --seed
```
You will get the administrator credential and url access like example bellow:
```bash
::Administrator Credential::
URL Login: http://ticketo.test/admin/login
Email: admin@gmail.com
Password: 123456

```

### To Do List

- [x] Initializing database
- [x] Installasi & set up laravel
- [x] User login
- [x] Admin login
- [x] Build system workflow
- [x] Add payment gateway
- [x] Testing

<!-- ACKNOWLEDGEMENTS -->
## Acknowledgements
* [HTML](https://www.w3schools.com/html/)
* [Bootstrap 5](https://getbootstrap.com/docs/5.0/getting-started/introduction/)
