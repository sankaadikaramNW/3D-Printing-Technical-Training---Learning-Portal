-- ==============================================================================
-- FDM 3D PRINTER TECHNICAL TRAINING & LEARNING PORTAL
-- Database Schema (MySQL 8+ / MariaDB compatible)
-- ==============================================================================

SET FOREIGN_KEY_CHECKS = 0;

-- 1. Roles & Permissions Table
DROP TABLE IF EXISTS role_permissions;
DROP TABLE IF EXISTS permissions;
DROP TABLE IF EXISTS admins;
DROP TABLE IF EXISTS roles;

CREATE TABLE roles (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    slug VARCHAR(50) NOT NULL UNIQUE,
    description VARCHAR(255) NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE permissions (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    slug VARCHAR(100) NOT NULL UNIQUE,
    module VARCHAR(50) NOT NULL,
    description VARCHAR(255) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE role_permissions (
    role_id INT UNSIGNED NOT NULL,
    permission_id INT UNSIGNED NOT NULL,
    PRIMARY KEY (role_id, permission_id),
    CONSTRAINT fk_rp_role FOREIGN KEY (role_id) REFERENCES roles (id) ON DELETE CASCADE,
    CONSTRAINT fk_rp_perm FOREIGN KEY (permission_id) REFERENCES permissions (id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 2. Admin Users Table
CREATE TABLE admins (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    role_id INT UNSIGNED NOT NULL,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    full_name VARCHAR(100) NOT NULL,
    designation VARCHAR(100) DEFAULT 'Technical Training Officer',
    avatar VARCHAR(255) NULL,
    is_active TINYINT(1) DEFAULT 1,
    last_login_at DATETIME NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT fk_admins_role FOREIGN KEY (role_id) REFERENCES roles (id) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 3. Site Settings & Printer Specifications
DROP TABLE IF EXISTS site_settings;
CREATE TABLE site_settings (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    setting_key VARCHAR(100) NOT NULL UNIQUE,
    setting_value LONGTEXT NULL,
    setting_group VARCHAR(50) DEFAULT 'general',
    field_type VARCHAR(30) DEFAULT 'text',
    label VARCHAR(150) NOT NULL,
    description VARCHAR(255) NULL,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_settings_group (setting_group)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS printer_specifications;
CREATE TABLE printer_specifications (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    spec_name VARCHAR(100) NOT NULL,
    spec_key VARCHAR(50) NOT NULL UNIQUE,
    spec_value VARCHAR(255) NOT NULL,
    unit VARCHAR(30) NULL,
    category VARCHAR(50) DEFAULT 'General',
    is_highlight TINYINT(1) DEFAULT 0,
    sort_order INT DEFAULT 0,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 4. Article Categories & Articles
DROP TABLE IF EXISTS article_tags;
DROP TABLE IF EXISTS articles;
DROP TABLE IF EXISTS article_categories;

CREATE TABLE article_categories (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    slug VARCHAR(100) NOT NULL UNIQUE,
    description TEXT NULL,
    sort_order INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE articles (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    category_id INT UNSIGNED NOT NULL,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE,
    summary TEXT NOT NULL,
    content LONGTEXT NOT NULL,
    featured_image VARCHAR(255) NULL,
    reading_time_mins INT DEFAULT 5,
    difficulty_level ENUM('Beginner', 'Intermediate', 'Advanced') DEFAULT 'Beginner',
    is_featured TINYINT(1) DEFAULT 0,
    is_published TINYINT(1) DEFAULT 1,
    views_count INT UNSIGNED DEFAULT 0,
    created_by INT UNSIGNED NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT fk_articles_category FOREIGN KEY (category_id) REFERENCES article_categories (id) ON DELETE RESTRICT,
    CONSTRAINT fk_articles_creator FOREIGN KEY (created_by) REFERENCES admins (id) ON DELETE SET NULL,
    FULLTEXT KEY ft_articles (title, summary, content)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 5. Structured Training Modules & Lessons
DROP TABLE IF EXISTS training_lessons;
DROP TABLE IF EXISTS training_modules;

CREATE TABLE training_modules (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    module_number INT NOT NULL UNIQUE,
    title VARCHAR(200) NOT NULL,
    slug VARCHAR(200) NOT NULL UNIQUE,
    description TEXT NOT NULL,
    estimated_hours VARCHAR(50) DEFAULT '2 Hours',
    difficulty_level ENUM('Beginner', 'Intermediate', 'Advanced') DEFAULT 'Beginner',
    icon VARCHAR(50) DEFAULT 'fa-cube',
    sort_order INT DEFAULT 0,
    is_published TINYINT(1) DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE training_lessons (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    module_id INT UNSIGNED NOT NULL,
    lesson_number INT NOT NULL,
    title VARCHAR(200) NOT NULL,
    slug VARCHAR(200) NOT NULL UNIQUE,
    summary TEXT NOT NULL,
    content LONGTEXT NOT NULL,
    video_url VARCHAR(255) NULL,
    duration_mins INT DEFAULT 15,
    sort_order INT DEFAULT 0,
    is_published TINYINT(1) DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT fk_lessons_module FOREIGN KEY (module_id) REFERENCES training_modules (id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 6. Printer Components
DROP TABLE IF EXISTS printer_components;
CREATE TABLE printer_components (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    category ENUM('Mechanical', 'Extrusion System', 'Electronics & Control', 'Thermal & Heated Bed', 'Frame & Structural') NOT NULL,
    name VARCHAR(150) NOT NULL,
    slug VARCHAR(150) NOT NULL UNIQUE,
    subtitle VARCHAR(255) NULL,
    working_principle TEXT NOT NULL,
    function_description TEXT NOT NULL,
    technical_specs LONGTEXT NOT NULL,
    common_problems LONGTEXT NOT NULL,
    maintenance_tips LONGTEXT NOT NULL,
    safety_notes TEXT NULL,
    image_url VARCHAR(255) NULL,
    sort_order INT DEFAULT 0,
    is_featured TINYINT(1) DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FULLTEXT KEY ft_components (name, subtitle, working_principle, function_description)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 7. Printing Materials
DROP TABLE IF EXISTS printing_materials;
CREATE TABLE printing_materials (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    slug VARCHAR(100) NOT NULL UNIQUE,
    code VARCHAR(20) NOT NULL,
    material_type VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    print_temp_nozzle VARCHAR(50) NOT NULL,
    print_temp_bed VARCHAR(50) NOT NULL,
    print_speed VARCHAR(50) DEFAULT '40-60 mm/s',
    bed_adhesion VARCHAR(100) NOT NULL,
    cooling_fan VARCHAR(100) NOT NULL,
    tensile_strength VARCHAR(50) NULL,
    density VARCHAR(50) NULL,
    flexural_modulus VARCHAR(50) NULL,
    pros LONGTEXT NOT NULL,
    cons LONGTEXT NOT NULL,
    applications LONGTEXT NOT NULL,
    storage_notes TEXT NOT NULL,
    safety_notes TEXT NOT NULL,
    sort_order INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 8. Troubleshooting Matrix
DROP TABLE IF EXISTS troubleshooting_issues;
CREATE TABLE troubleshooting_issues (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    category ENUM('Extrusion & Flow', 'Adhesion & Warping', 'Layer Quality & Surface', 'Mechanical & Motion', 'Thermal & Heating', 'Electrical & Firmware') NOT NULL,
    title VARCHAR(200) NOT NULL,
    slug VARCHAR(200) NOT NULL UNIQUE,
    symptom TEXT NOT NULL,
    image_url VARCHAR(255) NULL,
    severity ENUM('Low', 'Medium', 'High', 'Critical') DEFAULT 'Medium',
    likely_causes LONGTEXT NOT NULL,
    inspection_steps LONGTEXT NOT NULL,
    corrective_actions LONGTEXT NOT NULL,
    prevention_guidelines LONGTEXT NOT NULL,
    sort_order INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FULLTEXT KEY ft_troubleshoot (title, symptom, likely_causes, corrective_actions)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 9. Videos Learning Center
DROP TABLE IF EXISTS videos;
CREATE TABLE videos (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(100) NOT NULL,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE,
    description TEXT NOT NULL,
    video_source ENUM('youtube', 'vimeo', 'local', 'embed') DEFAULT 'youtube',
    video_url VARCHAR(255) NOT NULL,
    duration_seconds INT DEFAULT 0,
    thumbnail_url VARCHAR(255) NULL,
    is_featured TINYINT(1) DEFAULT 0,
    sort_order INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_video_cat (category)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 10. Gallery Albums & Images
DROP TABLE IF EXISTS gallery_images;
DROP TABLE IF EXISTS gallery_albums;

CREATE TABLE gallery_albums (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150) NOT NULL,
    slug VARCHAR(150) NOT NULL UNIQUE,
    description TEXT NULL,
    cover_image VARCHAR(255) NULL,
    category VARCHAR(50) DEFAULT 'Fabrication',
    sort_order INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE gallery_images (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    album_id INT UNSIGNED NULL,
    title VARCHAR(200) NOT NULL,
    description TEXT NULL,
    image_url VARCHAR(255) NOT NULL,
    category ENUM('Project Development', 'Printer Fabrication', 'Components', 'Assembly & Wiring', 'Printing Process', 'Printed Objects', 'Training Sessions') NOT NULL,
    stage_tag VARCHAR(100) NULL,
    sort_order INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_gallery_album FOREIGN KEY (album_id) REFERENCES gallery_albums (id) ON DELETE SET NULL,
    INDEX idx_gallery_cat (category)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 11. Projects & Showcase
DROP TABLE IF EXISTS projects;
CREATE TABLE projects (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(200) NOT NULL,
    slug VARCHAR(200) NOT NULL UNIQUE,
    client_org VARCHAR(150) DEFAULT 'Technical Training Wing',
    category VARCHAR(100) DEFAULT 'Engineering Prototyping',
    objective TEXT NOT NULL,
    problem_statement TEXT NOT NULL,
    solution_summary TEXT NOT NULL,
    material_used VARCHAR(100) NOT NULL,
    print_time_hours DECIMAL(6,2) DEFAULT 0.00,
    filament_weight_grams DECIMAL(8,2) DEFAULT 0.00,
    layer_height_mm DECIMAL(4,2) DEFAULT 0.20,
    infill_percent INT DEFAULT 20,
    nozzle_temp_c INT DEFAULT 210,
    bed_temp_c INT DEFAULT 60,
    results_summary LONGTEXT NOT NULL,
    lessons_learned LONGTEXT NOT NULL,
    image_url VARCHAR(255) NULL,
    is_featured TINYINT(1) DEFAULT 0,
    sort_order INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 12. Project Development Journey (13 Stages)
DROP TABLE IF EXISTS project_development_stages;
CREATE TABLE project_development_stages (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    stage_number INT NOT NULL UNIQUE,
    title VARCHAR(150) NOT NULL,
    slug VARCHAR(150) NOT NULL UNIQUE,
    phase_name VARCHAR(100) NOT NULL,
    summary TEXT NOT NULL,
    detailed_description LONGTEXT NOT NULL,
    key_challenges LONGTEXT NOT NULL,
    solutions_implemented LONGTEXT NOT NULL,
    outcomes LONGTEXT NOT NULL,
    image_url VARCHAR(255) NULL,
    sort_order INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 13. Downloadable Resources
DROP TABLE IF EXISTS learning_resources;
CREATE TABLE learning_resources (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(200) NOT NULL,
    slug VARCHAR(200) NOT NULL UNIQUE,
    category VARCHAR(100) NOT NULL,
    file_type VARCHAR(20) DEFAULT 'PDF',
    file_size_mb DECIMAL(5,2) DEFAULT 1.00,
    download_url VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    is_active TINYINT(1) DEFAULT 1,
    downloads_count INT UNSIGNED DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 14. Quizzes & Interactive Assessment
DROP TABLE IF EXISTS quiz_answers;
DROP TABLE IF EXISTS quiz_questions;
DROP TABLE IF EXISTS quizzes;

CREATE TABLE quizzes (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(200) NOT NULL,
    slug VARCHAR(200) NOT NULL UNIQUE,
    category VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    duration_mins INT DEFAULT 15,
    passing_score INT DEFAULT 70,
    is_active TINYINT(1) DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE quiz_questions (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    quiz_id INT UNSIGNED NOT NULL,
    question_text TEXT NOT NULL,
    explanation TEXT NOT NULL,
    points INT DEFAULT 10,
    sort_order INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_q_quiz FOREIGN KEY (quiz_id) REFERENCES quizzes (id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE quiz_answers (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    question_id INT UNSIGNED NOT NULL,
    answer_text TEXT NOT NULL,
    is_correct TINYINT(1) DEFAULT 0,
    sort_order INT DEFAULT 0,
    CONSTRAINT fk_a_question FOREIGN KEY (question_id) REFERENCES quiz_questions (id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 15. Glossary Terms
DROP TABLE IF EXISTS glossary_terms;
CREATE TABLE glossary_terms (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    term VARCHAR(100) NOT NULL,
    slug VARCHAR(100) NOT NULL UNIQUE,
    letter CHAR(1) NOT NULL,
    short_definition VARCHAR(255) NOT NULL,
    detailed_explanation LONGTEXT NOT NULL,
    category VARCHAR(100) DEFAULT 'FDM Technology',
    related_terms VARCHAR(255) NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_glossary_letter (letter),
    FULLTEXT KEY ft_glossary (term, short_definition, detailed_explanation)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 16. FAQs
DROP TABLE IF EXISTS faqs;
CREATE TABLE faqs (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(100) NOT NULL,
    question VARCHAR(255) NOT NULL,
    answer LONGTEXT NOT NULL,
    sort_order INT DEFAULT 0,
    is_published TINYINT(1) DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_faq_cat (category)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 17. Contact Inquiries
DROP TABLE IF EXISTS contact_messages;
CREATE TABLE contact_messages (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    organization VARCHAR(150) NULL,
    subject VARCHAR(200) NOT NULL,
    message LONGTEXT NOT NULL,
    is_read TINYINT(1) DEFAULT 0,
    admin_notes TEXT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 18. Media Library
DROP TABLE IF EXISTS media_library;
CREATE TABLE media_library (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    file_type VARCHAR(50) NOT NULL,
    file_size INT UNSIGNED NOT NULL,
    mime_type VARCHAR(100) NOT NULL,
    alt_text VARCHAR(255) NULL,
    uploaded_by INT UNSIGNED NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_media_user FOREIGN KEY (uploaded_by) REFERENCES admins (id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 19. Audit Logs
DROP TABLE IF EXISTS audit_logs;
CREATE TABLE audit_logs (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    admin_id INT UNSIGNED NULL,
    admin_name VARCHAR(100) NOT NULL,
    action VARCHAR(50) NOT NULL,
    module VARCHAR(50) NOT NULL,
    record_id INT UNSIGNED NULL,
    details TEXT NULL,
    ip_address VARCHAR(45) NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_audit_module (module),
    INDEX idx_audit_action (action)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

SET FOREIGN_KEY_CHECKS = 1;
