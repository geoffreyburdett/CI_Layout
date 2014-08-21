<?php 
class Example extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->library('layout');
    }
    
    
    public function typical(){
        $data['title'] = 'Typical';
        
        // Prints the Default template (/views/templates/layout) with typical.phtml view
        $this->layout->render('typical', $data);
    }
    
    
    public function advanced(){
        $data['title']    = 'Advanced';
        $data['to_name']  = 'Billy Bob';
        $data['username'] = 'a-user-name';
        $data['password'] = 'p@$$w0rd';
        
        
        // Returns the contents of the email/new_user.phtml and email/account_info.phtml view within the email.phtml template
        $message = $this->layout->render(
            array(
                'email/new_user',
                'email/account_info'
            ), 
            $data, 
            'templates/email', 
            TRUE
        );
        
        echo htmlspecialchars($message);
    }
    
}