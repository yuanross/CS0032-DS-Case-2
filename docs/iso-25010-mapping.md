# ISO/IEC 25010 Mapping — Online Bookstore System (OBS)

This document maps the OBS Non-Functional Requirements (NFRs) to ISO/IEC 25010 quality characteristics.

## Mapping Table

| ISO/IEC 25010 Quality Characteristic | Related NFRs | How OBS addresses it |
|---|---|---|
| Performance Efficiency | NFR-01, NFR-02 | Optimize queries (indexes), paginate lists, compress images, load testing for capacity |
| Security | NFR-03, NFR-04, NFR-05 | bcrypt hashing, Stripe gateway, HTTPS enforcement, secure sessions |
| Usability (incl. Accessibility) | NFR-06, NFR-07 | WCAG 2.1 AA practices, clear UI flows, usability testing |
| Reliability | NFR-08, NFR-09 | Monitoring/uptime target, logging failures, recovery strategies |
| Compatibility | NFR-10, NFR-11 | Responsive UI, cross-browser testing, mobile OS support |
| Maintainability | (supports NFR-13) | Modular PHP structure, separation of concerns, clear docs |
| Portability/Scalability (practical) | NFR-13 | DB-driven categories and configuration-based expansion |

## Evidence to Collect (for final presentation)
- Screenshot of Lighthouse performance report
- Load testing report screenshot (k6/JMeter)
- Screenshot showing bcrypt hashes in DB (no plaintext passwords)
- Stripe test payment proof + webhook log
- axe accessibility report screenshot
- Cross-browser checklist results
- Demonstration: add a new category in DB and it appears on the site without code edits
