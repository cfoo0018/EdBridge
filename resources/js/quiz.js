const datascience = document.getElementById('datascience-quiz');
const cybersecurity = document.getElementById('cybersecurity-quiz');
const software = document.getElementById('software-quiz');
const business = document.getElementById('business-quiz');
const questionContainer = document.getElementById('question-container');
const questionElement = document.getElementById('question');
const questionNumberElement = document.getElementById('question-numbers');
const typeElement = document.getElementById('type');
const answerButtons = document.getElementById('answer-buttons');
const submitButton = document.getElementById('submit-btn');
const skipButton = document.getElementById('skip-btn');
const restartButton = document.getElementById("restart-btn");
const resultDiv = document.getElementById('result-div');
const navButton = document.getElementById('nav-btn');

let shuffledQuestions, currentQuestionIndex, score, questions;

const datascienceQuestions = [
    {
        question: "What do you understand by the term 'Data Science'?",
        type: 'General Understanding',
        answers:[
            {text: 'It involves analyzing and interpreting complex digital data', correct: true},
            {text: 'It\'s primarily about programming and software development', correct: false},
            {text: 'It focuses on creating data visualizations only', correct: false},
            {text: 'It deals with hardware and networking issues', correct: false}
        ].sort(() => Math.random() - 0.5),
    },
    {
        question: "Which of these programming languages have you heard of being used in Data Science?",
        type: 'General Understanding',
        answers:[
            {text: 'Python', correct: true},
            {text: 'JavaScript', correct: false},
            {text: 'R', correct: false},
            {text: 'All of the above', correct: false}
        ]
    },
    {   
        question: "From the following, which visualisation tools are you aware of?",
        type: 'Intermediate Awareness',
        answers:[
            {text: 'Tableau', correct: true},
            {text: 'Microsoft Excel', correct: true},
            {text: 'Google Charts', correct: true},
            {text: 'All of the above', correct: true}
        ]
    },
    {
        question: "Which statement best describes machine learning?",
        type: 'Intermediate Awareness',
        answers:[
            {text: 'It\'s a technique for creating software for robots', correct: false},
            {text: 'It involves computers learning from data provided without being explicitly programmed', correct: true},
            {text: 'It is the process of increasing the memory of the computer', correct: false},
            {text: 'It refers to machines being able to carry out complex mathematical calculations', correct: false}
        ].sort(() => Math.random() - 0.5),
    },
    {
        question: "What role does 'statistics' play in data science? ",
        type: 'Advanced Concepts',
        answers:[
            {text: 'It\'s used only for predictions in financial models', correct: false},
            {text: 'It plays a central role in hypothesis testing, decision making, and data analysis', correct: true},
            {text: 'Statistics is not commonly used in data science', correct: false},
            {text: 'It\'s primarily used for graphical representation', correct: false}
        ].sort(() => Math.random() - 0.5),
    },
    {
        question: "What is 'Big Data' and why is it important in Data Science?",
        type: 'Advanced Concepts',
        answers:[
            {text: 'It refers to very large volumes of data that cannot be processed effectively with traditional applications', correct: true},
            {text: 'Big data is data that\'s small enough to manage on a single computer', correct: false},
            {text: 'It is the same as cloud data', correct: false},
            {text: 'Big data is only relevant in terms of storage issues', correct: false}
        ].sort(() => Math.random() - 0.5),
    },
];

