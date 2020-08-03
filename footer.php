<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

    </div>
</div><!-- end #body -->

<span id="GTP">
    返回顶部
</span>

<footer id="footer" role="contentinfo">
    <p>&copy; 2019
    <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a> • EasyBlog
    </p>
    <p><script type="text/javascript">document.write(unescape("%3Cspan id='cnzz_stat_icon_1278297015'%3E%3C/span%3E%3Cscript src='https://s9.cnzz.com/z_stat.php%3Fid%3D1278297015%26online%3D1%26show%3Dline' type='text/javascript'%3E%3C/script%3E"));</script>
    </p>
</footer><!-- end #footer -->
</div>
<div class="opc"></div>
<script src="https://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
<script src="https://cdn.staticfile.org/fancybox/3.5.2/jquery.fancybox.min.js"></script>
<script src="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@10.1.2/build/highlight.min.js"></script>
<script src="<?php $this->options->themeUrl('js/app.js'); ?>"></script>
<script>
hljs.initHighlightingOnLoad();
</script>
<?php $this->footer(); ?>
</body>
</html>
