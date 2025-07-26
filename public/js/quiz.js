let questionCount = 0;
let questionTimes = 5;
let correct = 0;
let incorrect = 0;
let incorrectWords = [];
let currentAnswer = '';

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('questionTimes').addEventListener('change', function() {
        questionTimes = parseInt(this.value);
        document.getElementById('questionTimesDisplay').textContent = questionTimes;
    });
    
    fetchQuiz();
});

function fetchQuiz() {
    fetch('/api/quiz')
        .then(response => response.json())
        .then(data => {
            document.getElementById('question').textContent = data.sicilian;
            currentAnswer = data.answer;
            
            const optionsContainer = document.getElementById('options');
            optionsContainer.innerHTML = '';
            
            data.options.forEach(option => {
                const button = document.createElement('button');
                button.className = 'option btn btn-outline-secondary';
                button.textContent = option;
                button.onclick = () => checkAnswer(option);
                optionsContainer.appendChild(button);
            });
        })
        .catch(error => {
            console.error('APIエラー:', error);
        });
}

function checkAnswer(option) {
    const options = document.querySelectorAll('.option');
    options.forEach(opt => opt.disabled = true);
    
    if(option === currentAnswer) {
        correct++;
        options.forEach(opt => {
            if(opt.textContent === option) {
                opt.classList.add('correct');
            }
        });
    } else {
        incorrect++;
        incorrectWords.push([document.getElementById('question').textContent, currentAnswer]);
        options.forEach(opt => {
            if(opt.textContent === option) {
                opt.classList.add('incorrect');
            } else if(opt.textContent === currentAnswer) {
                opt.classList.add('correct');
            }
        });
    }
    
    if(questionCount < questionTimes) {
        setTimeout(() => {
            questionCount++;
            document.getElementById('questionCount').textContent = questionCount;
            fetchQuiz();
            options.forEach(opt => {
                opt.disabled = false;
                opt.classList.remove('correct', 'incorrect');
            });
        }, 1000);
    } else {
        showResults();
    }
}

function showResults() {
    document.getElementById('quiz').style.display = 'none';
    document.getElementById('result-container').style.display = 'block';
    document.getElementById('correct').textContent = correct;
    document.getElementById('incorrect').textContent = incorrect;
    
    const incorrectWordsList = document.getElementById('incorrect-words');
    incorrectWordsList.innerHTML = '';
    incorrectWords.forEach(word => {
        const li = document.createElement('li');
        li.textContent = `${word[0]}: ${word[1]}`;
        incorrectWordsList.appendChild(li);
    });
}

function tryAgain() {
    questionCount = 0;
    correct = 0;
    incorrect = 0;
    incorrectWords = [];
    document.getElementById('questionCount').textContent = '0';
    document.getElementById('result-container').style.display = 'none';
    document.getElementById('quiz').style.display = 'block';
    fetchQuiz();
} 