<?php

namespace ZRDN;

use ZRDN\Recipe as RecipeModel;
abstract class __list
{

	//class can probably be removed

	const INDEX_PAGE_ID = ""; // overridden in children
    const ZRDN_EXTENSION_DB_NAME = ""; // overridden in children
	public $suffix = '';

    function __construct ()
    {
	    $this->suffix = ( defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ) ? '' : '.min';
	    //add_action("zrdn__init_hooks", array($this, 'init_hooks'));

    }

    public function init_hooks()
    {
        //add_action("zrdn__menu_page", array($this, 'menu_setup'));
    }



    /**
     * @param array $settings array:
     *  "parent_slug"
     *  "capability"
     */
    public function menu_setup($settings=array()) {
        $recipe_indexes_page_title = $recipe_indexes_menu_title = $this::MENU_SECTION_TITLE;
        add_submenu_page(
            $settings['parent_slug'], // parent_slug
            $recipe_indexes_page_title, // page_title
            $recipe_indexes_menu_title, // menu_title
            $settings['capability'], // capability
            $this::INDEX_PAGE_ID, // menu_slug
            array($this, 'page_renderer') // callback function
        );
    }

}