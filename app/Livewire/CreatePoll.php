<?php

namespace App\Livewire;

use Livewire\Component;

class CreatePoll extends Component
{
    public $title;
    public $count = 0;
    public $options = [];

    public function increment() {
        $this->count++;
    }

    public function addOption() {
        $this->options[] = '';
    }

    public function deleteOption($index) {
        unset($this->options[$index]);
        $this->options = array_values($this->options);
    }

    public function render()
    {
        return view('livewire.create-poll');
    }
}
