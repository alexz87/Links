<!DOCTYPE html>
<html lang="<?=$data['lang']?>">
    
    <?php require 'public/blocks/head.php'; ?>

    <body>
        <?php require 'public/blocks/header.php'; ?>
        <div class="container main">
            <h1>Зворотній зв'язок</h1>
            <p>Напишіть нам, якщо у Вас є питання:</p>
            <br>
            <form action="/contact" method="post" class="form-control">
                <input type="text" name="name" placeholder="Введите имя" value="<?=$_POST['name']?>"><br>
                <input type="email" name="email" placeholder="Введите email" value="<?=$_POST['email']?>"><br>
                <textarea name="mess" placeholder="Введите сообщение" value="<?=$_POST['mess']?>"></textarea>
                <div class="error"><?=$data['message']?></div>
                <button class="btn" id="send">Надіслати</button>
            </form>
        </div>
        <?php require 'public/blocks/footer.php'; ?>
    </body>
</html>
