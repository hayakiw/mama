<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'name' => '家庭教師',
                'children' => [
                  '語学',
                  '数学',
                  '理科',
                  '社会',
                  'その他',
                ],
            ],
            [
                'name' => '庭仕事',
                'children' => [
                  '草取り',
                  '剪定',
                  '花植え',
                  'その他',
                ],
            ],
            [
                'name' => 'お墓',
                'children' => [
                  '掃除',
                  'お墓詣り',
                  'その他',
                ],
            ],
            [
                'name' => '運搬・配達',
                'children' => [
                  '引っ越し手伝い',
                  'チラシ配り',
                  'その他',
                ],
            ],
            [
                'name' => 'レンタル',
                'children' => [
                  '軽トラ',
                  '駐車場',
                  '土地',
                  'その他',
                ],
            ],
            [
                'name' => '相談',
                'children' => [
                  '学校',
                  '仕事',
                  '恋愛',
                  '占い',
                  'その他',
                ],
            ],
            [
                'name' => '家事',
                'children' => [
                  '買い物',
                  '掃除',
                  '料理',
                ],
            ],
            [
                'name' => '手芸・美容',
                'children' => [
                  '編み物',
                  '裁縫',
                  'ネイル',
                  '散髪',
                  '着付け',
                ],
            ],
        ];

        foreach ($categories as $category) {
            $current = Category::where('name', '=', $category['name'])->first();
            if (!$current) {
                $current = new Category();
            }

            $current->name = $category['name'];
            $current->parent_id = null;
            $current->save();

            if (isset($category['children']) && count($category['children']) > 0) {
                if (!isset($current->id)) continue;
                foreach ($category['children'] as $c_name) {
                    $child = Category::where([
                      'name' => $c_name,
                      'parent_id' => $current->id,
                    ])->first();

                    if (!$child) {
                        $child = new Category();
                    }

                    $child->name = $c_name;
                    $child->parent_id = $current->id;
                    $child->save();
                }
            }
        }
    }
}
