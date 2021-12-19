
const quizData = [
    {
        question:"Isolér x i følgende ligning: 2/log(x) = 1",
        a: "x=10^1",
        b: "x=10^2",
        c: "x=10^-2",
        correct: "b",
    },
    {
        question:"En andengradsligning er på den sædvanlige form ax^2 + bx + c=0 . Identificér c i andengradsligningen: x^2 - 7x + 27 = 0",
        a: "27",
        b: "7",
        c: "0",
        correct: "a",
    },
    {
        question:"Løs ligningen x(2−x)=0 vha. nulreglen.",
        a: "x=0 V x= 2",
        b: "x=0 V x= -2",
        c: "x=0 V x=0",
        correct: "a",
    },
    {
        question:"En potensfunktion er givet ved f(x)=6*x^-12. Hvilken værdi har konstanten b",
        a: "b= -12",
        b: "b= 12",
        c: "b= 6",
        correct: "c",
    },
    {
        question:"Løs ligning 5sin(x-2)=3 i intervallet [-π;π]",
        a: "x= -1,79 V x=2,64",
        b: "x= 1,79 V x=2,64",
        c: "x= -1,79 V x=-2,64",
        correct: "a",
    },
    
];

const quiz= document.getElementById('testid')
const answerEls= document.querySelectorAll('.answer')
const questionEl= document.getElementById('question')
const a_text= document.getElementById('a_text')
const b_text= document.getElementById('b_text')
const c_text= document.getElementById('c_text')
const submitBtm= document.getElementById('submit')

let currentQuiz = 0
let score = 0 

loadQuiz()

function loadQuiz(){
    deselectAnswers()

    const currentQuizData = quizData[currentQuiz]

    questionEl.innerText = currentQuizData.question
    a_text.innerText = currentQuizData.a
    b_text.innerText = currentQuizData.b
    c_text.innerText = currentQuizData.c
}

function deselectAnswers(){
    answerEls.forEach(answerEl => answerEl.checked = false)
}

function getSelected(){
    let answer
    answerEls.forEach(answerEl =>{
        if(answerEl.checked){
            answer = answerEl.id
        }
    })
    return answer
}

submitBtm.addEventListener('click', () =>{
    const answer = getSelected()
    if(answer) {
        if (answer === quizData[currentQuiz].correct) {
            score++
        }

        currentQuiz++

        if(currentQuiz < quizData.length){
            loadQuiz()
        } else {
            quiz.innerHTML = `<h2> Dit fik ${score}/${quizData.length} spørgsmål rigtig</h2>
            <button onclick = "location.reload()">Reload</button>
            `
        }
    }
})