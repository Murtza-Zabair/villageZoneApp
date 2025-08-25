# VillageZone Web Application

VillageZone is a full-stack **Laravel + Blade** web application designed for rural communities.  
It provides villagers with farming resources, healthcare tips, and an online marketplace.  
The platform includes a **user-friendly frontend** for customers and a **secure admin panel** for administrators.  

---

## Features

### Authentication & Authorization
- Built with **Laravel Breeze**.
- Role-based access: **Admin** and **User**.

### User Side
- Home page, Farming Tips, Healthcare, Market, and Contact Us.
- Browse products, add to cart, and checkout.
- Edit personal profile and view order history.
- Send inquiries via contact form.

### Admin Panel
- **Product Management**: Add, update, delete, and manage products.
- **Order Management**: View and track customer orders.
- **Customer Management**: View registered users and manually add customers.
- **Message Management**: View and respond to contact form messages.

---

## Project Structure

- **Controllers:**
  - `WebController` → Handles user-facing pages.
  - `ProductController` → Manages products.
  - `OrderController` → Handles customer orders.
  - `CustomerController` → Manages customers.
  - `MessageController` → Manages contact messages.

- **Views:**
  - Built with **Blade templates**.
  - Fully responsive design.

---

## Tech Stack

- **Backend:** Laravel 12 (MVC Architecture)  
- **Frontend:** Blade Templates  
- **Authentication:** Laravel Breeze  
- **Database:** MySQL  
- **Styling:** Tailwind CSS  

---

## Installation & Setup

1. Clone the repository:
   ```bash
   git clone https://github.com/your-username/villageZoneApp.git
   cd villageZoneApp
