@extends('layout.layout')

@section('title', 'BridgeEd - Data Science Pathway')

@section('content')

<!-- Roadmap Title -->
<div id="roadmap_title" class="md:text-center flex flex-col items-center mt-24 md:mt-36 px-4 md:px-0">
    <div class="flex space-x-4 mb-2">
        <h1 class="font-Overpass font-bold text-4xl text-Second">Data Science Pathway</h1>
        <img src="{{ asset('images/datasciencelogo.png') }}" alt="data science" class=" h-10"/>
    </div>
    <p class="text-xl mb-4">The guide to understanding data science pathway</p>
    <button class="btn btn-warning border-black">
        <a href="{{ asset('pdf/DataScienceRoadmap.pdf') }}" class="flex size-fit flex-row space-x-2 items-center justify-center">
            <p>Download Roadmap</p>
            <img src="{{ asset('images/download.png') }}" alt="cyber security" class=" h-6"/>
        </a>
    </button>
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
                        Introduction to Data Science
                    </div>
                    <div class="collapse-content text-left"> 
                        <p class="mb-3">Objective :  Understand the basics of data science and its applications.</p>
                        <p>Topics Covered :</p>
                        <ul class="list-disc ml-8">
                            <li>What is Data Science?</li>
                            <li>Overview of the Data Science Process</li>
                            <li>Introduction to Key Programming Languages (Python, R, Julia)</li>
                            <li>Basic Statistics and Probability</li>
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
                        Programming Foundations
                    </div>
                    <div class="collapse-content text-left"> 
                        <p class="mb-3">Objective : Gain proficiency in one or more programming languages essential for data science.</p>
                        <p>Topics Covered :</p>
                        <ul class="list-disc ml-8">
                            <li>Python Programming for Data Science</li>
                            <li>R for Statistical Analysis</li>
                            <li>Julia for High-Performance Scientific Computing</li>
                            <li>Data Manipulation and Management Techniques across Languages</li>
                            <li>Data Structures and Algorithms</li>
                            <li>Working with Data Libraries (Pandas, NumPy)</li>
                            <li>Introduction to SQL for Data Handling</li>
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
                        Data Analysis and Visualization
                    </div>
                    <div class="collapse-content text-left"> 
                        <p class="mb-3">Objective : Learn to analyse and visualise data to extract meaningful insights using different tools.</p>
                        <p>Topics Covered :</p>
                        <ul class="list-disc ml-8">
                            <li>Exploratory Data Analysis (EDA) in Python, R, or Julia</li>
                            <li>Statistical Analysis Techniques across Languages</li>
                            <li>Data Visualization (Matplotlib and Seaborn for Python; ggplot2 for R; Plots.jl for Julia)</li>
                            <li>Advanced Data Handling (SQL and NoSQL Databases)</li>
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
                        Machine Learning Basics
                    </div>
                    <div class="collapse-content text-left"> 
                        <p class="mb-3">Objective : Understand the fundamentals of machine learning and build simple models with different languages.</p>
                        <p>Topics Covered :</p>
                        <ul class="list-disc ml-8">
                            <li>Supervised vs Unsupervised Learning in Python, R, and Julia</li>
                            <li>Regression and Classification Models across Languages</li>
                            <li>Decision Trees and Random Forests</li>
                            <li>Model Evaluation and Validation Techniques</li>
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
                        Advanced Machine Learning
                    </div>
                    <div class="collapse-content text-left"> 
                        <p class="mb-3">Objective : Deepen knowledge in advanced machine learning techniques and algorithms using multiple languages.</p>
                        <p>Topics Covered :</p>
                        <ul class="list-disc ml-8">
                            <li>Ensemble Methods and Support Vector Machines in Python and R</li>
                            <li>Introduction to Neural Networks and Deep Learning in Python and Julia</li>
                            <li>Natural Language Processing (NLP) Techniques</li>
                            <li>Time Series Analysis in R</li>
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
                        Big Data and AI Technologies
                    </div>
                    <div class="collapse-content text-left"> 
                        <p class="mb-3">Objective : Explore technologies used for handling big data and building AI systems.</p>
                        <p>Topics Covered :</p>
                        <ul class="list-disc ml-8">
                            <li>Big Data Tools and Frameworks (Hadoop and Spark – APIs available in Python, Scala, Java)</li>
                            <li>Cloud Computing for Data Science (platform-agnostic principles; AWS, Azure, Google Cloud)</li>
                            <li>Advanced Machine Learning and AI Concepts (using TensorFlow or PyTorch in Python; MXNet in R)</li>
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
                        Real-World Applications and Projects
                    </div>
                    <div class="collapse-content text-left"> 
                        <p class="mb-3">Objective : Apply knowledge to real-world data science problems and projects using various languages.</p>
                        <p>Topics Covered :</p>
                        <ul class="list-disc ml-8">
                            <li>Capstone Projects (choice of language)</li>
                            <li>Industry-Specific Applications (healthcare analysis in R, financial modelling in Python, or engineering computations in Julia)</li>
                            <li>Ethical Considerations in Data Science</li>
                            <li>Data Security and Privacy Compliance</li>
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
                        Career Preparation and Advancement
                    </div>
                    <div class="collapse-content text-left"> 
                        <p class="mb-3">Objective : Prepare for a career in data science with knowledge of multiple programming environments.</p>
                        <p>Topics Covered :</p>
                        <ul class="list-disc ml-8">
                            <li>Building a Data Science Portfolio (showcasing projects)</li>
                            <li>Effective Resume and Cover Letter Preparation</li>
                            <li>Interviewing Skills for Data Science (technical and problem-solving skills across languages)</li>
                            <li>Networking and Professional Development</li>
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
    <p class="mb-4">Are you ready to take on the data science pathway? Test and improve your knowledge on this current pathway by taking on this quest!</p>
    <button class="btn btn-outline hover:bg-Button">
        <a href="{{ route('datasciencequiz') }}" class="md:flex md:justify-center size-fit">
            Play
        </a>
    </button>
</div>

@endsection