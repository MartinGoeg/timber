<?php

	add_filter('get_twig', 'add_to_twig');

	function add_to_twig($twig){
		/* this is where you can add your own fuctions to twig */
		$twig->addExtension(new Twig_Extension_StringLoader());
		return $twig;
	}

	function load_scripts(){
		wp_enqueue_script('jquery');
		wp_enqueue_script('pjax', THEME_URL.'/js/libs/jquery.pjax.js', array('jquery'), false, true);
		wp_enqueue_script('prologue', THEME_URL.'/js/prologue.js', array('jquery', 'less'), false, true);

		wp_enqueue_script('less', THEME_URL.'/js/libs/less-1.3.3.min.js', array(), false, true);

		//<script type='text/javascript' src='http://insight.randomhouse.com/widget/viewer.js'>
		wp_enqueue_script('insight', 'http://insight.randomhouse.com/widget/viewer.js');
		//wp_enqueue_script('goodreads-status', 'http://www.goodreads.com/javascripts/widgets/update_status.js');
		
	}

	function load_styles(){
		
		wp_register_style( 'screen', THEME_URL.'/style.css', '', '', 'screen' );
        wp_enqueue_style( 'screen' );
	}

	function osort(&$array, $prop) {
    	usort($array, function($a, $b) use ($prop) {
        	return $a->$prop > $b->$prop ? 1 : -1;
    	}); 
	}

	register_activation_hook(__FILE__, 'my_activation');

	add_action('wp_enqueue_scripts', 'load_scripts');
	add_action('wp_enqueue_scripts', 'load_styles');

