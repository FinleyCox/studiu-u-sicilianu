document.addEventListener('DOMContentLoaded', function() {
    const wordList = document.getElementById('wordList');
    const category = wordList.dataset.category;

    fetch(`/api/words?category=${category}`)
        .then(response => response.json())
        .then(data => {
            wordList.innerHTML = '';
            data.forEach(word => {
                const wordDiv = document.createElement('div');
                wordDiv.className = 'word-item card mb-3';
                wordDiv.innerHTML = `
                    <div class="card-body text-center">
                        <h5 class="card-title mb-2">${word.sicilian}</h5>
                        <p class="card-text mb-0">${word.japanese}</p>
                    </div>
                `;
                wordList.appendChild(wordDiv);
            });
        })
        .catch(error => {
            console.error('Error:', error);
            wordList.innerHTML = '<p class="text-center text-muted">単語の読み込みに失敗しました。</p>';
        });
});
