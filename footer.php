<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

    </div>
</div><!-- end #body -->

<footer id="footer" role="contentinfo">
    &copy; 2019
    <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>
</footer><!-- end #footer -->
</div>
<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
<script src="<?php $this->options->themeUrl('js/app.js'); ?>"></script>
<div class="opc"></div>

<?php $this->footer(); ?>
</body>
</html>
