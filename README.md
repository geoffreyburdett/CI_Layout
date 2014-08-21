CI_Layout
=========
Code Igniter Layout Class makes quick work of templating, loading multiple views, and sharing data between them.

Version 1.0
Find updates or Report Errors and Bugs at https://github.com/geoffreyburdett/CI_Layout



AUTHOR
======

Geoffrey Burdett
http://www.Geoffreydesigns.com
geoffrey@geoffreydesigns.com



USAGE
=====

public function render($views = array(), [$data = array()], [$template = 'templates/layout'], [$return_data = FALSE])
Prints or returns a template file, which contains the output of the view file as $layout_content.

Views and templates will look for the included extention if there is one, 
Then they will check for a .phtml extention
Then they will check for a .php extention
If no valid file can be found, it will throw an exception

$views          str|array  list of views to load
$data           array      (optional) data to pass to the template and views
$template       str        (optional) name of template file with or without extention relative to views folder
$return_data    bool       (optional) TRUE will return the output to the controller instead of printing it
return          obj        $this->CI->load->view object

 
 
EXAMPLE
=======

$this->load->library('layout');

// Typical Use
// The default template (/application/views/templates/layout.phtml) must echo $layout_content to show the views

// Prints the Default template with the 'fileShare/index' view
$this->layout->render('fileShare/index', $data);

//Advanced Use
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



LICENSE
=======

Read LICENSE

The GNU General Public License does not permit incorporating your program
into proprietary programs.  If your program is a subroutine library, you
may consider it more useful to permit linking proprietary applications with
the library.  If this is what you want to do, use the GNU Lesser General
Public License instead of this License.  But first, please read
<http://www.gnu.org/philosophy/why-not-lgpl.html>.