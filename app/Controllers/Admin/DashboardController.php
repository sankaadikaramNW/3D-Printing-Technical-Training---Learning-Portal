<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Models\Article;
use App\Models\TrainingModule;
use App\Models\TrainingLesson;
use App\Models\PrinterComponent;
use App\Models\Project;
use App\Models\Video;
use App\Models\GalleryImage;
use App\Models\Quiz;
use App\Models\TroubleshootingIssue;
use App\Models\ContactMessage;
use App\Models\AuditLog;
use App\Models\Admin;

class DashboardController extends Controller
{
    public function index(): void
    {
        $this->requireAuth();

        $stats = [
            'articles' => (new Article())->count(),
            'modules' => (new TrainingModule())->count(),
            'lessons' => (new TrainingLesson())->count(),
            'components' => (new PrinterComponent())->count(),
            'projects' => (new Project())->count(),
            'videos' => (new Video())->count(),
            'gallery' => (new GalleryImage())->count(),
            'quizzes' => (new Quiz())->count(),
            'troubleshooting' => (new TroubleshootingIssue())->count(),
            'messages' => (new ContactMessage())->count(['is_read' => 0]),
            'admins' => (new Admin())->count()
        ];

        $recentLogs = (new AuditLog())->getRecent(8);
        $recentMessages = (new ContactMessage())->all('id DESC', 5);
        $recentArticles = (new Article())->all('id DESC', 5);

        $this->render('admin.dashboard', [
            'pageTitle' => 'Admin Dashboard - FDM 3D Printer Portal',
            'stats' => $stats,
            'recentLogs' => $recentLogs,
            'recentMessages' => $recentMessages,
            'recentArticles' => $recentArticles
        ], 'admin');
    }
}
