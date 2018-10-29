<?php
$title = 'Tag be sill login page';

if (isset($success) && $success) {
    $successText = '<div class="alert alert-success" role="alert">your were logged successfully</div>';
} else if(isset($success)){
    $successText = '<div class="alert alert-warning" role="alert">nope</div>';
}

$successText = $successText ?? '';

$content = <<<EOT
    <div class="container">
        $successText
        <form method="POST">
            <div class="form-group">
                <label for="username">User Name</label>
                <input type="text" class="form-control" value="" name="username" id="username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="/">
                <button type="button" class="btn btn-primary">Back</button>
            </a>
        </form>
    </div>
EOT;

include __DIR__ . '/Base.html.php';