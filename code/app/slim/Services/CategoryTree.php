<?php
namespace App\slim\Services;

class CategoryTree
{

    public function convert(array $db_array, int $parent_id = null): array
    {
        $nested_categories = [];

        foreach ($db_array as $category) {
            $category['children'] = [];
            if ($category['parent_id'] == $parent_id) {
                $children = $this->convert($db_array, $category['id']);
                if ($children) {
                    $category['children'] = $children;
                }

                $nested_categories[] = $category;
            }
        }

        return $nested_categories;

    }

}
