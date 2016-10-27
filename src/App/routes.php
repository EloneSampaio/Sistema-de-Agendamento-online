<?php


//Admin
$app->get("/admin","App\Action\Admin\AgendarAction:index")->add(App\Middleware\Admin\AuthMiddleware::class)->setName("home.admin");

//Rotas para fazer login
$app->get("/admin/login","App\Action\Admin\AuthAction:getSignIn")->setName("auth.entrar");
$app->post("/admin/login","App\Action\Admin\AuthAction:postSignIn");

$app->get("/admin/sair","App\Action\Admin\AuthAction:SignOut")->setName("auth.sair");


//Rotas para fazer novo cadastro de usuario
$app->get("/admin/cadastro","App\Action\Admin\AuthAction:getSignup");
$app->post("/admin/cadastro","App\Action\Admin\AuthAction:postSignup");

//Cliente
$app->get("/",'App\Action\AgendarAction:index')->setName('home');
$app->get("/agendar",'App\Action\AgendarAction:agenda')->setName('agenda');
$app->post("/agendarPost",'App\Action\AgendarAction:postAgenda');
$app->get("/reagendar",'App\Action\AgendarAction:reagendar');
$app->get("/cancelar",'App\Action\AgendarAction:cancelar');
$app->get("/listaAgenda",'App\Action\AgendarAction:listaVaga');
$app->post("/verVaga",'App\Action\AgendarAction:buscaVaga');
$app->post("/addVaga",'App\Action\AgendarAction:addVaga');
$app->post("/listaImprimir",'App\Action\AgendarAction:listaAgenda');

