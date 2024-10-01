<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Option;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function store(Request $request)
    {
        // Create a new quiz
        $quiz = Quiz::create([
            'course_id' => $request->course_id,
            'section_no'=> $request->section_no,
        ]);

        // Loop through the questions and store each one
        foreach ($request->questions as $questionData) {
            $question = Question::create([
                'quiz_id' => $quiz->id,
                'question' => $questionData['question'],
                'correct_answer' => $questionData['correct_answer'],
            ]);

            // Loop through the options for each question and save them
            foreach ($questionData['options'] as $option) {
                $question->options()->create([
                    'option_text' => $option,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Quiz created successfully!');
    }

    //------------------------------------------------
    // Show all quizzes for a specific course
    public function index($course_id)
    {
        $quizzes = Quiz::where('course_id', $course_id)->get();
        $course= Course::find($course_id);
        $checkQuizzesNumber=0;
        foreach($quizzes as $quiz) {
            $checkQuizzesNumber++;
        }

        return view('website.course-quizzes', compact('quizzes', 'course','checkQuizzesNumber'));
    }

    // Show quiz edit form
    public function edit($quiz_id)
    {
        $quiz = Quiz::findOrFail($quiz_id);

        if (!$quiz) {
            return redirect()->back()->with('error', 'Quiz not found');
        }
        $questions = Question::where('quiz_id', $quiz->id)->get();

        $options = [];

        foreach ($questions as $question) {
            $questionOptions = Option::where('question_id', $question->id)->get();
            $options[$question->id] = $questionOptions;
        }

        return view('website.quiz-edit', compact('quiz','questions','options'));
    }

    // Update a quiz
    public function update(Request $request, $quiz_id)
    {
        $quiz = Quiz::findOrFail($quiz_id);
        $quiz->section_no = $request->section_no;
        $quiz->save();

        foreach ($request->questions as $question_id => $question_data) {
            $question = Question::findOrFail($question_id);
            $question->question = $question_data['text'];
            $question->correct_answer = $question_data['correct'];
            $question->save();

            foreach ($question_data['answers'] as $answer_id => $answer_text) {
                $answer = Option::findOrFail($answer_id);
                $answer->option_text = $answer_text;
                $answer->save();
            }
        }

        return redirect()->route('course-quizzes', $quiz->course_id)->with('success', 'Quiz updated successfully');
    }

    // Delete a quiz
    public function destroy($quiz_id)
    {
        $quiz = Quiz::findOrFail($quiz_id);
        $quiz->delete();

        return back()->with('success', 'Quiz deleted successfully');
    }

    //view quiz details
    public function viewQuizDetails($quiz_id)
    {
        $quiz = Quiz::findOrFail($quiz_id);

        if (!$quiz) {
            return redirect()->back()->with('error', 'Quiz not found');
        }
        $questions = Question::where('quiz_id', $quiz->id)->get();

        $options = [];

        foreach ($questions as $question) {
            $questionOptions = Option::where('question_id', $question->id)->get();
            $options[$question->id] = $questionOptions;
        }

        return view('website.view-quiz-details', compact('quiz','questions','options'));
    }

}
