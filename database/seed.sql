-- ==============================================================================
-- FDM 3D PRINTER TECHNICAL TRAINING & LEARNING PORTAL
-- Seed Data (Production-Grade Technical Content)
-- ==============================================================================

SET FOREIGN_KEY_CHECKS = 0;

-- 1. Roles & Permissions
INSERT INTO roles (id, name, slug, description) VALUES
(1, 'Super Administrator', 'super-admin', 'Full system access, user management, and portal configuration'),
(2, 'Content Administrator', 'content-admin', 'Management of articles, projects, media, and galleries'),
(3, 'Training Content Administrator', 'training-admin', 'Management of training modules, lessons, quizzes, glossary, and FAQs'),
(4, 'Technical Editor', 'editor', 'Review, draft, and edit technical documentation and learning materials');

INSERT INTO permissions (id, name, slug, module, description) VALUES
(1, 'Manage System Settings', 'manage-settings', 'settings', 'Configure portal and printer technical parameters'),
(2, 'Manage Admin Users', 'manage-users', 'users', 'Create and manage administrative accounts and roles'),
(3, 'Manage Articles', 'manage-articles', 'articles', 'Create, edit, and publish technical articles'),
(4, 'Manage Training Modules', 'manage-training', 'training', 'Create and organize training curriculum and lessons'),
(5, 'Manage Components', 'manage-components', 'components', 'Manage printer component technical database'),
(6, 'Manage Materials', 'manage-materials', 'materials', 'Manage 3D printing material specifications'),
(7, 'Manage Troubleshooting', 'manage-troubleshooting', 'troubleshooting', 'Manage diagnostic matrix and solutions'),
(8, 'Manage Media & Gallery', 'manage-media', 'media', 'Upload and organize media and gallery images'),
(9, 'Manage Videos', 'manage-videos', 'videos', 'Manage video training library'),
(10, 'Manage Projects', 'manage-projects', 'projects', 'Publish practical project showcases and case studies'),
(11, 'Manage Quizzes', 'manage-quizzes', 'quizzes', 'Create quizzes, questions, and scoring criteria'),
(12, 'Manage Glossary & FAQs', 'manage-glossary-faqs', 'glossary', 'Manage technical glossary and FAQ repository'),
(13, 'View Audit Logs', 'view-audit-logs', 'audit', 'Inspect administrative action and security logs');

-- Super Admin gets all permissions
INSERT INTO role_permissions (role_id, permission_id) VALUES
(1,1),(1,2),(1,3),(1,4),(1,5),(1,6),(1,7),(1,8),(1,9),(1,10),(1,11),(1,12),(1,13),
(2,3),(2,5),(2,6),(2,8),(2,9),(2,10),
(3,4),(3,7),(3,11),(3,12),
(4,3),(4,12);

-- 2. Default Administrator Account (Password: admin123)
-- Hash generated using password_hash('admin123', PASSWORD_BCRYPT)
INSERT INTO admins (id, role_id, username, email, password_hash, full_name, designation, is_active) VALUES
(1, 1, 'admin', 'admin@3dtraining.slaf.gov.lk', '$2y$10$Nsv0yqdSa9L/MMSiwpdpvOsKYsl0xe4fvPmAh0yEe6/flExgHuJ4.', 'Lead Technical Training Officer', 'Chief Project Engineer & Lead Instructor', 1),
(2, 3, 'instructor', 'instructor@3dtraining.slaf.gov.lk', '$2y$10$Nsv0yqdSa9L/MMSiwpdpvOsKYsl0xe4fvPmAh0yEe6/flExgHuJ4.', 'Senior Technical Instructor', 'Additive Manufacturing Specialist', 1);

-- 3. Site Settings & Printer Module Specifications
INSERT INTO site_settings (setting_key, setting_value, setting_group, field_type, label, description) VALUES
('site_name', 'FDM 3D Printer Technical Training Module', 'general', 'text', 'Portal Title', 'Official title of the training platform'),
('site_subtitle', 'DESIGN AND FABRICATION OF A FUSED DEPOSITION MODELING (FDM) 3D PRINTER MODULE FOR TECHNICAL TRAINING', 'general', 'textarea', 'Project Full Title', 'Full engineering project research title'),
('site_tagline', 'Learn. Design. Print. Innovate.', 'general', 'text', 'Portal Tagline', 'Motivational technical tagline'),
('project_org', 'Technical Training Wing / Aeronautical Engineering Support', 'general', 'text', 'Organization / Department', 'Host institutional entity'),
('contact_email', 'training.fdm@slaf.gov.lk', 'contact', 'email', 'Official Support Email', 'Inquiries and trainee support'),
('contact_phone', '+94 11 244 1044 (Ext. 3450)', 'contact', 'text', 'Contact Phone Number', 'Technical workshop extension'),
('contact_location', 'Aeronautical Engineering & Technical Training Center, Sri Lanka Air Force Base Katunayake', 'contact', 'text', 'Workshop Location', 'Physical fabrication and testing facility'),
('hero_announcement', 'Complete Interactive Training Module & Engineering Knowledge Portal is Now Live', 'general', 'text', 'Hero Banner Alert', 'Top announcement banner text'),
('enable_registration', '0', 'general', 'boolean', 'Public Trainee Registration', 'Enable or disable open public registration'),
('maintenance_mode', '0', 'general', 'boolean', 'Maintenance Mode', 'Put platform into maintenance mode');

INSERT INTO printer_specifications (id, spec_name, spec_key, spec_value, unit, category, is_highlight, sort_order) VALUES
(1, 'Printing Technology', 'tech_type', 'Fused Deposition Modeling (FDM / FFF)', '', 'Core', 1, 1),
(2, 'Build Volume (X × Y × Z)', 'build_volume', '220 × 220 × 250', 'mm', 'Mechanical', 1, 2),
(3, 'Layer Height Resolution', 'layer_height', '0.05 – 0.32', 'mm', 'Performance', 1, 3),
(4, 'Nozzle Diameter', 'nozzle_diameter', '0.4 (Interchangeable 0.2-0.8)', 'mm', 'Extrusion', 1, 4),
(5, 'Maximum Hotend Temperature', 'max_hotend_temp', '260', '°C', 'Thermal', 1, 5),
(6, 'Maximum Heated Bed Temperature', 'max_bed_temp', '100', '°C', 'Thermal', 1, 6),
(7, 'Filament Diameter', 'filament_diameter', '1.75', 'mm', 'Material', 1, 7),
(8, 'Supported Printing Materials', 'supported_materials', 'PLA, PETG, ABS, TPU (Flexible)', '', 'Material', 1, 8),
(9, 'Motion System Architecture', 'motion_system', 'Cartesian X-Z Gantry / Y-Bed Bed-Slinger', '', 'Mechanical', 0, 9),
(10, 'Frame Structure', 'frame_structure', 'Modular 2020/2040 V-Slot Aluminum Extrusion', '', 'Mechanical', 0, 10),
(11, 'Stepper Motor Drive', 'stepper_motors', 'NEMA 17 (1.8° step angle / 200 steps/rev)', '', 'Electronics', 0, 11),
(12, 'Microstepping Drivers', 'stepper_drivers', 'TMC2208 / TMC2209 Ultra-Silent StealthChop', '', 'Electronics', 0, 12),
(13, 'Mainboard / Microcontroller', 'controller_board', '32-Bit ARM Cortex-M4 Processing Architecture', '', 'Electronics', 1, 13),
(14, 'Control Firmware', 'firmware', 'Marlin 2.1.x / Klipper Capable with Thermal Runaway Protection', '', 'Software', 1, 14),
(15, 'Leveling System', 'leveling_system', 'Manual 4-Point Spring Assisted + BLTouch Ready', '', 'Operation', 0, 15),
(16, 'Power Supply Unit', 'power_supply', 'MeanWell 24V DC / 350W High-Efficiency PSU', '', 'Electrical', 0, 16),
(17, 'Maximum Travel Speed', 'max_travel_speed', '150', 'mm/s', 'Performance', 0, 17),
(18, 'Recommended Print Speed', 'recommended_speed', '50 – 80', 'mm/s', 'Performance', 0, 18),
(19, 'Slicing Software Compatibility', 'slicer_compat', 'UltiMaker Cura, PrusaSlicer, OrcaSlicer', '', 'Software', 0, 19),
(20, 'Print File Input Interfaces', 'interfaces', 'MicroSD Card, USB Serial, Direct Host Control', '', 'Connectivity', 0, 20);

-- 4. Article Categories & High-Impact Technical Articles
INSERT INTO article_categories (id, name, slug, description, sort_order) VALUES
(1, '3D Printing Fundamentals', 'fundamentals', 'Foundational principles of additive manufacturing and engineering concepts', 1),
(2, 'FDM Technology & Mechanics', 'fdm-technology', 'Deep technical dive into Fused Deposition Modeling principles and mechanics', 2),
(3, 'CAD & Slicing Engineering', 'cad-slicing', 'Computer Aided Design modeling, mesh generation, slicing parameters, and G-code', 3),
(4, 'Materials & Polymer Science', 'materials-science', 'Filament properties, thermal glass transition, tensile strength, and storage', 4),
(5, 'Operational SOPs & Safety', 'safety-sops', 'Standard operating procedures, electrical/thermal hazard control, and PPE', 5),
(6, 'Maintenance & Diagnostics', 'maintenance-diagnostics', 'Preventative maintenance schedules, calibration, PID tuning, and failure recovery', 6);

