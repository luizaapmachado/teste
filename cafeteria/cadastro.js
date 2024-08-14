function showSuccessMessage() {
            const message = document.getElementById('success-message');
            message.style.display = 'block';
            setTimeout(() => {
                message.style.display = 'none';
            }, 5000); // 5000 ms = 5 segundos
        }

        // Função para mostrar a mensagem de erro
        function showErrorMessage() {
            const message = document.getElementById('error-message');
            message.style.display = 'block';
        }

        document.addEventListener('DOMContentLoaded', function() {
            <?php if ($success): ?>
                showSuccessMessage();
            <?php endif; ?>
            <?php if (!empty($error_message)): ?>
                showErrorMessage();
            <?php endif; ?>
        });