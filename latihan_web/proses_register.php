<?php
// Cek apakah form dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $username = $_POST['username'];
    $password = $_POST['password'];
    $emailAddress = $_POST['emailAddress'];
    $phoneNumber = $_POST['phoneNumber'];
    $gender = $_POST['gender'];
    $subject = $_POST['subject'];

    // Validasi data (contoh sederhana)
    $errors = [];
    if (empty($username)) $errors[] = "Username is required.";
    if (empty($password)) $errors[] = "Password is required.";
    if (empty($emailAddress) || !filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) $errors[] = "Valid email is required.";
    if (empty($subject)) $errors[] = "Please select a subject.";

    if (empty($errors)) {
        // Jika tidak ada error, lakukan sesuatu dengan data (misalnya, simpan ke database)
        // Contoh: menampilkan data
        echo "<h1>Registration Successful</h1>";
        echo "<p>Username: " . htmlspecialchars($username) . "</p>";
        echo "<p>Email: " . htmlspecialchars($emailAddress) . "</p>";
        echo "<p>Phone Number: " . htmlspecialchars($phoneNumber) . "</p>";
        echo "<p>Gender: " . htmlspecialchars($gender) . "</p>";
        echo "<p>Subject: " . htmlspecialchars($subject) . "</p>";
    } else {
        // Tampilkan error
        foreach ($errors as $error) {
            echo "<p style='color: red;'>$error</p>";
        }
    }
} else {
    // Jika tidak menggunakan metode POST
    echo "<p>Invalid request method.</p>";
}
?>
