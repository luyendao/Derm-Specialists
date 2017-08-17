<?php

function theme_init_theme() {
	# Enqueue jQuery
	wp_enqueue_script('jquery');

	if (is_admin()) { /* Front end scripts and styles won't be included in admin area */
		return;
	}
	# Enqueue Custom Scripts
	# @wp_enqueue_script attributes -- id, location, dependancies, version
	//wp_enqueue_script('custom-script', get_bloginfo('stylesheet_directory') . '/js/custom-script.js', array('jquery'), '1.0');
	wp_enqueue_script('jquery-flexslider', get_bloginfo('stylesheet_directory') . '/js/jquery.flexslider-min.js', array('jquery'));
	wp_enqueue_script('jquery-functions', get_bloginfo('stylesheet_directory') . '/js/functions.js', array('jquery', 'jquery-flexslider'));
	if(wp_script_is('jquery-flexslider', 'queue')) {
		wp_enqueue_style('style-flexslider', get_bloginfo('stylesheet_directory') . '/css/flexslider.css');
	}
}
add_action('init', 'theme_init_theme');

add_action('after_setup_theme', 'theme_setup_theme');

# To override theme setup process in a child theme, add your own theme_setup_theme() to your child theme's
# functions.php file.
if (!function_exists('theme_setup_theme')) {
	function theme_setup_theme() {
		include_once('lib/common.php');
		include_once('lib/carbon-fields/carbon-fields.php');
		include_once('options/theme-shortcodes.php');

		# Theme supports
		add_theme_support('automatic-feed-links');
		add_theme_support('post-thumbnails', array('derms_member'));
		
		# Manually select Post Formats to be supported - http://codex.wordpress.org/Post_Formats
		// add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ) );

		# Register Theme Menu Locations
		add_theme_support('menus');
		register_nav_menus(array(
			'main-menu'=>__('Main Menu'),
		));
		# Register CPTs
		include_once('options/post-types.php');
		
		# Attach custom widgets
		include_once('options/widgets.php');
		
		# Add Actions
		#add_action('widgets_init', 'theme_widgets_init');

		add_action('carbon_register_fields', 'attach_theme_options');
		add_action('carbon_after_register_fields', 'attach_theme_help');

		# Add Custom Image Sizes
		add_image_size('member-listing', 104, 0);

		# Add Filters
	}
};

# Register Sidebars
# Note: In a child theme with custom theme_setup_theme() this function is not hooked to widgets_init
/*function theme_widgets_init() {
	register_sidebar(array(
		'name' => 'Default Sidebar',
		'id' => 'default-sidebar',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	));
}*/

function attach_theme_options() {
	# Attach fields
	include_once('options/theme-options.php');
	include_once('options/custom-fields.php');
}

function attach_theme_help() {
	# Theme Help needs to be after options/theme-options.php
	include_once('lib/theme-help/theme-readme.php');
}

/* Custom code goes below this line. */

function derms_head_image($image, $width = 262, $height = 160) {

	if(!empty($image)) : ?>
		<img src="<?php echo derms_get_thumb_url($image, $width, $height); ?>"/>
	<?php endif;

}

function derms_content_edit() {
	the_content(__('<p class="serif">Read the rest of this page &raquo;</p>')); ?>
	<div class="cl">&nbsp;</div>
	<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
	<?php edit_post_link(__('Edit this entry.'), '<p>', '</p>');
}

function derms_get_thumb_url($src, $w = '', $h = '', $zc = 1) {
	$src = urlencode($src);
	return get_bloginfo('template_directory') . '/lib/timthumb.php?src=' . $src . ( ($w) ? '&amp;w=' . $w : '') . ( ($h) ? '&amp;h=' . $h : '') . '&amp;zc=' . $zc;
}

function derms_page_title($wrapper_start = '<h3 class="page-title">', $wrapper_end = '</h3>') {

	$title = '';

	if(is_home()) :
		$blog_page_id = get_option('page_for_posts');
		if($blog_page_id != 0) :
			$title = get_the_title($blog_page_id);
		endif;
	elseif(is_archive()) :
		if (is_category()) :
			$title = '&#8216;' . single_cat_title('', false) . '&#8217; Category';
		elseif( is_tag() ) :
			$title = 'Posts Tagged &#8216;' . single_tag_title() . '&#8217;';
		elseif (is_day()) :
			$title = 'Archive for ' . get_the_time('F jS, Y');
		elseif (is_month()) :
			$title = 'Archive for ' . get_the_time('F, Y');
		elseif (is_year()) :
			$title = 'Archive for ' . get_the_time('Y');
		elseif (is_author()) :
			$title = 'Author Archive';
		elseif (isset($_GET['paged']) && !empty($_GET['paged'])) :
			$title = 'Blog Archives';
		endif;
	elseif(is_404()) :
		$title = 'Error 404 - Not Found';
	elseif(is_search()) :
		$title = 'Search Results';
	else :
		global $post;
		$title = get_the_title($post->ID);
	endif;

	if(!empty($title)) {
		echo $wrapper_start . $title . $wrapper_end;
	}
}

add_filter('the_content', 'derms_shortcode_fix_tags');
function derms_shortcode_fix_tags($content) {
	$array = array (
		'<p>[' => '[',
		']</p>' => ']',
		']<br />' => ']',
	);
	$content = strtr($content, $array);
	return $content;
}

