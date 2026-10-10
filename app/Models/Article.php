<?php
namespace App\Models;

use App\Core\Model;

class Article extends Model
{
    protected string $table = 'articles';

    public function getPublishedWithCategory(int $limit = 0, int $offset = 0): array
    {
        $sql = "
            SELECT a.*, c.name as category_name, c.slug as category_slug, u.full_name as author_name 
            FROM articles a 
            LEFT JOIN article_categories c ON a.category_id = c.id 
            LEFT JOIN admins u ON a.created_by = u.id 
            WHERE a.is_published = 1 
            ORDER BY a.is_featured DESC, a.created_at DESC
        ";
        if ($limit > 0) {
            $sql .= " LIMIT $limit OFFSET $offset";
        }
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll();
    }

    public function findBySlug(string $slug): ?array
    {
        $sql = "
            SELECT a.*, c.name as category_name, c.slug as category_slug, u.full_name as author_name, u.designation as author_role 
            FROM articles a 
            LEFT JOIN article_categories c ON a.category_id = c.id 
            LEFT JOIN admins u ON a.created_by = u.id 
            WHERE a.slug = :slug AND a.is_published = 1 
            LIMIT 1
        ";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['slug' => $slug]);
        $res = $stmt->fetch();
        return $res ?: null;
    }

    public function incrementViews(int $id): void
    {
        $stmt = $this->db->prepare("UPDATE articles SET views_count = views_count + 1 WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
}
