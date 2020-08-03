<?php
/**
 * EasyBolg 简单点
 *
 * @package EasyBolg
 * @author Lok
 * @version 1.0.0
 * @link https://www.seeuh.com
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>

<div class="site-title">
    <h1>
        <?php $this->options->title(); ?>
    </h1>
    <p><?php $this->options->description() ?></p>
</div>
<?php while($this->next()): ?>
    <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
        <h2 class="post-title" itemprop="name headline"><a itemprop="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
        <ul class="post-meta text-l">
            <li itemprop="author" itemscope itemtype="http://schema.org/Person"><?php _e('作者: '); ?><a itemprop="name" href="javascript::void(0)" rel="author"><?php $this->author(); ?></a></li>
            <li><?php _e('时间: '); ?><time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time></li>
            <li class="category-p"><?php _e('分类: '); ?><?php $this->category(','); ?></li>
            <li class="comment-p" itemprop="interactionCount"><a itemprop="discussionUrl" href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('评论', '1 条评论', '%d 条评论'); ?></a></li>
        </ul>
        <div class="post-contenxt" itemprop="articleBody">
           <p> <?php $this->excerpt(125, '...'); ?></p>
        </div>
        <ul class="post-meta-m">
            <li><?php _e('分类: '); ?><?php $this->category(','); ?></li>
            <li itemprop="interactionCount"><a itemprop="discussionUrl" href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('评论', '1 条评论', '%d 条评论'); ?></a></li>
        </ul>
    </article>
<?php endwhile; ?>

<?php $this->pageNav('&laquo;', '&raquo;'); ?>
<?php $this->need('footer.php'); ?>
