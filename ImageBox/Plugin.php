<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
/**
 * 一个简单的、基于jQuery的图片灯箱插件。
 * 
 * @package ImageBox
 * @author journey.ad
 * @version 0.1
 * @link https://imjad.cn
 */
class ImageBox_Plugin implements Typecho_Plugin_Interface
{
	/**
	 * 激活插件方法,如果激活失败,直接抛出异常
	 * 
	 * @access public
	 * @return void
	 * @throws Typecho_Plugin_Exception
	 */
	public static function activate()
	{
		Typecho_Plugin::factory('Widget_Archive')->header = array('ImageBox_Plugin','header');
		Typecho_Plugin::factory('Widget_Archive')->footer = array('ImageBox_Plugin','footer');
	}
	
	/**
	 * 禁用插件方法,如果禁用失败,直接抛出异常
	 * 
	 * @static
	 * @access public
	 * @return void
	 * @throws Typecho_Plugin_Exception
	 */
	public static function deactivate() {}
	
	/**
	 * 获取插件配置面板
	 * 
	 * @access public
	 * @param Typecho_Widget_Helper_Form $form 配置面板
	 * @return void
	 */
	public static function config(Typecho_Widget_Helper_Form $form)
	{
	    echo '一个简单的、基于jQuery的图片灯箱插件。<br/>原作者：<a href="https://github.com/kirainmoe/Image-Box" target="_blank">吟梦</a>';
	    $jquery = new Typecho_Widget_Helper_Form_Element_Radio(
        'jquery', array('0'=> '手动加载', '1'=> '自动加载'), 0, 'jQuery',
            '“手动加载”需要你手动加载jQuery，若选择“自动加载”，插件会自动加载jQuery，版本为1.9.1。');
        $form->addInput($jquery);
		$Selector = new Typecho_Widget_Helper_Form_Element_Text('Selector', NULL, 'div img', _t('选择器'), _t('(默认div img)请根据你的主题输入适合的值，默认值已经适合大部分情况。<a href="http://www.w3school.com.cn/jquery/jquery_ref_selectors.asp" target="_blank">jQuery选择器说明</a>'));
        $form->addInput($Selector);
	}
	/**
	 * 个人用户的配置面板
	 * 
	 * @access public
	 * @param Typecho_Widget_Helper_Form $form
	 * @return void
	 */
	public static function personalConfig(Typecho_Widget_Helper_Form $form) {}
	/**
	 * 头部css挂载
	 * 
     * @access public
	 * @return void
	 */
    public static function header(){
		if(Typecho_Widget::widget('Widget_Options')->Plugin('ImageBox')->jquery=='1'){
			echo '<script src="//lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>';
		}
	    echo '<link href="'.Helper::options()->pluginUrl.'/ImageBox/ImageBox.css" rel="stylesheet">';
    }
	/**
	 * 尾部js挂载
	 *
     * @access public
	 * @return void
	 */
    public static function footer(){
	    echo '<script src="' . Helper::options()->pluginUrl . '/ImageBox/ImageBox.js"></script>';
        echo '<script>$("'.Typecho_Widget::widget('Widget_Options')->plugin('ImageBox')->Selector.'").addClass("ImageBox");</script>';
	}
}
