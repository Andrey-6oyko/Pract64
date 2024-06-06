<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Отримуємо дані з форми
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $email = $_POST['email'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $birth_date = $_POST['birth_date'];

    // Перевірка відповідності паролів
    if ($password !== $confirm_password) {
        echo "Паролі не співпадають. Спробуйте ще раз.";
        exit();
    }

    // Хешування пароля для безпеки
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Форматування даних для запису у файл
    $user_data = array(
        'username' => $username,
        'password' => $hashed_password,
        'email' => $email,
        'first_name' => $first_name,
        'last_name' => $last_name,
        'birth_date' => $birth_date
    );

    // Відкриваємо файл для запису
    $file = 'users.txt';

    // Записуємо дані у файл у форматі JSON
    if (file_put_contents($file, json_encode($user_data) . PHP_EOL, FILE_APPEND | LOCK_EX)) {
        echo "Реєстрація пройшла успішно!";
    } else {
        echo "Сталася помилка при записі даних.";
    }
}
?>