function derms_get_forms() {
	$forms = array();

	if(class_exists('RGFormsModel')) {
		$available_forms = RGFormsModel::get_forms(null, "title");
		$forms[] = 'Choose form';
		foreach ($available_forms as $form) {
			$forms['form_' . $form->id] = $form->title;
		}
	}
	return $forms;
}

add_filter('gform_field_css_class', 'derms_gform_custom_input_css_class', 10, 3);
function derms_gform_custom_input_css_class($classes, $field, $form) {
	$classes .= ' gfield-' . $field['type'];

	return $classes;
}

function derms_search_filter($query) {
    if ($query->is_search) {
        $query->set('post_type', 'post');
    }
    return $query;
}
add_filter('pre_get_posts','derms_search_filter');

function derms_format_total($total) {
	$total = sprintf('%01.2f', floatval($total));
	return $total;
}

function derms_hook_payment($validation) {
	if ($validation['is_valid']) {
		$url = 'https://ws.firstdataglobalgateway.com/fdggwsapi/services';
		// $url = 'https://ws.merchanttest.firstdataglobalgateway.com/fdggwsapi/services/order.wsdl';
		$xml = file_get_contents(dirname(__FILE__) . '/lib/payments/request.xml');

		$months = array('Jan'=>'01', 'Feb'=>'02', 'Mar'=>'03', 'Apr'=>'04', 'May'=>'05', 'Jun'=>'06', 'Jul'=>'07', 'Aug'=>'08', 'Sep'=>'09', 'Oct'=>'10', 'Nov'=>'11', 'Dec'=>'12');

		$input = array(
			'cc_num'=>$_POST['input_9'],
			'exp_month'=>$months[$_POST['input_10']],
			'exp_year'=>substr($_POST['input_11'], -2),
			'total'=>derms_format_total($_POST['input_12']),
			'customer_id'=>$_POST['input_1'],
			'customer_email'=>$_POST['input_2'],
			'customer_name'=>$_POST['input_4'],
			'customer_address'=>$_POST['input_13'],
			'customer_city'=>$_POST['input_14'],
			'customer_state'=>$_POST['input_5'],
			'customer_zip'=>$_POST['input_6'],
			'customer_phone'=>$_POST['input_7'],
		);
		foreach ($input as $key => $value) {
			$xml = str_replace('{{{' . $key . '}}}', htmlentities($value), $xml);
		}

		$headers = array(
		    "Content-type: text/xml",
		    "Content-length: " . strlen($xml),
		);

		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $xml);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_HEADER, 0);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		curl_setopt($curl, CURLOPT_USERPWD, 'WS1001324209._.1:vQyYBTUP');
		curl_setopt($curl, CURLOPT_SSLCERTTYPE, 'PEM');
		curl_setopt($curl, CURLOPT_SSLCERT , dirname(__FILE__) . '/cert/WS1001324209._.1.pem');
		curl_setopt($curl, CURLOPT_SSLCERTPASSWD, 'ckp_1374588922');
		curl_setopt($curl, CURLOPT_SSLKEY, dirname(__FILE__) . '/cert/WS1001324209._.1.key');
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
		$response = curl_exec($curl);

		preg_match_all('/<fdggwsapi\:([\w]+)>([^\<]+)<\/fdggwsapi\:([\w]+)>/', $response, $matches);
		$response_values = array();
		foreach ($matches[1] as $i => $v) {
			$response_values[$v] = $matches[2][$i];
		}
		if (!$response_values) {
			preg_match_all('/<([^\>\s]+)(\s[^\>]*)?>([^\<]+)<\/([^\>]+)>/', $response, $matches);
			foreach ($matches[1] as $i => $v) {
				$response_values[$v] = $matches[3][$i];
			}
		}
		if (!isset($response_values['TransactionResult']) || !$response_values['TransactionResult']) {
			$response_values['TransactionResult'] = 'FRAUD';
		}

		$error = '';
		$order_id = '';
		if ($response_values['TransactionResult'] == 'APPROVED') {
			$_POST['input_15'] = $response_values['OrderId'];
			$_POST['input_16'] = $response_values['ApprovalCode'];
			$_POST['input_9'] = preg_replace('/\d/', '*', substr($_POST['input_9'], 0, -4)) . substr($_POST['input_9'], -4);
		} else {
			$error = preg_replace('/\w{3}-\d{6,}\:\s?/', '', @$response_values['ErrorMessage']);
			if (!$error) {
				$error = 'Please review your credit card detais and try again.';
			}
			$error = 'Payment declined. ' . $error;
		}
		
		if ($error) {
			$validation['is_valid'] = false;
			define('DERMS_VALIDATION_MESSAGE', $error);
		}
	}
	return $validation;
}
add_filter('gform_validation_1', 'derms_hook_payment', 10);

function derms_hook_payment_message($message, $form) {
	if (defined('DERMS_VALIDATION_MESSAGE')) {
		return DERMS_VALIDATION_MESSAGE;
	}
	return $message;
}
add_filter("gform_validation_message_1", "derms_hook_payment_message", 10, 2);

/* Custom code goes above this line. */