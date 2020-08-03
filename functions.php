<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;


function themeConfig($form) {
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点 LOGO 地址'), _t('在这里填入一个图片 URL 地址, 以在网站标题前加上一个 LOGO'));
    $form->addInput($logoUrl);
    
    $avatarUrl = new Typecho_Widget_Helper_Form_Element_Text('avatarUrl', NULL, NULL, _t('头像地址'), _t('在这里填入一个图片 URL 地址'));
    $form->addInput($avatarUrl);
    
    $friend = new Typecho_Widget_Helper_Form_Element_Textarea('friend', NULL, NULL, _t('友链'), _t('格式：[头像url,名字,网址,描述]'));
    $form->addInput($friend);
    
    $sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock', 
    array('ShowRecentPosts' => _t('显示最新文章'),
    'ShowRecentComments' => _t('显示最近回复'),
    'ShowCategory' => _t('显示分类'),
    'ShowArchive' => _t('显示归档'),
    'ShowOther' => _t('显示其它杂项')),
    array('ShowRecentPosts', 'ShowRecentComments', 'ShowCategory', 'ShowArchive', 'ShowOther'), _t('侧边栏显示'));
    
    $form->addInput($sidebarBlock->multiMode());
}


/**
 * 格式化友情链接
 */
function formateFriend($str)
{
    $res = [];
    preg_match_all("/\[(.*)\]/", $str, $match);
    if (count($match) > 1) {
        foreach ($match[1] as $m) {
            $temp = explode(",", $m);
            array_push($res, array('a' => $temp[0], 'b' => $temp[1], "c" => $temp[2], "d" => $temp[3]));
        }
    }
    return $res;
}

