<?php

namespace App\core;

use App\controller\NotFoundController;

class Core
{
    /**
     * Método resposável por tratar as rotas
     * @param $routes
     */
    public function run($routes)
    {
        $url = "/";

        // Monta a URL a partir do parâmetro GET
        if (isset($_GET['url'])) {
            $url .= $_GET['url'];
        }

        if ($url !== '/') {
            $url = rtrim($url, '/');
        }

        $routerFound = false;

        foreach($routes as $path => $controller) {
            $escaped_path = preg_quote($path, '#');
            $pattern = '#^'.str_replace('\{id\}', '([\w-]+)', $escaped_path).'$#';
    
            if(preg_match($pattern, $url, $matches)) {
                array_shift($matches);

                $routerFound = true;
                
                [$currentController, $action] = explode('@', $controller);
                
                // Monta o namespace completo do controller
                $controllerClass = "\\App\\controller\\{$currentController}";

                // Verifica se a classe do controller existe
                if (!class_exists($controllerClass)) {
                    throw new \Exception("Controller {$controllerClass} não encontrado");

                }

                $newController = new $controllerClass();

                // Verifica se o método existe no controller
                if (!method_exists($newController, $action)) {
                    throw new \Exception("Método {$action} não encontrado em {$controllerClass}");
                }

                $newController->$action($matches);
            }
        }

        # Retorna o 404
        if(!$routerFound){
            $controller = new NotFoundController();
            $controller->index();
        }
    }
}
