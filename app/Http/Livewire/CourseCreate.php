<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Curriculum;

use Carbon\Carbon;
use DateInterval;
use DatePeriod;
use DateTime;
use Livewire\Component;

class CourseCreate extends Component
{
    public $name;
    public $description;
    public $price;
    public $selectedDays = [];
   
    public $time;
    public $end_date;
   

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

    public function render(){   
    
        return view('livewire.course-create');
  
    }
    public function formSubmit() {
        $this->validate();
        $course = Course::create([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            // 'user_id' => Auth::user()->id
        ]);
        
        flash()->addSuccess('Course created successfully');

        return redirect()->route('course.index');
    }
}
