<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<article class="post" itemscope itemtype="http://schema.org/BlogPosting">
    <h1 class="post-title" itemprop="name headline"><a itemprop="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
    <ul class="post-meta">
        <li itemprop="author" itemscope itemtype="http://schema.org/Person"><?php _e('作者: '); ?><a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a></li>
        <li><?php _e('时间: '); ?><time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time></li>
        <li><?php _e('分类: '); ?><?php $this->category(','); ?></li>
    </ul>
    <div class="post-content" itemprop="articleBody">
                               <?php
    $pattern = '/\<img.*?src\=\"(.*?)\"[^>]*>/i';
    $replacement = '<a href="$1" data-fancybox="gallery" /><img src="$1" alt="'.$this->title.'" title="点击放大图片"></a>';
    $content = preg_replace($pattern, $replacement, $this->content);
    echo $content;
?>
    </div>
    <p itemprop="keywords" class="tags"><?php _e('标签: '); ?><?php $this->tags(', ', true, 'none'); ?></p>
</article>

<ul class="post-near">
    <li>上一篇: <?php $this->thePrev('%s','没有了'); ?></li>
    <li>下一篇: <?php $this->theNext('%s','没有了'); ?></li>
</ul>

<?php $this->need('comments.php'); ?>

<?php $this->need('footer.php'); ?>
