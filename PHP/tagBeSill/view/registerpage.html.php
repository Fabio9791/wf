<?php
$title = 'Tag be sill register page';

$content = <<<EOT
    <div class="container">
        <form>
            <div class="form-group">
                <label for="username">User Name</label>
                <input type="text" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label for="Password1">Password</label>
                <input type="password" class="form-control" id="Password1" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="Password2">Password</label>
                <input type="password" class="form-control" id="Password2" placeholder="Confirm Password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="/">
                <button type="button" class="btn btn-primary">Back</button>
            </a>
        </form>
    </div>
EOT;

include __DIR__ . '/Base.html.php';