<?php 

namespace App\utils;


class RenderView
{
    /**
     * Método responsável por carregar a view solicitada e passar os argumentos (variáveis)
     * para essa view.
     * OBS.: Os argumento poderão vir em um array
     */
    public function loadView($view, $args)
    {
        extract($args);

        require_once __DIR__."/../../resources/views/$view.php";
    }
}