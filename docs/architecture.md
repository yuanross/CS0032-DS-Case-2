# System Architecture — Online Bookstore System (OBS)

This document describes the overall system architecture of the Online Bookstore System (OBS). The system follows a **three-tier architecture** to ensure scalability, maintainability, and security.

---

## 1. Architectural Overview

The OBS is composed of the following layers:

1. **Presentation Layer (Frontend)**
2. **Application Layer (Backend / Server-side Logic)**
3. **Data Layer (Database)**
4. **External Services**

---

## 2. Presentation Layer (Frontend)

**Technology:**
- HTML5
- CSS3
- Bootstrap (Responsive Design)
- Minimal JavaScript (Form validation, UI interactions)

**Responsibilities:**
- Display book listings and categories
- Provide search interface (title, author, ISBN)
- Allow users to manage cart and checkout
- Provide admin dashboard screens
- Ensure mobile responsiveness and accessibility (WCAG 2.1 AA)

**Key Screens:**
- Home / Category View
- Book Details
- Search Results
- Shopping Cart
- Checkout
- Order History
- Admin Dashboard (Books & Orders)

---

## 3. Application Layer (Backend)

**Technology:**
- PHP 8.x
- PDO for database access
- PHP Sessions for authentication

**Responsibilities:**
- Handle user authentication and authorization
- Process business logic (cart, orders, payments)
- Validate inputs and enforce security rules
- Communicate with the database
- Integrate with external services (Stripe, Email)

**Core Modules:**
- Authentication Module
- Catalog Module
- Cart Module
- Order Management Module
- Admin Management Module

---

## 4. Data Layer (Database)

**Technology:**
- MySQL (Relational Database)

**Responsibilities:**
- Store persistent data such as users, books, orders, and payments
- Enforce data integrity via primary and foreign keys
- Support fast search using indexed fields

**Design Approach:**
- Normalized schema to reduce redundancy
- Separate tables for orders and order items
- Historical data preserved (e.g., order prices)

---

## 5. External Services

### Payment Gateway
- **Stripe (PCI-DSS compliant)**
- Handles secure payment processing
- No credit card data stored on OBS servers

### Email Service
- SMTP / PHPMailer
- Sends order confirmation emails

---

## 6. Deployment Architecture

- Application hosted on a cloud or shared hosting environment
- HTTPS enforced for all requests
- Database hosted on the same server or managed DB service
- Scalable design to support future expansion

---

## 7. Architecture Diagram (Textual Representation)
[ User Browser / Mobile ]
|
v
[ Frontend (HTML/CSS/Bootstrap) ]
|
v
[ PHP Backend (Controllers & Logic) ]
|
------------------------
| |
v v
[ MySQL Database ] [ External Services ]
|
-------------------
| |
[ Stripe ] [ Email ]


---

## 8. Quality Attribute Support

| Quality Attribute | Architectural Support |
|------------------|----------------------|
| Performance | Indexed queries, pagination |
| Security | HTTPS, bcrypt hashing, Stripe |
| Usability | Responsive UI, WCAG compliance |
| Reliability | Logging, transactional DB operations |
| Scalability | Modular design, DB-driven categories |


