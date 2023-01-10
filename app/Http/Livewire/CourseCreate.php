<?php

namespace App\Http\Livewire;
use App\Models\Course;
use Livewire\Component;

class CourseCreate extends Component
{
    public $name;
    public $description;
    public $price;
    public $selectedDays = [];

    public $days = [
        'Sunday',
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday'
    ];
    protected $rules = [
        'name' => 'required|unique:courses,name',
        'description' => 'required',
        'price' => 'required',
    ];

    public function render()
    {   $course = Course::all();
        return view('livewire.course-create', [
            'course' => $course
        ]);
    }
    public function formSubmit(){
        $this->validate();

        $course = Course::create([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'user_id' => auth()->user()->id            
        ]);
        flash()->addSuccess('Course created successfully');
        return redirect()->route('course.index');

    }
}
