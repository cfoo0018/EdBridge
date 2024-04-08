@extends('layout.layout')

@section('title', '404 Not Found')

@section('content')
<div class="flex items-center justify-center min-h-screen w-full bg-gray-100">
    <div class="px-4 py-10 bg-white rounded-md shadow-xl md:max-w-xl md:px-10">
        <div class="flex flex-col items-center">
            <h1 class="font-bold text-Second text-6xl md:text-9xl text-shake">404</h1>

            <h6 class="mb-2 text-xl font-bold text-center text-gray-800 md:text-3xl">
                <span class="text-red-500">Oops!</span> Page not found
            </h6>

            <p class="mb-8 text-center text-gray-500 md:text-lg">
                The page you’re looking for doesn’t exist.
            </p>

            <a href="{{ url('/') }}" class="px-6 py-2 text-sm font-semibold text-white bg-Second hover:bg-transparent hover:text-Second hover:border hover:border-Second rounded">Go home</a>
        </div>
    </div>
</div>

    <style>
        @keyframes shake {

            0%,
            100% {
                transform: translateX(0);
            }

            10%,
            30%,
            50%,
            70%,
            90% {
                transform: translateX(-10px);
            }

            20%,
            40%,
            60%,
            80% {
                transform: translateX(10px);
            }
        }

        .text-shake {
            animation: shake 1.2s ease-in-out;
        }
    </style>
@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const errorText = document.querySelector('h1');
            let scaleDirection = 1;

            function animate() {
                let scale = parseFloat(window.getComputedStyle(errorText).getPropertyValue('transform').split(',')[
                    3]);
                if (scale > 1.5) scaleDirection = -1;
                if (scale < 1) scaleDirection = 1;
                errorText.style.transform = `scale(${scale + scaleDirection * 0.01})`;
                requestAnimationFrame(animate);
            }

            animate();
        });
    </script>
@endsection

@endsection
