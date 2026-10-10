<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index(): void
    {
        $projectModel = new Project();
        $projects = $projectModel->all('sort_order ASC, id DESC');

        $this->render('pages.projects_index', [
            'pageTitle' => 'Engineering Project Showcase & Case Studies',
            'metaDescription' => 'Practical engineering prototypes and instructional models fabricated on the FDM 3D printer training module.',
            'projects' => $projects
        ]);
    }

    public function show(string $slug): void
    {
        $projectModel = new Project();
        $project = $projectModel->findBy('slug', $slug);

        if (!$project) {
            http_response_code(404);
            $this->render('pages.404', ['pageTitle' => 'Project Not Found']);
            return;
        }

        $relatedProjects = $projectModel->all('sort_order ASC, id DESC', 3);
        $relatedProjects = array_filter($relatedProjects, fn($p) => $p['id'] != $project['id']);

        $this->render('pages.project_detail', [
            'pageTitle' => $project['title'] . ' - Project Showcase',
            'metaDescription' => $project['objective'],
            'project' => $project,
            'relatedProjects' => $relatedProjects
        ]);
    }
}
