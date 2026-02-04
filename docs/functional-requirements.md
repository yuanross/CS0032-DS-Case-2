# Functional Requirements (FR) — Online Bookstore System (OBS)

This document lists the Functional Requirements (FRs) for the Online Bookstore System (OBS) and how they map to features/modules.

## FR Table

| FR ID | Requirement | Description | Primary User | Module / Screen (Planned) | Status |
|------|-------------|-------------|--------------|----------------------------|--------|
| FR-01 | User Registration | The system shall allow users to register using email and password. | Customer | Auth: Register Page (`/register`) | ☐ Planned ☐ In Progress ☐ Done |
| FR-02 | User Login | The system shall authenticate users via email and password. | Customer/Admin | Auth: Login Page (`/login`) | ☐ Planned ☐ In Progress ☐ Done |
| FR-03 | Browse Books by Category | The system shall display books grouped into predefined categories (e.g., Fiction, Science). | Customer | Catalog: Home/Categories (`/`, `/category?id=`) | ☐ Planned ☐ In Progress ☐ Done |
| FR-04 | Search Books | The system shall allow users to search books by title, author, or ISBN. | Customer | Catalog: Search (`/search?q=`) | ☐ Planned ☐ In Progress ☐ Done |
| FR-05 | View Book Details | The system shall show book details: title, author, ISBN, price, description, cover image. | Customer | Catalog: Book Details (`/book?id=`) | ☐ Planned ☐ In Progress ☐ Done |
| FR-06 | Manage Shopping Cart | The system shall allow users to add/remove books and update quantities in a cart. | Customer | Cart: Cart Page (`/cart`) | ☐ Planned ☐ In Progress ☐ Done |
| FR-07 | Compute Totals | The system shall calculate subtotal, tax, and total price in the cart/checkout. | Customer | Cart/Checkout (`/cart`, `/checkout`) | ☐ Planned ☐ In Progress ☐ Done |
| FR-08 | Place Order | The system shall allow users to place orders by providing shipping and payment details. | Customer | Orders: Checkout (`/checkout`) | ☐ Planned ☐ In Progress ☐ Done |
| FR-09 | Email Confirmation | The system shall send an order confirmation email after a successful purchase. | Customer | Orders: Email Service | ☐ Planned ☐ In Progress ☐ Done |
| FR-10 | Order History & Tracking | The system shall provide a dashboard for users to view past orders and current status. | Customer | Orders: My Orders (`/orders`) | ☐ Planned ☐ In Progress ☐ Done |
| FR-11 | Admin Catalog Management | The system shall allow admins to add, edit, and remove books from the catalog. | Admin | Admin: Books CRUD (`/admin/books`) | ☐ Planned ☐ In Progress ☐ Done |
| FR-12 | Admin Order Management | The system shall allow admins to view all orders and update their statuses. | Admin | Admin: Orders (`/admin/orders`) | ☐ Planned ☐ In Progress ☐ Done |

## Notes / Assumptions
- Users are classified as `customer` or `admin`.
- Book categories are data-driven (stored in the database) to support scalability (see NFR-13).
