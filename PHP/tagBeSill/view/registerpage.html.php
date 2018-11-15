<?php
$title = 'Tag be sill register page';

$usernameError = '';
if (! empty($errors['username'])) {
    $usernameError = '<ul class="alert alert-danger" role="alert">';
    foreach ($errors['username'] as $errorText) {
        $usernameError .= '<li>' . $errorText . '</li>';
    }
    $usernameError .= '</ul>';
}
$password1Error = '';
if (! empty($errors['password1'])) {
    $password1Error = '<ul class="alert alert-danger" role="alert">';
    foreach ($errors['password1'] as $errorText) {
        $password1Error .= '<li>' . $errorText . '</li>';
    }
    $password1Error .= '</ul>';
}
$password2Error = '';
if (! empty($errors['password2'])) {
    $password2Error = '<ul class="alert alert-danger" role="alert">';
    foreach ($errors['password2'] as $errorText) {
        $password2Error .= '<li>' . $errorText . '</li>';
    }
    $password2Error .= '</ul>';
}

if (isset($success) && $success) {
    $successText = '<div class="alert alert-success" role="alert">your account was successfully created</div>';
} else {
    $successText = '';
}

$username = $_POST['username'] ?? '';
$content = <<<EOT
    <div class="container">
        $successText
        <form method="POST">
            <div class="form-group">
                <label for="username">User Name</label>
                <input type="text" class="form-control" value="$username" name="username" id="username">
                $usernameError
            </div>
            <div class="form-group">
                <label for="password1">Password</label>
                <input type="password" class="form-control" name="password1" id="password1">
                $password1Error
            </div>
            <div class="form-group">
                <label for="password2">Confirm Password</label>
                <input type="password" class="form-control" name="password2" id="password2">
                $password2Error
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="/">
                <button type="button" class="btn btn-primary">Back</button>
            </a>
        </form>
    </div>
EOT;

include __DIR__ . '/Base.html.php';
