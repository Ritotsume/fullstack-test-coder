<?php

namespace App\View\Components\dashboard;

use Illuminate\View\Component;

class DropdownMessages extends Component
{
    /**
     * Mostra a quantidade de mensagens não lidas.
     * @var int
     */
    public $amount;

    /**
     * Um Array|Object contendo as mensagens que não foram lidas.
     * @var Array|Object
     */
    public $data;

    /**
     * Cria uma nova instancia do componente
     *
     * @return void
     */
    public function __construct($amount, $data)
    {
        $this->middleware('auth');

        $this->amount = $amount;
        $this->data = $data;
    }

    /**
     * Mostra a view que representa o componente
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.dropdown-messages');
    }
}
