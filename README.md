# DESIGN AND FABRICATION OF A FUSED DEPOSITION MODELING (FDM) 3D PRINTER MODULE FOR TECHNICAL TRAINING
### Digital Technical-Learning, Knowledge Platform & Educational CMS

---

## 1. Project Overview
This project is a modern, responsive, database-driven educational website and content management system developed to support the **Design and Fabrication of a Fused Deposition Modeling (FDM) 3D Printer Module for Technical Training**.

Rather than serving merely as a static showcase, the platform functions as an **interactive, modular training portal** that guides trainees, instructors, engineering personnel, students, and innovation teams through the complete additive manufacturing lifecycle:

$$\text{UNDERSTAND} \rightarrow \text{LEARN} \rightarrow \text{DESIGN} \rightarrow \text{PREPARE} \rightarrow \text{OPERATE} \rightarrow \text{PRINT} \rightarrow \text{INSPECT} \rightarrow \text{MAINTAIN} \rightarrow \text{TROUBLESHOOT} \rightarrow \text{INNOVATE}$$

---

## 2. Technology Stack
The application adheres strictly to the mandatory enterprise stack:

- **Backend:** PHP 8.2+ (OOP, PSR-4 Autoloading, PDO Prepared Statements, Secure Sessions, MVC Architecture)
- **Database:** MySQL 8.0+ / MariaDB 10.4+ (19 Normalized tables with foreign keys, cascading integrity, and fulltext indexes)
- **Frontend & Styling:** Tailwind CSS, Alpine.js, Vanilla ES6+ JavaScript, FontAwesome 6, Google Fonts (Inter / Outfit)
- **Design Inspiration:** BestWeb.LK aesthetic principles (Hero sections, clean typography, SLAF Navy/Cyan technical theme, glassmorphism, responsive data cards).

---

## 3. Key Feature Modules

### Public Educational Portal
1. **Hero & Interactive Roadmaps:** 12-stage visual learning path from basics to innovation.
2. **3D Printing Fundamentals:** History, additive vs subtractive comparisons, advantages, and applications.
3. **FDM Technology Deep-Dive:** Polymer thermodynamics, layer deposition mechanics, and animated extrusion workflows.
4. **Interactive Component Explorer:** Mechanical, Extrusion, Electronics, and Thermal subsystems with operating principles and failure modes.
5. **Interactive CAD-to-Print Flow:** CAD $\rightarrow$ STL/3MF $\rightarrow$ Slicer $\rightarrow$ G-code $\rightarrow$ Machine execution.
6. **3D Model Preparation & Slicing Guides:** Wall thickness, support strategies, infill density/patterns, and nozzle temperature guides.
7. **Filament Materials Matrix:** Detailed technical specifications for PLA, PETG, ABS, TPU, and specialty polymers with interactive search.
8. **19-Step Standardized Operating Procedure (SOP):** From pre-flight inspection and bed leveling to part removal and dimensional inspection.
9. **Defect Troubleshooting Matrix:** Problem $\rightarrow$ Root Causes $\rightarrow$ Diagnostic Checks $\rightarrow$ Corrective Fixes $\rightarrow$ Long-term Prevention.
10. **Interactive Knowledge Assessment (Quiz Engine):** Alpine.js quiz engine with timers, passing criteria, instant feedback, and technical explanations.
11. **A–Z Technical Lexicon / Glossary:** Searchable and letter-filtered glossary of engineering terms.
12. **Curriculum Training Center:** Modular courses with lesson step-through and time tracking.
13. **Project Fabrication Showcases & Case Studies:** Detailed breakdown of parts manufactured on the FDM printer module.
14. **Capstone Engineering Dossier:** Complete hardware specifications, design decisions, and future development roadmaps.
15. **Global Fulltext Search:** Instant keyword search across articles, components, troubleshooting guides, glossary terms, and projects.

### Secure Administrator CMS (`/admin`)
- **Role-Based Access Control (RBAC):** Super Admin, Content Administrator, Training Administrator, Editor.
- **Dynamic FDM Machine Parameters:** Non-hardcoded printer specifications (build volume, temperatures, steps/mm) managed directly from the admin panel.
- **Full CRUD Management:** Articles, Curriculum Modules, Lessons, Hardware Components, Materials, Troubleshooting Guides, Videos, Gallery Photos, Quizzes, Glossary, FAQs, Resources, and User Accounts.
- **Media Asset Library:** Drag-and-drop file uploader with automated URL copying and MIME validation.
- **Security Audit Trail:** Immutable audit logging for logins, content additions, updates, deletions, and configuration changes.

---

## 4. Database Architecture (19 Normalized Tables)

