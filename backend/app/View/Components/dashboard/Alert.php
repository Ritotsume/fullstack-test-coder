<?php

namespace App\View\Components\dashboard;

use Illuminate\View\Component;

class Alert extends Component
{
    /**
     * O tipo da mensagem, é uma classe do bootstrap: danger, warning, info ou success.
     * 
     * @var String
     */
    public $type;

    /**
     * O título da mensagem, este ficará em destaque.
     * 
     * @var String
     */
    public $title;

    /**
     * A mensagem a ser exibida.
     * 
     * @var String
     */
    public $message;

    /**
     * Os errors que ocorreram e que serão mostrados ao usuário.
     * 
     * @var Array|Object
     */
    public $errors;

    /**
     * [OPCIONAL]
     * Uma mensagem para colocar do rodapé do alert.
     * 
     * @var String
     */
    public $footerMessage;

    /**
     * Cria uma instancia do componente.
     *
     * @return void
     */
    public function __construct($type, $title, $message, $footerMessage = '', $errors = null)
    {
        $this->type = $type;
        $this->title = $title;
        $this->message = $message;
        $this->footerMessage = $footerMessage;
        $this->errors = $errors;
    }

    /**
     * Mostra a view que representa o componente.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.alert');
    }
}
