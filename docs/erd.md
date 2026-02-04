# Entity-Relationship Diagram (ERD) — Online Bookstore System (OBS)

This document describes the database entities and relationships used in the Online Bookstore System (OBS).

---

## 1. Entities Overview

The database is designed using a relational model with normalization to reduce redundancy and improve data integrity.

---

## 2. Entity Descriptions

### User
- Stores customer and admin account information

**Attributes:**
- user_id (PK)
- email (UNIQUE)
- password_hash
- role (customer/admin)
- created_at

---

### Category
- Stores book categories

**Attributes:**
- category_id (PK)
- name (UNIQUE)

---

### Book
- Stores book catalog information

**Attributes:**
- book_id (PK)
- category_id (FK)
- title
- author
- isbn (UNIQUE)
- price
- description
- cover_url
- stock

---

### Cart
- Stores active cart per user

**Attributes:**
- cart_id (PK)
- user_id (FK, UNIQUE)

---

### Cart_Item
- Stores books inside a cart

**Attributes:**
- cart_item_id (PK)
- cart_id (FK)
- book_id (FK)
- quantity

---

### Order
- Stores placed orders

**Attributes:**
- order_id (PK)
- user_id (FK)
- status
- subtotal
- tax
- total
- shipping_name
- shipping_address
- created_at

---

### Order_Item
- Stores books associated with an order

**Attributes:**
- order_item_id (PK)
- order_id (FK)
- book_id (FK)
- unit_price
- quantity
- line_total

---

### Payment
- Stores payment transaction details

**Attributes:**
- payment_id (PK)
- order_id (FK)
- provider
- provider_reference
- status
- amount
- created_at

---

### Order_Status_History
- Tracks order status changes

**Attributes:**
- history_id (PK)
- order_id (FK)
- from_status
- to_status
- changed_by
- changed_at

---

## 3. Relationships

- A **User** can have **one Cart**
- A **Cart** can have **many Cart_Items**
- A **Category** can have **many Books**
- A **Book** belongs to **one Category**
- A **User** can place **many Orders**
- An **Order** can have **many Order_Items**
- An **Order** has **one Payment**
- An **Order** can have **many Order_Status_History** records

---

## 4. ERD Relationship Summary
User ──< Cart ──< Cart_Item >── Book >── Category
|
└──< Order ──< Order_Item >── Book
|
├── Payment
└── Order_Status_History


---

## 5. Design Justification

- Separation of `Order` and `Order_Item` preserves historical pricing
- Categories are data-driven to support scalability (NFR-13)
- Order status history supports auditing and reliability requirements
- Normalization improves maintainability and reduces redundancy

