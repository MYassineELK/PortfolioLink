<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST["prompt"])) {
    if (ob_get_length()) ob_clean();

    try {
require_once $_SERVER['DOCUMENT_ROOT'] . '/php/php poo/Projet_Tutore/PortfolioLink/src/model/chatboot.php';

        $userPrompt  = $_POST["prompt"];
        $botResponse = chatboot::chatboot($userPrompt);

        
        $_SESSION["chate"][] = [$userPrompt ?? '', $botResponse ?? ''];

        header('Content-Type: application/json');
        echo json_encode([
            'status'    => 'success',
            'bot_reply' => $botResponse
        ]);
    } catch (Exception $e) {
        header('Content-Type: application/json', true, 500);
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PortfolioLink Assistant</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="src/assets/css/style_chatboot.css">
     <script src="src/assets/js/js_chatboot.js"></script>

</head>
<body>

<button id="chat-launcher" onclick="chOpen()" title="Chat with assistant">
    <div id="chat-notif"></div>
    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
    </svg>
</button>

<div id="chat-window">

    <div class="ch-header">
        <div class="ch-bot-info">
            <div class="ch-avatar">🤖</div>
            <div>
                <div class="ch-name">Portfolio Assistant</div>
                <div class="ch-status">Online — ready to help</div>
            </div>
        </div>
        <div class="ch-close" onclick="chClose()" title="Close">
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                <line x1="1" y1="1" x2="13" y2="13"/><line x1="13" y1="1" x2="1" y2="13"/>
            </svg>
        </div>
    </div>

    <div class="ch-messages" id="chMsgs">
        <div class="ch-row bot">
            <div class="ch-msg-av">🤖</div>
            <div class="ch-bubble">
                👋 Hi! I'm your PortfolioLink assistant.<br>
                How can I help you today?
            </div>
        </div>

        <?php if (!empty($_SESSION["chate"])): ?>
            <?php foreach ($_SESSION["chate"] as $chat): ?>
                <div class="ch-row user">
                    <div class="ch-bubble"><?= htmlspecialchars($chat[0] ?? '') ?></div>
                </div>
                <div class="ch-row bot">
                    <div class="ch-msg-av">🤖</div>
                    <div class="ch-bubble"><?= htmlspecialchars($chat[1] ?? '') ?></div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <div class="ch-footer">
        <form id="chForm" onsubmit="chSend(event)">
            <div class="ch-input-wrap">
                <input
                    type="text"
                    id="chInput"
                    placeholder="Type your message..."
                    autocomplete="off"
                    required
                />
                <button type="submit" class="ch-send" title="Send">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="22" y1="2" x2="11" y2="13"/>
                        <polygon points="22 2 15 22 11 13 2 9 22 2"/>
                    </svg>
                </button>
            </div>
        </form>
    </div>

</div>


</body>
</html>