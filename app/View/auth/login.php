<!DOCTYPE html>
<html>
<head>
    <title>Login LMS</title>
</head>
<body>
    <h2>Login LMS</h2>
    
    <?php if ($error = \App\Core\Session::getFlash('error')): ?>
        <p style="color: red;"><?= $error ?></p>
    <?php endif; ?>

    <form action="/login" method="POST">
        <div>
            <label>Username</label>
            <input type="text" name="username" required>
        </div>
        <div>
            <label>Password</label>
            <input type="password" name="password" required>
        </div>
        <button type="submit">Login</button>
    </form>
</body>
</html>