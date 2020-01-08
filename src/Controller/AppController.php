<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\I18n\Time;
use Cake\I18n\I18n;
use Cake\Database\Type;
use Cake\Routing\Router;
use Cake\Core\Configure;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    private $usersPermissions = [
        'admin' => [
            '*' => ['*']
        ],
        'usuario' => [
            'Posts' => [
                'index', 'add', 'edit'
            ]
        ]
    ];
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
       
         parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'authorize' => ['Controller'],
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'loginome',
                        'password' => 'senha'
                    ]
                ]
            ],
            'loginRedirect' => [
                'controller' => 'Posts',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'Logins',
                'action' => 'login'
            ]
        ]);
    }

        
        /*$this->loadComponent('Auth', [
        'authorize' => ['Controller'],
        
        'loginAction' => ['controller' => 'Logins',
        'action' => 'login'
        ],
        
        'storage' => 'Session', 
        'loginRedirect' => [
            'controller' => 'Carros',
            'action' => 'index'
        ], 
        
        'logoutRedirect' => [
            'controller' => 'Logins',
            'action' => 'login',
        ],

        'authenticate' => [
        'Form' => ['userModel' => 'Logins',
        'fields' => ['username' => 'loginome', 'passoword' => 'senha']
            ]
        ]

    ]);
    $this->Auth->setConfig('authenticate', 
    ['Form' => ['userModel' => 'Logins']]);*/

    

    public function berforeFilter(Event $event)
    {
        $this->Auth->allow(['index', 'view', 'display', 'edit']);
    }

    public function isAuthorized($login)
    {
        if(isset($login['role'])) {
            foreach($this->usersPermissions 
            as $login => $userPermissions) {
                if($login['role'] == $role) {
                    foreach($userPermissions as $key => $permission) {
                        if($key == '*') {
                            if(in_array('*', $permission)) {
                                return true;
                            } else if (in_array($this->request->params['action'], $permission)) {
                                return true;
                            }
                        } else if($this->request->params['controller'] == $key) {
                            if(in_array($this->request->params['action'], $permission)) {
                                return true;
                            }
                        }
                    }
                }
            }
        }
        return false;
    }
        
    
    
}

