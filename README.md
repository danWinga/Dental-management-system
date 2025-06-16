# 🦷 Dental Management System – PHP + MySQL

A full-featured **web-based Dental Management System** designed to optimize day-to-day clinical workflows — from patient onboarding to treatment planning, billing, and insurance claims. Built with PHP and MySQL, and enhanced with AJAX for real-time responsiveness, this platform supports solo practitioners to multi-chair clinics.

> 📈 Streamlines patient engagement, clinic operations, and financial tracking in one centralized platform.

---

## 🚀 Core Features

### 👩‍⚕️ Patient Management
- Create, edit, and archive patient profiles
- View complete treatment and visit history
- Store emergency contacts and insurance details

### 📅 Appointment Scheduling
- Calendar-based scheduling per doctor or room
- Drag & drop rescheduling
- Time conflict detection & color-coded status

### 🏥 Treatment & Procedures
- Define procedure categories and pricing
- Assign treatments to appointments with notes
- Multi-step treatment plan support

### 💳 Billing & Insurance
- Generate invoices from procedures
- Partial, full or scheduled payment tracking
- Link insurance providers & claim eligibility
- Print receipts and export financial summaries

### 📨 Notifications *(optional extension)*
- Appointment reminders via email/SMS
- Payment due alerts

### 🔄 AJAX-Powered UX
- All major views updated via asynchronous calls
- Minimized page reloads → smoother user flow
- Built-in error handling & UI feedback

---

## 🧱 Tech Stack

| Layer     | Technology             |
|-----------|-------------------------|
| Backend   | PHP 7+ (Procedural or MVC)|
| Database  | MySQL / MariaDB         |
| Frontend  | HTML5, CSS3, JS, jQuery |
| Interactivity | AJAX (vanilla / jQuery)  |
| Webserver | Apache or Nginx         |

---

## ⚙️ Installation Guide

### 1. Clone the repository
```bash
git clone https://github.com/your-username/dental-management-system.git
cd dental-management-system
```

### 2. Set up the Database
- Import the `dental_db.sql` dump into MySQL
```bash
mysql -u root -p < dental_db.sql
```

### 3. Configure the Environment
- Rename `.env.example` → `.env`
- Set your DB credentials:
```ini
DB_HOST=localhost
DB_USER=root
DB_PASS=yourpassword
DB_NAME=dental_db
```

### 4. Serve via Localhost (Apache/Nginx)
Ensure your web server points to the `/public` or `/` folder depending on setup.

### 5. Login Default (for testing)
```
Username: admin
Password: admin123
```

---

## 📸 Screenshots *(add visuals here)*
- [ ] Dashboard
- [ ] Patient Profile
- [ ] Appointment Calendar
- [ ] Invoice View

---

## 🔐 Security & Access
- Simple auth-based access control (admin vs staff)
- SQL injection protection via parameterized queries
- CSRF token protection (add-on available)

---

## 🌱 Suggested Improvements
- Role-based access control (RBAC)
- WhatsApp or SMS API integration (e.g., Africastalking)
- PDF export for invoices/treatment plans
- Backup scheduling with cron

---

## 🧠 Maintainer
**Daniel Ooro Winga**  
HealthTech Developer | DevOps & API Integration Engineer  
[LinkedIn](https://www.linkedin.com/in/daniel-winga-8b910032) | [GitHub](https://github.com/danWinga)

---

## 📜 License
MIT License © 2025 Daniel Ooro Winga
