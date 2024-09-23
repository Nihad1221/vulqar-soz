<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = $_POST['message'];

    function censorWords($message)
    {
        $vulgarWords = ['alma', 'armud', 'heyva'];

        foreach ($vulgarWords as $word) {
            $pattern = '/\b' . $word . '\b/i';
            $replacement = $word[0] . str_repeat('*', strlen($word) - 2) . $word[strlen($word) - 1];
            $message = preg_replace($pattern, $replacement, $message);
        }
        return $message;
    }

    $censoredMessage = censorWords($message);

    $file = fopen('data.txt', 'a');
    fwrite($file, $censoredMessage . "\n");
    fclose($file);

    echo htmlspecialchars($censoredMessage);
}
