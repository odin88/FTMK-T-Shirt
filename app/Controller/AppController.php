<?php
// app/Controller/AppController.php
class AppController extends Controller {
    //...

    public $components = array(
        'Session',
        'Auth' => array(
            'loginRedirect' => array('controller' => 'orders', 'action' => 'order'),
            #'logoutRedirect' => array('controller' => 'pages', 'action' => 'display', 'home')
            'logoutRedirect' => '/'
        )
    );

    function beforeFilter() {
        $this->Auth->allow('login', 'order');
    }
    //...
}
