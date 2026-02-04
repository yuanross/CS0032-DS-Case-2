# Testing Plan — Online Bookstore System (OBS)

This document outlines the testing strategy used to validate the Online Bookstore System (OBS).

---

## 1. Testing Types

### 1.1 Unit Testing
Tests individual components and functions.

Examples:
- Password hashing and verification
- Cart total and tax calculations
- Order creation logic

---

### 1.2 Integration Testing
Tests interactions between system components.

Examples:
- User registration → login
- Cart → checkout → order creation
- Stripe payment → order update

---

### 1.3 End-to-End (E2E) Testing
Validates complete user workflows.

Example Scenario:
- Register → Login → Browse → Add to Cart → Checkout → Order Confirmation

---

## 2. Performance Testing

- Tool: JMeter or k6
- Load: 1,000 concurrent users
- Target: Response time < 2 seconds
- Pages tested:
  - Homepage
  - Search
  - Book details

---

## 3. Security Testing

- Verify bcrypt password storage
- Verify HTTPS enforcement
- Confirm no credit card data stored locally
- Test invalid login attempts

---

## 4. Usability & Accessibility Testing

- WCAG 2.1 AA compliance testing
- Keyboard-only navigation
- Screen reader compatibility
- First-time user checkout completion < 5 minutes

---

## 5. Compatibility Testing

- Browsers: Chrome, Firefox, Safari, Edge (latest versions)
- Mobile: iOS 14+, Android 10+
- Responsive layout testing

---

## 6. Reliability Testing

- Simulate payment failure
- Verify transaction logging
- Verify order recovery mechanism

---

## 7. Test Evidence

The following will be included in the final submission:
- Screenshots of test results
- Load test reports
- Accessibility scan reports
