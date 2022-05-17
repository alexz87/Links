<?php
    if ($_COOKIE['login'] == ''):
        header('Location: /user/reg');
?>
<?php else: ?>
    <!DOCTYPE html>
    <html lang="<?=$data['lang']?>">
    
    <?php require 'public/blocks/head.php'; ?>

        <body>

            <?php require 'public/blocks/header.php'; ?>

            <div class="container main">
                <h1>Вкоротимо ;)</h1>
                <br>
                <p>Вам потрібно вкоротити посилання? Зараз ми це зробимо!</p>
                <br>
                <form action="/" method="post" class="form-control">
                    <input type="text" name="long_link" placeholder="Додайте посилання" value=""><br>
                    <input type="text" name="title" placeholder="Додайте назву" value=""><br>
                    <div class="error"><?=$data['message']?></div>
                    <button class="btn" id="send">Вкоротити</button>
                </form>
                <br>
            
                <?php for ($i = 0; $i < count($data['links']); $i++): ?>

                    <div>
                        <b>Ваше коротке посилання: </b><a href="<?=$data['links'][$i]['long_link']?>"><?=$data['links'][$i]['short_link']?></a><br>
                        <b>Назва посилання: </b><?=$data['links'][$i]['title']?>
                        <form action="/" method="post">
                            <input type="hidden" name="link_id_delete" value="<?=$data['links'][$i]['id']?>">
                            <button class="btn" id="send">Видалити<i class="fas fa-trash-alt"></i></button>
                        </form>
                    </div>
                    <br>

                <?php endfor; ?>

            </div>

            <?php require 'public/blocks/footer.php'; ?>

        </body>
    </html>

<?php endif; ?>