const cybersecurityQuestions = [
    {
        question: "What is Cybersecurity?",
        type: 'General Understanding',
        answers:[
            {text: 'The process of securing physical buildings and facilities', correct: false},
            {text: 'The protection of computer systems, networks, and data from theft, damage, or unauthorized access', correct: true},
            {text: 'The analysis of market trends and consumer behavior in online retail', correct: false},
            {text: 'The management of financial transactions using digital currency', correct: false}       
        ].sort(() => Math.random() - 0.5),
    },
    {
        question: "What is a common method used by cyber attackers to gain unauthorized access to systems or data?",
        type: 'General Understanding',
        answers:[
            {text: 'Social engineering', correct: true},
            {text: 'Physical intrusion', correct: false},
            {text: 'Environmental hazards', correct: false},
            {text: 'Software updates', correct: false}       
        ].sort(() => Math.random() - 0.5),
    },
    {   
        question: "Explain the concept of encryption and its role in cybersecurity",
        type: 'Intermediate Awareness',
        answers:[
            {text: 'Encryption is the process of converting plaintext into ciphertext to secure communication and data storage', correct: true},
            {text: 'Encryption involves securing physical access to computing devices using biometric authentication', correct: false},
            {text: 'Encryption refers to the detection and removal of malware from computer systems', correct: false},
            {text: 'Encryption is a method for optimizing network traffic and reducing latency', correct: false}
        ].sort(() => Math.random() - 0.5),
    },
    {
        question: "What is the purpose of a firewall in a cybersecurity context?",
        type: 'Intermediate Awareness',
        answers:[
            {text: 'A firewall monitors and controls incoming and outgoing network traffic based on predetermined security rules', correct: true},
            {text: 'A firewall protects physical buildings and facilities from unauthorized access', correct: false},
            {text: 'A firewall encrypts sensitive data to prevent unauthorized disclosure', correct: false},
            {text: 'A firewall detects and removes malicious software from computer systems', correct: false}       
        ].sort(() => Math.random() - 0.5),
    },
    {
        question: "Discuss the concept of penetration testing and its significance in cybersecurity practices.",
        type: 'Advanced Concepts',
        answers:[
            {text: 'Penetration testing involves simulating cyber attacks to identify vulnerabilities in systems, networks, or applications', correct: true},
            {text: 'Penetration testing focuses on optimizing network performance and reducing latency', correct: false},
            {text: 'Penetration testing is used to monitor and analyze network traffic for security threats', correct: false},
            {text: 'Penetration testing automates the deployment of security patches and updates to mitigate vulnerabilities', correct: false}
        ].sort(() => Math.random() - 0.5),
    },
    {
        question: "Explain the concept of Zero Trust Architecture (ZTA) and its role in modern cybersecurity strategies.",
        type: 'Advanced Concepts',
        answers:[
            {text: 'ZTA is an approach to cybersecurity that assumes no entity, whether inside or outside the network perimeter, should be trusted by default', correct: true},
            {text: 'ZTA focuses on encrypting all network traffic to prevent unauthorized access', correct: false},
            {text: 'ZTA involves securing physical access to computing devices using biometric authentication', correct: false},
            {text: 'ZTA automates the deployment of security policies and configurations to ensure compliance with regulatory requirements', correct: false}
        ].sort(() => Math.random() - 0.5),
    },
];

const softwareQuestions = [
    {
        question: "What is Information Technology (IT)?",
        type: 'General Understanding',
        answers:[
            {text: 'The study of algorithms and computational processes', correct: false},
            {text: 'The use of computers to store, retrieve, transmit, and manipulate data or information', correct: true},
            {text: 'The process of designing and building physical hardware components', correct: false},
            {text: 'The management of financial transactions in business operations', correct: false}       
        ].sort(() => Math.random() - 0.5),
    },
    {
        question: "Which of the following is an example of IT infrastructure?",
        type: 'General Understanding',
        answers:[
            {text: 'Microsoft Office suite', correct: false},
            {text: 'Wireless router', correct: true},
            {text: 'Social media platform', correct: false},
            {text: 'Fitness tracking app', correct: false}       
        ].sort(() => Math.random() - 0.5),
    },
    {   
        question: "What are the main components of a typical computer network?",
        type: 'Intermediate Awareness',
        answers:[
            {text: 'Server, database, and firewall', correct: false},
            {text: 'Router, switch, and firewall', correct: true},
            {text: 'Keyboard, monitor, and printer', correct: false},
            {text: 'CPU, RAM, and hard drive', correct: false}       
        ].sort(() => Math.random() - 0.5),
    },
    {
        question: "Explain the concept of cloud computing and its significance in IT.",
        type: 'Intermediate Awareness',
        answers:[
            {text: 'Cloud computing refers to the use of virtualized servers and services delivered over the internet', correct: true},
            {text: 'Cloud computing involves the physical storage of data on local servers within an organization', correct: false},
            {text: 'Cloud computing focuses on optimizing hardware infrastructure for maximum performance', correct: false},
            {text: 'Cloud computing is a software development methodology for building scalable applications', correct: false}       
        ].sort(() => Math.random() - 0.5),
    },
    {
        question: "Discuss the role of cybersecurity in modern Information Technology environments.",
        type: 'Advanced Concepts',
        answers:[
            {text: 'Cybersecurity involves protecting computer systems, networks, and data from cyber threats such as hacking, malware, and phishing attacks', correct: true},
            {text: 'Cybersecurity focuses on optimizing network performance and reducing latency', correct: false},
            {text: 'Cybersecurity is primarily concerned with data analysis and predictive modeling', correct: false},
            {text: 'Cybersecurity aims to automate routine IT tasks to improve operational efficiency', correct: false}       
        ].sort(() => Math.random() - 0.5),
    },
    {
        question: "Explain the concept of virtualization and its applications in IT infrastructure management.",
        type: 'Advanced Concepts',
        answers:[
            {text: 'Virtualization allows multiple operating systems to run on a single physical machine, maximizing hardware utilization and reducing costs', correct: true},
            {text: 'Virtualization is a programming technique for creating virtual reality simulations', correct: false},
            {text: 'Virtualization enables secure communication between distributed systems over the internet', correct: false},
            {text: 'Virtualization automates software deployment and configuration in cloud environments', correct: false}       
        ].sort(() => Math.random() - 0.5),
    },
];