INSERT INTO articles (id, category_id, title, slug, summary, content, featured_image, reading_time_mins, difficulty_level, is_featured, is_published, views_count, created_by) VALUES
(1, 1, 'Introduction to 3D Printing & Additive Manufacturing', 'introduction-to-3d-printing', 'Discover how additive manufacturing transforms digital CAD designs into physical engineering components layer by layer, revolutionizing modern technical workflows.', 
'<h2>The Additive Manufacturing Paradigm</h2>
<p>Additive Manufacturing (AM), popularly recognized as 3D printing, represents a transformative industrial manufacturing paradigm. Unlike traditional subtractive methods (milling, turning, grinding) where material is progressively cut away from a raw billet, additive manufacturing builds parts from the ground up, adding material layer by successive layer until the complete geometry is realized.</p>

<h3>Core Principles of Additive Manufacturing</h3>
<ul>
    <li><strong>Digital-to-Physical Workflow:</strong> Begins with a 3D CAD model converted to triangular mesh format (STL/3MF), which is digitally sliced into discrete horizontal planar cross-sections.</li>
    <li><strong>Geometric Freedom:</strong> Eliminates tooling constraints, allowing complex internal channels, organic lattice structures, and topological optimization that are impossible to machine traditionally.</li>
    <li><strong>Zero Tooling Overhead:</strong> No specialized fixtures, jigs, or custom tooling dies are required before producing the first prototype, drastically reducing development lead times from months to hours.</li>
    <li><strong>Material Efficiency:</strong> Raw material is only deposited where the part geometry requires it, yielding significant scrap reduction compared to subtractive machining.</li>
</ul>

<h3>Comparison: Additive vs. Subtractive vs. Formative Manufacturing</h3>
<table class="w-full text-left border-collapse my-4">
    <thead>
        <tr class="border-b border-slate-700 bg-slate-800/60 text-slate-200">
            <th class="p-3">Characteristic</th>
            <th class="p-3">Additive (3D Printing)</th>
            <th class="p-3">Subtractive (CNC Machining)</th>
            <th class="p-3">Formative (Injection Molding)</th>
        </tr>
    </thead>
    <tbody class="divide-y divide-slate-800 text-slate-300">
        <tr>
            <td class="p-3 font-semibold">Material Usage</td>
            <td class="p-3">High efficiency (minimal waste)</td>
            <td class="p-3">High scrap rate (up to 80% waste)</td>
            <td class="p-3">High efficiency in mass production</td>
        </tr>
        <tr>
            <td class="p-3 font-semibold">Setup / Tooling Cost</td>
            <td class="p-3">Virtually Zero ($0 tooling)</td>
            <td class="p-3">Moderate (fixtures, end mills)</td>
            <td class="p-3">Very High ($5,000–$50,000+ for dies)</td>
        </tr>
        <tr>
            <td class="p-3 font-semibold">Lead Time for 1 Unit</td>
            <td class="p-3">1 to 24 Hours</td>
            <td class="p-3">1 to 7 Days</td>
            <td class="p-3">Weeks to Months</td>
        </tr>
        <tr>
            <td class="p-3 font-semibold">Geometric Complexity</td>
            <td class="p-3">Infinite (undercuts, lattices)</td>
            <td class="p-3">Restricted by tool access</td>
            <td class="p-3">Restricted by draft angles & split lines</td>
        </tr>
    </tbody>
</table>

<h3>Significance in Modern Engineering & Technical Training</h3>
<p>For technical personnel and engineering trainees, understanding additive manufacturing bridges the gap between conceptual CAD design and physical verification. It fosters an intuitive comprehension of mechanical tolerances, dimensional accuracy, structural stress paths, and rapid iterative problem solving.</p>',
'assets/images/articles/fundamentals-hero.jpg', 6, 'Beginner', 1, 1, 142, 1),

(2, 2, 'How Fused Deposition Modeling (FDM) Printers Work: The Thermal & Mechanical Cycle', 'how-fdm-printers-work', 'An engineering examination of thermoplastic extrusion, melt-zone thermodynamics, volumetric flow rate, and inter-layer bonding mechanisms in FDM systems.',
'<h2>The Physics and Mechanics of FDM Technology</h2>
<p>Fused Deposition Modeling (FDM)—also termed Fused Filament Fabrication (FFF)—operates on the principle of thermal extrusion of thermoplastic filaments through a heated orifice, depositing continuous viscous tracks onto a build surface along computer-guided toolpaths.</p>

<h3>The 8-Stage Thermal & Mechanical Cycle</h3>
<ol>
    <li><strong>Mechanical Filament Drive:</strong> A stepper motor drives a knurled hobbed gear against an idler bearing, exerting axial mechanical thrust on the 1.75mm solid filament.</li>
    <li><strong>Cold Zone Heat Sink Isolation:</strong> The filament travels through a PTFE-lined or all-metal heat sink kept cool by continuous fan airflow. This prevents "heat creep," where filament softens prematurely before reaching the melt chamber.</li>
    <li><strong>Heat Break Thermal Transition:</strong> A thin-walled throat with low thermal conductivity isolates the high-temperature heater block from the upper cold zone.</li>
    <li><strong>Melt Zone Phase Transition:</strong> Inside the brass or hardened steel heater block, the cartridge heater raises polymer temperatures above its glass transition ($T_g$) and melt temperature ($T_m$), converting the solid filament into a non-Newtonian viscous fluid.</li>
    <li><strong>Nozzle Constriction & Extrusion:</strong> The solid filament entering the top acts as a hydraulic piston, forcing molten plastic through the calibrated 0.4mm nozzle orifice.</li>
    <li><strong>Substrate & Layer Deposition:</strong> The X, Y, and Z Cartesian axes coordinate motion to place the molten bead at exact coordinates ($X, Y, Z$) on the build plate.</li>
    <li><strong>Polymer Chain Interdiffusion & Bonding:</strong> Thermal energy from the freshly deposited bead partially remelts the previous solid layer beneath it. Polymer chains diffuse across the interface, forming molecular bonds upon cooling.</li>
    <li><strong>Forced Convection Cooling:</strong> A dedicated part cooling fan rapidly directs laminar airflow at the newly deposited bead, solidifying the geometry before gravitational sag or thermal deformation occurs.</li>
</ol>

<div class="my-6 p-4 rounded-xl bg-blue-950/40 border border-blue-800/60">
    <h4 class="text-blue-400 font-semibold mb-2">Key Engineering Metric: Volumetric Flow Rate ($Q$)</h4>
    <p class="text-slate-300 text-sm">Volumetric flow rate represents how much molten plastic the hotend can melt and extrude per second:</p>
    <p class="font-mono text-cyan-400 my-2 text-center text-base">Q = Layer Height (mm) × Extrusion Width (mm) × Print Speed (mm/s)</p>
    <p class="text-slate-400 text-xs">Standard V6 hotends comfortably achieve 10–12 mm³/s. Exceeding this limit causes under-extrusion, stepper motor skipping, and severe delamination.</p>
</div>',
'assets/images/articles/fdm-mechanics.jpg', 8, 'Intermediate', 1, 1, 218, 1),

(3, 3, 'Mastering Slicing Parameters: Layer Height, Infill Geometry, and Wall Thickness', 'mastering-slicing-parameters', 'In-depth guide to slicer configuration: optimizing anisotropic tensile strength, surface finish, structural infill patterns, and print duration.',
'<h2>The Bridge Between CAD and Hardware: Slicing Software</h2>
<p>A 3D slicer converts geometric triangular polygon meshes (STL/3MF) into numerical machine instructions known as G-code. Mastering key slicing parameters is essential to producing dimensionally accurate, robust engineering parts.</p>

<h3>1. Layer Height Resolution</h3>
<p>Layer height determines vertical Z-axis resolution and surface smoothness versus total fabrication time.</p>
<ul>
    <li><strong>0.12 mm (Fine Detail):</strong> Exceptional surface finish, minimal "stair-stepping" on shallow slopes. Ideal for precision mating threads, gauges, and aesthetic visual models. Print time is ~2.5x longer.</li>
    <li><strong>0.20 mm (Standard Engineering):</strong> Optimal balance between structural layer adhesion, dimensional tolerance, and production speed. Suitable for 85% of technical fixtures.</li>
    <li><strong>0.28 mm (Draft / Rapid Prototyping):</strong> High volumetric efficiency. Ideal for rapid dimensional validation fit checks and bulky non-structural mockups.</li>
</ul>

<h3>2. Shells, Perimeters & Wall Thickness</h3>
<p>In FDM 3D printing, <strong>walls provide over 75% of overall tensile and flexural strength</strong>, far more than infill density alone. For load-bearing mechanical parts, always increase wall count (perimeters) to 4–6 shells (1.6mm–2.4mm wall thickness) before increasing infill.</p>

<h3>3. Structural Infill Patterns & Density</h3>
<ul>
    <li><strong>Gyroid:</strong> Provides isotropic strength in all 3 axes (X, Y, Z), eliminates internal directional shear planes, and facilitates fluid drainage for technical enclosures. Highly recommended.</li>
    <li><strong>Honeycomb:</strong> Excellent compressive strength perpendicular to the build plane.</li>
    <li><strong>Grid / Rectilinear:</strong> Fastest print times, suitable for simple spacers and non-critical cosmetic parts.</li>
</ul>',
'assets/images/articles/slicing-guide.jpg', 7, 'Intermediate', 0, 1, 95, 1),

(4, 4, 'Comprehensive Filament Guide: PLA, PETG, ABS, and TPU Engineering Properties', 'comprehensive-filament-guide', 'Compare mechanical properties, glass transition temperatures, chemical resistance, shrinkage rates, and print guidelines for the 4 core FDM thermoplastics.',
'<h2>Polymer Selection for Additive Engineering</h2>
<p>Selecting the appropriate thermoplastic filament is a decisive engineering step based on environmental temperature, mechanical load, impact exposure, UV radiation, and chemical contact.</p>

<h3>Detailed Material Comparison</h3>
<table class="w-full text-left border-collapse my-4">
    <thead>
        <tr class="border-b border-slate-700 bg-slate-800/60 text-slate-200">
            <th class="p-3">Property</th>
            <th class="p-3">PLA (Polylactic Acid)</th>
            <th class="p-3">PETG (Polyethylene Glycol)</th>
            <th class="p-3">ABS (Acrylonitrile Butadiene)</th>
            <th class="p-3">TPU (Thermoplastic Polyurethane)</th>
        </tr>
    </thead>
    <tbody class="divide-y divide-slate-800 text-slate-300">
        <tr>
            <td class="p-3 font-semibold">Nozzle Temperature</td>
            <td class="p-3">190 – 215 °C</td>
            <td class="p-3">230 – 250 °C</td>
            <td class="p-3">235 – 255 °C</td>
            <td class="p-3">210 – 230 °C</td>
        </tr>
        <tr>
            <td class="p-3 font-semibold">Bed Temperature</td>
            <td class="p-3">50 – 60 °C (or unheated)</td>
            <td class="p-3">70 – 85 °C</td>
            <td class="p-3">90 – 105 °C</td>
            <td class="p-3">40 – 60 °C</td>
        </tr>
        <tr>
            <td class="p-3 font-semibold">Glass Transition ($T_g$)</td>
            <td class="p-3">~55 – 60 °C (Low)</td>
            <td class="p-3">~75 – 80 °C (Medium)</td>
            <td class="p-3">~105 °C (High)</td>
            <td class="p-3">-20 to 50 °C (Flexible)</td>
        </tr>
        <tr>
            <td class="p-3 font-semibold">Tensile Strength</td>
            <td class="p-3">High (~50-60 MPa)</td>
            <td class="p-3">Moderate-High (~45 MPa)</td>
            <td class="p-3">Moderate (~40 MPa)</td>
            <td class="p-3">High Elongation (>450%)</td>
        </tr>
        <tr>
            <td class="p-3 font-semibold">Impact Resistance</td>
            <td class="p-3">Brittle (Low)</td>
            <td class="p-3">High Ductility</td>
            <td class="p-3">Very High Impact</td>
            <td class="p-3">Extremely High Shock Absorber</td>
        </tr>
        <tr>
            <td class="p-3 font-semibold">Enclosure Requirement</td>
            <td class="p-3">Not Needed (Open frame)</td>
            <td class="p-3">Recommended, not mandatory</td>
            <td class="p-3">Mandatory (Prevents warp)</td>
            <td class="p-3">Not Needed</td>
        </tr>
    </tbody>
</table>',
'assets/images/articles/materials-hero.jpg', 9, 'Intermediate', 1, 1, 184, 1),

