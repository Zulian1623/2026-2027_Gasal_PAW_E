<?php
$errors = array();

if (isset($_POST['surname'])) {
    require 'validate.inc';

    validateName($errors, $_POST, 'surname');

    
    if (empty(trim($_POST['email'] ?? ''))) {
        $errors['email'] = 'required';
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'invalid';
    }

    if (empty(trim($_POST['address'] ?? ''))) {
        $errors['address'] = 'required';
    }

    if (empty($_POST['state'] ?? '')) {
        $errors['state'] = 'required';
    }

    if (empty($_POST['gender'] ?? '')) {
        $errors['gender'] = 'required';
    }

    if ($errors) {
        echo '<h2>Invalid, correct the following errors:</h2>';

        foreach ($errors as $field => $error) {
            echo htmlspecialchars($field) . ' ';
            echo htmlspecialchars($error) . '<br>';

        }

        include 'form.inc';
    } else {
        echo 'Form submitted successfully with no errors';
    }
} else {
    include 'form.inc';
}
?>
