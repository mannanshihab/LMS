<?php

namespace App\Http\Livewire;
use App\Models\Course;
use Livewire\Component;

class CourseEdit extends Component
{
    public $course_id;
    public $name;
    public $description;
    public $price;

    public function mount(){
        $course = Course::findOrFail($this->course_id);
        $this->course_id = $course->id;
        $this->name = $course->name;
        $this->description = $course->description;
        $this->price = $course->price;
    }
    protected $rules = [
        'name' => 'required|unique:courses,name',
        'description' => 'required',
        'price' => 'required',
    ];

    public function submitFrom(){
        sleep(2);
        $course = Course::findOrFail($this->course_id);
        $this->validate();

        $course->name =$this->name;
        $course->description =$this->description;
        $course->price =$this->price;

        $course->save();

        flash()->addSuccess('Course update SuccesFully');
        return redirect()->route('course.index');
    }

    public function render()
    {   
       
        return view('livewire.course-edit');
    }
}
