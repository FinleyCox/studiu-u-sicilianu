document.addEventListener('DOMContentLoaded', function() {
    const category = document.getElementById('wordList').dataset.category;
    const userId = document.getElementById('wordList').dataset.userid;
    
    fetch(`/api/words?category=${category}&userId=${userId}`)
        .then(response => response.json())
        .then(data => {
            const wordList = document.getElementById('wordList');
            wordList.innerHTML = '';
            data.forEach(word => {
                const wordDiv = document.createElement('div');
                wordDiv.className = 'word-item card mb-3';
                wordDiv.innerHTML = `
                    <div class="card-body">
                        <h5 class="card-title">${word.sicilian}</h5>
                        <p class="card-text">${word.japanese}</p>
                        <button class="btn btn-sm btn-outline-primary" onclick="toggleFavourite(${word.id}, event)">
                            <i class="bi bi-heart${word.is_favourite ? '-fill' : ''}"></i>
                        </button>
                    </div>
                `;
                wordList.appendChild(wordDiv);
            });
        })
        .catch(error => {
            console.error('Error:', error);
        });
});

window.toggleFavourite = function(wordId, event) {
    const userId = document.getElementById('wordList').dataset.userid;
    if (userId === '0') {
        alert('お気に入りを追加するにはログインしてください');
        return;
    }
    fetch('/favourites', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ word_id: wordId })
    })
    .then(response => {
        if (!response.ok) {
            throw new Error(`HTTP ${response.status}: ${response.statusText}`);
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            const button = event.target.closest('button');
            const icon = button.querySelector('i');
            if (data.is_favourite) {
                icon.className = 'bi bi-heart-fill';
            } else {
                icon.className = 'bi bi-heart';
            }
            showMessage(data.message, 'success');
        } else {
            showMessage(data.message || 'エラーが発生しました', 'danger');
        }
    })
    .catch(error => {
        showMessage('お気に入りの更新中にエラーが発生しました: ' + error.message, 'danger');
    });
}

function showMessage(message, type) {
    const messageArea = document.getElementById('messageArea');
    messageArea.className = `alert alert-${type}`;
    messageArea.textContent = message;
    messageArea.style.display = 'block';
    setTimeout(() => {
        messageArea.style.display = 'none';
    }, 3000);
} 