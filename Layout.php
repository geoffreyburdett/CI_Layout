<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

/**
 * Layout Class
 *
 * @name CodeIgniter Layout Library
 * @license http://choosealicense.com/licenses/gpl-3.0/
 * @author Geoffrey Burdett
 * @link http://geoffreydesigns.com
 */
 
class Layout 
{
    
    protected $CI;
    
public function __construct()
    {
        $this->CI =& get_instance();
}
    
    
    /**
* Returns the validated filename
*
* Checks is filename exists without additional extention,
* with '.ptml', and with '.php'
*
* @param str       $views list of views to load
* @return str|bool returns the valid filename, or returns FALSE if none is found
*/
    private function get_filename($filename)
    {
        if ( file_exists(APPPATH.'/views/' . $filename))
        {
            return $filename;
        } 
        if ( file_exists(APPPATH.'/views/' . $filename . '.phtml'))
        {
            return $filename . '.phtml';
        } 
        elseif ( file_exists(APPPATH.'/views/' . $filename . '.php')) 
        {
            return $filename . '.php';
        } 
        else 
        {
            return FALSE;
        }
    }
    
    
    /**
* Print the view using a template and contents.
*
* @param str|array $views       list of views to load
* @param array     $data        (optional) data to pass to the template and views
* @param str       $template    (optional) name of template file with or without extention relative to views folder
* @param bool      $return_data (optional) TRUE will return the output to the controller instead of printing it
* @returnobj       $this->CI->load->view object
*/
    
    public function render($views = array(), $data = array(), $template = 'templates/layout', $return_data = FALSE)
    {
        if ( ! is_array($views))
        {
            $views = array($views);
        }
        
        $template = $this->get_filename($template);
        $use_template = (bool) $template;
        
        $layout_content = '';
        if ( $views )
        {
            foreach ($views as $view) 
            {
                $view = $this->get_filename($view);
                $layout_content .= $this->CI->load->view($view, $data, $use_template);
            }
        }
        
        $data['layout_content'] = $layout_content;
        
        return $this->CI->load->view($template, $data, $return_data);
        
    }
}

/* End of file myfile.php */
/* Location: application/libraries/Layout.php */