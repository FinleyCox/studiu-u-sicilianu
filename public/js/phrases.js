document.addEventListener('DOMContentLoaded', function() {
    const userId = document.body.dataset.userid || 0;
    loadPhrases(1, userId);
});

function loadPhrases(page, userId) {
    fetch(`/api/phrases?page=${page}&userId=${userId}`)
        .then(response => response.json())
        .then(data => {
            const phraseList = document.getElementById('phraseList');
            phraseList.innerHTML = '';
            
            // フレーズを表示
            data.data.forEach(phrase => {
                const phraseDiv = document.createElement('div');
                phraseDiv.className = 'phrase-item card mb-3';
                phraseDiv.innerHTML = `
                    <div class="card-body d-flex align-items-center">
                        <div class="flex-grow-1 text-center">
                            <h5 class="card-title mb-2">${phrase.sicilian}</h5>
                            <p class="card-text mb-0">${phrase.japanese}</p>
                        </div>
                        <div class="ms-auto">
                            <button class="btn btn-sm btn-outline-primary" onclick="togglePhraseFavourite(${phrase.id}, event)">
                                <i class="bi bi-heart${phrase.is_favourite ? '-fill' : ''}"></i>
                            </button>
                        </div>
                    </div>
                `;
                phraseList.appendChild(phraseDiv);
            });
            
            // ページネーションを表示
            displayPagination(data, userId);
        })
        .catch(error => {
            console.error('Error:', error);
            showMessage('フレーズの読み込み中にエラーが発生しました', 'danger');
        });
}

function displayPagination(data, userId) {
    const pagination = document.getElementById('pagination');
    pagination.innerHTML = '';
    
    if (data.last_page <= 1) return;
    
    const paginationContainer = document.createElement('nav');
    paginationContainer.setAttribute('aria-label', 'Phrases pagination');
    
    const ul = document.createElement('ul');
    ul.className = 'pagination';
    
    // 前のページ
    if (data.current_page > 1) {
        const prevLi = document.createElement('li');
        prevLi.className = 'page-item';
        prevLi.innerHTML = `<a class="page-link" href="#" onclick="loadPhrases(${data.current_page - 1}, ${userId})">前へ</a>`;
        ul.appendChild(prevLi);
    }
    
    // ページ番号
    for (let i = 1; i <= data.last_page; i++) {
        const li = document.createElement('li');
        li.className = `page-item ${i === data.current_page ? 'active' : ''}`;
        li.innerHTML = `<a class="page-link" href="#" onclick="loadPhrases(${i}, ${userId})">${i}</a>`;
        ul.appendChild(li);
    }
    
    // 次のページ
    if (data.current_page < data.last_page) {
        const nextLi = document.createElement('li');
        nextLi.className = 'page-item';
        nextLi.innerHTML = `<a class="page-link" href="#" onclick="loadPhrases(${data.current_page + 1}, ${userId})">次へ</a>`;
        ul.appendChild(nextLi);
    }
    
    paginationContainer.appendChild(ul);
    pagination.appendChild(paginationContainer);
}

window.togglePhraseFavourite = function(phraseId, event) {
    const userId = document.getElementById('phraseList').dataset.userid;
    if (userId === '0') {
        alert('お気に入りを追加するにはログインしてください');
        return;
    }
    
    fetch('/api/phrases/favourites', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ phrase_id: phraseId })
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
