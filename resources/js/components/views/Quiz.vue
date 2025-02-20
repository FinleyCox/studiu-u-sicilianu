<template>
    <!-- TODO:
        終了画面にリザルト、間違えたワード一覧
        もう一度やるボタンでカウントリセットしてfetchquiz
    -->
    <div class="container">
        <div v-if="questionCount < 5" class="quiz-container" id="quiz">
            <div class="quiz-header">
                <h2>word quiz</h2>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0"
                        aria-valuemax="100"></div>
                </div>
            </div>
            <div id="question-container">
                <p class="question" id="question">
                    {{ sicilian }}
                </p>
                <div class="options">
                <button
                    v-for="option in options" :key="option"
                    :class="['option', 'btn', 'btn-outline-secondary', selectedOption === option ? (option === answer ? 'correct' : 'incorrect') : '']"
                    @click="checkAnswer(option)

                ">
                    {{ option }}
                </button>
            </div>
            </div>
            <!-- <div class="quiz-footer">
                <button class="btn btn-primary" id="next-btn">Next</button>
            </div> -->
            <p v-if="result !== null">{{ result }}</p>
        </div>
        <div v-else>
            <h2>終了</h2>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        name: "Quiz",
        data() {
            return {
                sicilian: "",
                options: [],
                answer: "",
                result: null,
                selectedOption: null,
                questionCount: 0
            };
        },
        mounted() {
            // コンポーネントがマウントされたらAPIを呼ぶ
            this.fetchQuiz();
        },
        methods: {
            // QuizController.phpのindex()を呼び出す:出題用
            fetchQuiz() {
                // コンポーネントがマウントされたらAPIを呼ぶ
                axios.get('/api/quiz')
                .then(response => {
                    console.log(response.data); // ここで JSON が返るか確認
                    this.sicilian = response.data.sicilian;
                    this.options = response.data.options;
                    this.answer = response.data.answer;
                })
                .catch(error => {
                    console.error('APIエラー:', error);
                });
            },
            // 回答を見て、正解か不正解を判断
            checkAnswer(option) {
                this.selectedOption = option;
                if(option === this.answer) {
                    this.result = "Raggiuni hai!";

                } else {
                    this.result = "Scurrettu!";
                }
                this.disableOptions();
            },
            // 一度答えたら選択不可にする
            disableOptions() {
                const options = document.querySelectorAll('.option');
                options.forEach(option => {
                    option.disabled = true;
                });
                this.nextQuestion();
                options.forEach(option => {
                option.disabled = false;
                })
            },
            // 3秒経ったら次の問題を呼ぶ(全部で５回まで)
            nextQuestion() {
                setTimeout(() => {
                    this.fetchQuiz();
                }, "2000");
                this.questionCount++;
            }
        }
    };
</script>

<style scoped>
    .quiz-container {
        background-color: white;
        border-radius: 15px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        padding: 30px;
        max-width: 600px;
        width: 100%;
        margin: auto;
    }

    .quiz-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .question {
        font-size: 1.2rem;
        margin-bottom: 20px;
    }

    .options {
        display: grid;
        gap: 10px;
    }

    .option {
        border: 2px solid #dee2e6;
        border-radius: 10px;
        padding: 15px;
        cursor: pointer;
        transition: all 0.3s ease;
        width: 100%;
    }
    .option.correct {
        background-color: #b0e0e6;
        color: #333;
        border-color: #b0e0e6;
    }
    .option.incorrect {
        background-color: #FF2D20;
        color: #fff;
        border-color: #FF2D20;
    }
    .quiz-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 30px;
    }

    .progress {
        height: 10px;
        margin-bottom: 20px;
    }

    .results {
        text-align: center;
    }

    .result-icon {
        font-size: 4rem;
        margin-bottom: 20px;
    }

    .score {
        font-size: 2rem;
        font-weight: bold;
        margin-bottom: 20px;
    }
</style>
