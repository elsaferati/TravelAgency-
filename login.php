<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Website</title>
    <link rel="stylesheet" type="text/css" href="login.css">
    <script>
        function showPasswordResetForm() {
            document.getElementById('password-reset-form').style.display = 'block';
        }
    </script>
</head>
<body>
    <div class="background-img"></div>

    <div class="center">
        <h1>Login</h1>
        <form method="post">
            <div class="txt_field">
                <input type="text" required>
                <span></span>
                <label>Username</label>
            </div>
            <div class="txt_field">
                <input type="password" required>
                <span></span>
                <label>Password</label>
            </div>

            <div class="pass" onclick="showPasswordResetForm()">Forgot Password?</div>

            <div id="password-reset-form" style="display: none;">
                <h2>Reset Password</h2>
                <form method="post">
                    <div class="txt_field">
                        <input type="email" required>
                        <span></span>
                        <label>Email</label>
                    </div>
                    <input type="submit" value="Reset Password">
                </form>
            </div>

            <input type="submit" value="Login">
            <div class="signup_link">
                Not a member? <a href="signup.html">Sign in</a>
            </div>
        </form>
    </div>
</body>
</html>