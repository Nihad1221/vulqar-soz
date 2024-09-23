<!DOCTYPE html>
<html lang="az">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="chat-container">
    <div class="chat-box" id="chat-box"></div>
    <textarea id="input-area" rows="3" placeholder="Mesajınızı yazın..."></textarea><br>
    <button id="send-button">Göndər</button>
</div>

<script>
    $(document).ready(function () {
        $('#send-button').click(function () {
            var message = $('#input-area').val();

            if (message.trim() !== "") {
                $.ajax({
                    url: 'process.php',
                    type: 'POST',
                    data: {message: message},
                    success: function (response) {
                        $('#chat-box').append('<div class="message">' + response + '</div>');
                        $('#chat-box').scrollTop($('#chat-box')[0].scrollHeight);
                        $('#input-area').val('');
                    }
                });
            }
        });
    });
</script>
</body>
</html>
