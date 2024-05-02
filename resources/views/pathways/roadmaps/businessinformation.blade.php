@extends('layout.layout')

@section('title', 'BridgeEd - Software Development Pathway')

@section('content')

<!-- Roadmap Title -->
<div id="roadmap_title" class="md:text-center flex flex-col items-center mt-24 md:mt-36 px-4 md:px-0">
    <div class="flex space-x-4 mb-2">
        <h1 class="font-Overpass font-bold text-4xl">Business Information System Pathway</h1>
        <img src="{{ asset('images/businessinformationlogo.png') }}" alt="business information system" class=" h-10"/>
    </div>
    <p class="text-xl">The guide to understanding business information system pathway</p>
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
                        Introduction to Business Information Systems
                    </div>
                    <div class="collapse-content text-left"> 
                        <p class="mb-3">Objective :  Understand the role of information systems in modern businesses.</p>
                        <p>Topics Covered :</p>
                        <ul class="list-disc ml-8">
                            Overview of Business Information Systems (BIS)
                            Types of Information Systems (Transactional, Management, Decision Support)
                            Importance of Information Systems in Business Operations
                            Basic Concepts of Business Process Management
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
                        Fundamentals of Business Analysis and Requirements Gathering
                    </div>
                    <div class="collapse-content text-left"> 
                        <p class="mb-3">Objective : Learn techniques for analyzing business requirements and defining system specifications.</p>
                        <p>Topics Covered :</p>
                        <ul class="list-disc ml-8">
                            Business Process Modeling (Flowcharts, Use Cases)
                            Stakeholder Analysis and Management
                            Requirements Elicitation Techniques (Interviews, Surveys)
                            Documenting Requirements with Use Cases and User Stories
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
                        Database Management and Business Intelligence
                    </div>
                    <div class="collapse-content text-left"> 
                        <p class="mb-3">Objective : Understand the role of databases and business intelligence in managing organizational data.</p>
                        <p>Topics Covered :</p>
                        <ul class="list-disc ml-8">
                            Relational Database Concepts (Tables, Queries, Relationships)
                            SQL Fundamentals for Data Retrieval and Manipulation
                            Introduction to Business Intelligence Tools (Reporting, Dashboards)
                            Data Warehousing and Data Mining Techniques
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
                        Enterprise Resource Planning (ERP) Systems
                    </div>
                    <div class="collapse-content text-left"> 
                        <p class="mb-3">Objective : Gain knowledge of ERP systems and their integration within organizations.</p>
                        <p>Topics Covered :</p>
                        <ul class="list-disc ml-8">
                            Overview of ERP Systems and Modules (Finance, HR, Supply Chain)
                            ERP Implementation Lifecycle
                            Customization and Configuration of ERP Software
                            ERP System Integration and Data Migration
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
                        Customer Relationship Management (CRM) Systems
                    </div>
                    <div class="collapse-content text-left"> 
                        <p class="mb-3">Objective : Understand the importance of CRM systems in managing customer interactions and relationships.</p>
                        <p>Topics Covered :</p>
                        <ul class="list-disc ml-8">
                            CRM Concepts and Benefits
                            Customer Data Management and Analysis
                            CRM Implementation Strategies
                            Customer Segmentation and Targeting Techniques
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
                        E-commerce and Online Business Strategies
                    </div>
                    <div class="collapse-content text-left"> 
                        <p class="mb-3">Objective : Explore e-commerce platforms and strategies for conducting business online.</p>
                        <p>Topics Covered :</p>
                        <ul class="list-disc ml-8">
                            E-commerce Models (B2B, B2C, C2C)
                            Online Payment Systems and Security
                            Digital Marketing Techniques (SEO, SEM, Social Media Marketing)
                            E-commerce Website Development and Optimization
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
                        Business Process Automation and Workflow Management
                    </div>
                    <div class="collapse-content text-left"> 
                        <p class="mb-3">Objective :  Learn about automation technologies and workflow management systems.</p>
                        <p>Topics Covered :</p>
                        <ul class="list-disc ml-8">
                            Workflow Automation Tools and Platforms
                            Business Process Modeling Notation (BPMN)
                            Integration of Workflow Systems with Business Applications
                            Monitoring and Optimization of Business Processes
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
                        Business Continuity Planning and Disaster Recovery
                    </div>
                    <div class="collapse-content text-left"> 
                        <p class="mb-3">Objective : Learn strategies for ensuring business continuity and recovering from disruptions.</p>
                        <p>Topics Covered :</p>
                        <ul class="list-disc ml-8">
                            Business Impact Analysis (BIA)
                            Disaster Recovery Planning (DRP)
                            Backup and Restore Procedures
                            Testing and Maintenance of Business Continuity Plans
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
    <p class="mb-4">Are you ready to take on the business information system pathway? Test and improve your knowledge on this current pathway by taking on this quest!</p>
    <a href="{{ route('businessinformationquiz') }}" class="md:flex md:justify-center">
        <button class="btn btn-outline hover:bg-Button">Play</button>
    </a>
</div>

@endsection