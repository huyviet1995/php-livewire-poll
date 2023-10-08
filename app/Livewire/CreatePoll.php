<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Poll;

class CreatePoll extends Component
{
    public $title;
    public $count = 0;
    public $options = [];

    protected $rules = [
        'title' => "required|min:3|max:255",
        "options" => 'required|array|min:1|max:10',
        "options.*" => 'required|min:1|max:255'
    ];

    protected $messages = [
        'options.*' => "The option cannot be empty",
    ];

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
        $this->validate();

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
