<nav class="navbar navbar-expand-sm navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">My Favorites</a>
        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-sm-0">
                <?php if (array_key_exists("user", $_SESSION)): ?>
                    <li class="nav-item">
                        <a class="nav-link btn" href="/logout">Logout</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link btn" href="/signup">Signup</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn" href="/signin">Signin</a>
                    </li>
                <?php endif ?>
            </ul>
        </div>
    </div>
</nav>