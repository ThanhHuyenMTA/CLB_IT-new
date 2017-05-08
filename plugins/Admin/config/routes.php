<?php
use Cake\Routing\Router;

Router::plugin(
    'Admin',
    ['path' => '/admin'],
    function ($routes) {
        $routes->connect('/', ['controller' => 'Admin', 'action' => 'index']);
        $routes->connect('/bieu-do.html', ['controller' => 'Admin', 'action' => 'getOrderChartSale']);
        $routes->connect('/dang-nhap.html', ['controller' => 'Users', 'action' => 'login']);
        $routes->connect('/dang-xuat', ['controller' => 'Users', 'action' => 'logout']);
        $userAlias = array(
            'quan-ly.html' => 'index',
            'them-moi.html' => 'add',
            'chinh-sua.html' => 'edit'
        );
        foreach ($userAlias as $alias => $action){
            if($action == 'edit'){
                $routes->connect('/user/'.$alias, ['controller' => 'Users', 'action' => $action], ['id' => '[0-9]+']);
            }else{
                $routes->connect('/user/'.$alias, ['controller' => 'Users', 'action' => $action]);
            }
        }

        $customerAlias = array(
            'nha-tuyen-dung.html' => 'recruitment',
            'them-moi-nha-tuyen-dung.html' => 'recruitmentAdd',
            'chinh-sua-nha-tuyen-dung.html' => 'recruitmentEdit',
            'ung-vien.html' => 'employee',
            'them-moi-ung-vien.html' => 'employeeAdd',
            'chinh-sua-ung-vien.html' => 'employeeEdit'
        );
        foreach ($customerAlias as $alias => $action){
            if($action == 'edit'){
                $routes->connect('/customer/'.$alias, ['controller' => 'Customers', 'action' => $action], ['id' => '[0-9]+']);
            }else{
                $routes->connect('/customer/'.$alias, ['controller' => 'Customers', 'action' => $action]);
            }
        }

        $jobAlias = array(
            'quan-ly.html' => 'index',
            'them-moi.html' => 'add',
            'chinh-sua.html' => 'edit'
        );
        foreach ($jobAlias as $alias => $action){
            if($action == 'edit'){
                $routes->connect('/job/'.$alias, ['controller' => 'Jobs', 'action' => $action], ['recruitment_id' => '[0-9]+', 'id' => '[0-9]+']);
            }else{
                $routes->connect('/job/'.$alias, ['controller' => 'Jobs', 'action' => $action], ['recruitment_id' => '[0-9]+']);
            }
        }

        $cvAlias = array(
            'quan-ly.html' => 'index',
            'them-moi.html' => 'add',
            'chinh-sua.html' => 'edit'
        );
        foreach ($cvAlias as $alias => $action){
            if($action == 'edit'){
                $routes->connect('/cv/'.$alias, ['controller' => 'Cvs', 'action' => $action], ['id' => '[0-9]+']);
            }else{
                $routes->connect('/cv/'.$alias, ['controller' => 'Cvs', 'action' => $action]);
            }
        }

        $choicesAlias = array(
            'quan-ly.html' => 'index',
            'them-moi.html' => 'add',
            'chinh-sua.html' => 'edit'
        );
        foreach ($choicesAlias as $alias => $action){
            if($action == 'edit'){
                $routes->connect('/choice/'.$alias, ['controller' => 'Choices', 'action' => $action], ['id' => '[0-9]+']);
            }else{
                $routes->connect('/choice/'.$alias, ['controller' => 'Choices', 'action' => $action]);
            }
        }

        $appliesJobAlias = array(
            'quan-ly.html' => 'index',
            'them-moi.html' => 'add',
            'chinh-sua.html' => 'edit'
        );
        foreach ($appliesJobAlias as $alias => $action){
            if($action == 'edit'){
                $routes->connect('/apply-job/'.$alias, ['controller' => 'ApplyJobs', 'action' => $action], ['id' => '[0-9]+', 'job_id' => '[0-9]+']);
            }else{
                $routes->connect('/apply-job/'.$alias, ['controller' => 'ApplyJobs', 'action' => $action], ['job_id' => '[0-9]+']);
            }
        }
        
        $appliesCvAlias = array(
            'quan-ly.html' => 'index',
            'them-moi.html' => 'add',
            'chinh-sua.html' => 'edit'
        );
        foreach ($appliesCvAlias as $alias => $action){
            if($action == 'edit'){
                $routes->connect('/apply-cv/'.$alias, ['controller' => 'ApplyCvs', 'action' => $action], ['id' => '[0-9]+', 'cv_id' => '[0-9]+']);
            }else{
                $routes->connect('/apply-cv/'.$alias, ['controller' => 'ApplyCvs', 'action' => $action], ['cv_id' => '[0-9]+']);
            }
        }
        
        $contactAlias = array(
            'quan-ly.html' => 'index',
            'tra-loi.html' => 'reply',
            'chi-tiet.html' => 'view'
        );
        foreach ($contactAlias as $alias => $action){
            if($action == 'view' || $action == 'reply'){
                $routes->connect('/lien-he/'.$alias, ['controller' => 'Contacts', 'action' => $action], ['id' => '[0-9]+']);
            }else{
                $routes->connect('/lien-he/'.$alias, ['controller' => 'Contacts', 'action' => $action]);
            }
        }

        $forgotpasswordAlias = array(
            'quan-ly.html' => 'index',
            'chi-tiet.html' => 'view'
        );
        foreach ($forgotpasswordAlias as $alias => $action){
            if($action == 'view'){
                $routes->connect('/quen-mat-khau/'.$alias, ['controller' => 'ForgotPasswords', 'action' => $action], ['id' => '[0-9]+']);
            }else{
                $routes->connect('/quen-mat-khau/'.$alias, ['controller' => 'ForgotPasswords', 'action' => $action]);
            }
        }
        
        $typeJobAlias = array(
            'quan-ly.html' => 'index',
            'them-moi.html' => 'add',
            'chinh-sua.html' => 'edit'
        );
        foreach ($typeJobAlias as $alias => $action){
            if($action == 'edit'){
                $routes->connect('/loai-cong-viec/'.$alias, ['controller' => 'TypeJobs', 'action' => $action], ['id' => '[0-9]+']);
            }else{
                $routes->connect('/loai-cong-viec/'.$alias, ['controller' => 'TypeJobs', 'action' => $action]);
            }
        }

        $bannerAlias = array(
            'quan-ly.html' => 'index',
            'them-moi.html' => 'add',
            'chinh-sua.html' => 'edit'
        );
        foreach ($bannerAlias as $alias => $action){
            if($action == 'edit'){
                $routes->connect('/quan-ly-banner/'.$alias, ['controller' => 'Banners', 'action' => $action], ['id' => '[0-9]+']);
            }else{
                $routes->connect('/quan-ly-banner/'.$alias, ['controller' => 'Banners', 'action' => $action]);
            }
        }

        $routes->fallbacks('DashedRoute');
    }
);

Router::scope('/api', function ($routes) {
    $customerAlias = array(
        'quan-ly.html' => 'customerList',
        'them-moi.html' => 'add',
        'chinh-sua.html' => 'edit'
    );
    foreach ($customerAlias as $alias => $action){
        if($action == 'edit'){
            $routes->connect('/customer/'.$alias, ['controller' => 'Customers', 'action' => $action], ['id' => '[0-9]+']);
        }else{
            $routes->connect('/customer/'.$alias, ['controller' => 'Customers', 'action' => $action, 'plugin' => 'Admin']);
        }
    }
    $routes->extensions(['json']);
    $routes->resources('Recipes');
});