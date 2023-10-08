<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Poll;

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

    public function createPoll() {
        $poll = Poll::create([
            'title' => $this->title,
        ]);

        foreach ($this->options as $optionName) {
            $poll->options()->create([
                'name' => $optionName,
            ]);
        }

        $this->reset(['title', 'options']);
    }

    public function render()
    {
        return view('livewire.create-poll');
    }
}
