<?php

# Array de rotas
$routes = [
    
    "/"                   => "LoginController@index",
    "/sair"               => "LoginController@logout",
    "/cadastro"           => "CadastroController@index",
    "/termos-de-servico"  => "CadastroController@termosDeServico",
    "/home"               => "HomeController@index",
    "/settings"           => "HomeController@settings",
 
];