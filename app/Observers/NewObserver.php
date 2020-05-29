<?php 
    namespace App\Observers;

    use App\Handlers\SlugTranslateHandler;
    use App\News;

    // creating, created, updating, updated, saving,
    // saved,  deleting, deleted, restoring, restored
    
    class NewObserver
    {
        public function saving(News $news)
        {
            // XSS 过滤
            $news->description = clean($news->description, 'news_description');
    
            // 生成话题摘录
            $news->description = make_excerpt($news->description);
    
            // 如 slug 字段无内容，即使用翻译器对 title 进行翻译
            if ( ! $news->slug) {
                $news->slug = app(SlugTranslateHandler::class)->translate($news->title);
            }
        }
    }
?>
