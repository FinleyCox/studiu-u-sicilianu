document.addEventListener('DOMContentLoaded', function() {
    loadPhrases(1);
});

function loadPhrases(page = 1) {
    fetch(`/api/phrases?page=${page}`)
        .then(response => response.json())
        .then(data => {
            const phraseList = document.getElementById('phraseList');
            phraseList.innerHTML = '';
            
            // フレーズを表示
            data.data.forEach(phrase => {
                const phraseDiv = document.createElement('div');
                phraseDiv.className = 'phrase-item card mb-3';
                phraseDiv.innerHTML = `
                    <div class="card-body text-center">
                        <h5 class="card-title mb-2">${phrase.sicilian}</h5>
                        <p class="card-text mb-0">${phrase.japanese}</p>
                    </div>
                `;
                phraseList.appendChild(phraseDiv);
            });
            
            // ページネーションを表示
            displayPagination(data);
        })
        .catch(error => {
            console.error('Error:', error);
            const phraseList = document.getElementById('phraseList');
            phraseList.innerHTML = '<p class="text-center text-muted">フレーズの読み込みに失敗しました。</p>';
        });
}

function displayPagination(data) {
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
        prevLi.innerHTML = `<a class="page-link" href="#" onclick="loadPhrases(${data.current_page - 1})">前へ</a>`;
        ul.appendChild(prevLi);
    }
    
    // ページ番号
    for (let i = 1; i <= data.last_page; i++) {
        const li = document.createElement('li');
        li.className = `page-item ${i === data.current_page ? 'active' : ''}`;
        li.innerHTML = `<a class="page-link" href="#" onclick="loadPhrases(${i})">${i}</a>`;
        ul.appendChild(li);
    }
    
    // 次のページ
    if (data.current_page < data.last_page) {
        const nextLi = document.createElement('li');
        nextLi.className = 'page-item';
        nextLi.innerHTML = `<a class="page-link" href="#" onclick="loadPhrases(${data.current_page + 1})">次へ</a>`;
        ul.appendChild(nextLi);
    }
    
    paginationContainer.appendChild(ul);
    pagination.appendChild(paginationContainer);
}
