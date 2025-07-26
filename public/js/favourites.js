document.addEventListener('DOMContentLoaded', function() {
    loadFavourites();
});

function loadFavourites() {
    const userId = document.getElementById('favouritesList').dataset.userid;
    if (!userId) {
        showMessage('ログインが必要です', 'warning');
        return;
    }
    fetch(`/api/get-favourites?userId=${userId}`)
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP ${response.status}: ${response.statusText}`);
            }
            return response.json();
        })
        .then(data => {
            const favouritesList = document.getElementById('favouritesList');
            if (data.success) {
                if (data.favourites && data.favourites.length > 0) {
                    favouritesList.innerHTML = '';
                    data.favourites.forEach(word => {
                        const wordDiv = document.createElement('div');
                        wordDiv.className = 'word-item card mb-3';
                        wordDiv.innerHTML = `
                            <div class="card-body">
                                <h5 class="card-title">${word.sicilian}</h5>
                                <p class="card-text">${word.japanese}</p>
                                <button class="btn btn-sm btn-outline-danger" onclick="removeFavourite(${word.id}, event)">
                                    <i class="bi bi-heart-fill"></i> お気に入りから削除
                                </button>
                            </div>
                        `;
                        favouritesList.appendChild(wordDiv);
                    });
                } else {
                    favouritesList.innerHTML = '<p class="text-center text-muted">お気に入りに登録された単語がありません</p>';
                }
            } else {
                showMessage(data.message || 'お気に入りの読み込みに失敗しました', 'danger');
                favouritesList.innerHTML = '<p class="text-center text-muted">エラーが発生しました</p>';
            }
        })
        .catch(error => {
            showMessage('お気に入りの読み込みに失敗しました: ' + error.message, 'danger');
            document.getElementById('favouritesList').innerHTML = '<p class="text-center text-muted">エラーが発生しました</p>';
        });
}

window.removeFavourite = function(wordId, event) {
    const userId = document.getElementById('favouritesList').dataset.userid;
    fetch('/api/delete-favourite', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ 
            wordId: wordId,
            userId: userId 
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showMessage(data.message, 'success');
            loadFavourites();
        } else {
            showMessage(data.message, 'danger');
        }
    })
    .catch(error => {
        showMessage('お気に入りの削除に失敗しました', 'danger');
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