| Table | Description |
|---|---|
| `admins` | Administrative users with bcrypt password hashing and active status |
| `roles` & `permissions` | RBAC definitions and privilege mappings |
| `articles` & `article_categories` | Educational articles and categorized guides |
| `training_modules` & `training_lessons` | Sequential training curriculum |
| `printer_components` & `component_categories` | Hardware subsystems and component failure modes |
| `materials` | Filament polymer database with printing parameters |
| `troubleshooting_issues` | Print defect diagnostic guides |
| `videos` & `gallery_images` | Multimedia demonstrations and fabrication photos |
| `projects` & `project_development_stages` | Fabricated parts and development milestones |
| `quizzes`, `quiz_questions`, `quiz_answers` | Knowledge evaluation quizzes |
| `glossary_terms` & `faqs` | Technical dictionary and help accordion |
| `learning_resources` | Downloadable calibration files and documentation |
| `contact_messages` | Inquiries from trainees and visitors |
| `media_files` | Uploaded assets in the media repository |
| `site_settings` & `printer_specifications` | Editable portal metadata and machine parameters |
| `audit_logs` | Security activity and change tracking records |

---

## 5. Installation & Setup Instructions

### Prerequisites
- PHP 8.2 or higher with `pdo_mysql`, `mbstring`, `fileinfo`, `openssl` extensions enabled.
- MySQL 8.0+ or MariaDB 10.4+.
- Web server (Apache with `mod_rewrite` enabled or Nginx).

### Step 1: Database Setup
1. Open your MySQL management tool (e.g., phpMyAdmin or MySQL CLI).
2. Create the database:
   ```sql
   CREATE DATABASE 3d_printer_portal CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
   ```
3. Import the schema and initial seed data:
   ```bash
   mysql -u root -p 3d_printer_portal < database/schema.sql
   mysql -u root -p 3d_printer_portal < database/seed.sql
   ```

### Step 2: Environment Configuration
Copy `.env.example` to `.env` and configure your local credentials:
```ini
APP_NAME="FDM 3D Printer Technical Training Module"
APP_ENV=local
APP_DEBUG=true
APP_URL="http://localhost/3D Printing Technical Training & Learning Portal"

DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=3d_printer_portal
DB_USERNAME=root
DB_PASSWORD=
```

### Step 3: Run the Application
- **Using XAMPP/WAMP:** Place this folder in `c:/xampp/htdocs/` and navigate to:
  `http://localhost/3D Printing Technical Training & Learning Portal`
- **Using PHP Built-in Server:**
  ```bash
  php -S localhost:8000
  ```

---

## 6. Default Admin Credentials

- **Admin Login URL:** `/admin/login`
- **Username:** `admin`
- **Password:** `admin123`

*(Note: Please update the default password immediately after initial login from the Admin User Management panel).*

---

## 7. Security Implementations

1. **Prepared SQL Statements:** Zero raw string concatenation; all queries utilize parameterized PDO binding.
2. **Cross-Site Request Forgery (CSRF):** Synchronizer Token Pattern with per-session token validation on all POST/PUT/DELETE requests.
3. **Cross-Site Scripting (XSS):** Automated HTML-escaping helper `e()` on all rendered dynamic variables.
4. **Password Security:** Hashed using `password_hash()` with `PASSWORD_BCRYPT`.
5. **Secure Sessions:** Strict session cookies with `HttpOnly`, `SameSite=Lax`, and regeneration upon authentication.
6. **MIME & Upload Validation:** Strict file extension and MIME type verification for images and document assets.
7. **Rate Limiting & Audit Logging:** Immutable database audit tracking on critical actions.

---

## 8. Deployment on Ubuntu Linux (Nginx / Apache / CloudPanel)

### Nginx Server Block Configuration
```nginx
server {
    listen 80;
    server_name 3dprinting.portal.edu.lk;
    root /var/www/3d_printer_portal;
    index index.php index.html;

    client_max_body_size 64M;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(env|git|htaccess) {
        deny all;
    }
}
```

### File Permissions
```bash
sudo chown -R www-data:www-data /var/www/3d_printer_portal
sudo chmod -R 755 /var/www/3d_printer_portal
sudo chmod -R 775 /var/www/3d_printer_portal/storage
sudo chmod -R 775 /var/www/3d_printer_portal/assets/uploads
```

---

## 9. Backup & Maintenance
- **Database Backup:**
  ```bash
  mysqldump -u [username] -p 3d_printer_portal > backup_$(date +%F).sql
  ```
- **Media Asset Backup:**
  ```bash
  tar -czvf media_backup_$(date +%F).tar.gz assets/uploads/ storage/
  ```

---

*Educational Engineering Platform for the Design and Fabrication of an FDM 3D Printer Module.*
