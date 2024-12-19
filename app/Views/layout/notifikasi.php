<!-- Warning Alert -->
<div class="alert hide">
    <span class="fas fa-exclamation-circle"></span>
    <span class="msg">Pesan error akan muncul di sini</span>
    <div class="close-btn">
        <span class="fas fa-times"></span>
    </div>
</div>

<!-- Success Alert -->
<div class="success hide">
    <span class="fas fa-check-circle"></span>
    <span class="msg">Pesan sukses akan muncul di sini</span>
    <div class="close-btn">
        <span class="fas fa-times"></span>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const flashError = <?= json_encode(session()->getFlashdata('error')) ?>;
        const flashValidationErrors = <?= json_encode(session()->getFlashdata('errors')) ?>;
        const flashSuccess = <?= json_encode(session()->getFlashdata('success')) ?>;

        if (flashError) {
            const alert = document.querySelector('.alert');
            alert.querySelector('.msg').textContent = flashError;
            alert.classList.add('show');
            alert.classList.remove('hide');
            setTimeout(function() {
                alert.classList.remove('show');
                alert.classList.add('hide');
            }, 5000);
        }

        if (flashValidationErrors) {
            const alert = document.querySelector('.alert');
            alert.querySelector('.msg').textContent = Object.values(flashValidationErrors).join(' ');
            alert.classList.add('show');
            alert.classList.remove('hide');
            setTimeout(function() {
                alert.classList.remove('show');
                alert.classList.add('hide');
            }, 5000);
        }

        if (flashSuccess) {
            const success = document.querySelector('.success');
            success.querySelector('.msg').textContent = flashSuccess;
            success.classList.add('show');
            success.classList.remove('hide');
            setTimeout(function() {
                success.classList.remove('show');
                success.classList.add('hide');
            }, 5000);
        }
    });
</script>
