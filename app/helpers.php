<?php 

    use App\Category;
    use Illuminate\Support\Str;

    function make_excerpt($value, $length = 200)
    {
        $excerpt = trim(preg_replace('/\r\n|\r|\n+/', ' ', strip_tags($value)));
        return Str::limit($excerpt, $length);
    }

    function get_category_status()
    {
        return Category::where('cid', 0)->take(10)->get();
    }

    function get_category_tree()
    {
        $category = collect(Category::get())->toArray();

        $tree = array();
        foreach($category as $category_data){
            $tree[$category_data['id']] = $category_data;
            $tree[$category_data['id']]['children'] = array();
        }
        foreach($tree as $key => $item){
            if($item['cid'] != 0){
                $tree[$item['cid']]['children'][] = &$tree[$key];
                if($tree[$key]['children'] == null){
                    unset($tree[$key]['children']);
                }
            }
        }
        foreach($tree as $key => $category){
            if($category['cid'] != 0){
                unset($tree[$key]);
            }
        }

        return $tree;
    }
?>
