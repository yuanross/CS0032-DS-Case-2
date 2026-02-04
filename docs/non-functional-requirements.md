# Non-Functional Requirements (NFR) — Online Bookstore System (OBS)

This document lists the Non-Functional Requirements (NFRs) for the Online Bookstore System (OBS). These are evaluated using ISO/IEC 25010 software quality characteristics (see `docs/iso-25010-mapping.md`).

## NFR Table

| NFR ID | Category | Requirement | Target / Metric | Verification Method |
|-------|----------|-------------|-----------------|---------------------|
| NFR-01 | Performance | Homepage load time | Homepage loads in **under 2 seconds** | Lighthouse/WebPageTest (record LCP/TTFB) |
| NFR-02 | Performance | Concurrent users | Supports **1,000 concurrent users** without major degradation | Load test via k6/JMeter; measure response time/error rate |
| NFR-03 | Security | Password storage | Passwords are stored using **bcrypt hashing** | Inspect DB + unit test `password_hash/password_verify` |
| NFR-04 | Security | Payment processing | Payments processed via **PCI-DSS compliant gateway** (Stripe) | Stripe test mode; ensure no card data stored on server |
| NFR-05 | Security | Encrypted transport | All transactions use **HTTPS** | Server config check + HTTP→HTTPS redirect test |
| NFR-06 | Usability | Accessibility | Interface complies with **WCAG 2.1 AA** | axe DevTools scan + keyboard-only navigation test |
| NFR-07 | Usability | Learnability | First-time user can complete purchase within **5 minutes** | Usability test with timer + task completion rate |
| NFR-08 | Reliability | Availability | Target **99.9% uptime** during business hours | Uptime monitor logs / hosting SLA (documented) |
| NFR-09 | Reliability | Fault handling | Log failed transactions and implement recovery mechanisms | Application logs + simulated payment failure scenario |
| NFR-10 | Compatibility | Browser support | Works on **latest two versions** of Chrome, Firefox, Safari, Edge | Browser matrix testing / BrowserStack |
| NFR-11 | Compatibility | Mobile support | Works on **iOS 14+** and **Android 10+** | Responsive tests + device emulation/manual check |
| NFR-13 | Scalability | Extensibility | Add new product categories **without code changes** | Categories managed in DB/Admin
