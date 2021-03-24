<?php
namespace App\slim\Services;

class HtmlList extends CategoryTree
{

    public $html_1 = '<ul>';
    public $html_2 = '<li>';
    public $html_3 = '</li>';
    public $html_4 = '</ul>';

    public function makeUlList(array $converted_db_array)
    {
        $this->categorylist .= $this->html_1;
        foreach ($converted_db_array as $value) {
            $this->categorylist .= $this->html_2 . $value['name'];
            if (!empty($value['children'])) {
                $this->makeUlList($value['children']);
            }

            $this->categorylist .= $this->html_3;
        }

        $this->categorylist .= $this->html_4;
        return $this->categorylist;
    }

}

// public function getCategoryList(array $categories_array, int $repeat = 0)
//     {
//         foreach ($categories_array as $value)
//         {
//             $this->categorylist[] = ['name'=> str_repeat("-",$repeat).$value['name'], 'id'=>$value['id']];

//             if(!empty($value['children']))
//             {
//                 $repeat = $repeat + 2;
//                 $this->getCategoryList($value['children'],$repeat);
//                 $repeat = $repeat - 2;
//             }

//         }
//         return $this->categorylist;
//     }
