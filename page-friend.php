<?php

/**
 * friend
 * 友链
 * @package custom
 *
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="col-mb-12 col-8" id="main" role="main">
    <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
        <h1 class="post-title" itemprop="name headline"><a itemprop="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
        <div class="post-content friend" itemprop="articleBody">
            <?php $obj = formateFriend($this->options->friend)  ?>
        <?php if (count($obj) > 0) : ?>
            <?php foreach ($obj as $item) : ?>
                <a href="<?php echo $item['c'] ?>" class="card" target="_blank">
                    <?php if ($item['a'] != '') : ?>
                    <img src="<?php echo $item['a'] ?>">
                    <?php endif; ?>
                    <div>
                        <h4><?php echo $item['b'] ?></h4>
                        <p class="ellipse"><?php echo $item['d'] ?></p>
                    </div>
                </a>
            <? endforeach; ?>
        <? else : ?>
            <p class="no-guys">Oops!快来交换链接吧</p>
        <?php endif; ?>
        </div>
    <h3 class="m-tb-12">说明</h3>
    <p>申请链接前请先添加本博链接 </p>
    <p>申请格式：站点名称、地址、描述(可选)和一张Logo(可选)  </p>
    <h3 class="m-tb-12">本站信息</h3>
    <ul class="info"> 
        <li>名称：<span>Lok 的个人博客</span></li>
        <li>地址：<span>https://www.seeuh.com/ </span></li>
        <li>简介：<span>Lok 的个人博客 - 期待下一次邂逅</span></li>
        <li>图标：<span>https://www.seeuh.com/usr/uploads/2020/08/3642993117.png</span></li>
    </ul>
    </article>
    <?php $this->need('comments.php'); ?>
</div><!-- end #main-->

<?php $this->need('footer.php'); ?>
