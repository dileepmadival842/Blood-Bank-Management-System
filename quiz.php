<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LifeSaver Quiz - Blood Donation</title>
  <script src="https://cdn.jsdelivr.net/npm/js-confetti@latest/dist/js-confetti.browser.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;600&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/2c624fbb65.js" crossorigin="anonymous"></script>
  <style>
    :root {
      --primary-red: #c72a2a;
      --secondary-red: #ff5a5a;
      --accent-yellow: #ffd700;
      --dark-bg: #1a1a1a;
      --light-bg: #f7f7f7;
      --text-light: #ffffff;
      --text-dark: #222222;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Rubik', sans-serif;
    }

    body {
      min-height: 100vh;
      background: var(--dark-bg);
      background-image: radial-gradient(var(--primary-red) 1px, transparent 1px), radial-gradient(var(--primary-red) 1px, transparent 1px);
      background-size: 40px 40px;
      background-position: 0 0, 20px 20px;
      display: flex;
      justify-content: center;
      align-items: center;
      color: var(--text-light);
      transition: background 0.3s, color 0.3s;
    }

    body.light-mode {
      background: var(--light-bg);
      color: var(--text-dark);
    }

    body.light-mode .quiz-container {
      background: rgba(255,255,255,0.9);
      box-shadow: 0 0 30px rgba(0,0,0,0.1);
    }

    .theme-toggle {
      position: absolute;
      top: 20px;
      right: 20px;
      font-size: 1.5rem;
      cursor: pointer;
      color: var(--accent-yellow);
      z-index: 999;
    }

    .home-link {
      position: absolute;
      top: 20px;
      left: 20px;
      font-size: 1.2rem;
      background: var(--primary-red);
      padding: 0.5rem 1rem;
      color: white;
      border-radius: 30px;
      text-decoration: none;
      transition: 0.3s;
    }

    .home-link:hover {
      background: var(--secondary-red);
    }

    .quiz-wrapper {
      position: relative;
      max-width: 800px;
      width: 95%;
      margin: 2rem;
    }

    .quiz-container {
      background: rgba(0, 0, 0, 0.8);
      border-radius: 20px;
      padding: 3rem;
      backdrop-filter: blur(10px);
      box-shadow: 0 0 30px rgba(199, 42, 42, 0.3);
      transition: all 0.4s;
    }

    .quiz-title {
      font-size: 2.5rem;
      color: var(--secondary-red);
      text-align: center;
      margin-bottom: 1rem;
      text-shadow: 0 0 15px rgba(255, 90, 90, 0.5);
      animation: pulse 2s infinite;
    }

    @keyframes pulse {
      0%, 100% { opacity: 1; }
      50% { opacity: 0.8; }
    }

    .progress-container {
      height: 8px;
      background: rgba(255, 255, 255, 0.1);
      border-radius: 4px;
      margin: 2rem 0;
      overflow: hidden;
    }

    .progress-bar {
      height: 100%;
      background: linear-gradient(90deg, var(--primary-red), var(--secondary-red));
      width: 0%;
      transition: width 0.5s ease;
    }

    .question-card {
      background: rgba(255, 255, 255, 0.05);
      border-radius: 15px;
      padding: 2rem;
      margin: 1.5rem 0;
    }

    .question-text {
      font-size: 1.4rem;
      margin-bottom: 1.5rem;
    }

    .options-grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 1rem;
    }

    .option-btn {
      background: rgba(255, 90, 90, 0.1);
      border: 2px solid var(--primary-red);
      border-radius: 10px;
      padding: 1rem;
      color: inherit;
      font-size: 1.1rem;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .option-btn:hover {
      background: var(--primary-red);
      color: white;
      box-shadow: 0 5px 15px rgba(199, 42, 42, 0.4);
    }

    .option-btn.correct {
      background: #2ecc71;
      border-color: #27ae60;
    }

    .option-btn.incorrect {
      background: #e74c3c;
      border-color: #c0392b;
    }

    .results-screen {
      text-align: center;
      padding: 2rem;
    }

    .score-display {
      font-size: 3rem;
      color: var(--accent-yellow);
      margin: 2rem 0;
      position: relative;
    }

    .score-display::after {
      content: '❤';
      position: absolute;
      right: -40px;
      top: -10px;
      font-size: 2rem;
      animation: heartbeat 1.2s infinite;
    }

    @keyframes heartbeat {
      0%, 100% { transform: scale(1); }
      50% { transform: scale(1.2); }
    }

    .restart-btn {
      background: var(--primary-red);
      border: none;
      padding: 1rem 3rem;
      font-size: 1.2rem;
      color: white;
      border-radius: 50px;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .restart-btn:hover {
      transform: scale(1.05);
      box-shadow: 0 0 20px rgba(199, 42, 42, 0.5);
    }
  </style>
</head>
<body>
  <a href="index.php" class="home-link"><i class="fa-solid fa-house"></i> Home</a>
  <div class="theme-toggle" onclick="toggleTheme()">
    <i class="fa-solid fa-moon"></i>
  </div>
  <div class="quiz-wrapper">
    <div class="quiz-container">
      <h1 class="quiz-title">Blood Hero Quiz</h1>
      <div class="progress-container">
        <div class="progress-bar"></div>
      </div>
      <div id="quiz-content"></div>
    </div>
  </div>
  <script>
    const questions = [
      {
        question: "What percentage of healthy adults are eligible to donate blood?",
        options: ["About 37%", "About 58%", "About 72%", "About 95%"],
        correct: 1
      },
      {
        question: "How many lives can one blood donation potentially save?",
        options: ["1 life", "Up to 3 lives", "5-7 lives", "10+ lives"],
        correct: 2
      },
      {
        question: "How long does the actual blood donation process typically take?",
        options: ["5-10 minutes", "10-15 minutes", "20-30 minutes", "45-60 minutes"],
        correct: 1
      }
    ];

    let currentQuestion = 0;
    let score = 0;
    const quizContent = document.getElementById('quiz-content');
    const progressBar = document.querySelector('.progress-bar');

    function renderQuestion() {
      const q = questions[currentQuestion];
      quizContent.innerHTML = `
        <div class="question-card">
          <div class="question-counter">Question ${currentQuestion + 1} of ${questions.length}</div>
          <h2 class="question-text">${q.question}</h2>
          <div class="options-grid">
            ${q.options.map((opt, i) => `
              <button class="option-btn" onclick="handleAnswer(${i})">${opt}</button>
            `).join('')}
          </div>
        </div>
      `;
      updateProgress();
    }

    function handleAnswer(selected) {
      const q = questions[currentQuestion];
      const btns = document.querySelectorAll('.option-btn');
      btns.forEach(btn => btn.disabled = true);
      if (selected === q.correct) {
        btns[selected].classList.add('correct');
        score++;
      } else {
        btns[selected].classList.add('incorrect');
        btns[q.correct].classList.add('correct');
      }
      setTimeout(() => {
        currentQuestion++;
        currentQuestion < questions.length ? renderQuestion() : showResults();
      }, 2000);
    }

    function updateProgress() {
      progressBar.style.width = `${(currentQuestion / questions.length) * 100}%`;
    }

    function showResults() {
      new JSConfetti().addConfetti({ emojis: ['🩸', '❤', '🩺', '⭐'], emojiSize: 50, confettiNumber: 50 });
      quizContent.innerHTML = `
        <div class="results-screen">
          <h2>Quiz Complete!</h2>
          <div class="score-display">${score}/${questions.length}</div>
          <p>You could save up to ${score * 3} lives!</p>
          <button class="restart-btn" onclick="location.reload()">Donate Again</button>
        </div>
      `;
      updateProgress();
    }

    function toggleTheme() {
      document.body.classList.toggle('light-mode');
    }

    renderQuestion();
  </script>
</body>
</html>
