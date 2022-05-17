<!DOCTYPE html>
<html lang="<?=$data['lang']?>">
    
    <?php require 'public/blocks/head.php'; ?>

    <body>
        <?php require 'public/blocks/header.php'; ?>
        <div class="container main">
            <h1>Кабінет користувача</h1>
            <div class="user-info">
                <p>Привіт, <b><?=$data['user']['login']?></b></p>
                <form action="/user/dashboard" method="post">
                    <input type="hidden" name="exit_btn">
                    <button type="submit" class="btn">Вийти</button>
                </form>
            </div>
        </div>
        <?php require 'public/blocks/footer.php'; ?>
    </body>
</html>