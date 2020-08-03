<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<button class="search-m">搜索</button>

<div class="search-m-box">
    <form id="search" method="post" action="<?php $this->options->siteUrl(); ?>" role="search">
        <input type="text" id="s" autocomplete="off" name="s" class="text"/>
        <button type="submit" class="submit"><?php _e('搜索'); ?></button>
    </form>
</div>

<button class="open">></button>
<div class="sidebar">
    <button class="close"><</button>
    <div class="header-sidebar">
        <img src="<?php $this->options->avatarUrl() ?>" alt="<?php $this->options->title()?>">
        <span>Lok</span>
    </div>
    <div class="side">
    <section class="widget">
        <h3 class="widget-title"><?php _e('菜单'); ?></h3>
        <ul class="widget-list">
            <li><a<?php if($this->is('index')): ?> class="current"<?php endif; ?>
                        href="<?php $this->options->siteUrl(); ?>"><?php _e('首页'); ?></a></li>
            <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
            <?php while($pages->next()): ?>
                <li><a<?php if($this->is('page', $pages->slug)): ?> class="current"<?php endif; ?>
                            href="<?php $pages->permalink(); ?>"
                            title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a></li>
            <?php endwhile; ?>
        </ul>
    </section>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowCategory', $this->options->sidebarBlock)): ?>
    <section class="widget">
		<h3 class="widget-title"><?php _e('分类'); ?></h3>
        <?php $this->widget('Widget_Metas_Category_List')->listCategories('wrapClass=widget-list'); ?>
	</section>
    <?php endif; ?>
    </div>

    <ul class="footer-sidebar">
        <li><a href="<?php $this->options->feedUrl(); ?>"><?php _e('文章 RSS'); ?></a></li>
        <li><a href="<?php $this->options->commentsFeedUrl(); ?>"><?php _e('评论 RSS'); ?></a></li>
    </ul>

</div><!-- end #sidebar -->
