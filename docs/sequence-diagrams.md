# Sequence Diagrams — Online Bookstore System (OBS)

This document describes the sequence of interactions for key workflows in the Online Bookstore System (OBS).

---

## 1. User Registration Sequence

1. User opens the Registration page
2. User enters email and password
3. Frontend validates input format
4. Frontend sends registration request to backend
5. Backend hashes password using bcrypt
6. Backend stores user record in database
7. Backend returns success response
8. User is redirected to login or homepage

---

## 2. User Login Sequence

1. User enters email and password
2. Frontend sends login request to backend
3. Backend retrieves user record
4. Backend verifies password using bcrypt
5. Backend creates session
6. User is redirected to homepage/dashboard

---

## 3. Book Search Sequence

1. User enters keyword in search bar
2. Frontend sends search request
3. Backend queries database by title, author, or ISBN
4. Backend returns matching books
5. Frontend displays search results

---

## 4. Add to Cart Sequence

1. User clicks "Add to Cart"
2. Frontend sends add-to-cart request
3. Backend checks book availability
4. Backend updates cart and cart items
5. Backend returns updated cart
6. Frontend updates cart display

---

## 5. Checkout and Order Placement Sequence

1. User proceeds to checkout
2. User enters shipping details
3. Frontend sends checkout request
4. Backend validates cart contents
5. Backend creates order and order items
6. Backend initiates Stripe payment
7. Stripe processes payment
8. Stripe sends confirmation webhook
9. Backend updates order and payment status
10. Backend sends confirmation email
11. User sees order confirmation

---

## 6. Admin Order Status Update Sequence

1. Admin logs in
2. Admin opens order management page
3. Admin selects an order
4. Admin updates order status
5. Backend saves new status
6. Backend logs status history
7. Updated status is displayed
