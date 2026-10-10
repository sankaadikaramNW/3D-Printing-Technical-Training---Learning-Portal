<?php
/**
 * Application Web Routes Definition
 */

/** @var \App\Core\Router $router */

// ==========================================
// 1. Public Educational & Training Routes
// ==========================================
$router->get('/', 'HomeController@index');
$router->get('/about-project', 'PageController@aboutProject');
$router->get('/3d-printing-fundamentals', 'PageController@fundamentals');
$router->get('/fdm-technology', 'PageController@fdmTechnology');
$router->get('/printer-components', 'PageController@printerComponents');
$router->get('/how-it-works', 'PageController@howItWorks');
$router->get('/model-preparation', 'PageController@modelPreparation');
$router->get('/slicing', 'PageController@slicing');
$router->get('/materials', 'PageController@materials');
$router->get('/operation-process', 'PageController@operationProcess');
$router->get('/safety', 'PageController@safety');
$router->get('/troubleshooting', 'PageController@troubleshooting');
$router->get('/project-development', 'PageController@projectDevelopment');
$router->get('/applications', 'PageController@applications');
$router->get('/technical-training-importance', 'PageController@technicalTrainingImportance');
$router->get('/final-project', 'PageController@finalProject');

// Interactive Web Application Tools (SLAF Trainee & Technician Apps)
$router->get('/slicing-simulator', 'AppToolsController@slicingCalculator');
$router->get('/hardware-anatomy', 'AppToolsController@hardwareAnatomy');
$router->get('/preflight-checklist', 'AppToolsController@preflightChecklist');

// SLAF Directorates & Defense Tracks
$router->get('/directorates', 'DirectorateController@index');
$router->get('/directorates/{code}', 'DirectorateController@show');
$router->get('/directorate/{code}', 'DirectorateController@show');

// Articles & Learning Library
$router->get('/learning', 'ArticleController@index');
$router->get('/learning/article/{slug}', 'ArticleController@show');

// Structured 8-Module Training Curriculum
$router->get('/training', 'TrainingController@index');
$router->get('/training/lesson/{slug}', 'TrainingController@lesson');

// Multimedia: Videos & Gallery
$router->get('/videos', 'VideoController@index');
$router->get('/gallery', 'GalleryController@index');

// Projects Showcase
$router->get('/projects', 'ProjectController@index');
$router->get('/projects/show/{slug}', 'ProjectController@show');

// Interactive Knowledge Quizzes & API
$router->get('/quiz', 'QuizController@index');
$router->get('/quiz/take/{slug}', 'QuizController@take');
$router->post('/api/quiz/submit', 'QuizController@submitScore');

// Glossary, FAQs, Global Search, Contact
$router->get('/glossary', 'GlossaryController@index');
$router->get('/faq', 'FaqController@index');
$router->get('/search', 'SearchController@index');
$router->get('/contact', 'ContactController@index');
$router->post('/contact/submit', 'ContactController@submit');

// ==========================================
// 2. Admin Authentication & CMS Routes
// ==========================================
$router->get('/admin/login', 'Admin\\AuthController@login');
$router->post('/admin/login', 'Admin\\AuthController@postLogin');
$router->post('/admin/login/post', 'Admin\\AuthController@postLogin');
$router->get('/admin/logout', 'Admin\\AuthController@logout');

// Admin Dashboard
$router->get('/admin', 'Admin\\DashboardController@index');

// Admin Technical Articles CRUD
$router->get('/admin/articles', 'Admin\\ArticleAdminController@index');
$router->get('/admin/articles/create', 'Admin\\ArticleAdminController@create');
$router->post('/admin/articles/store', 'Admin\\ArticleAdminController@store');
$router->get('/admin/articles/edit/{id}', 'Admin\\ArticleAdminController@edit');
$router->post('/admin/articles/update/{id}', 'Admin\\ArticleAdminController@update');
$router->post('/admin/articles/delete/{id}', 'Admin\\ArticleAdminController@delete');

