<?php

namespace App\Http\Livewire;

use App\Models\Question;
use Livewire\Component;

class QuestionEdit extends Component
{
    public $answers = ['a', 'b', 'c', 'd'];

    public $question_id;
    public $name;
    public $answer_a;
    public $answer_b;
    public $answer_c;
    public $answer_d;
    public $correct_answer;

    public function mount(){
        $question = Question::findOrFail($this->question_id);
        $this->question_id = $question->id;
        $this->name = $question->name;
        $this->answer_a = $question->answer_b;
        $this->answer_b = $question->answer_b;
        $this->answer_c = $question->answer_c;
        $this->answer_d = $question->answer_d;
        $this->correct_answer = $question->correct_answer;
    }
    protected $rules = [
        'name' => 'required',
        'answer_a' => 'required',
        'answer_b' => 'required',
        'answer_c' => 'required',
        'answer_d' => 'required',
        'correct_answer' => 'required',
    ];
    public function render()
    {
        return view('livewire.question-edit');
    }
    public function questionUpdate(){
        sleep(2);
        $question = Question::findOrFail($this->question_id);
        $this->validate();

        $question->update([
            'name' => $this->name,
            'answer_a' => $this->answer_a,
            'answer_b' => $this->answer_b,
            'answer_c' => $this->answer_c,
            'answer_d' => $this->answer_d,
            'correct_answer' => $this->correct_answer,
            
        ]);

        flash()->addSuccess('Question update SuccesFully');
        return redirect()->route('question.index');
    }
}
