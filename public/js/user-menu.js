document.addEventListener('DOMContentLoaded', function() {
    // Bootstrapモーダルの初期化確認
    const deleteModal = document.getElementById('deleteAccountModal');
    const modal = new bootstrap.Modal(deleteModal);
    
    const confirmCheckbox = document.getElementById('confirmDelete');
    const confirmBtn = document.getElementById('confirmDeleteBtn');
    
    if (confirmCheckbox && confirmBtn) {
        confirmCheckbox.addEventListener('change', function() {
            confirmBtn.disabled = !this.checked;
        });
        
        confirmBtn.addEventListener('click', function() {
            if (confirmCheckbox.checked) {
                if (confirm('本当にアカウントを削除しますか？この操作は取り消すことができません。')) {
                    deleteAccount();
                }
            }
        });
    }
    
    // モーダルが表示された時の処理
    deleteModal.addEventListener('shown.bs.modal', function () {
        // modal-backdropを削除
        const backdrops = document.querySelectorAll('.modal-backdrop');
        backdrops.forEach(backdrop => backdrop.remove());
    });
    
    // モーダルが閉じられた時の処理
    deleteModal.addEventListener('hidden.bs.modal', function () {
        // バックドロップを強制的に削除
        const backdrops = document.querySelectorAll('.modal-backdrop');
        backdrops.forEach(backdrop => backdrop.remove());
        // bodyのmodal-openクラスを削除
        document.body.classList.remove('modal-open');
        document.body.style.overflow = '';
        document.body.style.paddingRight = '';
    });
    
    // キャンセルボタンでモーダルを閉じる
    const cancelBtn = document.querySelector('[data-bs-dismiss="modal"]');
    if (cancelBtn) {
        cancelBtn.addEventListener('click', function() {
            modal.hide();
        });
    }
    
    // ESCキーでモーダルを閉じる
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            modal.hide();
        }
    });
});

function deleteAccount() {
    fetch('/delete-account', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('アカウントが削除されました。');
            window.location.href = '/';
        } else {
            alert('エラーが発生しました: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('アカウント削除中にエラーが発生しました。');
    });
} 