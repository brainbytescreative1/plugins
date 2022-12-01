<?php

namespace BBC_Elementor\Widgets;

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

use \Elementor\Controls_Manager;
use \Elementor\Utils;
use Elementor\Plugin;

class Helper
{

	/**
     * Get Gravity Form [ if exists ]
     *
     * @return array
     */
    public static function get_gravity_form_list()
    {
        $options = array();

        if (class_exists('GFCommon')) {
            $gravity_forms = \RGFormsModel::get_forms(null, 'title');

            if (!empty($gravity_forms) && !is_wp_error($gravity_forms)) {

                $options[0] = esc_html__('Select Gravity Form', 'bbc-elementor');
                foreach ($gravity_forms as $form) {
                    $options[$form->id] = $form->title;
                }

            } else {
                $options[0] = esc_html__('Create a Form First', 'bbc-elementor');
            }
        }

        return $options;
    }
    
}
	
?>