@extends('layout.layout')

@section('title', 'BridgeEd - Software Development Pathway')

@section('content')

<!-- Roadmap Title -->
<div id="roadmap_title" class="md:text-center flex flex-col items-center mt-24 md:mt-36 px-4 md:px-0">
    <div class="flex space-x-4 mb-2">
        <h1 class="font-Overpass font-bold text-4xl">Software Development Pathway</h1>
        <img src="{{ asset('images/codinglogo.png') }}" alt="coding" class=" h-10"/>
    </div>
    <p class="text-xl">The guide to understanding software development pathway</p>
</div>

<div class="divider"></div>

<!-- Roadmap Body -->
<div class="md:px-0 px-2">
    <ul class="timeline timeline-snap-icon max-md:timeline-compact timeline-vertical">
        <li>
            <div class="timeline-middle">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" /></svg>
            </div>
            <div class="timeline-start md:text-end mb-10">
                <time class="font-Overpass italic">Step 1</time>
                <div tabindex="0" class="collapse collapse-plus border-2 border-dotted border-Second bg-base-200">
                    <input type="checkbox" />
                    <div class="collapse-title text-lg font-Overpass font-semibold">
                        Learn Programming Basics
                    </div>
                    <div class="collapse-content text-left"> 
                        <p class="mb-3">Objective :  Master basic programming concepts and syntax, understand programming environments.</p>
                        <p>Topics Covered :</p>
                        <ul class="list-disc ml-8">
                            <li>Programming concepts (variables, data types, control flow, etc.)</li>
                            <li>Common programming languages (Python, JavaScript, Java, etc.)</li>
                            <li>Setting up development environments (editors, IDEs, etc.)</li>
                        </ul>
                    </div>
                </div>          
            </div>
            <hr/>
        </li>
        <li>
            <hr />
            <div class="timeline-middle">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" /></svg>
            </div>
            <div class="timeline-end mb-10">
                <time class="font-Overpass italic">Step 2</time>
                <div tabindex="0" class="collapse collapse-plus border-2 border-dotted border-Second bg-base-200">
                    <input type="checkbox" />
                    <div class="collapse-title text-lg font-Overpass font-semibold">
                        Networking Fundamentals
                    </div>
                    <div class="collapse-content text-left"> 
                        <p class="mb-3">Objective : Understand basic networking concepts and communication protocols.</p>
                        <p>Topics Covered :</p>
                        <ul class="list-disc ml-8">
                                <li>Fundamentals of networking (IP addresses, ports, HTTP, etc.)</li>
                                <li>OSI model and TCP/IP protocol stack</li>
                                <li>HTTP and RESTful API</li>
                        </ul>
                    </div>
                </div>    
            </div>
            <hr />
        </li>
        <li>
            <hr />
            <div class="timeline-middle">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" /></svg>
            </div>
            <div class="timeline-start md:text-end mb-10">
                <time class="font-Overpass italic">Step 3</time>
                <div tabindex="0" class="collapse collapse-plus border-2 border-dotted border-Second bg-base-200">
                    <input type="checkbox" />
                    <div class="collapse-title text-lg font-Overpass font-semibold">
                        Data Structures and Algorithms
                    </div>
                    <div class="collapse-content text-left"> 
                        <p class="mb-3">Objective : Understand common data structures and algorithms, and be able to use them to solve simple problems.</p>
                        <p>Topics Covered :</p>
                        <ul class="list-disc ml-8">
                            <li>Arrays, linked lists, stacks, queues, etc.</li>
                            <li>Basic algorithms (sorting, searching, etc.)</li>
                            <li>Complexity analysis</li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr />
        </li>
        <li>
            <hr />
            <div class="timeline-middle">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" /></svg>
            </div>
            <div class="timeline-end mb-10">
                <time class="font-Overpass italic">Step 4</time>
                <div tabindex="0" class="collapse collapse-plus border-2 border-dotted border-Second bg-base-200">
                    <input type="checkbox" />
                    <div class="collapse-title text-lg font-Overpass font-semibold">
                        Web Development
                    </div>
                    <div class="collapse-content text-left"> 
                        <p class="mb-3">Objective : Master basic web development knowledge, able to build simple web applications.</p>
                        <p>Topics Covered :</p>
                        <ul class="list-disc ml-8">
                            <li>HTML, CSS, JavaScript basics</li>
                            <li>Frontend frameworks (React, Vue.js, etc.)</li>
                            <li>Backend development (Node.js, Express, etc.)</li>
                        </ul>
                    </div>
                </div>    
            </div>
            <hr />
        </li>
        <li>
            <hr />
                <div class="timeline-middle">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" /></svg>
            </div>
            <div class="timeline-start md:text-end mb-10">
                <time class="font-Overpass italic">Step 5</time>
                <div tabindex="0" class="collapse collapse-plus border-2 border-dotted border-Second bg-base-200">
                    <input type="checkbox" />
                    <div class="collapse-title text-lg font-Overpass font-semibold">
                        Databases and Data Storage
                    </div>
                    <div class="collapse-content text-left"> 
                        <p class="mb-3">Objective : Understand database principles and common database systems, able to design and operate databases.</p>
                        <p>Topics Covered :</p>
                        <ul class="list-disc ml-8">
                            <li>Relational databases (MySQL, PostgreSQL, etc.)</li>
                            <li>NoSQL databases (MongoDB, Redis, etc.)</li>
                            <li>Database design and optimization</li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr />
        </li>
        <li>
            <hr />
                <div class="timeline-middle">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" /></svg>
            </div>
            <div class="timeline-end mb-10">
                <time class="font-Overpass italic">Step 6</time>
                <div tabindex="0" class="collapse collapse-plus border-2 border-dotted border-Second bg-base-200">
                    <input type="checkbox" />
                    <div class="collapse-title text-lg font-Overpass font-semibold">
                        Version Control
                    </div>
                    <div class="collapse-content text-left"> 
                        <p class="mb-3">Objective : Master version control tools, able to effectively manage code versions.</p>
                        <p>Topics Covered :</p>
                        <ul class="list-disc ml-8">
                            <li>Basic Git operations</li>
                            <li>Branching and merging</li>
                            <li>Collaborative development and code review</li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr />
        </li>
        <li>
            <hr />
                <div class="timeline-middle">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" /></svg>
            </div>
            <div class="timeline-start md:text-end mb-10">
                <time class="font-Overpass italic">Step 7</time>
                <div tabindex="0" class="collapse collapse-plus border-2 border-dotted border-Second bg-base-200">
                    <input type="checkbox" />
                    <div class="collapse-title text-lg font-Overpass font-semibold">
                        Architecture Design
                    </div>
                    <div class="collapse-content text-left"> 
                        <p class="mb-3">Objective : Understand software architecture design principles, able to design and evaluate complex system architectures.</p>
                        <p>Topics Covered :</p>
                        <ul class="list-disc ml-8">
                            <li>Design patterns and architecture patterns</li>
                            <li>Microservices architecture</li>
                            <li>Scalability and performance optimization</li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr />
        </li>
        <li>
            <hr />
                <div class="timeline-middle">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" /></svg>
            </div>
            <div class="timeline-end mb-10">
                <time class="font-Overpass italic">Step 8</time>
                <div tabindex="0" class="collapse collapse-plus border-2 border-dotted border-Second bg-base-200">
                    <input type="checkbox" />
                    <div class="collapse-title text-lg font-Overpass font-semibold">
                        DevOps
                    </div>
                    <div class="collapse-content text-left"> 
                        <p class="mb-3">Objective : Master DevOps tools and processes, able to achieve continuous integration and continuous delivery.</p>
                        <p>Topics Covered :</p>
                        <ul class="list-disc ml-8">
                            <li>Automated deployment and testing</li>
                            <li>Containerization technologies (Docker, Kubernetes, etc.)</li>
                            <li>Monitoring and log management</li>
                        </ul>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</div>

<div class="divider"></div>

<!-- Quiz Link -->
<div class="text-center md:mx-auto md:w-2/3 px-4 md:px-0 mb-4 md:mb-12">
    <!-- Quiz Title -->
    <div class="flex space-x-4 mb-2 justify-center">
        <h2 class="font-Overpass font-bold text-4xl">Knowledge Quest</h2>
        <img src="{{ asset('images/quest.png') }}" alt="quiz" class=" h-9"/>
    </div>
    <p class="mb-4">Are you ready to take on the software development pathway? Test and improve your knowledge on this current pathway by taking on this quest!</p>
    <a href="{{ route('softwaredevelopmentquiz') }}" class="md:flex md:justify-center">
        <button class="btn btn-outline hover:bg-Button">Play</button>
    </a>
</div>

@endsection