(5, 5, '3D Printing Laboratory Safety Protocols & Risk Mitigation', 'laboratory-safety-protocols', 'Standard institutional safety procedures: mitigating hot-end burn hazards, electrical runaway risks, mechanical pinch points, and ultrafine particle (UFP) emissions.',
'<h2>Institutional Health and Safety Guidelines</h2>
<p>While desktop FDM 3D printers are safe when operated under standard protocols, their combined high temperatures (up to 260°C), active 24V/15A electrical circuits, moving axes, and molten polymer emissions demand disciplined adherence to safety standards.</p>

<h3>1. Thermal Hazard Management</h3>
<ul>
    <li><strong>Hotend Surface Temperature (200°C–260°C):</strong> Can cause severe third-degree contact burns within milliseconds. Never touch the nozzle, heater block, or heat break during or immediately following operation.</li>
    <li><strong>Heated Bed Surface (60°C–100°C):</strong> Allow the build platform to cool below 35°C before attempting part removal. This also prevents part deformation during release.</li>
    <li><strong>Thermal Runaway Protection (TRP):</strong> Always verify that firmware firmware-level Thermal Runaway Protection is active in Marlin/Klipper. TRP shuts down power to heater cartridges if thermistor feedback decouples from expected temperature rises.</li>
</ul>

<h3>2. Electrical and Fire Prevention</h3>
<ul>
    <li>Ensure all high-current connections (heated bed, hotend MOSFETs) use ferrules instead of tinned bare copper wires in terminal blocks to prevent creeping resistance and thermal meltdowns.</li>
    <li>Ensure a dedicated Class C/ABC fire extinguisher is accessible in the workshop facility.</li>
    <li>Never leave prototype or high-temperature ABS prints unattended during initial layer deposition without active smoke detection and power interlocks.</li>
</ul>

<h3>3. Airborne Emissions & Ventilation</h3>
<p>Melting thermoplastics emit volatile organic compounds (VOCs) and ultrafine particles (UFPs). When printing Styrenics (ABS, ASA), active fume extraction or HEPA/activated-carbon filtration must be engaged.</p>',
'assets/images/articles/safety-protocols.jpg', 5, 'Beginner', 0, 1, 87, 1),

(6, 1, 'Why 3D Printing is Critical in Modern Technical & Engineering Training', 'importance-in-technical-training', 'Explore how hands-on additive manufacturing bridges the gap between mechanical engineering, electronics, computer science, and practical prototyping.',
'<h2>Connecting Theoretical Engineering to Practical Reality</h2>
<p>Traditional technical training often isolates subjects: mechanical mechanisms in one classroom, electrical circuits in a lab, and CAD software in a computer room. Developing and operating a modular FDM 3D printer creates a uniquely comprehensive multidisciplinary capstone platform.</p>

<h3>1. Mechanical Engineering Competencies</h3>
<ul>
    <li><strong>Kinematics & Motion Systems:</strong> Trainees study Cartesian coordinate kinematics, lead-screw pitch transmission ($T8 \times 8$), timing belt tensioning, and linear rail preload mechanics.</li>
    <li><strong>Tolerancing and Metrology:</strong> Learners use vernier calipers and micrometer gauges to measure dimensional accuracy ($X, Y, Z$) and calculate shrinkage factors.</li>
</ul>

<h3>2. Electrical & Electronics Mastery</h3>
<ul>
    <li><strong>Stepper Motor Drivers & PWM Control:</strong> Understanding microstepping resolution ($1/16$, $1/32$), VREF voltage tuning on TMC drivers, Pulse-Width Modulation for PID temperature regulation, and NTC 100K thermistor resistance curves.</li>
    <li><strong>Power Distribution & Safety:</strong> Sizing switching power supplies, wire gauges ($AWG 14$ for beds, $AWG 20$ for heaters), and implementing endstop optical/mechanical interrupt logic.</li>
</ul>

<h3>3. Software & Embedded Automation</h3>
<ul>
    <li><strong>G-Code Compilation:</strong> Understanding machine coordinate frames ($G90/G91$), tool motion commands ($G0/G1$), homing routines ($G28$), and firmware parameter tuning via EEPROM ($M500$).</li>
</ul>',
'assets/images/articles/technical-training.jpg', 6, 'Beginner', 1, 1, 310, 1);

-- 5. Structured Training Curriculum Modules & Lessons
INSERT INTO training_modules (id, module_number, title, slug, description, estimated_hours, difficulty_level, icon, sort_order) VALUES
(1, 1, 'Module 01: Introduction to Additive Manufacturing & FDM', 'module-01-intro-to-additive-manufacturing', 'Foundational concepts, history, additive vs subtractive workflows, and industrial relevance.', '2.5 Hours', 'Beginner', 'fa-layer-group', 1),
(2, 2, 'Module 02: FDM Printer Architecture & Component Anatomy', 'module-02-printer-architecture-components', 'Detailed breakdown of mechanical, electrical, thermal, and extrusion sub-assemblies.', '3.5 Hours', 'Beginner', 'fa-cogs', 2),
(3, 3, 'Module 03: CAD Design for Additive Manufacturing (DfAM)', 'module-03-cad-design-for-am', '3D modeling considerations, overhang limits, wall thickness, tolerances, and export standards.', '4.0 Hours', 'Intermediate', 'fa-drafting-compass', 3),
(4, 4, 'Module 04: Slicing Software Mastery & G-Code Generation', 'module-04-slicing-software-gcode', 'Mastering parameters in Cura/PrusaSlicer, infill mathematics, support strategies, and G-code analysis.', '3.0 Hours', 'Intermediate', 'fa-sliders-h', 4),
(5, 5, 'Module 05: Thermoplastic Materials & Filament Science', 'module-05-materials-filament-science', 'Polymer thermal behavior, PLA, PETG, ABS, TPU properties, hygroscopic drying, and bed adhesion.', '2.5 Hours', 'Intermediate', 'fa-flask', 5),
(6, 6, 'Module 06: Standard Operating Procedures & Machine Operation', 'module-06-standard-operating-procedures', '19-step standard operating procedure from pre-flight bed leveling to post-print QA inspection.', '3.5 Hours', 'Beginner', 'fa-play-circle', 6),
(7, 7, 'Module 07: Workshop Safety Protocols & Hazard Control', 'module-07-safety-hazard-control', 'Thermal, electrical, mechanical, and emission safety standards in technical training environments.', '2.0 Hours', 'Beginner', 'fa-shield-alt', 7),
(8, 8, 'Module 08: Diagnostic Matrix & Root-Cause Troubleshooting', 'module-08-troubleshooting-diagnostics', 'Systematic diagnostic framework for print defects, mechanical failures, and thermal errors.', '4.5 Hours', 'Advanced', 'fa-wrench', 8);

