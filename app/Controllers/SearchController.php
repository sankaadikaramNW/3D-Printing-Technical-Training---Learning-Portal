<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\Database;

class SearchController extends Controller
{
    public function index(): void
    {
        $query = trim((string)$this->request->input('q', ''));
        $results = [
            'articles' => [],
            'components' => [],
            'troubleshooting' => [],
            'glossary' => [],
            'projects' => [],
            'videos' => []
        ];
        $totalResults = 0;

        if (mb_strlen($query) >= 2) {
            $db = Database::getConnection();
            $param = "%$query%";

            // Search Articles
            $stmt = $db->prepare("SELECT id, title, slug, summary, 'article' as type FROM articles WHERE is_published = 1 AND (title LIKE :q1 OR summary LIKE :q2 OR content LIKE :q3) LIMIT 10");
            $stmt->execute(['q1' => $param, 'q2' => $param, 'q3' => $param]);
            $results['articles'] = $stmt->fetchAll();

            // Search Components
            $stmt = $db->prepare("SELECT id, name as title, slug, subtitle as summary, category, 'component' as type FROM printer_components WHERE name LIKE :q1 OR subtitle LIKE :q2 OR function_description LIKE :q3 LIMIT 10");
            $stmt->execute(['q1' => $param, 'q2' => $param, 'q3' => $param]);
            $results['components'] = $stmt->fetchAll();

            // Search Troubleshooting
            $stmt = $db->prepare("SELECT id, title, slug, symptom as summary, category, severity, 'troubleshooting' as type FROM troubleshooting_issues WHERE title LIKE :q1 OR symptom LIKE :q2 OR likely_causes LIKE :q3 OR corrective_actions LIKE :q4 LIMIT 10");
            $stmt->execute(['q1' => $param, 'q2' => $param, 'q3' => $param, 'q4' => $param]);
            $results['troubleshooting'] = $stmt->fetchAll();

            // Search Glossary
            $stmt = $db->prepare("SELECT id, term as title, slug, short_definition as summary, category, 'glossary' as type FROM glossary_terms WHERE term LIKE :q1 OR short_definition LIKE :q2 OR detailed_explanation LIKE :q3 LIMIT 10");
            $stmt->execute(['q1' => $param, 'q2' => $param, 'q3' => $param]);
            $results['glossary'] = $stmt->fetchAll();

            // Search Projects
            $stmt = $db->prepare("SELECT id, title, slug, objective as summary, material_used, 'project' as type FROM projects WHERE title LIKE :q1 OR objective LIKE :q2 OR solution_summary LIKE :q3 LIMIT 10");
            $stmt->execute(['q1' => $param, 'q2' => $param, 'q3' => $param]);
            $results['projects'] = $stmt->fetchAll();

            // Search Videos
            $stmt = $db->prepare("SELECT id, title, slug, description as summary, category, video_url, 'video' as type FROM videos WHERE title LIKE :q1 OR description LIKE :q2 LIMIT 10");
            $stmt->execute(['q1' => $param, 'q2' => $param]);
            $results['videos'] = $stmt->fetchAll();

            foreach ($results as $group) {
                $totalResults += count($group);
            }
        }

        $this->render('pages.search', [
            'pageTitle' => ($query ? "Search results for \"$query\"" : 'Search the Knowledge Portal'),
            'metaDescription' => 'Search articles, printer components, troubleshooting solutions, glossary definitions, and videos across the platform.',
            'query' => $query,
            'results' => $results,
            'totalResults' => $totalResults
        ]);
    }
}
