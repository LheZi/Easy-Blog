<?php
/**
 * 归档页面 时间轴
 * 
 * @package custom
 */
 if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<style>
div {
    display: block;
}
.title {
    position: relative;
    margin: 0;
    line-height: 32px;
    font-size: 20px;
    border-bottom: 2px solid #eee;
}
article, aside, details, figcaption, figure, footer, header, hgroup, main, nav, section, summary {
    display: block;
}
h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
    font-family: inherit;
    font-weight: 500;
    line-height: 1.1;
    color: inherit;
}

.archives h3 {
    font-size: 18px;
    margin: 4px 0 0 -120px;
    float: left;
}
.archives .item {
    padding: 20px 0 12px 120px;
    overflow: hidden;
}
.archives .item:hover h3 {
    color: #ff4466;
}
.archives-list {
    list-style: none;
}
ul, ol {
    margin-top: 0;
    margin-bottom: 10px;
}
.archives-list time {
    margin-right: 5px;
    color: #999;
}

.archives-list .text-muted {
    float: right;
    font-size: 12px;
}
.text-muted {
    color: #999;
}
.item li a{
    font-size: 14px;
}
.b-n{
    border: none !important;
}
</style>
<div class="col-mb-12 col-8" id="main" role="main">
    <article class="post b-n" itemscope itemtype="http://schema.org/BlogPosting">
        <h1 class="post-title" itemprop="name headline"><a itemprop="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
        <div class="post-content" itemprop="articleBody">
            <ul class="widget-list">
    <?php $this->widget('Widget_Contents_Post_Recent', 'pageSize=10000')->to($archives);
    $year=0; $mon=0; $i=0; $j=0;
    while($archives->next()):
        $year_tmp = date('Y',$archives->created);
        $mon_tmp = date('m',$archives->created);
        $y=$year; $m=$mon;
        if ($mon != $mon_tmp && $mon > 0) $output .= '</ul></div></li></article>';
        if ($year != $year_tmp && $year > 0) $output .= '</ul>';
        if ($year != $year_tmp) {
            $year = $year_tmp;
        }
        if ($mon != $mon_tmp) {
            $mon = $mon_tmp;
            $output .= '<article class="archives"><div class="item"><ul><h3>'.$year .'-'. $mon .'</h3>'; 
        }
        $output .= '<li><time>'.date('',$archives->created).'</time><a href="'.$archives->permalink .'">'. $archives->title .'</a></li>';
    endwhile;
    
    echo $output;
?>
            </ul>
        </div>
    </article>
</div><!-- end #main-->

<?php $this->need('footer.php'); ?>
