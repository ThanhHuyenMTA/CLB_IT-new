<?php
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

class DepartmentsController extends AppController
{
	public function initialize()
    {
         parent::initialize();
         $this->Auth->allow();
    }
	public function listmenu()
	{
		$menus = $this->Departments->Find('all');
		$this->set(compact('menus'));
	}

}
?>