// Admin Training Modules & Lessons CRUD
$router->get('/admin/training', 'Admin\\TrainingAdminController@index');
$router->get('/admin/training/module/create', 'Admin\\TrainingAdminController@createModule');
$router->post('/admin/training/module/store', 'Admin\\TrainingAdminController@storeModule');
$router->get('/admin/training/module/edit/{id}', 'Admin\\TrainingAdminController@editModule');
$router->post('/admin/training/module/update/{id}', 'Admin\\TrainingAdminController@updateModule');
$router->post('/admin/training/module/delete/{id}', 'Admin\\TrainingAdminController@deleteModule');
$router->get('/admin/training/lesson/create/{moduleId}', 'Admin\\TrainingAdminController@createLesson');
$router->post('/admin/training/lesson/store', 'Admin\\TrainingAdminController@storeLesson');
$router->get('/admin/training/lesson/edit/{id}', 'Admin\\TrainingAdminController@editLesson');
$router->post('/admin/training/lesson/update/{id}', 'Admin\\TrainingAdminController@updateLesson');
$router->post('/admin/training/lesson/delete/{id}', 'Admin\\TrainingAdminController@deleteLesson');

// Admin Components CRUD
$router->get('/admin/components', 'Admin\\ComponentAdminController@index');
$router->get('/admin/components/create', 'Admin\\ComponentAdminController@create');
$router->post('/admin/components/store', 'Admin\\ComponentAdminController@store');
$router->get('/admin/components/edit/{id}', 'Admin\\ComponentAdminController@edit');
$router->post('/admin/components/update/{id}', 'Admin\\ComponentAdminController@update');
$router->post('/admin/components/delete/{id}', 'Admin\\ComponentAdminController@delete');

// Admin Materials CRUD
$router->get('/admin/materials', 'Admin\\MaterialAdminController@index');
$router->get('/admin/materials/create', 'Admin\\MaterialAdminController@create');
$router->post('/admin/materials/store', 'Admin\\MaterialAdminController@store');
$router->get('/admin/materials/edit/{id}', 'Admin\\MaterialAdminController@edit');
$router->post('/admin/materials/update/{id}', 'Admin\\MaterialAdminController@update');
$router->post('/admin/materials/delete/{id}', 'Admin\\MaterialAdminController@delete');

// Admin Troubleshooting Issues CRUD
$router->get('/admin/troubleshooting', 'Admin\\TroubleshootingAdminController@index');
$router->get('/admin/troubleshooting/create', 'Admin\\TroubleshootingAdminController@create');
$router->post('/admin/troubleshooting/store', 'Admin\\TroubleshootingAdminController@store');
$router->get('/admin/troubleshooting/edit/{id}', 'Admin\\TroubleshootingAdminController@edit');
$router->post('/admin/troubleshooting/update/{id}', 'Admin\\TroubleshootingAdminController@update');
$router->post('/admin/troubleshooting/delete/{id}', 'Admin\\TroubleshootingAdminController@delete');

// Admin Videos CRUD
$router->get('/admin/videos', 'Admin\\VideoAdminController@index');
$router->get('/admin/videos/create', 'Admin\\VideoAdminController@create');
$router->post('/admin/videos/store', 'Admin\\VideoAdminController@store');
$router->get('/admin/videos/edit/{id}', 'Admin\\VideoAdminController@edit');
$router->post('/admin/videos/update/{id}', 'Admin\\VideoAdminController@update');
$router->post('/admin/videos/delete/{id}', 'Admin\\VideoAdminController@delete');

// Admin Gallery CRUD
$router->get('/admin/gallery', 'Admin\\GalleryAdminController@index');
$router->get('/admin/gallery/create', 'Admin\\GalleryAdminController@create');
$router->post('/admin/gallery/store', 'Admin\\GalleryAdminController@store');
$router->post('/admin/gallery/delete/{id}', 'Admin\\GalleryAdminController@delete');

// Admin Projects CRUD
$router->get('/admin/projects', 'Admin\\ProjectAdminController@index');
$router->get('/admin/projects/create', 'Admin\\ProjectAdminController@create');
$router->post('/admin/projects/store', 'Admin\\ProjectAdminController@store');
$router->get('/admin/projects/edit/{id}', 'Admin\\ProjectAdminController@edit');
$router->post('/admin/projects/update/{id}', 'Admin\\ProjectAdminController@update');
$router->post('/admin/projects/delete/{id}', 'Admin\\ProjectAdminController@delete');