const businessQuestions = [
    {
        question: "What is the primary goal of a Business Information System (BIS)?",
        type: 'General Understanding',
        answers:[
            {text: 'To develop software applications for businesses', correct: false},
            {text: 'To automate administrative tasks within an organization', correct: false},
            {text: 'To manage and process information to support business operations effectively', correct: true},
            {text: 'To provide networking solutions for businesses', correct: false}
        ].sort(() => Math.random() - 0.5),
    },
    {
        question: "Which of the following is an example of a Business Information System (BIS) application?",
        type: 'General Understanding',
        answers:[
            {text: 'Email client software', correct: false},
            {text: 'Social media platform', correct: false},
            {text: 'Inventory management system', correct: true},
            {text: 'Video editing software', correct: false}
        ].sort(() => Math.random() - 0.5),
    },
    {   
        question: "From the following, which technology is commonly used for implementing Business Intelligence (BI) solutions?",
        type: 'Intermediate Awareness',
        answers:[
            {text: 'Python programming language', correct: false},
            {text: 'Hadoop distributed file system', correct: false},
            {text: 'SQL database management system', correct: false},
            {text: 'Tableau data visualisation software', correct: true}
        ].sort(() => Math.random() - 0.5),
    },
    {
        question: "What is the purpose of Customer Relationship Management (CRM) software in Business Information Systems?",
        type: 'Intermediate Awareness',
        answers:[
            {text: 'To manage customer interactions and relationships', correct: true},
            {text: 'To automate manufacturing processes', correct: false},
            {text: 'To secure network infrastructure', correct: false},
            {text: 'To optimize supply chain management', correct: false}
        ].sort(() => Math.random() - 0.5),
    },
    {
        question: "How does Enterprise Resource Planning (ERP) software contribute to the integration of business processes?",
        type: 'Advanced Concepts',
        answers:[
            {text: 'By providing real-time data access across various functional areas of an organization', correct: true},
            {text: 'By automating customer service operations', correct: false},
            {text: 'By analyzing market trends and consumer behavior', correct: false},
            {text: 'By optimizing website performance and user experience', correct: false}
        ].sort(() => Math.random() - 0.5),
    },
    {
        question: "Explain the concept of Business Process Reengineering (BPR) and its significance in Business Information Systems (BIS).",
        type: 'Advanced Concepts',
        answers:[
            {text: 'BPR involves restructuring business processes to improve efficiency, quality, and competitiveness', correct: true},
            {text: 'BPR is a project management methodology used for software development', correct: false},
            {text: 'BPR focuses on optimizing hardware infrastructure in business environments', correct: false},
            {text: 'BPR aims to enhance cybersecurity measures within an organization', correct: false}
        ].sort(() => Math.random() - 0.5),
    },
];

setQuestions();
startQuiz();

function setQuestions(){
    if (datascience){ 
        questions = datascienceQuestions;
    } else if (cybersecurity){
        questions = cybersecurityQuestions;
    } else if (software){
        questions = softwareQuestions;
    } else {
        questions = businessQuestions;
    }
}

function startQuiz(){
    score = 0;
    questionContainer.style.display = 'flex';
    shuffledQuestions = questions.sort(() => Math.random() - 0.5);
    currentQuestionIndex = 0;
    setNumberQuestion();
    navButton.classList.add('md:space-x-12');
    submitButton.classList.remove('hidden');
    skipButton.classList.remove('hidden');
    restartButton.classList.add("hidden");
    resultDiv.classList.add('hidden');
    setNextQuestion();
}

function setNextQuestion(){
    resetState();
    doneNumberQuestion();
    showQuestion(shuffledQuestions[currentQuestionIndex]);
}

