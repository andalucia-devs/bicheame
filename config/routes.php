<?php

    /* Frontend */
    $app->get('/', function () use($app){
        $domains = Domain::fetchAll();
        $app->render('home.html', array('domains' => $domains));
    })->name('home');
    $app->get('/statistics', function () use($app){
        $app->render('statistics.html');
    })->name('statistics');
    $app->get('/contact', function () use($app){
        $app->render('contact.html');
    })->name('contact');
    $app->group('/login', function() use($app){ 
        $app->get('/', function() use($app){ 
            $app->redirect($app->urlFor('home'));
        });
        $app->post('', function() use($app){ 
            $url = $app->request()->post('url');
            $app->redirect('/login/'.Login::cleanURL($url));
        })->name('login');
        $app->get('/:name', function($name) use($app){
            $logins = Login::fetchByDomainName($name);
            $app->render('login.html', array('logins' => $logins, 'name' => Login::cleanURL($name)));
        });            
    });    

    /* API */
    $app->group('/api', function() use($app){

        $app->group('/login', function() use($app){
            $app->get('/:name', function($name) use($app){
                $app->response->headers->set('Content-Type','application/json');
                $logins = Login::fetchByDomainName($name);
                echo $logins->toJson();
            });            
        });
        $app->group('/domain', function() use($app){
            $app->get('/all', function() use($app){
                $app->response->headers->set('Content-Type','application/json');
                $domains = Domain::fetchAll();
                echo $domains->toJson();
            });
            $app->get('/:name', function($name) use($app){
                $alluser = Domain::fetchByName(Login::cleanURL($name));
                echo $alluser->toJson();
            });
        });

    });