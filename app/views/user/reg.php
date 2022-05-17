<!DOCTYPE html>
<html lang="ua">
    
    <?php require 'public/blocks/head.php'; ?>

    <body>

        <?php require 'public/blocks/header.php'; ?>

        <div class="container main">
            <h1>Вкоротимо ;)</h1>
            <p>Вам потрібно вкоротити посилання? <br> Перед цим потрібно зареєструватися на сайті:</p>
            <form action="/user/reg" method="post" class="form-control">
                <input type="email" name="email" placeholder="Введіть email" value="<?=$_POST['email']?>"><br>
                <input type="text" name="login" placeholder="Введіть логін" value="<?=$_POST['login']?>"><br>
                <input type="password" name="pass" placeholder="Введіть пароль" value="<?=$_POST['pass']?>"><br>
                <div class="error"><?=$data['message']?></div>
                <button class="btn" id="send">Реєстрація</button>
            </form>
            <br>
            <p>Якщо у Вас є аккаунт? Тоді Ви можете <a href="/user/auth">авторизуватися</a></p>
        </div>

        <?php require 'public/blocks/footer.php'; ?>
        
    </body>
</html>