// Admin Quizzes CRUD
$router->get('/admin/quizzes', 'Admin\\QuizAdminController@index');
$router->get('/admin/quizzes/create', 'Admin\\QuizAdminController@create');
$router->post('/admin/quizzes/store', 'Admin\\QuizAdminController@store');
$router->get('/admin/quizzes/edit/{id}', 'Admin\\QuizAdminController@edit');
$router->post('/admin/quizzes/update/{id}', 'Admin\\QuizAdminController@update');
$router->get('/admin/quizzes/questions/{id}', 'Admin\\QuizAdminController@questions');
$router->post('/admin/quizzes/question/store', 'Admin\\QuizAdminController@storeQuestion');
$router->post('/admin/quizzes/question/delete/{id}', 'Admin\\QuizAdminController@deleteQuestion');

// Admin Glossary CRUD
$router->get('/admin/glossary', 'Admin\\GlossaryAdminController@index');
$router->get('/admin/glossary/create', 'Admin\\GlossaryAdminController@create');
$router->post('/admin/glossary/store', 'Admin\\GlossaryAdminController@store');
$router->get('/admin/glossary/edit/{id}', 'Admin\\GlossaryAdminController@edit');
$router->post('/admin/glossary/update/{id}', 'Admin\\GlossaryAdminController@update');
$router->post('/admin/glossary/delete/{id}', 'Admin\\GlossaryAdminController@delete');

// Admin FAQs CRUD
$router->get('/admin/faqs', 'Admin\\FaqAdminController@index');
$router->get('/admin/faqs/create', 'Admin\\FaqAdminController@create');
$router->post('/admin/faqs/store', 'Admin\\FaqAdminController@store');
$router->get('/admin/faqs/edit/{id}', 'Admin\\FaqAdminController@edit');
$router->post('/admin/faqs/update/{id}', 'Admin\\FaqAdminController@update');
$router->post('/admin/faqs/delete/{id}', 'Admin\\FaqAdminController@delete');

// Admin Downloadable Resources CRUD
$router->get('/admin/resources', 'Admin\\ResourceAdminController@index');
$router->get('/admin/resources/create', 'Admin\\ResourceAdminController@create');
$router->post('/admin/resources/store', 'Admin\\ResourceAdminController@store');
$router->post('/admin/resources/delete/{id}', 'Admin\\ResourceAdminController@delete');

// Admin Contacts & Inquiries
$router->get('/admin/contacts', 'Admin\\ContactAdminController@index');
$router->get('/admin/contacts/view/{id}', 'Admin\\ContactAdminController@view');
$router->post('/admin/contacts/delete/{id}', 'Admin\\ContactAdminController@delete');

// Admin Media Library
$router->get('/admin/media', 'Admin\\MediaAdminController@index');
$router->post('/admin/media/upload', 'Admin\\MediaAdminController@upload');
$router->post('/admin/media/delete/{id}', 'Admin\\MediaAdminController@delete');

// Admin Settings & Technical Specifications
$router->get('/admin/settings', 'Admin\\SettingAdminController@index');
$router->post('/admin/settings/update', 'Admin\\SettingAdminController@updateSettings');
$router->get('/admin/settings/printer-specs', 'Admin\\SettingAdminController@printerSpecs');
$router->post('/admin/settings/printer-specs/update', 'Admin\\SettingAdminController@updateSpecs');

// Admin Users & Access Control
$router->get('/admin/users', 'Admin\\UserAdminController@index');
$router->get('/admin/users/create', 'Admin\\UserAdminController@create');
$router->post('/admin/users/store', 'Admin\\UserAdminController@store');
$router->get('/admin/users/edit/{id}', 'Admin\\UserAdminController@edit');
$router->post('/admin/users/update/{id}', 'Admin\\UserAdminController@update');
$router->post('/admin/users/delete/{id}', 'Admin\\UserAdminController@delete');

// Admin Audit Logs
$router->get('/admin/audit', 'Admin\\AuditAdminController@index');
