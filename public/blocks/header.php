<header>
    <div class="container top-menu">
        <div class="nav">
            <h1>
                <img src="/public/imgs/logo.svg" alt="Logo">
                <a href="/">NastyLinks</a>
            </h1>
        </div>
        <div class="nav">
            <h3>

                <?php if ($_COOKIE['login'] == ''): ?>

                    <a href="/user/auth">Увійти</a>

                <?php else: ?>

                    <a href="/user/dashboard"><?=$data['user']['login']?></a>

                <?php endif; ?>

                <a href="/about">Про нас</a>
                <a href="/contact">Контакти</a>
            </h3>
        </div>
    </div>
</header>