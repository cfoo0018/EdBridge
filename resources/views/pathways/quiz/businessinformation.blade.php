@extends('layout.layout')

@section('title', 'BridgeEd - Knowledge Quest')

@section('content')

<!-- Quiz Title -->
<div id="business-quiz" class="mx-auto md:w-2/3 text-left mt-24 md:mt-36 px-4 md:px-0">
    <div class="flex space-x-4 mb-2">
        <h1 id="quiz-1" class="font-Overpass font-bold text-4xl mb-2 text-Second">Business Information Systems Knowledge Quest</h1>
        <img src="{{ asset('images/quest.png') }}" alt="quiz" class=" h-10"/>
    </div>
    <p class="text-xl">Welcome to Knowledge Quest! This quest is designed to help you gauge your understanding of the key concepts covered in the course and identify areas for improvement in your knowledge journey.</p>
</div>

<div class="divider"></div>

<div class="mockup-window border border-base-300 w-4/5 md:w-2/3 mx-auto mb-12">
    
    <div id="question-container" class="flex flex-col justify-center text-center px-8 border-t border-base-300">
        <div>
            <ul id="question-numbers" class="steps pt-4">
            </ul>
        </div>
        <!-- Question -->
        <div class="py-4 md:py-12">
            <h3 id="type" class="font-Overpass md:text-lg text-gray-400 mb-2"></h3>
            <p id="question" class="text-lg md:text-4xl mb-4 md:mb-12 font-semibold md:font-normal"></p>
            <!-- Answer -->
            <div id="answer-buttons" class="md:px-16 space-y-4 md:space-y-6 mb-4"></div>
        </div>
    </div>
    <!-- Result -->
    <div id="result-div" class="flex flex-col justify-center items-center text-center px-8 py-16 border-t border-base-300"></div>
    <!-- Navigate Buttons -->
    <div id="nav-btn" class="flex flex-col md:flex-row justify-center md:py-4 md:space-x-12 border-t border-base-300">
        <button id="submit-btn" class="btn btn-outline hover:bg-Button ">Submit Answer</button>
        <button id="restart-btn" class="btn btn-outline hover:bg-Button">Restart Quiz</button>
        <button id="skip-btn" class="btn btn-outline btn-error">Skip Question</button>
    </div>
</div>
@endsection