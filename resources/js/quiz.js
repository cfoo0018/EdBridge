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

let shuffledQuestions, currentQuestionIndex, score;

const questions = [
    {
        question: "What do you understand by the term 'Data Science'?",
        type: 'General Understanding',
        answers:[
            {text: 'It involves analyzing and interpreting complex digital data', correct: true},
            {text: 'It\'s primarily about programming and software development', correct: false},
            {text: 'It focuses on creating data visualizations only', correct: false},
            {text: 'It deals with hardware and networking issues', correct: false}
        ],
    },
    {
        question: "Which of these programming languages have you heard of being used in Data Science?",
        type: 'General Understanding',
        answers:[
            {text: 'Python', correct: true},
            {text: 'JavaScript', correct: false},
            {text: 'R', correct: false},
            {text: 'All of the above', correct: false}
        ],
    },
    {   
        question: "From the following, which visualisation tools are you aware of?",
        type: 'Intermediate Awareness',
        answers:[
            {text: 'Tableau', correct: true},
            {text: 'Microsoft Excel', correct: false},
            {text: 'Google Charts', correct: false},
            {text: 'All of the above', correct: false}
        ],
    },
    {
        question: "Which statement best describes machine learning?",
        type: 'Intermediate Awareness',
        answers:[
            {text: 'It\'s a technique for creating software for robots', correct: true},
            {text: 'It involves computers learning from data provided without being explicitly programmed', correct: false},
            {text: 'It is the process of increasing the memory of the computer', correct: false},
            {text: 'It refers to machines being able to carry out complex mathematical calculations', correct: false}
        ],
    },
    {
        question: "What role does 'statistics' play in data science? ",
        type: 'Advanced Concepts',
        answers:[
            {text: 'It\'s used only for predictions in financial models', correct: true},
            {text: 'It plays a central role in hypothesis testing, decision making, and data analysis', correct: false},
            {text: 'Statistics is not commonly used in data science', correct: false},
            {text: 'It\'s primarily used for graphical representation', correct: false}
        ],
    },
    {
        question: "What is 'Big Data' and why is it important in Data Science?",
        type: 'Advanced Concepts',
        answers:[
            {text: 'It refers to very large volumes of data that cannot be processed effectively with traditional applications', correct: true},
            {text: 'Big data is data that\'s small enough to manage on a single computer', correct: false},
            {text: 'It is the same as cloud data', correct: false},
            {text: 'Big data is only relevant in terms of storage issues', correct: false}
        ],
    },
];

startQuiz();

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