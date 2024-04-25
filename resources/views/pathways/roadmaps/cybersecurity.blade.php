@extends('layout.layout')

@section('title', 'BridgeEd - Software Development Pathway')

@section('content')

<!-- Roadmap Title -->
<div id="roadmap_title" class="md:text-center flex flex-col items-center mt-24 md:mt-36 px-4 md:px-0">
    <div class="flex space-x-4 mb-2">
        <h1 class="font-Overpass font-bold text-4xl">Cyber Security Pathway</h1>
        <img src="{{ asset('images/hackerlogo.png') }}" alt="cyber security" class=" h-10"/>
    </div>
    <p class="text-xl">The guide to understanding cyber security pathway</p>
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
                        Introduction to Cybersecurity
                    </div>
                    <div class="collapse-content text-left"> 
                        <p class="mb-3">Objective :  Understand the fundamentals of cybersecurity and its importance.</p>
                        <p>Topics Covered :</p>
                        <ul class="list-disc ml-8">
                            <li>Overview of Cybersecurity Concepts</li>
                            <li>Common Threats and Attack Vectors</li>
                            <li>Introduction to Security Standards and Best Practices</li>
                            <li>Basic Cryptography Principles</li>
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
                        Foundations of Networking and Operating Systems
                    </div>
                    <div class="collapse-content text-left"> 
                        <p class="mb-3">Objective : Gain knowledge of networking and operating systems to understand cybersecurity concepts.</p>
                        <p>Topics Covered :</p>
                        <ul class="list-disc ml-8">
                            <li>Networking Fundamentals (TCP/IP, DNS, DHCP)</li>
                            <li>Operating System Basics (Windows, Linux, macOS)</li>
                            <li>Network Protocols and Services</li>
                            <li>Security Configuration and Hardening Techniques</li>
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
                        Introduction to Cyber Threats and Defense Mechanisms
                    </div>
                    <div class="collapse-content text-left"> 
                        <p class="mb-3">Objective : Learn about different types of cyber threats and defense strategies.</p>
                        <p>Topics Covered :</p>
                        <ul class="list-disc ml-8">
                            <li>Malware Types and Behavior Analysis</li>
                            <li>Social Engineering and Phishing Attacks</li>
                            <li>Intrusion Detection and Prevention Systems (IDS/IPS)</li>
                            <li>Security Controls and Countermeasures</li>
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
                        Secure Coding and Application Security
                    </div>
                    <div class="collapse-content text-left"> 
                        <p class="mb-3">Objective : Understand secure coding principles and techniques to develop secure software.</p>
                        <p>Topics Covered :</p>
                        <ul class="list-disc ml-8">
                            <li>Secure Software Development Lifecycle (SDLC)</li>
                            <li>Common Web Application Vulnerabilities (SQL Injection, XSS)</li>
                            <li>Secure Coding Practices in Various Programming Languages</li>
                            <li>Web Application Firewall (WAF) Implementation</li>
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
                        Cryptography and Data Protection
                    </div>
                    <div class="collapse-content text-left"> 
                        <p class="mb-3">Objective : Explore cryptographic techniques for data protection and secure communication.</p>
                        <p>Topics Covered :</p>
                        <ul class="list-disc ml-8">
                            Encryption Algorithms and Methods
                            Public Key Infrastructure (PKI)
                            Digital Signatures and Certificates
                            Secure Communication Protocols (SSL/TLS)
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
                        Network Security and Penetration Testing
                    </div>
                    <div class="collapse-content text-left"> 
                        <p class="mb-3">Objective : Learn about network security measures and techniques for ethical hacking.</p>
                        <p>Topics Covered :</p>
                        <ul class="list-disc ml-8">
                            Network Security Protocols (VPN, SSH)
                            Penetration Testing Methodologies
                            Vulnerability Assessment and Management
                            Incident Response and Forensics Basics
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
                        Cloud Security and Virtualization
                    </div>
                    <div class="collapse-content text-left"> 
                        <p class="mb-3">Objective : Understand security challenges and solutions in cloud computing and virtual environments.</p>
                        <p>Topics Covered :</p>
                        <ul class="list-disc ml-8">
                            Cloud Computing Models (IaaS, PaaS, SaaS)
                            Cloud Security Best Practices
                            Virtualization Technologies and Security Considerations
                            Identity and Access Management (IAM) in Cloud Environments
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
                        Cybersecurity Career Preparation and Advancement
                    </div>
                    <div class="collapse-content text-left"> 
                        <p class="mb-3">Objective : Prepare for a career in cybersecurity and explore opportunities for professional growth.</p>
                        <p>Topics Covered :</p>
                        <ul class="list-disc ml-8">
                            Building a Cybersecurity Portfolio (showcasing projects and certifications)
                            Resume Writing and Interview Preparation
                            Certifications (CISSP, CEH, CompTIA Security+)
                            Continuing Education and Professional Networking
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
    <p class="mb-4">Are you ready to take on the cyber security pathway? Test and improve your knowledge on this current pathway by taking on this quest!</p>
    <a href="{{ route('cybersecurityquiz') }}" class="md:flex md:justify-center">
        <button class="btn btn-outline hover:bg-Button">Play</button>
    </a>
</div>

@endsection