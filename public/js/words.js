window.goToWordsContains = function(categoryNum) {
    const userId = document.body.dataset.userid || 0;
    window.location.href = `/words-contains?category=${categoryNum}&userId=${userId}`;
} 