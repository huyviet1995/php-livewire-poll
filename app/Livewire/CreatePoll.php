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
        Poll::create([
            'title' => $this->title,
        ])->options()->createMany(
            collect($this->options)->map(fn ($option) => ['name' => $option])->all()
        );

        $this->reset(['title', 'options']);
    }

    public function render()
    {
        return view('livewire.create-poll');
    }
}
