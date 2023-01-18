<?php

namespace App\Http\Controllers;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index(){
        return view('quiz.index');
    }
    
    public function store(Request $request){
        $quiz = Quiz::Create([
            'name' => $request->name,
        ]);
        
        return redirect()->route('quiz.index');
    }

    public function show(Quiz $quiz){
        return view('quiz.show', [
            "quiz" => $quiz,
        ]);
    }
    public function quizShow($id){
        $quiz = Quiz::findOrFail($id);
        return view('quiz.quiz-show', [
            'quiz' => $quiz,
        ]);
    }
}
