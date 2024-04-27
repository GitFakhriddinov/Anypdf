<?php
// Ma'lumotlarni qabul qilish
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['message'])) {
    $message = strip_tags(trim($_POST['message'])); // Xavfsizlik uchun HTML teglarni olib tashlash

    // Telegram API orqali xabar yuborish
    $chat_id = '6514242114';  // Sizning shaxsiy Telegram IDingiz
    $token = '7018763728:AAGjOP7NhRhm0oIMTfH6oKBghAsxVuqKSdk';  // Bot tokeni

    $url = "https://api.telegram.org/bot$token/sendMessage";

    $data = array(
        'chat_id' => $chat_id,
        'text' => $message
    );

    // cURL orqali xabar yuborishni sozlash
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $result = curl_exec($ch);
    curl_close($ch);

    if ($result) {
        echo "yuborildi: " . htmlspecialchars($message);
    } else {
        echo "Xabar yuborishda xato ro'y berdi.";
    }
} else {
    http_response_code(400);
    echo "Xato: Notog'ri so'rov";
}
?>