INSERT INTO training_lessons (id, module_id, lesson_number, title, slug, summary, content, duration_mins, sort_order) VALUES
(1, 1, 1, 'What is Additive Manufacturing?', 'what-is-additive-manufacturing', 'Understanding the transition from 2D layers to 3D solid objects.', 
'<p>Additive manufacturing builds parts by adding material layer upon layer. Learn the digital workflow from concept CAD to final physical part.</p>
<h4>Key Takeaways:</h4>
<ul>
    <li>Fundamental definitions and ISO/ASTM 52900 standards</li>
    <li>The 7 recognized additive manufacturing process categories</li>
    <li>Why FDM is the most accessible and mechanically versatile for training</li>
</ul>', 20, 1),

(2, 1, 2, 'The 8-Step Additive Manufacturing Workflow', 'additive-manufacturing-workflow', 'The complete chain from CAD design, STL export, slicing, to final post-curing.', 
'<p>Explore the end-to-end lifecycle of an engineered 3D printed component. Master file validation, geometric healing, and slicing toolpaths.</p>', 25, 2),

(3, 2, 1, 'Cartesian Motion Systems and Kinematics', 'cartesian-motion-systems', 'Kinematics of X, Y, and Z axes, lead screws, and GT2 timing belts.', 
'<p>Detailed breakdown of Cartesian gantry mechanics: NEMA 17 steppers, belt tensioning, eccentric nut adjustment on V-slot wheels, and orthogonal alignment.</p>', 30, 1),

(4, 2, 2, 'Extrusion System: Cold End, Heat Break, and Hotend', 'extrusion-system-anatomy', 'Comprehensive study of Bowden vs Direct Drive and melt-zone thermodynamics.', 
'<p>Understand the precise thermal gradient maintained between the 40°C cold sink and the 240°C heater block, preventing clogging and heat creep.</p>', 35, 2),

(5, 6, 1, 'Pre-Flight Inspection & Bed Leveling Calibration', 'pre-flight-bed-leveling', 'How to execute manual paper test calibration and establish accurate Z-offset.', 
'<p>Step-by-step guidance on establishing the critical 0.1mm gap between the nozzle and build plate across all 4 adjustment corners.</p>', 25, 1),

(6, 6, 2, 'First Layer Observation & Real-Time Z-Babystepping', 'first-layer-observation', 'Diagnosing first-layer squish, under-extrusion, and bed adhesion in real-time.', 
'<p>Learn to visually assess first layer bead width, squish ratio, and use micro-Z babystepping to guarantee bed adhesion without scarring the build sheet.</p>', 20, 2),

(7, 8, 1, 'Root Cause Analysis: Stringing, Oozing & Retraction Tuning', 'troubleshooting-stringing-retraction', 'Eliminating filament wisps through retraction distance, speed, and temperature calibration.', 
'<p>Understand viscoelastic polymer behavior in the melt zone and generate retraction test towers to achieve clean, string-free travel moves.</p>', 30, 1),

(8, 8, 2, 'Diagnosing Warping and Thermal Contraction in ABS & PETG', 'troubleshooting-warping-bed-adhesion', 'Mitigating anisotropic thermal contraction stresses that peel corners off the build plate.', 
'<p>Master the use of brims, rafts, chamber thermal retention, and PEI/textured build sheets to prevent catastrophic part detachment.</p>', 30, 2);

-- 6. Printer Components Database
INSERT INTO printer_components (id, category, name, slug, subtitle, working_principle, function_description, technical_specs, common_problems, maintenance_tips, safety_notes, image_url, sort_order, is_featured) VALUES
(1, 'Extrusion System', 'Hotend Assembly (Heater Block & Nozzle)', 'hotend-assembly', 'Thermal melting chamber & calibrated extrusion orifice', 
'Converts solid filament into molten thermoplastic by conducting heat from a 24V cartridge heater into a brass/copper block with precision thermistor feedback.',
'Maintains an exact melt zone temperature while restricting thermal conduction upwards into the filament intake path.',
'<ul><li>Heater Cartridge: 24V 40W Ceramic</li><li>Thermistor: NTC 100K 3950 Beta</li><li>Nozzle: 0.4mm Brass M6 Thread</li><li>Max Temperature: 260°C</li><li>Melt Zone Length: 12.5mm</li></ul>',
'<ul><li>Nozzle blockage due to degraded filament residue</li><li>Heat creep causing filament expansion in throat</li><li>Leakage around nozzle threads from cold tightening</li></ul>',
'<ul><li>Always tighten/swap nozzles at 240°C (hot tightening)</li><li>Perform regular atomic cold pulls with nylon filament</li><li>Check silicone heat sock for degradation</li></ul>',
'Hotend reaches 260°C. Never touch bare metal when powered. Allow 15 minutes of cool-down time before servicing.',
'assets/images/components/hotend.jpg', 1, 1),

(2, 'Mechanical', 'NEMA 17 Stepper Motors', 'nema-17-stepper-motors', 'Precision brushless DC digital positioning actuators', 
'Converts electrical pulse trains from stepper drivers into precise discrete mechanical angular shaft rotations without sensor feedback loops.',
'Drives the X, Y, and Z motion gantries as well as the extruder gear with repeatable sub-millimeter positional accuracy.',
'<ul><li>Step Angle: 1.8° (200 full steps/revolution)</li><li>Holding Torque: 40 N·cm (0.4 N·m)</li><li>Rated Current: 1.5A per phase</li><li>Phase Resistance: 2.0 Ω</li><li>Shaft Diameter: 5mm D-Cut</li></ul>',
'<ul><li>Skipped steps due to excessive gantry mechanical binding</li><li>Motor overheating caused by excessive driver VREF current</li><li>Loud high-frequency resonance on non-damped mounts</li></ul>',
'<ul><li>Inspect coupling grub screws for tightness</li><li>Check motor body temperature (<70°C during extended runs)</li><li>Ensure wiring harnesses have adequate strain relief</li></ul>',
'Motors can reach 60°C during long prints. Avoid touching casing during active operation.',
'assets/images/components/stepper-motor.jpg', 2, 1),

(3, 'Electronics & Control', '32-Bit ARM Control Board', '32bit-control-board', 'Central processing unit and real-time motion controller', 
'Executes real-time G-code motion planning algorithms (Bresenham step generation, junction deviation, PID temperature loops) via high-speed ARM Cortex processor.',
'Coordinates all input sensors (endstops, thermistors) and switches high-power outputs (MOSFETs for bed/hotend, stepper driver step/dir pulses).',
'<ul><li>MCU: 32-bit ARM Cortex-M4 168MHz</li><li>Flash Memory: 512KB</li><li>Driver Sockets: 4-5x Modular StepStick (UART enabled)</li><li>Input Voltage: 12V - 24V DC</li><li>EEPROM: 4KB Onboard Emulation</li></ul>',
'<ul><li>MOSFET short-circuit failure causing runaway heating</li><li>Blown fuses from reverse polarity or bed short</li><li>Firmware bootloader corruption</li></ul>',
'<ul><li>Ensure enclosure cooling fan runs continuously</li><li>Check all screw terminals for tight mechanical grip</li><li>Keep board clean of conductive metallic dust</li></ul>',
'Always disconnect main AC mains power before opening the control electronics enclosure.',
'assets/images/components/control-board.jpg', 3, 1),

(4, 'Thermal & Heated Bed', 'Aluminum Heated Build Platform (MK3 / Magnetic PEI)', 'heated-build-platform', 'Substrate thermal regulator for inter-layer adhesion', 
'Distributes uniform resistive Joule heating across an aluminum plate to maintain filament base layers above their glass transition temperature.',
'Prevents thermal contraction and uneven cooling stresses, ensuring the print firmly adheres to the bed without warping.',
'<ul><li>Operating Voltage: 24V DC</li><li>Power Rating: 220W (~9.1A)</li><li>Surface: Spring Steel Textured PEI Sheet</li><li>Dimensions: 235 × 235 mm (220 × 220 printable)</li><li>Heating Time: 25°C to 60°C in ~3 minutes</li></ul>',
'<ul><li>Uneven thermal spots due to uninsulated underside</li><li>Bed leveling drift from loosened leveling knobs</li><li>Scratched or degraded PEI coating from tool impact</li></ul>',
'<ul><li>Clean PEI surface with 99% Isopropyl Alcohol (IPA) before every print</li><li>Replace worn bed springs with stiff silicone spacers</li><li>Apply thermal insulation pad beneath aluminum bed</li></ul>',
'Bed reaches 100°C. Never place flammable solvents on a preheated surface.',
'assets/images/components/heated-bed.jpg', 4, 1),

(5, 'Mechanical', 'Dual Z-Axis Lead Screw System', 'dual-z-axis-leadscrew', 'Linear rotary-to-vertical translation drive', 
'Converts rotary motion of the Z stepper motor into precise vertical translation using precision ground stainless steel lead screws and brass nuts.',
'Ensures rigid, sag-free vertical movement of the X-gantry along the dual vertical Z-columns, eliminating gantry droop.',
'<ul><li>Thread Type: T8 × 8 (4 starts, 2mm pitch, 8mm lead)</li><li>Material: 304 Stainless Steel</li><li>Diameter: 8mm</li><li>Nut: Anti-backlash brass/POM nut</li></ul>',
'<ul><li>Z-wobble layer banding caused by bent lead screw</li><li>Z-binding causing horizontal squished layer artifacts</li><li>Gantry de-synchronization across dual lead screws</li></ul>',
'<ul><li>Clean lead screws with degreaser and apply PTFE dry lubricant</li><li>Verify flexible coupler alignment and grub screw torque</li><li>Check that lead screw rotates freely by hand without binding</li></ul>',
'Ensure fingers are clear of lead screw rotation zones during high-speed homing cycles.',
'assets/images/components/z-leadscrew.jpg', 5, 0),

(6, 'Extrusion System', 'Dual-Gear Direct Drive Extruder', 'direct-drive-extruder', 'Filament feeding and volumetric metering mechanism', 
'Two counter-rotating hardened steel hobbed gears grip the filament from both sides, eliminating slippage during high-speed retractions.',
'Directly pushes filament into the hotend heat break with minimal travel distance (under 20mm), offering superior control over flexible filaments.',
'<ul><li>Gear Ratio: 3:1 Planetary Gear Reduction</li><li>Drive Gears: Hardened Tool Steel (58 HRC)</li><li>Filament Compatibility: 1.75mm (PLA, PETG, ABS, TPU 85A-95A)</li><li>Drive Distance: Direct mount (<20mm to melt zone)</li></ul>',
'<ul><li>Filament grinding when nozzle is obstructed</li><li>Excessive tension deforming soft filaments like TPU</li><li>Debris clogging the teeth of the hobbed gears</li></ul>',
'<ul><li>Clean hobbed drive teeth with a small brass wire brush</li><li>Calibrate E-steps ($M92 E$) whenever adjusting tension</li><li>Ensure tension idler screw is calibrated for material hardness</li></ul>',
'Keep fingers clear of dual-drive gears during filament feed loading routines.',
'assets/images/components/extruder-gears.jpg', 6, 0);

-- 7. Printing Materials Database
INSERT INTO printing_materials (id, name, slug, code, material_type, description, print_temp_nozzle, print_temp_bed, print_speed, bed_adhesion, cooling_fan, tensile_strength, density, flexural_modulus, pros, cons, applications, storage_notes, safety_notes, sort_order) VALUES
(1, 'Polylactic Acid (PLA)', 'polylactic-acid-pla', 'PLA', 'Biodegradable Thermoplastic Polyester', 
'The premier training and rapid prototyping filament derived from renewable starches. Exceptional ease of printing with virtually zero warping.',
'190 – 215 °C', '45 – 60 °C', '50 – 100 mm/s', 'Smooth PEI, Glass with PVA glue, Painters tape', '100% (Continuous Forced Convection)',
'50 – 65 MPa', '1.24 g/cm³', '3.5 – 3.8 GPa',
'<ul><li>Extremely easy to print with minimal thermal warping</li><li>Crisp feature definition and excellent dimensional accuracy</li><li>Biodegradable and emits non-toxic sweet odor during extrusion</li><li>Low printing energy requirements (no high-temp bed needed)</li></ul>',
'<ul><li>Low heat deflection temperature ($T_g \approx 55^\circ\text{C}$); deforms in hot vehicles</li><li>Brittle under high impact and cyclic shock loads</li><li>Susceptible to UV degradation over long outdoor exposure</li></ul>',
'<ul><li>Educational proof-of-concept models and visual training aids</li><li>Architectural scale models and dimensional fit check gauges</li><li>Non-load-bearing prototype casings and conceptual mockups</li></ul>',
'Store in vacuum-sealed bags with desiccant silica gel. Relative humidity should remain below 20% to prevent brittle filament snapping.',
'Emits minimal lactide vapors. Ensure normal classroom/workshop ambient ventilation.', 1),

(2, 'Polyethylene Terephthalate Glycol (PETG)', 'petg-filament', 'PETG', 'Glycol-Modified Thermoplastic Co-Polyester', 
'Combines the ease of printing of PLA with the functional durability, chemical resistance, and thermal tolerance of ABS.',
'230 – 250 °C', '70 – 85 °C', '40 – 60 mm/s', 'Textured PEI sheet, Kapton tape (Avoid bare smooth glass)', '30 – 50% (Low to Moderate)',
'45 – 55 MPa', '1.27 g/cm³', '2.1 – 2.4 GPa',
'<ul><li>Superior inter-layer bonding strength and high tensile ductility</li><li>Excellent chemical resistance to acids, alkalis, and oils</li><li>Higher thermal resistance ($T_g \approx 80^\circ\text{C}$) than PLA</li><li>Low shrinkage and warping allows printing without enclosed chambers</li></ul>',
'<ul><li>Prone to stringing and oozing; requires meticulous retraction tuning</li><li>Adheres too aggressively to smooth glass, risking surface gouging</li><li>Hygroscopic; absorbs moisture rapidly from ambient air</li></ul>',
'<ul><li>Functional mechanical brackets, drone mounts, and robotic chassis</li><li>Water-resistant liquid containers and fluid conduit prototypes</li><li>Outdoor enclosures exposed to solar radiation and weather</li></ul>',
'Highly hygroscopic. Dry in a filament dehydrator at 65°C for 4–6 hours if popping/hissing noises occur during extrusion.',
'Non-toxic emissions. Ensure standard workshop ventilation.', 2),

(3, 'Acrylonitrile Butadiene Styrene (ABS)', 'abs-filament', 'ABS', 'Impact-Resistant Terpolymer', 
'A true engineering thermoplastic widely used in automotive and industrial housings. Offers outstanding impact resistance, machinability, and post-processing polish.',
'235 – 255 °C', '95 – 110 °C', '40 – 60 mm/s', 'Smooth PEI with ABS Slurry / Dimafix, Kapton Tape', '0% (Disabled completely to prevent cracking)',
'40 – 50 MPa', '1.04 g/cm³', '2.2 – 2.5 GPa',
'<ul><li>High temperature resistance ($T_g \approx 105^\circ\text{C}$)</li><li>High impact toughness and fatigue resistance</li><li>Easily sanded, drilled, tapped, and smoothed using acetone vapor</li><li>Lower density than PLA/PETG, producing lighter components</li></ul>',
'<ul><li>Severe thermal shrinkage (~0.8%) causes severe warping and split layers</li><li>Requires a fully enclosed thermal chamber ($40^\circ\text{C}\text{–}50^\circ\text{C}$)</li><li>Emits pungent styrene fumes during extrusion</li></ul>',
'<ul><li>Under-hood automotive components and drone protective bumpers</li><li>High-temperature electronic enclosures and snap-fit mechanisms</li><li>Tool handles, jigs, fixtures, and end-use mechanical prototypes</li></ul>',
'Store in airtight containers with dry desiccant packs. Pre-dry at 75°C for 4 hours prior to critical structural prints.',
'Emits Styrene vapors (VOCs). Mandates printing inside an enclosure with activated carbon filtration or direct exhaust ventilation.', 3),

(4, 'Thermoplastic Polyurethane (TPU 95A)', 'tpu-flexible-filament', 'TPU', 'Elastomeric Polyurethane Polymer', 
'A flexible, rubber-like filament engineered for extreme impact absorption, vibration dampening, and abrasion resistance.',
'215 – 235 °C', '40 – 60 °C', '20 – 35 mm/s', 'Blue Painters Tape, Textured PEI, Glue Stick barrier', '50 – 100% (High Part Cooling)',
'30 – 40 MPa (Shore 95A)', '1.21 g/cm³', 'Elongation at Break > 450%',
'<ul><li>Exceptional elasticity, shock absorption, and high impact damping</li><li>Outstanding resistance to grease, oils, abrasion, and industrial wear</li><li>Virtually unbreakable along layer lines due to phenomenal layer adhesion</li><li>Remains flexible at sub-zero temperatures</li></ul>',
'<ul><li>Difficult to print on Bowden setups; requires Direct Drive extruder</li><li>Slow print speeds mandatory (20–35 mm/s) to prevent filament buckling</li><li>Retraction must be minimal to avoid gear jamming</li></ul>',
'<ul><li>Vibration isolation mounts for drone avionics and sensitive sensors</li><li>Gaskets, O-rings, protective bumper boots, and flexible duct couplings</li><li>Robotic gripper fingers, ergonomic tool grips, and custom tread wheels</li></ul>',
'Extremely hygroscopic. Moisture creates micro-bubbles and severe stringing. Dry at 55°C for 6 hours before printing.',
'Zero toxic fumes emitted. Safe for open laboratory operation.', 4);

-- 8. Troubleshooting Matrix Database
INSERT INTO troubleshooting_issues (id, category, title, slug, symptom, severity, likely_causes, inspection_steps, corrective_actions, prevention_guidelines, sort_order) VALUES
(1, 'Adhesion & Warping', 'First Layer Detachment & Corner Warping', 'warping-first-layer-detachment', 
'Corners of the printed part curl upwards away from the build plate, leading to dimensional distortion or complete part detachment mid-print.', 'High',
'<ul><li>Bed temperature set too low for material thermal contraction curve</li><li>Nozzle-to-bed distance (Z-offset) too large, preventing proper line squish</li><li>Oily residue, dust, or fingerprints on the build platform surface</li><li>Ambient drafts or cold room airflow causing premature top layer shrinkage</li><li>First layer print speed excessive (>30 mm/s)</li></ul>',
'<ul><li>Inspect first layer line cross-section (should be elliptical/flat, not round beads)</li><li>Check bed surface with an infrared thermometer for temperature uniformity</li><li>Verify Z-offset gauge clearance using 0.10mm feeler gauge</li></ul>',
'<ul><li>Clean build surface thoroughly with 99% Isopropyl Alcohol (IPA)</li><li>Decrease Z-offset by -0.05mm increments until first layer lines merge seamlessly</li><li>Increase heated bed temperature by +5°C to +10°C</li><li>Add a 5mm–8mm brim or "mouse ears" at acute part corners in slicer</li></ul>',
'Establish standard SOP to wipe bed before every print session. Keep printer isolated from air conditioning draft vents.', 1),

(2, 'Layer Quality & Surface', 'Stringing, Oozing & Webbing Artifacts', 'stringing-and-oozing', 
'Thin, spiderweb-like strands of plastic stretch across open voids during non-extrusion travel moves between printed features.', 'Medium',
'<ul><li>Retraction distance set too low in slicer configuration</li><li>Retraction speed too low, failing to relieve nozzle melt chamber pressure</li><li>Hotend extrusion temperature set excessively high, lowering viscosity</li><li>Filament has absorbed ambient moisture (hygroscopic saturation)</li><li>Travel speed too slow during non-print movements</li></ul>',
'<ul><li>Print a dual-tower retraction calibration test model</li><li>Listen closely to hotend for tiny popping sounds indicating moisture steam</li><li>Check nozzle tip for persistent oozing when stationary at temperature</li></ul>',
'<ul><li>Increase retraction distance by +0.5mm (Direct Drive: 0.8–1.5mm; Bowden: 4.0–6.5mm)</li><li>Increase retraction speed to 45–60 mm/s</li><li>Lower nozzle temperature by 5°C–10°C in 5-degree increments</li><li>Increase non-print travel speed to 150–200 mm/s with Z-Hop enabled (0.2mm)</li><li>Bake filament in a dedicated dehydrator for 4 hours</li></ul>',
'Always store open spools in dry boxes with indicating silica gel desiccant packs.', 2),

(3, 'Extrusion & Flow', 'Under-Extrusion and Missing Infill Lines', 'under-extrusion-infill-voids', 
'Thin, brittle walls with visible gaps between perimeters, sponge-like weak infill, or clicking sounds from the extruder stepper motor.', 'High',
'<ul><li>Partial nozzle clog caused by particulate debris or charred filament residue</li><li>Extrusion temperature too low to melt filament at current volumetric flow rate</li><li>Extruder drive gear tension loose or gear teeth packed with plastic shavings</li><li>Spool friction or tangled filament binding before entering the extruder</li><li>Incorrect E-steps calibration (steps/mm under-configured in firmware)</li></ul>',
'<ul><li>Observe extruder drive gear during printing: is the motor shaft skipping/clicking?</li><li>Measure diameter of extruded filament strand in free air</li><li>Verify spool rotates effortlessly on its holder roller bearings</li></ul>',
'<ul><li>Perform atomic "cold pull" cleaning using nylon or cleaning filament</li><li>Increase hotend temperature by +10°C or decrease print speed</li><li>Tighten extruder idler tension screw until drive teeth firmly grip filament</li><li>Clean hobbed gear teeth with a brass wire brush</li><li>Recalibrate extruder E-steps ($M92 E$) using standard 100mm extrusion test</li></ul>',
'Use high-quality filament with ±0.02mm diameter consistency. Replace brass nozzles every 250–500 print hours.', 3),

(4, 'Mechanical & Motion', 'Layer Shifting (X or Y Axis Stepper Dislocation)', 'layer-shifting-misalignment', 
'Horizontal displacement of the printed geometry at a specific layer height, resulting in a stepped "staircase" offset of the entire upper section.', 'Critical',
'<ul><li>Loose GT2 timing belt slipping over motor pulley teeth</li><li>Excessive print acceleration or jerk settings exceeding stepper motor torque limits</li><li>Nozzle physically colliding with curled part overhangs or warped infill</li><li>Stepper motor driver overheating and entering thermal shutdown protection</li><li>Pulley grub screw loose on motor D-shaft</li></ul>',
'<ul><li>Check tension of X and Y belts (should produce a low bass guitar pluck note ~70–90 Hz)</li><li>Inspect stepper motor and driver heatsink temperatures during operation</li><li>Examine print for physical collision scarring along the layer shift line</li></ul>',
'<ul><li>Tighten timing belt tensioners to eliminate all slack without binding bearings</li><li>Tighten motor pulley grub screws firmly onto the flat flat side of the motor shaft</li><li>Reduce acceleration in slicer from 1500 mm/s² to 800–1000 mm/s²</li><li>Ensure electronics cooling fan is blowing full airflow directly across driver heatsinks</li></ul>',
'Perform monthly torque checks on all pulley set screws and motion belt tensioners.', 4),

(5, 'Extrusion & Flow', 'Heat Creep and Cold-End Jamming', 'heat-creep-cold-end-jamming', 
'Printer prints normally for 20–45 minutes, then extrusion ceases completely as the filament swells and binds inside the heat sink/throat.', 'High',
'<ul><li>Hotend heat sink cooling fan failed, running slow, or clogged with dust</li><li>Excessive retraction distance pulling molten filament up into the cold zone</li><li>Continuous printing at high ambient room temperature (>35°C) without enclosure cooling</li><li>Poor thermal paste contact between heat break and aluminum heat sink</li></ul>',
'<ul><li>Verify hotend heat sink fan is spinning at 100% RPM whenever hotend is >50°C</li><li>Remove bowden tube and inspect extracted filament tip for bulbous swelling >2.0mm</li></ul>',
'<ul><li>Replace or clean defective 30mm/40mm hotend cooling fan immediately</li><li>Reduce retraction distance (Direct Drive: max 1.5mm; Bowden: max 6.0mm)</li><li>Apply boron nitride or non-conductive thermal paste to heat break threads before installing into heat sink</li></ul>',
'Never power off the main printer switch while hotend is above 50°C; let cooling fan lower temperature first.', 5);

-- 9. 13-Stage Project Development Journey
INSERT INTO project_development_stages (id, stage_number, title, slug, phase_name, summary, detailed_description, key_challenges, solutions_implemented, outcomes, image_url, sort_order) VALUES
(1, 1, 'Stage 01: Concept Generation & Project Scope', 'stage-01-concept-generation', 'Conceptualization', 
'Formulating the technical requirement for a dedicated, modular FDM 3D printer training unit to advance engineering skills.',
'Initiated to address the lack of practical additive manufacturing training equipment in technical institutions. The objective was to design and fabricate an open-architecture, serviceable, transparent FDM 3D printer module optimized for technical education.',
'Identifying a balanced build volume ($220 \times 220 \times 250\text{ mm}$) that satisfies engineering prototyping requirements while maintaining affordable component procurement and high instructional visibility.',
'Conducted comprehensive trade-off analyses between Cartesian, CoreXY, and Delta kinematic architectures, finalizing on a rigid Cartesian X-Z gantry system for maximum pedagogical transparency.',
'Established formal engineering requirements specification (ERS) and milestone roadmap.', 'assets/images/development/stage-01.jpg', 1),

(2, 2, 'Stage 02: Kinematic & Structural CAD Engineering', 'stage-02-cad-engineering', 'Design & Simulation', 
'Complete 3D parametric modeling of structural frame, motion assemblies, and extrusion brackets in SolidWorks/Fusion 360.',
'Developed full digital assembly with over 180 individual components. Conducted finite element analysis (FEA) on gantry brackets to prevent deflection under high-speed toolpath accelerations.',
'Eliminating cantilever flex on the X-axis gantry while maintaining minimal moving mass for high responsiveness.',
'Integrated dual Z-axis lead screws coupled to synchronized NEMA 17 steppers and designed modular 3D-printed PETG bracket mounts with internal ribbing.',
'Generated verified digital master assembly, Bill of Materials (BOM), and 2D engineering fabrication drawings.', 'assets/images/development/stage-02.jpg', 2),

(3, 3, 'Stage 03: Component Selection & BOM Procurement', 'stage-03-component-procurement', 'Procurement & QA', 
'Rigorous selection of aerospace-grade aluminum extrusions, precision ground lead screws, genuine MeanWell PSU, and 32-bit controller.',
'Procured 2020 and 2040 V-Slot aluminum extrusions, POM V-wheels with ABEC-5 bearings, NEMA 17 high-torque steppers, TMC2209 silent drivers, and custom CNC milled aluminum bed plate.',
'Ensuring dimensional tolerance uniformity on V-slot profiles and verifying electrical ripple ratings on power conversion components.',
'Conducted bench testing on power supplies and motor inductance measurements prior to mechanical assembly integration.',
'Complete verified component inventory with 100% QA pass rate.', 'assets/images/development/stage-03.jpg', 3),

(4, 4, 'Stage 04: Frame Fabrication & Mechanical Alignment', 'stage-04-frame-fabrication', 'Mechanical Assembly', 
'Precision cutting, tapping, and orthogonal assembly of the heavy-duty aluminum extrusion chassis.',
'Assembled base frame and vertical gantry towers using precision cast aluminum 90° corner brackets, steel T-nuts, and M5 high-tensile button head screws. Verified perpendicularity using precision engineer squares.',
'Achieving exact 90.0° orthogonality across X, Y, and Z planes to eliminate trapezoidal geometric distortion during printing.',
'Utilized precision machinist granite square reference tables and torque-calibrated tightening sequences to ensure structural squareness within ±0.05°.',
'Rigid, vibration-damped structural chassis with zero mechanical play.', 'assets/images/development/stage-04.jpg', 4),

(5, 5, 'Stage 05: Linear Motion & Gantry Integration', 'stage-05-linear-motion-gantry', 'Motion Assembly', 
'Installation of GT2 timing belts, smooth idler pulleys, eccentric spacer nuts, and dual Z lead screws.',
'Mounted V-slot POM wheel assemblies onto X carriage, Y bed plate, and dual Z gantry plates. Tuned eccentric nuts to eliminate carriage wobble while ensuring smooth, binding-free glide along extrusion tracks.',
'Balancing V-wheel pre-load tension: loose wheels cause gantry wobble, while over-tight wheels develop flat spots.',
'Tuned eccentric spacers using rotational tactile resistance checks and tensioned GT2 fiberglass-reinforced belts to 80 Hz resonant frequency.',
'Smooth, low-friction linear travel along all three orthogonal Cartesian axes.', 'assets/images/development/stage-05.jpg', 5),

(6, 6, 'Stage 06: Extruder & Hotend System Assembly', 'stage-06-extruder-hotend-assembly', 'Extrusion Integration', 
'Integration of dual-gear direct drive extruder, all-metal hotend, 40W ceramic cartridge heater, and part cooling duct.',
'Assembled extruder motor, dual hardened steel hobbed gears, V6 heat sink, bi-metallic heat break, brass heater block, and custom CFD-optimized part cooling blower duct.',
'Minimizing total toolhead moving mass to allow high printing acceleration without inducing frame resonance.',
'Employed a compact high-torque pancake stepper motor with 3:1 planetary gearing to minimize carriage weight.',
'High-precision extrusion toolhead capable of processing both rigid (PLA/ABS) and flexible (TPU) filaments.', 'assets/images/development/stage-06.jpg', 6),

(7, 7, 'Stage 07: Electrical Wiring & Safety Harnessing', 'stage-07-electrical-wiring-safety', 'Electrical Systems', 
'Routing high-current power cables, stepper signals, sensor lines, and implementing safety grounding.',
'Wired MeanWell 24V PSU, 32-bit control board, mechanical endstops, thermistors, and heaters. Crimped all wire terminations with insulated bootlace ferrules. Bundled wiring into protective spiral wrap and flexible drag chains.',
'Preventing electrical noise interference from high-current PWM heater lines coupling into sensitive low-voltage thermistor signals.',
'Implemented physical spatial separation between high-power AC/DC lines and signal cables, and star-grounded all metal chassis elements.',
'Clean, robust, industrial-grade wiring loom meeting technical safety codes.', 'assets/images/development/stage-07.jpg', 7),

(8, 8, 'Stage 08: Firmware Compilation & Kinematic Configuration', 'stage-08-firmware-configuration', 'Embedded Software', 
'Configured and compiled open-source Marlin 2.1.x firmware with custom kinematic parameters and thermal protections.',
'Defined motherboard hardware pins, enabled TMC2209 UART serial mode, tuned microstepping interpolation (1/256), enabled junction deviation, S-Curve acceleration, and activated multi-stage Thermal Runaway Protection.',
'Preventing firmware bugs and ensuring instant emergency shutdown if temperature sensors disconnect or malfunction.',
'Conducted simulated thermistor disconnect fault injections in software to verify automatic 5-second shutdown interlock.',
'Rock-solid firmware binary flashed onto 32-bit controller.', 'assets/images/development/stage-08.jpg', 8),

(9, 9, 'Stage 09: PID Tuning & Thermal System Calibration', 'stage-09-pid-thermal-calibration', 'Thermal Calibration', 
'Running automated Proportional-Integral-Derivative (PID) autotune cycles on both hotend and heated bed.',
'Executed $M303$ automated PID calibration across hotend ($210^\circ\text{C}$ and $245^\circ\text{C}$) and heated bed ($60^\circ\text{C}$ and $90^\circ\text{C}$) with part cooling fan active at 100% to simulate real-world thermal load.',
'Eliminating temperature overshoot and oscillation that cause inconsistent extrusion width and layer banding.',
'Calculated optimal Kp, Ki, and Kd coefficients and stored them directly into non-volatile EEPROM ($M500$).',
'Stable temperature control within $\pm 0.3^\circ\text{C}$ of setpoint during continuous printing.', 'assets/images/development/stage-09.jpg', 9),

(10, 10, 'Stage 10: Extruder Steps & Dimensional Calibration', 'stage-10-esteps-calibration', 'Precision Calibration', 
'Calibrating extruder rotational distance (E-steps/mm) and X/Y/Z dimensional scaling factors.',
'Measured 100mm filament feed lengths with digital calipers and corrected $M92 E$ steps/mm value. Printed 20mm XYZ precision test cubes and calibrated axis scaling to ensure nominal dimensional accuracy.',
'Achieving tight engineering tolerances ($\pm 0.05\text{ mm}$) on printed mechanical assemblies.',
'Fine-tuned linear advance ($K\text{-factor} = 0.04$) to eliminate corner bulging during directional acceleration transitions.',
'Confirmed dimensional accuracy within $\pm 0.04\text{ mm}$ across 100mm test specimens.', 'assets/images/development/stage-10.jpg', 10),

(11, 11, 'Stage 11: Benchmark Printing Trials & Stress Testing', 'stage-11-benchmark-printing', 'Testing & Verification', 
'Fabricating standard 3DBenchy, overhang stress tests, stringing towers, and 48-hour continuous endurance runs.',
'Subjected printer to rigorous continuous multi-day printing cycles using PLA, PETG, and TPU materials. Evaluated bridge spans up to 60mm and unsupported overhangs up to 65°.',
'Verifying long-term thermal stability of electronics enclosure and stepper drivers during 24+ hour uninterrupted runs.',
'Logged thermal camera telemetry on stepper drivers; peak temperature stabilized at a safe $48^\circ\text{C}$ under full continuous load.',
'Flawless surface quality and 100% completion rate across all benchmark print trials.', 'assets/images/development/stage-11.jpg', 11),

(12, 12, 'Stage 12: Technical Evaluation & Curriculum Integration', 'stage-12-evaluation-curriculum', 'Evaluation', 
'Reviewing educational efficacy with technical instructors, engineering officers, and trainees.',
'Conducted structured workshop trial sessions where student trainees built assemblies, performed bed leveling, generated G-codes, and diagnosed deliberate machine faults under instructor supervision.',
'Designing clear pedagogical documentation and intuitive diagnostic charts that translate advanced engineering theory into actionable trainee learning.',
'Developed visual 19-step SOP manuals, diagnostic matrices, and digital quiz assessments.',
'Overwhelmingly positive trainee comprehension ratings and rapid skill acquisition demonstrated.', 'assets/images/development/stage-12.jpg', 12),

(13, 13, 'Stage 13: Technical Training Portal Deployment', 'stage-13-portal-deployment', 'Portal Launch', 
'Full release of the dedicated database-driven digital learning portal for institutional technical education.',
'Deployed the complete PHP 8.2+ MySQL technical training web platform with interactive training modules, component explorer, material guides, video center, troubleshooting matrix, and administrative CMS.',
'Ensuring high-speed responsive delivery across desktop, tablet, and mobile devices in workshop and classroom environments.',
'Implemented lightweight modern Tailwind CSS and Alpine.js frontend with robust MVC PHP backend architecture.',
'A permanent, comprehensive digital training and knowledge asset supporting ongoing additive manufacturing education.', 'assets/images/development/stage-13.jpg', 13);

-- 10. Practical Engineering Projects Showcase
INSERT INTO projects (id, title, slug, client_org, category, objective, problem_statement, solution_summary, material_used, print_time_hours, filament_weight_grams, layer_height_mm, infill_percent, nozzle_temp_c, bed_temp_c, results_summary, lessons_learned, image_url, is_featured, sort_order) VALUES
(1, 'Precision UAV Telemetry Antenna Mount Bracket', 'uav-antenna-mount-bracket', 'Aeronautical Engineering Wing', 'UAV Avionics Prototyping',
'Design and fabricate a lightweight, vibration-isolated antenna mount bracket for tactical unmanned aerial vehicle telemetry.',
'Original metallic brackets were heavy (180g) and transmitted high-frequency airframe vibrations directly into sensitive antenna connectors.',
'Engineered a topology-optimized bracket printed in carbon-fiber reinforced PETG with integrated TPU vibration dampening grommets.',
'PETG + TPU 95A Co-Assembly', 4.50, 48.00, 0.16, 40, 240, 75,
'Achieved a 68% weight reduction (58g total) while maintaining full structural rigidity under 4G flight acceleration maneuvers with zero signal attenuation.',
'Orienting layer lines parallel to primary tensile flight loads increased fatigue resistance by over 300% compared to vertical z-axis orientation.',
'assets/images/projects/project-uav-mount.jpg', 1, 1),

(2, 'Planetary Gear Reduction Transmission Model', 'planetary-gear-reduction-model', 'Mechanical Training Division', 'Instructional Training Aid',
'Fabricate a fully functional 4:1 epicyclic planetary gearbox model with cutaway windows for classroom mechanical kinematics training.',
'Commercial instructional gear models are costly and cannot be disassembled and modified by trainees during workshops.',
'Designed and printed a multi-color planetary gear set with sun gear, planet carrier, 3 planet gears, and annular ring gear featuring smooth meshing involute gear tooth profiles.',
'PLA (High-Rigidity PolyLite)', 9.20, 142.00, 0.20, 30, 205, 55,
'Trainees can physically turn the input shaft and observe angular velocity reduction, torque multiplication, and gear ratio calculations in real time.',
'Applying a 0.15mm horizontal expansion compensation in the slicer ensured zero binding between mating gear teeth straight off the build plate.',
'assets/images/projects/project-gearbox.jpg', 1, 2),

(3, 'Modular Microcontroller & Sensor Enclosure with Snap-Fits', 'sensor-enclosure-snapfits', 'Electronics & Automation Lab', 'Electronics Packaging',
'Produce an IP54 dust-resistant custom enclosure with cantilever snap-fit latches and cable gland pass-throughs for workshop environmental monitors.',
'Off-the-shelf plastic project boxes required extensive manual drilling, milling, and silicone sealing, taking days per unit.',
'Parametrically modeled custom enclosure featuring built-in PCB mounting standoffs, OLED display cutouts, and flexible perimeter sealing bead groove.',
'PETG (Chemical & UV Resistant)', 6.00, 85.00, 0.20, 25, 235, 70,
'10 operational monitor units were completely printed and deployed across workshops in under 48 hours without external tooling.',
'Designing snap-fit cantilever beams with tapered thickness and 0.5mm root radius prevented stress concentrations and fatigue fractures.',
'assets/images/projects/project-enclosure.jpg', 1, 3);

-- 11. Videos Learning Repository
INSERT INTO videos (id, category, title, slug, description, video_source, video_url, duration_seconds, thumbnail_url, is_featured, sort_order) VALUES
(1, 'FDM Fundamentals', 'Introduction to FDM 3D Printing & Machine Anatomy', 'video-intro-fdm-anatomy', 'Comprehensive video walkthrough of FDM technology, Cartesian gantry kinematics, and component functions.', 'youtube', 'https://www.youtube.com/watch?v=vxWw9b7-bX4', 740, 'assets/images/videos/thumb-fdm-anatomy.jpg', 1, 1),
(2, 'Calibration & Setup', 'Step-by-Step Bed Leveling & Z-Offset Calibration', 'video-bed-leveling-zoffset', 'Learn how to calibrate the build plate using the standard 4-corner paper friction test and fine-tune Z-babystepping.', 'youtube', 'https://www.youtube.com/watch?v=RZRY6kun9Jg', 580, 'assets/images/videos/thumb-bed-leveling.jpg', 1, 2),
(3, 'Slicing Mastery', 'UltiMaker Cura: Essential Slicing Settings for Strong Functional Parts', 'video-cura-slicing-mastery', 'Deep dive into walls vs infill, layer heights, support overhang angles, and optimizing print orientation.', 'youtube', 'https://www.youtube.com/watch?v=6b8nUa8F-p8', 1120, 'assets/images/videos/thumb-slicing-cura.jpg', 1, 3),
(4, 'Maintenance & Care', 'Hotend Disassembly, Nozzle Cleaning & Heat Break Maintenance', 'video-hotend-maintenance', 'Practical guide to resolving clogs, executing atomic cold pulls, and hot-tightening nozzles safely at 240°C.', 'youtube', 'https://www.youtube.com/watch?v=r32s4uN0F5U', 860, 'assets/images/videos/thumb-hotend-maint.jpg', 0, 4);

-- 12. Gallery Images
INSERT INTO gallery_images (id, album_id, title, description, image_url, category, stage_tag, sort_order) VALUES
(1, NULL, 'Assembled Cartesian X-Z Gantry & Extrusion Chassis', 'High-rigidity V-slot aluminum chassis aligned on granite reference table', 'assets/images/gallery/printer-complete.jpg', 'Printer Fabrication', 'Stage 04', 1),
(2, NULL, 'Dual-Gear Direct Drive Extruder & V6 Hotend Toolhead', 'Compact toolhead showing cooling fan, blower duct, and heater wiring', 'assets/images/gallery/toolhead-close.jpg', 'Components', 'Stage 06', 2),
(3, NULL, 'Electronics Enclosure & 32-Bit ARM Mainboard Wiring', 'Neat ferrule-crimped wiring harness routed into main control board', 'assets/images/gallery/electronics-wiring.jpg', 'Assembly & Wiring', 'Stage 07', 3),
(4, NULL, 'Real-Time First Layer Deposition on Textured PEI Bed', 'Perfect line squish and layer bonding observed on test specimen', 'assets/images/gallery/printing-first-layer.jpg', 'Printing Process', 'Stage 10', 4),
(5, NULL, 'Finished Mechanical Gearbox Prototype in High-Rigidity PLA', 'Dimensional tolerance test showing crisp tooth definition and smooth mesh', 'assets/images/gallery/printed-gearbox.jpg', 'Printed Objects', 'Stage 11', 5),
(6, NULL, 'Technical Trainee Calibration & Slicing Workshop Session', 'Engineering students operating the FDM module in practical laboratory training', 'assets/images/gallery/training-session.jpg', 'Training Sessions', 'Stage 12', 6);

-- 13. Downloadable Resources
INSERT INTO learning_resources (id, title, slug, category, file_type, file_size_mb, download_url, description, is_active, downloads_count) VALUES
(1, 'FDM 3D Printer Standard Operating Procedure (SOP) Checklist', 'fdm-printer-sop-checklist', 'SOP & Checklists', 'PDF', 1.85, 'assets/downloads/FDM_Printer_SOP_Checklist.pdf', 'Complete 19-step laminated workshop checklist covering pre-flight, print start, monitoring, and post-clean procedures.', 1, 245),
(2, 'Comprehensive 3D Printing Diagnostic & Troubleshooting Guide', 'troubleshooting-matrix-handbook', 'Technical Manuals', 'PDF', 4.20, 'assets/downloads/3D_Printing_Diagnostic_Handbook.pdf', 'Detailed visual reference handbook illustrating 20+ common print defects with root causes and corrective actions.', 1, 189),
(3, 'Essential G-Code Reference Quick-Sheet for Technical Trainees', 'gcode-quick-reference-sheet', 'Cheat Sheets', 'PDF', 0.95, 'assets/downloads/GCode_Quick_Reference.pdf', 'Comprehensive reference guide for standard G0-G4 motion, M104-M190 thermal, and M92-M500 EEPROM machine commands.', 1, 312);

-- 14. Quizzes & Interactive Assessment
INSERT INTO quizzes (id, title, slug, category, description, duration_mins, passing_score, is_active) VALUES
(1, 'FDM 3D Printing Fundamentals & Theory Assessment', 'fdm-fundamentals-quiz', 'Fundamentals', 'Test your knowledge on additive manufacturing principles, FDM mechanics, and material behaviors.', 15, 70, 1),
(2, 'Printer Operation, Slicing & Workshop Safety Quiz', 'operation-safety-quiz', 'Operation & Safety', 'Assess your competence in standard operating procedures, slicer optimization, and laboratory safety protocols.', 15, 75, 1);

-- Questions for Quiz 1
INSERT INTO quiz_questions (id, quiz_id, question_text, explanation, points, sort_order) VALUES
(1, 1, 'Which component maintains the thermal barrier between the hot heater block and the cold filament intake zone?', 
'The heat break (or throat) features thin metal walls and low thermal conductivity to create a steep thermal gradient, preventing filament from premature softening in the cold zone.', 10, 1),
(2, 1, 'What is the primary factor providing the highest mechanical strength in an FDM 3D printed component?', 
'Increasing perimeter wall count (shells) provides significantly greater tensile and flexural strength than simply increasing internal infill percentage.', 10, 2),
(3, 1, 'What critical temperature threshold must not be exceeded if PLA is used in warm engineering environments?', 
'PLA has a low glass transition temperature (Tg) of approximately 55°C–60°C, above which the polymer softens and loses its structural rigidity.', 10, 3),
(4, 1, 'Which infill pattern provides uniform, isotropic mechanical strength equally across all three axes (X, Y, Z)?', 
'The Gyroid infill pattern features a triply periodic minimal surface geometry that distributes mechanical stresses evenly in all directions without internal shear lines.', 10, 4),
(5, 1, 'What happens when volumetric flow rate exceeds the hotend heating capacity?', 
'When the extruder pushes filament faster than the heater cartridge can transfer thermal energy into the polymer, the plastic remains too viscous, causing extruder motor skipping and severe under-extrusion.', 10, 5);

INSERT INTO quiz_answers (id, question_id, answer_text, is_correct, sort_order) VALUES
(1, 1, 'The Heat Break (Throat)', 1, 1),
(2, 1, 'The Heater Cartridge', 0, 2),
(3, 1, 'The Part Cooling Fan', 0, 3),
(4, 1, 'The Stepper Motor Driver', 0, 4),

(5, 2, 'Increasing the number of perimeter walls (shells)', 1, 1),
(6, 2, 'Increasing print speed to 100 mm/s', 0, 2),
(7, 2, 'Using a lower nozzle temperature', 0, 3),
(8, 2, 'Disabling the heated bed', 0, 4),

(9, 3, 'Glass Transition Temperature (Tg ≈ 55°C–60°C)', 1, 1),
(10, 3, 'Melting Temperature (Tm ≈ 210°C)', 0, 2),
(11, 3, 'Room Temperature (25°C)', 0, 3),
(12, 3, 'Boiling Point of Water (100°C)', 0, 4),

(13, 4, 'Gyroid', 1, 1),
(14, 4, 'Grid', 0, 2),
(15, 4, 'Lines', 0, 3),
(16, 4, 'Concentric', 0, 4),

(17, 5, 'Under-extrusion and extruder stepper motor skipping/clicking', 1, 1),
(18, 5, 'Over-extrusion and dimensional bulging', 0, 2),
(19, 5, 'Excessive part cooling fan speed', 0, 3),
(20, 5, 'Immediate bed detachment', 0, 4);

-- Questions for Quiz 2
INSERT INTO quiz_questions (id, quiz_id, question_text, explanation, points, sort_order) VALUES
(6, 2, 'At what temperature should a nozzle replacement or tightening always be performed to prevent leakage?', 
'Hot tightening must always be conducted at ~240°C–250°C because thermal expansion differences between the aluminum heater block and brass nozzle create gaps if tightened cold.', 10, 1),
(7, 2, 'What is the primary cause of corner warping when printing large ABS components?', 
'High thermal shrinkage (~0.8%) combined with rapid cooling from ambient room drafts creates intense contraction forces that overcome bed adhesion.', 10, 2),
(8, 2, 'Why is it dangerous to cut main AC power to the printer immediately after a print finishes?', 
'Cutting power abruptly stops the hotend heat sink fan while the heater block is still at 200°C+, causing thermal heat creep to climb up into the cold end and cause a severe permanent jam.', 10, 3);

INSERT INTO quiz_answers (id, question_id, answer_text, is_correct, sort_order) VALUES
(21, 6, 'At operational hot temperature (~240°C – 250°C)', 1, 1),
(22, 6, 'At room temperature (25°C)', 0, 2),
(23, 6, 'When submerged in cold water', 0, 3),
(24, 6, 'Only when the power cord is disconnected', 0, 4),

(25, 7, 'Uneven thermal contraction stresses caused by cool ambient drafts', 1, 1),
(26, 7, 'Printing too slowly', 0, 2),
(27, 7, 'Using too many wall perimeters', 0, 3),
(28, 7, 'Setting infill density to Gyroid', 0, 4),

(29, 8, 'It stops the heat sink cooling fan, causing heat creep and cold-end jamming', 1, 1),
(30, 8, 'It burns out the stepper drivers', 0, 2),
(31, 8, 'It corrupts the slicer file on the computer', 0, 3),
(32, 8, 'It causes the heated bed to shatter', 0, 4);

-- 15. A-Z Glossary Terms
INSERT INTO glossary_terms (id, term, slug, letter, short_definition, detailed_explanation, category, related_terms) VALUES
(1, 'Additive Manufacturing', 'additive-manufacturing', 'A', 'Process of joining materials to make parts from 3D model data, usually layer upon layer.', 
'The standardized industrial term for technologies that build 3D objects by adding layer-upon-layer of material, whether the material is plastic liquid, filament, powder, or metal wire.', 'Fundamentals', '3D Printing, Subtractive Manufacturing, Rapid Prototyping'),

(2, 'Bed Adhesion', 'bed-adhesion', 'B', 'The ability of the first extruded layer of molten plastic to bond securely to the build platform.', 
'Crucial for print success. Without sufficient bed adhesion, thermal contraction forces cause the part to warp, detach, and collide with the moving nozzle.', 'Operation', 'Warping, Brim, Raft, PEI Sheet'),

(3, 'Brim', 'brim', 'B', 'Single-layer concentric rings extending outwards from the base of the part to increase contact area.', 
'A slicing feature that adds a wide skirt directly attached to the edges of the part, multiplying bed surface contact area to prevent corner warping.', 'Slicing', 'Raft, Skirt, Warping'),

(4, 'CAD (Computer-Aided Design)', 'computer-aided-design', 'C', 'Software utilized by engineers to generate precise 2D and 3D parametric geometric models.', 
'Digital modeling software such as SolidWorks, Autodesk Fusion 360, or FreeCAD used to create mathematically defined boundary representations of engineering components.', 'Design', 'STL, 3MF, Mesh'),

(5, 'Extruder', 'extruder', 'E', 'The mechanical drive mechanism responsible for pushing and retracting filament into the hotend.', 
'Consists of a stepper motor, hobbed drive gears, and an idler tensioner. Categorized as either Direct Drive (mounted on toolhead) or Bowden (remote mounted).', 'Components', 'Hotend, Stepper Motor, Direct Drive'),

(6, 'FDM (Fused Deposition Modeling)', 'fused-deposition-modeling', 'F', 'Additive manufacturing technology that extrudes heated thermoplastic filament layer by layer.', 
'An extrusion-based 3D printing technology patented by S. Scott Crump in 1989. Also designated FFF (Fused Filament Fabrication) in open-source engineering standards.', 'Fundamentals', 'Additive Manufacturing, Thermoplastic, Extrusion'),

(7, 'G-Code', 'g-code', 'G', 'The standard numerical control programming language used to instruct CNC machines and 3D printers.', 
'Human-readable plain text machine instructions specifying coordinates (G0/G1 X Y Z E), feed rates (F), temperatures (M104/M140), and fan speeds (M106).', 'Software', 'Slicer, Firmware, Marlin'),

(8, 'Hotend', 'hotend', 'H', 'The high-temperature assembly that melts solid filament and forces it through a calibrated nozzle.', 
'Comprises a cold heat sink, heat break, heater block with embedded ceramic heating element, thermistor sensor, and nozzle orifice.', 'Components', 'Extruder, Nozzle, Heat Break'),

(9, 'Infill', 'infill', 'I', 'The internal geometric lattice structure printed inside the solid outer perimeters of a 3D part.', 
'Allows engineers to optimize strength-to-weight ratios and print duration by adjusting internal volume density (0% to 100%) and pattern geometry (Gyroid, Honeycomb, Grid).', 'Slicing', 'Gyroid, Perimeters, Density'),

(10, 'Layer Height', 'layer-height', 'L', 'The vertical thickness of each individual slice of extruded plastic deposited along the Z-axis.', 
'Determines vertical surface resolution. Standard 0.4mm nozzles typically operate between 0.12mm (fine detail) and 0.28mm (fast roughing).', 'Slicing', 'Resolution, Nozzle Diameter, Z-Axis'),

(11, 'Nozzle', 'nozzle', 'N', 'The precision machined orifice at the tip of the hotend through which molten polymer is extruded.', 
'Commonly manufactured from brass (high thermal conductivity), hardened steel (abrasive filaments), or plated copper. Standard diameter is 0.4mm.', 'Components', 'Hotend, Extrusion Width, Brass'),

(12, 'PID Tuning', 'pid-tuning', 'P', 'Algorithmic calibration of Proportional, Integral, and Derivative coefficients for temperature stability.', 
'A control loop feedback mechanism used in 3D printer firmware to maintain target hotend and bed temperatures within ±0.3°C under varying convective cooling loads.', 'Calibration', 'M303, Thermistor, Heater Cartridge'),

(13, 'Retraction', 'retraction', 'R', 'The brief pulling back of filament by the extruder motor during non-extrusion travel moves.', 
'Relieves hydraulic pressure inside the molten hotend chamber to prevent melted plastic from drooling or stringing between separate printed features.', 'Slicing', 'Stringing, Extruder, Direct Drive'),

(14, 'STL (Stereolithography)', 'stl-file-format', 'S', 'The standard triangular facet mesh file format utilized by 3D slicers.', 
'Represents 3D surface geometry using an unstructured triangulated mesh of Cartesian coordinates and surface unit normal vectors.', 'Software', 'CAD, 3MF, Slicer'),

(15, 'Thermal Runaway Protection', 'thermal-runaway-protection', 'T', 'A critical safety firmware feature that halts power if temperature sensors fail to detect expected heating.', 
'Prevents electrical fire hazards. If a thermistor falls out of the heater block or shorts, the firmware immediately detects the decoupling and shuts off power.', 'Safety', 'Marlin, Firmware, Thermistor'),

(16, 'Warping', 'warping', 'W', 'Dimensional distortion where lower corners of a print shrink and lift off the build platform.', 
'Caused by thermal contraction as higher layers cool and shrink, pulling upwards against the bonded base layers.', 'Troubleshooting', 'Bed Adhesion, Heated Bed, Brim');

-- 16. FAQs Database
INSERT INTO faqs (id, category, question, answer, sort_order, is_published) VALUES
(1, 'General & FDM', 'What are the main advantages of FDM 3D printing compared to resin (SLA) printing for technical training?', 
'<p>FDM printing is the premier choice for mechanical and technical engineering training because:</p>
<ul>
    <li><strong>Mechanical Durability:</strong> FDM uses genuine engineering thermoplastics (PLA, PETG, ABS, Nylon, TPU) capable of withstanding functional mechanical loads, impact, and chemical exposure.</li>
    <li><strong>Safety & Usability:</strong> Unlike SLA resin, FDM requires no hazardous liquid chemicals, toxic fumes, or isopropyl alcohol solvent wash baths.</li>
    <li><strong>Transparent Mechanics:</strong> The exposed kinematic gantry, steppers, belts, and electronics provide immediate pedagogical insights into automation and machine design.</li>
</ul>', 1, 1),

(2, 'Operation & Calibration', 'How often should the 3D printer bed be leveled, and how do I know it is calibrated correctly?', 
'<p>Bed leveling should be checked whenever the printer is physically relocated, after scraping off stubborn prints, or if the first layer shows uneven line thickness. A properly leveled bed displays consistent, flattened bead lines (approx. 120%–150% of nozzle width) that fuse together seamlessly without gaps or nozzle gouging.</p>', 2, 1),

(3, 'Materials & Storage', 'Why do PLA and PETG filaments become brittle and pop during printing?', 
'<p>Both polymers are <strong>hygroscopic</strong>, meaning they actively absorb ambient water vapor from the atmosphere. When wet filament enters the 200°C+ hotend, moisture flash-boils into steam bubbles, causing microscopic voids, popping noises, severe stringing, and weak inter-layer bonding. Always store filament in dry boxes with desiccant and dry in a filament oven before critical prints.</p>', 3, 1),

(4, 'Slicing & Engineering', 'When should I increase infill percentage versus adding more perimeter walls for part strength?', 
'<p>In engineering FDM parts, <strong>perimeter walls provide over 75% of overall tensile and bending strength</strong>. For load-bearing parts, increasing wall perimeters to 4–6 layers (1.6mm–2.4mm) with 25%–35% Gyroid infill yields far higher strength and stiffness than printing 80% infill with only 2 perimeter walls.</p>', 4, 1),

(5, 'Safety & Maintenance', 'What standard safety precautions must be followed in a 3D printing workshop?', 
'<p>Key protocols include: Never touching the hotend (260°C) or heated bed (100°C) during operation; ensuring firmware Thermal Runaway Protection is active; never leaving ABS/ASA prints without fume ventilation or filtration; and maintaining a clean build plate with 99% IPA while the bed is powered down.</p>', 5, 1);

SET FOREIGN_KEY_CHECKS = 1;
