<!DOCTYPE html>
<html lang="<?=$data['lang']?>">
    
    <?php require 'public/blocks/head.php'; ?>

    <body>
        <?php require 'public/blocks/header.php'; ?>
        <div class="container main">
            <h1>Авторизація</h1>
            <p>Система авторизації на сайті:</p>
            <form action="/user/auth" method="post" class="form-control">
                <input type="text" name="login" placeholder="Введите логин" value="<?=$_POST['login']?>"><br>
                <input type="password" name="pass" placeholder="Введите пароль" value="<?=$_POST['pass']?>"><br>
                <div class="error"><?=$data['message']?></div>
                <button class="btn" id="send">Готово</button>
            </form>
        </div>
        <?php require 'public/blocks/footer.php'; ?>
    </body>
</html>