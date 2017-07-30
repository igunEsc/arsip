<?php
defined('BASEPATH') OR exit('No direct script access allowed');


if(!function_exists('cdn_datatables'))
{
	function cdn_datatables()
	{
		$CI=& get_instance();
		$version="1.10.10";
		$responsive="2.0.0";
		$button="1.1.0";
		$bootstrap="1.10.10";
		$jszip="2.5.0";
		$pdfmake="0.1.18";
		
		$local=$CI->config->item('my')['cdn'];
		$a='';
		$a.=add_css($local.'datatables/DataTables/'.$version.'/css/dataTables.bootstrap.min.css');
		$a.=add_css($local.'datatables/Responsive/'.$responsive.'/css/responsive.bootstrap.min.css');
		$a.=add_css($local.'datatables/Buttons/'.$button.'/css/buttons.dataTables.min.css');
		$a.=add_js($local.'datatables/DataTables/'.$version.'/js/jquery.dataTables.min.js');
		$a.=add_js($local.'datatables/Responsive/'.$responsive.'/js/dataTables.responsive.min.js');
		$a.=add_js($local.'datatables/DataTables/'.$version.'/js/dataTables.bootstrap.min.js');
		$a.=add_js($local.'datatables/Responsive/'.$responsive.'/js/responsive.bootstrap.min.js');
		$a.=add_js($local.'datatables/Buttons/'.$button.'/js/dataTables.buttons.min.js');
		$a.=add_js($local.'datatables/Buttons/'.$button.'/js/buttons.flash.min.js');
		$a.=add_js($local.'datatables/JSZip/'.$jszip.'/jszip.min.js');
		$a.=add_js($local.'datatables/pdfmake/'.$pdfmake.'/build/pdfmake.min.js');
		$a.=add_js($local.'datatables/pdfmake/'.$pdfmake.'/build/vfs_fonts.js');
		$a.=add_js($local.'datatables/Buttons/'.$button.'/js/buttons.html5.min.js');
		$a.=add_js($local.'datatables/Buttons/'.$button.'/js/buttons.print.min.js');
		
		return $a;
	}
}


if(!function_exists('cdn_jquery'))
{
	function cdn_jquery()
	{
		$CI=& get_instance();
		$version="2.1.4";
		//$version="1.11.3";
				
		$local=$CI->config->item('my')['cdn'];
		$a=add_js($local.'jquery/'.$version.'/jquery.min.js');
		return $a;
	}
}

if(!function_exists('cdn_font_awesome'))
{
	function cdn_font_awesome()
	{
		$CI=& get_instance();
		$version="4.7.0";
		
		$local=$CI->config->item('my')['cdn'];
		$a=add_css($local.'font-awesome/'.$version.'/css/font-awesome.min.css');
		
		return $a;
	}
}

if(!function_exists('cdn_ionicons'))
{
	function cdn_ionicons()
	{
		$CI=& get_instance();
		$version="2.0.1";
		
		$local=$CI->config->item('my')['cdn'];
		return add_css($local.'ionicons/'.$version.'/css/ionicons.min.css');
	}
}

if(!function_exists('cdn_bootstrap_css'))
{
	function cdn_bootstrap_css()
	{
		$CI=& get_instance();
		$version="3.3.5";
		
		$local=$CI->config->item('my')['cdn'];
		return add_css($local.'bootstrap/'.$version.'/css/bootstrap.min.css');	
	}
}

if(!function_exists('cdn_bootstrap_js'))
{
	function cdn_bootstrap_js()
	{
		$CI=& get_instance();
		$version="3.3.5";
		
		$local=$CI->config->item('my')['cdn'];
		
		return add_js($local.'bootstrap/'.$version.'/js/bootstrap.min.js');	
	}
}

if(!function_exists('cdn_jqueryui'))
{
	function cdn_jqueryui($theme="smoothness")
	{
		$CI=& get_instance();
		$version="1.11.4";
		
		$local=$CI->config->item('my')['cdn'];
		
		$a='';
		$a.=add_css($local.'jqueryui/'.$version.'/jquery-ui.min.css');
		$a.=add_css($local.'jqueryui/'.$version.'/themes/'.$theme.'/jquery-ui.min.css');
		$a.=add_js($local.'jqueryui/'.$version.'/jquery-ui.min.js');
		return $a;
	}
}


if(!function_exists('cdn_videojs'))
{
	function cdn_videojs()
	{
		$CI=& get_instance();
		$version="5.5.1";
		
		$local=$CI->config->item('my')['cdn'];
		
		$a='';
		$a.=add_css($local.'videojs/'.$version.'/video-js.min.css');
		$a.=add_js($local.'videojs/'.$version.'/ie8/videojs-ie8.min.js');
		$a.=add_js($local.'videojs/'.$version.'/video.min.js');
		return $a;
	}
}

if(!function_exists('cdn_prettyphoto'))
{
	function cdn_prettyphoto()
	{
		$CI=& get_instance();
		$version="3.1.6";
		
		$local=$CI->config->item('my')['cdn'];
		
		$a='';
		$param=array(
		'type'=>'text/css',
		'media'=>'screen',
		'title'=>'prettyPhoto main stylesheet',
		'charset'=>'utf-8',
		);
		$a.=add_css($local.'prettyphoto/'.$version.'/css/prettyPhoto.css',$param);
		$a.=add_js($local.'prettyphoto/'.$version.'/js/jquery.prettyPhoto.js');
		return $a;
	}
}

if(!function_exists('cdn_select2'))
{
	function cdn_select2()
	{
		$CI=& get_instance();
		$version="4.0.1";
		
		$local=$CI->config->item('my')['cdn'];
		
		$a='';
		$a.=add_css($local.'select2/'.$version.'/css/select2.min.css');
		$a.=add_js($local.'select2/'.$version.'/js/select2.full.min.js');
		$a.=add_js($local.'select2/'.$version.'/js/i18n/id.js');
		
		return $a;
	}
}

if(!function_exists('cdn_highchart'))
{
	function cdn_highchart()
	{
		$CI=& get_instance();
		$version="4.2.1";
		$theme="";
		
		$local=$CI->config->item('my')['cdn'];
		
		$a='';
		$a.=add_js($local.'highcharts/'.$version.'/js/highcharts.js');
		if(!empty($theme))
		{
			$a.=add_js($local.'highcharts/'.$version.'/js/themes/'.$theme.'.js');
		}
		
		return $a;
	}
}


if(!function_exists('cdn_inputmask'))
{
	function cdn_inputmask()
	{
		$CI=& get_instance();
		$version="3.2.7";
		
		$local=$CI->config->item('my')['cdn'];
		
		$o='';
		$o.=add_js($local.'inputmask/'.$version.'/jquery.inputmask.bundle.min.js');
		return $o;
	}
}

if(!function_exists('cdn_ckeditor'))
{
	function cdn_ckeditor($package="standard")
	{
		$CI=& get_instance();
		$version="4.5.7";
		
		$local=$CI->config->item('my')['cdn'];
		
		$o='';
		$o.=add_js($local.'ckeditor/'.$version.'/'.$package.'/ckeditor.js');
		return $o;
	}
}

if(!function_exists('cdn_validator'))
{
	function cdn_validator()
	{
		$p=add_css(path_assets('url').'plugins/validator/validator.css');
		$p.=add_js(path_assets('url').'plugins/validator/validator.js');
		return $p;
	}
}