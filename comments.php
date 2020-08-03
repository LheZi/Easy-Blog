<?php function threadedComments($comments, $options) {
    $commentClass = '';
    $db = Typecho_Db::get();
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';
        } else {
            $commentClass .= ' comment-by-user';
        }
    }
    $arow = $db->fetchRow($db->select('author')->from('table.comments')
                              ->where('coid = ?', $comments->parent));
    $commentLevelClass = $comments->levels > 0 ? ' comment-child' : ' comment-parent';
    ?>

    <li id="li-<?php $comments->theId(); ?>" class="comment-body<?php
    if ($comments->levels > 0) {
        echo ' comment-child';
        $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
    } else {
        echo ' comment-parent';
    }
    $comments->alt(' comment-odd', ' comment-even');
    echo $commentClass;
    ?>">
        <div id="<?php $comments->theId(); ?>">
            <div class="comment-author">
                <?php $comments->gravatar('40', ''); ?>
                <span class="fn"><?php $comments->author(); ?></span>
                <?php
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            echo "<span class='author'>作者</span>";
        } 
    }
    ?>
            </div>
            <div class="comment-meta">
                <a href="<?php $comments->permalink(); ?>"><?php $comments->date('Y-m-d H:i'); ?></a>
                <span class="comment-reply"><?php $comments->reply(); ?></span>
            </div>

            <div class="comment-content">
                <?php if($comments->parent != 0){echo '<a href="#comment-' . $comments->parent . '">@' . $arow['author'] . '</a> &nbsp;';} ?>
                <?php
                $pattern = '/::t\((.*?)\)/';
                $replacement = '<img src="/usr/themes/EasyBlog/images/tieba/$1.jpg">';
                $content = preg_replace($pattern, $replacement, $comments->content);
                $patternQ = '/::q\((.*?)\)/';
                $replacementQ = '<img src="/usr/themes/EasyBlog/images/qq/$1.gif">';
                $content = preg_replace($pattern, $replacement, $comments->content);
                $content = preg_replace($patternQ, $replacementQ, $content);
                echo $content;
                ?>
            </div>
        </div>
        <?php if ($comments->children) { ?>
            <div class="comment-children">
                <?php $comments->threadedComments($options); ?>
            </div>
        <?php } ?>
    </li>
<?php } ?>

<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<div id="comments">
    <?php $this->comments()->to($comments); ?>
    <?php if ($comments->have()) : ?>
        <h3><?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('已有 %d 条评论')); ?></h3>

        <?php $comments->listComments(); ?>

        <?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>

    <?php endif; ?>

    <?php if ($this->allow('comment')) : ?>
        <div id="<?php $this->respondId(); ?>" class="respond">
            <h3 id="response"><?php _e('评论'); ?></h3>
            <div class="cancel-comment-reply">
                <?php $comments->cancelReply(); ?>
            </div>
            <form method="post" action="<?php $this->commentUrl() ?>"> <?php if ($this->user->hasLogin()) : ?>
                    <p class="has-login"><?php _e('登录身份: '); ?>
                        <a href="<?php $this->options->profileUrl(); ?>">
                            <?php $this->user->screenName(); ?></a> |
                        <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;
                        </a>
                    </p>
                <?php else : ?>
                    <div class="no-login clearfix">
                        <p class="comment-input">
                            <input placeholder="（必填）昵称" type="text" name="author" autocomplete="off" id="author" class="text" value="<?php $this->remember('author'); ?>" required />
                        </p>
                        <p class="comment-input">
                            <input placeholder="<?php echo $this->options->commentsRequireMail ? '（必填）' : '（选填）';echo '邮箱'; ?>" autocomplete="off" type="email" name="mail" id="mail" class="text" value="<?php $this->remember('mail'); ?>"
                                <?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?>>
                        </p>
                        <p class="comment-input">
                            <input type="url" name="url" id="url" class="text" autocomplete="off" placeholder="<?php echo $this->options->commentsRequireURL ? '（必填）' : '（选填）';echo '网站'; ?>"
                                   value="<?php $this->remember('url'); ?>" <?php
                            if ($this->options->commentsRequireURL): ?> required
                            <?php endif; ?>/>
                        </p>
                    </div>
                <?php endif; ?>
                <div class="relpy-content">
                    <textarea name="text" id="edit" class="textarea OwO-textarea" placeholder="<?php $this->options->placeholder(); ?>"><?php $this->remember('text'); ?></textarea>
                </div>
                <button type="submit" class="submit-comment" title="发送">发送</button>
                <div class="OwO"></div>
            </form>
        </div>
    <?php else : ?>
        <h3><?php _e('评论已关闭'); ?></h3>
    <?php endif; ?>
    <script src="<?php $this->options->themeUrl('js/OwO.min.js'); ?>"></script>
    <script>
        var OwO_demo = new OwO({
            logo: 'OωO表情',
            container: document.getElementsByClassName('OwO')[0],
            target: document.getElementsByClassName('OwO-textarea')[0],
            api: '<?php $this->options->themeUrl('js/OwO.json'); ?>',
            position: 'down',
            width: '100%',
            maxHeight: '250px'
        });
    </script>
</div>