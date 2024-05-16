@extends('layout.layout')

@section('title', 'BridgeEd - Pathways Prediction')

@section('content')
    <div class="container max-w-[1080px] mx-auto bg-white p-8 rounded shadow-lg mt-20 mb-10">
        <h1 class="text-4xl font-Overpass text-Second text-center mb-8">Discover Your IT Career Path</h1>
        <p class="text-lg text-gray-600 text-center mb-8">Answer the questions below to find out which IT pathway aligns with your interests and skills.</p>
        <form method="POST" action="{{ route('submit') }}" class="space-y-8">
            @csrf
            @php
                $baseQuestions = [
                    'Motivation' => 'What motivates you to explore a career in technology?',
                    'Projects' => 'What kind of technology projects sound most interesting to you?',
                    'Learning Style' => 'How do you prefer to learn new skills?',
                    'Problems to Solve' => 'Which of these problems would you want to solve with technology?',
                    'Subjects' => 'Which of these subjects do you find most interesting or easiest to learn?',
                    'Role in Project' => 'When working on a project, what role do you prefer?',
                    'Team Environment' => 'What type of team environment do you thrive in?',
                    'Technology Aspect' => 'What aspect of technology excites you the most?',
                    'Impact Importance' => 'How important is it for you to see the impact of your work?',
                    'Career Drive' => 'What drives your interest in pursuing a career in IT?'
                ];
            @endphp
            @foreach ($questions as $key => $options)
                <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                    <label for="{{ Str::slug($baseQuestions[$key]) }}" class="block text-lg font-medium text-gray-700 mb-2">
                        {{ $baseQuestions[$key] }} <span class="text-red-500">*</span>
                    </label>
                    <div class="space-y-2">
                        @foreach ($options as $option)
                            <div class="flex items-center text-2xl">
                                <input type="radio" id="{{ Str::slug($baseQuestions[$key] . '-' . $option) }}"
                                    name="{{ $key }}" value="{{ $option }}" required
                                    class="focus:ring-Second h-4 w-4 text-Second border-gray-300">
                                <label for="{{ Str::slug($baseQuestions[$key] . '-' . $option) }}"
                                    class="ml-3 text-sm text-gray-600">{{ $option }}</label>
                            </div>
                        @endforeach
                    </div>
                    @error($key)
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>
            @endforeach
            <div class="text-center">
                <button type="submit" class="bg-Second text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors duration-300">
                    Submit
                </button>
            </div>
        </form>
    </div>
@endsection
