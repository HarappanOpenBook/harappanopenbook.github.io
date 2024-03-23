<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/css/output.css">
    <script type="module">
        import * as Turbo from 'https://cdn.skypack.dev/@hotwired/turbo@7.1.0';
    </script>
    <style>
        .turbo-progress-bar {
            height: 10px;
            background-color: red;
        }

        .dropdown-content {
            display: none;
        }

        .dropdown-content.show {
            display: block;
        }

        .dropdown-btn {
            cursor: pointer;
        }
    </style>
    <title>
        <?= $title ?>
    </title>

    <?= $this->meta($meta) ?>

</head>

<body class="bg-danger-subtle">

    <div class="container my-5">
        <div class="row g-4">
            <div class="col-md-4 col-lg-3">
                <ul class="nav flex-column d-none d-md-block">
                    <li class="nav-item">
                        <a class="nav-link text-dark text-decoration-underline fw-bolder fs-4" href="/">
                            <?= config('blog.name') ?>
                        </a>
                    </li>
                    <?php foreach (config('blog.header_menu') as $link => $text): ?>
                        <li class="nav-item">
                            <a class="nav-link text-danger fw-bolder" href="<?= $link ?>">
                                <?= $text ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <div class="division d-sm-block d-xs-block d-md-none d-lg-none">
                    <a class="nav-link text-dark text-decoration-underline fw-bolder fs-4" href="/">
                        <?= config('blog.name') ?>
                    </a>
                    <div class="dropdown">
                        <span class="dropdown-btn text-danger fw-bolder" onclick="toggleDropdown()">Menu &darr;</span>
                        <div class="dropdown-content" id="dropdownContent">
                            <ul class="nav flex-column">
                                <?php foreach (config('blog.header_menu') as $link => $text): ?>
                                    <li class="nav-item">
                                        <a class="nav-link text-dark" href="<?= $link ?>">
                                            <?= $text ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-lg-9 mx-auto">

                <div class="mb-3">
                    <?php if (isset ($previous)): ?>
                        <a href="<?= $previous ?>" class="btn btn-dark btn-sm">&larr; Previous</a>
                    <?php endif; ?>

                    <?php if (isset ($next)): ?>
                        <a href="<?= $next ?>" class="ml-5 btn btn-secondary btn-sm">Next &rarr;</a>
                    <?php endif; ?>
                </div>

                <div class="bg-white rounded p-4">
                    <h1 class="text-3xl font-bold">
                        <?= $title ?>
                    </h1>

                    <p class="lead">
                        <?= $description ?>
                    </p>

                    <ul id="searchResults"></ul>

                    <article class="prose prose-lg prose-green">
                        <?= $content ?>
                    </article>
                </div>

                <div class="mt-3">
                    <?php if (isset ($previous)): ?>
                        <a href="<?= $previous ?>" class="btn btn-dark btn-sm">&larr; Previous</a>
                    <?php endif; ?>

                    <?php if (isset ($next)): ?>
                        <a href="<?= $next ?>" class="ml-5 btn btn-secondary btn-sm">Next &rarr;</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <footer class="text-center mt-5 p-4">
        <p>All content on this website are powered under <a href="https://raw.githubusercontent.com/HarappanOpenBook/harappanopenbook.github.io/main/LICENSE" target="_blank">CC0 1.0 Universal</a></p>
        <p>
            <?= date('Y') ?> &copy;
            <?= config('blog.name') ?>. All rights reserved.
        </p>
    </footer>

    <script>
        function toggleDropdown() {
            var dropdownContent = document.getElementById("dropdownContent");
            dropdownContent.classList.toggle("show");
        }
    </script>
</body>

</html>