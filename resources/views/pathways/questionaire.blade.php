@extends('layout.layout')

@section('title', 'BridgeEd - Pathways Prediction')

@section('content')
    <div class="container max-w-[1080px] mx-auto bg-white p-6 rounded shadow mt-40 mb-10">
        <h1 class="text-2xl font-bold mb-6">Answer the following questions to know your interest in IT!</h1>
        <form method="POST" action="{{ route('submit') }}" class="space-y-6">
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
                <div>
                    <!-- Use baseQuestions to map key to full question text -->
                    <label for="{{ Str::slug($baseQuestions[$key]) }}" class="block text-sm font-medium text-gray-700">
                        {{ $baseQuestions[$key] }} <span class="text-red-500">*</span>
                    </label>
                    <div class="mt-2">
                        <!-- Render options for each question -->
                        @foreach ($options as $option)
                            <div class="flex items-center">
                                <input type="radio" id="{{ Str::slug($baseQuestions[$key] . '-' . $option) }}"
                                    name="{{ $key }}" value="{{ $option }}" required>
                                <label for="{{ Str::slug($baseQuestions[$key] . '-' . $option) }}"
                                    class="ml-2 text-sm">{{ $option }}</label>
                            </div>
                        @endforeach
                    </div>
                    @error($key)
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                @unless ($loop->last)
                    <hr class="border-gray-200 my-6">
                @endunless
            @endforeach
            <button type="submit" class="bg-Second text-white px-4 py-2 rounded hover:bg-blue-600">Submit</button>
        </form>
    </div>
@endsection