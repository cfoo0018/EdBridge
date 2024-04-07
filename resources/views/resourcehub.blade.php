@extends('layout.layout')

@section('content')
<div class="flex items-center justify-center flex-row space-x-4 space-y-4 md:space-y-0 mt-20 md:mt-32 mb-4">
    <label class="input input-md input-bordered flex items-center gap-4 font-Fredoka w-5/6 md:w-1/2">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-6 h-6 stroke-2"><path fill-rule="evenodd" d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z" clip-rule="evenodd" /></svg> 
        <input type="text" class="grow text-Secondary" placeholder="What are you looking for?" />
        <button class="md:hidden btn btn-sm btn-ghost text-white font-Fredoka bg-Button font-normal">Search</button>
    </label>
    <button class="hidden md:flex btn btn-ghost text-white font-Fredoka bg-Button font-normal">Search</button>
</div>
<div class="flex justify-center flex-row">
    <!-- <button id="slideLeft" type="button" class="btn btn-circle">❮</button> -->
    <div id="subjects" class="carousel rounded-box h-16 max-w-80 md:max-w-96 space-x-4 md:space-x-8">
        <div class="carousel-item flex flex-col items-center">
            <img src="{{ asset('images/web-development.png') }}" alt="Burger" />
            <p>coding</p>
        </div> 
        <div class="carousel-item flex flex-col items-center">
            <img src="{{ asset('images/eng.png') }}" alt="Burger" />
            <p>english</p>
        </div> 
        <div class="carousel-item flex flex-col items-center">
            <img src="{{ asset('images/web-development.png') }}" alt="Burger" />
            <p>coding</p>
        </div> 
        <div class="carousel-item flex flex-col items-center">
            <img src="{{ asset('images/web-development.png') }}" alt="Burger" />
            <p>coding</p>
        </div> 
        <div class="carousel-item flex flex-col items-center">
            <img src="{{ asset('images/web-development.png') }}" alt="Burger" />
            <p>coding</p>
        </div> 
    </div>
    <!-- <button id="slideRight" type="button" class="btn btn-circle">❯</button   -->
</div>

<div class="flex items-center justify-center flex-col space-y-4">
    <div class="card w-80 md:w-3/5 bg-base-100 shadow-xl">
        <div class="card-body">
            <h2 class="card-title">Python</h2>
            <p>If a dog chews shoes whose shoes does he choose?</p>
            <div class="card-actions justify-end">
                <button class="btn btn-primary">See more</button>
            </div>
        </div>
    </div>
    <div class="card w-80 md:w-3/5 bg-base-100 shadow-xl">
        <div class="card-body">
            <h2 class="card-title">English</h2>
            <p>If a dog chews shoes whose shoes does he choose?</p>
            <div class="card-actions justify-end">
                <button class="btn btn-primary">See more</button>
            </div>
        </div>
    </div>
    <div class="card w-80 md:w-3/5 bg-base-100 shadow-xl">
        <div class="card-body">
            <h2 class="card-title">Card title!</h2>
            <p>If a dog chews shoes whose shoes does he choose?</p>
            <div class="card-actions justify-end">
                <button class="btn btn-primary">Buy Now</button>
            </div>
        </div>
    </div>
    <div class="card w-80 md:w-3/5 bg-base-100 shadow-xl">
        <div class="card-body">
            <h2 class="card-title">Card title!</h2>
            <p>If a dog chews shoes whose shoes does he choose?</p>
            <div class="card-actions justify-end">
                <button class="btn btn-primary">Buy Now</button>
            </div>
        </div>
    </div>
    <div class="card w-80 md:w-3/5 bg-base-100 shadow-xl">
        <div class="card-body">
            <h2 class="card-title">Card title!</h2>
            <p>If a dog chews shoes whose shoes does he choose?</p>
            <div class="card-actions justify-end">
                <button class="btn btn-primary">Buy Now</button>
            </div>
        </div>
    </div>
    <div class="join mt-4">
        <button class="join-item btn btn-active">1</button>
        <button class="join-item btn ">2</button>
        <button class="join-item btn ">3</button>
        <button class="join-item btn ">4</button>
    </div>
</div>






@endsection