<h1 align="center">
    <br>
    <a href="[YOUR_NEW_REPO_URL]">
        <img src="logo.png" alt="Mariners Appointment" width="150">
    </a>
    <br>
    Mariners Appointment
    <br>
</h1>

<h4 align="center">
    A powerful, self-hosted appointment scheduling platform built for flexibility.
</h4>

<p align="center">
  <img alt="License" src="https://img.shields.io/github/license/[YOUR_NEW_REPO_OWNER]/mariners-appointment?style=for-the-badge">
  <img alt="Latest Release" src="https://img.shields.io/github/v/release/[YOUR_NEW_REPO_OWNER]/mariners-appointment?style=for-the-badge">
  <img alt="Downloads" src="https://img.shields.io/github/downloads/[YOUR_NEW_REPO_OWNER]/mariners-appointment/total?style=for-the-badge">
</p>

<p align="center">
  <a href="#why-mariners-appointment">Why Mariners Appointment</a> •
  <a href="#features">Features</a> •
  <a href="#quick-start">Quick Start</a> •
  <a href="#installation">Installation</a> •
  <a href="#license">License</a>
</p>

---

![screenshot](screenshot.png)

## 🚀 Why Mariners Appointment

**Mariners Appointment** is an open-source scheduling system that gives you full control over your booking workflow.

It is designed to adapt to your business — whether you need simple appointment booking or more advanced scheduling logic.

**Key advantages:**

- Fully self-hosted — your data stays under your control
- Highly customizable and flexible
- Integrates with your existing website and database
- Free for both personal and commercial use

---

## ✨ Features

Built to support a wide range of scheduling needs:

- Appointment and customer management
- Service and provider organization
- Working plans and booking rules
- Google Calendar synchronization
- Email notification system
- Multi-language interface
- Self-hosted deployment
- Active open-source community

---

## ⚡ Quick Start (Development)

Clone and run the project locally using the provided Docker Compose environment:

```bash
# Clone the repository
git clone [YOUR_NEW_REPO_URL].git

# Navigate into the project
cd mariners-appointment

# Start the Docker environment
docker compose up
````

Then open a second terminal and enter the application container:

```bash id="app-shell"
docker compose exec app bash
```

Inside the container, install dependencies:

```bash id="deps"
npm install && composer install
```

Start the development watcher:

```bash id="dev"
npm start
```

Build production assets:

```bash id="build"
npm run build
```

> Note: Works on Windows (WSL recommended), macOS, and Linux using Docker Compose.

---

## 🏗️ Installation (Production)

### Requirements

* Apache or Nginx
* PHP 8.2+
* MySQL database

### Steps

1. Create a database (or use an existing one)
2. Upload the `mariners-appointment` folder to your server
3. Ensure the `storage` directory is writable
4. Rename `config-sample.php` to `config.php`
5. Update configuration values
6. Open the application in your browser and follow the setup wizard

Once completed, the system is ready to use.

---

## 📚 Resources

* Repository: [[YOUR_NEW_REPO_URL]]([YOUR_NEW_REPO_URL])
* Issues: [[YOUR_NEW_REPO_URL]/issues]([YOUR_NEW_REPO_URL]/issues)
* Discussions: [[YOUR_NEW_REPO_URL]/discussions]([YOUR_NEW_REPO_URL]/discussions)

---

## 📜 License

* Code: GPL v3.0
* Content: CC BY 3.0

Mariners Appointment is a derivative work based on the open-source Easy!Appointments
project (Copyright © Alex Tselegidis), distributed under the GPL-3.0 license. The
original copyright notices are retained in the source files as required by the license.

---

## 👤 Maintainer

* Repository: [[YOUR_NEW_REPO_URL]]([YOUR_NEW_REPO_URL])
* Contact: [YOUR_CONTACT_EMAIL]
