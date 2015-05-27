<?php
/**
 * File: Main BOAIDP block's class
 * @package MOODLE-BLOCK-BOAIDP
 */ 

/* 
 * +----------------------------------------------------------------------+
 * | PHP Version 5                                                        |
 * +----------------------------------------------------------------------+
 * | Copyright (c) 2013 Miguel Gonzalez Laredo                            |
 * |                    mglaredo@ugr.es                                   |
 * |                    University of Granada                             |
 * |                                                                      |
 * | boaidp -- A Moodle Block for generating and editing Course's Metadata|
 * |           and the further connection with OAI v2.0's Data Providers  |
 * |                                                                      |
 * | This is free software; you can redistribute it and/or modify it under|
 * | the terms of the GNU General public License as published by the      |
 * | Free Software Foundation; either version 2 of the License, or (at    |
 * | your option) any later version.                                      |
 * | This software is distributed in the hope that it will be useful, but |
 * | WITHOUT  ANY WARRANTY; without even the implied warranty of          |
 * | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the         |
 * | GNU General public License for more details.                         |     
 * |                                                                      |
 * | You should have received a copy of the GNU General public License    |
 * | along with software.                                                 |
 * | If not, see http://opensource.org/licenses/gpl-3.0.html.             |
 * |                                                                      |
 * +----------------------------------------------------------------------+
 * @copyright Copyright (c) 2013 Miguel Gonzalez Laredo. Virtual Learning Center CEVUG, University of Granada
 * @license    http://opensource.org/licenses/gpl-3.0.html     GNU public License
 * @author Miguel Gonzalez Laredo, mglaredo@ugr.es                     
 */

/* 
 *  More information to develop this feature on:
 * - http://docs.moodle.org/dev/Blocks/Appendix_A
 * - (config_save()) http://docs.moodle.org/dev/Blocks/Appendix_A#config_save.28.29
 */
defined('MOODLE_INTERNAL') || die();

/**
 * Main BOAIDP block's class
 */
class block_boaidp extends block_base {
   /**
    * Block's name for moodle usage
    * @var string "block_boaidp" by default
    */
	public $bname = 'block_boaidp';
	/**
    * Initialization
    */
    function init() {
        $this->title = get_string('pluginname', 'block_boaidp');
        //set_config('dcmetadatas','desde INIT');
    }
	/**
    * Generating content for block displaying
    */
    function get_content() {
        global $CFG, $OUTPUT;

        if ($this->content !== null) {
            return $this->content;
        }

        if (empty($this->instance)) {
            $this->content = '';
            return $this->content;
        }

        $this->content = new stdClass();
        $this->content->items = array();
        $this->content->icons = array();
        $this->content->footer = '';
        $this->content->text = new stdClass();

        // user/index.php expect course context, so get one if page has module context.
        $currentcontext = $this->page->context->get_course_context(false);

        if (! empty($this->config->text)) {
            $this->content->text = $this->config->text;
            
        }

        $this->content = '';
        if (empty($currentcontext)) {
            return $this->content;
        }
        if ($this->page->course->id == SITEID) {
            $this->context->text .= "site context";
        }

        if (isset($this->config) && ! empty($this->config) && isset($this->config->text) && ! empty($this->config->text)) {
            $this->content->text .= $this->config->text;
        }//else{$this->content->text=" ";}
        
        	global $COURSE, $CFG, $PAGE, $USER, $DB;
        	
         $courseid=$PAGE->course->id;//se llama la id de cada curso
         $i=$courseid;
      
         switch($i)
    {      case "2": //si $i=2 entoces haz ...
    	   $N01= new moodle_url('www.google.com');  
    	   $N02= new moodle_url('www.facebook.com');
    	   $N03= new moodle_url('www.gmail.com');
    	
    	  $this->content->text= $OUTPUT->single_button($N01,"suma").$OUTPUT->single_button($N02,"resta")//llamar contenido de botones creados
    	  .$OUTPUT->single_button($N03,"divición");;;
    	  $this->content->footer = "";
    	  return $this-> content;
    	  break;
  
    	    case "3":// lo mismo pero para $i=3
    	    $N11= new moodle_url('');
    	    $N12= new moodle_url('');
    	    $N13= new moodle_url('');
    	
    	    $this->content->text= $OUTPUT->single_button($N11,"aguda"). $OUTPUT->single_button($N12,"grave")
           .$OUTPUT->single_buton($N13,"esdrujula");;;
    	    $this->content->footer="";
    	    return $this-> content;
    	    break;
    	
    	    case "4":// lo mismo pero para $i=3
    		$N21= new moodle_url('');
    		$N22= new moodle_url('');
    		$N23= new moodle_url('');
    		
    		$this->content->text= $OUTPUT->single_button($N21,"atomos"). $OUTPUT->single_button($N22,"harrypotter")
    		.$OUTPUT->single_buton($N23,"eitan");;;
    		$this->content->footer="";
    		return $this-> content;
    		break;
    	default: ;
    }  

   
        
      
   
    /* public */ 
    /**
    * Setting formats...
    */
    function applicable_formats() {
        return array('all' => false,
                     'site' => true,
                     'site-index' => true,
                     'course-view' => true, 
                     'course-view-social' => false,
                     'mod' => true, 
                     'mod-quiz' => false);
  

    /* public */ 
	/**
    * Not allowing multiple
    */
    function instance_allow_multiple() {
          //return true;
          return false;
    }
	/**
    * Allowing Global Configuration (SETTING)
    */
    function has_config() {return true;}

    /* public */ 
	/**
    * Cron for background tasks... (Nothing so far)
    */
    function cron() {
            mtrace( "Hey, my cron script is running" );
             
                 // do something
                  
                      return true;
    }
    
          
          
          
    }
}
}