function setNumberQuestion(){
    let i = 0;
    while (i < shuffledQuestions.length) {
        const step = document.createElement('li');
        step.id = "step" + i;
        step.classList.add('step');
        questionNumberElement.appendChild(step);
        i++;
    };
}

function resetNumberQuestion(){
    while (questionNumberElement.firstChild) {
        questionNumberElement.removeChild(questionNumberElement.firstChild);
    }
}

function doneNumberQuestion(){
    const step = document.getElementById("step" + currentQuestionIndex);
    step.classList.add('step-primary');
}

function showQuestion(question){
    questionElement.innerText = question.question;
    typeElement.innerText = question.type;
    question.answers.forEach((answer, index) => {
        const inputGroup = document.createElement('div');
        inputGroup.classList.add("input-group", "flex", "space-x-2", "md:space-x-4", "md:px-16", "text-left");

        const radio = document.createElement('input');
        radio.type = 'radio';
        radio.id = "answer" + index;
        radio.name = 'answer';
        radio.value = index;
        radio.classList.add('checkbox');
        
        const label = document.createElement('label');
        label.htmlFor = "answer" + index;
        label.innerText = answer.text;

        inputGroup.appendChild(radio);
        inputGroup.appendChild(label);
        answerButtons.appendChild(inputGroup);
    });
}

submitButton.addEventListener('click', () => {
    const answerIndex = Array.from(
        answerButtons.querySelectorAll("input")
    
    ).findIndex((radio)=> radio.checked); 
    if (answerIndex !== -1){
        if(shuffledQuestions[currentQuestionIndex].answers[answerIndex].correct){
            score++;
        }
        currentQuestionIndex++;
        if(currentQuestionIndex < shuffledQuestions.length){
            setNextQuestion();
        } else {
            endQuiz();
        }
    }else{
        alert('Please select an answer.');
    }  
})

skipButton.addEventListener('click', () => {
    currentQuestionIndex++;
    if(currentQuestionIndex < shuffledQuestions.length){
        setNextQuestion();
    } else {
        endQuiz();
    }
})



function resetState() {
    while (answerButtons.firstChild) {
      answerButtons.removeChild(answerButtons.firstChild);
    }
}

restartButton.addEventListener('click', () => {
    resetNumberQuestion();
    resetResult();
    startQuiz();
})

function produceResult(){
    const title = document.createElement('h2');
    title.classList.add('text-3xl', 'font-semibold', 'font-Overpass');
    const image = document.createElement('img');
    image.classList.add('max-h-24', 'p-6');
    const performance = document.createElement('p');
    performance.classList.add('text-lg', 'mb-2');
    const feedback = document.createElement('p');
    feedback.classList.add('text-pretty');
    if (score == shuffledQuestions.length) {
        title.innerText = 'Congratulations!';
        image.src = '/images/trophy.png';
        image.alt = 'Trophy';
        performance.innerText = `You scored ${score} out of ${shuffledQuestions.length}`;
        feedback.innerText = "Your flawless score showcases a deep understanding of data science principles. Your dedication to mastering the material is evident. Keep pushing boundaries and exploring new challenges to continue excelling in the field of data science.";
    } else if (score > shuffledQuestions.length/2 && score < shuffledQuestions.length) {
        title.innerText = 'Good Job!';
        image.src = '/images/smiley.png';
        image.alt = 'Smiley';
        performance.innerText = `You scored ${score} out of ${shuffledQuestions.length}`;
        feedback.innerText = 'Your score indicates a solid grasp of data science fundamentals. Keep up the good work by exploring advanced topics and applying your knowledge to real-world scenarios.';
    } else {
        title.innerText = 'Better Luck Next Time!';
        image.src = '/images/sad.png';
        image.alt = 'Sad';
        performance.innerText = `You scored ${score} out of ${shuffledQuestions.length}.`;
        feedback.innerText = 'Your score suggests some areas for improvement in understanding data science concepts. Take time to review and practice foundational material to strengthen your knowledge and skills';
    }

    resultDiv.appendChild(title);
    resultDiv.appendChild(image);
    resultDiv.appendChild(performance);
    resultDiv.appendChild(feedback);
}

function resetResult(){
    while (resultDiv.firstChild) {
        resultDiv.removeChild(resultDiv.firstChild);
    }
}

function endQuiz(){
    questionContainer.style.display = 'none';
    submitButton.classList.add('hidden');
    skipButton.classList.add('hidden');
    resultDiv.classList.remove('hidden');
    restartButton.classList.remove("hidden");
    navButton.classList.remove('md:space-x-12');
    produceResult();
}