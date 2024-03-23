<?php if ($type === 'recommended_product'): ?>
    <div class="card border-2 border-success my-5">
        <div class="card-header bg-success text-white fw-bolder border-bottom border-success border-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
                <path
                    d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a10 10 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733q.086.18.138.363c.077.27.113.567.113.856s-.036.586-.113.856c-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.2 3.2 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.8 4.8 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z" />
            </svg> RECOMMENDED
        </div>
        <div class="card-body">
            <div class="row g-4">
                <div class="col-md-6">
                    <a href="<?= $link ?>" target="_blank"><img src="<?= $image ?>" alt="" width="100%" class="rounded"></a>
                    <hr>
                    <?php if (isset ($pros)): ?>
                        <?php foreach ($pros as $pro): ?>
                            <p class="card-text text-success">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                </svg>
                                <?= $pro ?>
                            </p>
                        <?php endforeach ?>
                    <?php endif ?>
                    <?php if (isset ($cons)): ?>
                        <?php foreach ($cons as $con): ?>
                            <p class="card-text text-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z" />
                                </svg>
                                <?= $con ?>
                            </p>
                        <?php endforeach ?>
                    <?php endif ?>
                    <hr>
                </div>
                <div class="col-md-6">
                    <h2 class="display-6">
                        <a href="<?= $link ?>" target="_blank">
                            <?= $title ?>
                        </a> <span class="badge bg-dark">
                            <?= $rating ?> / 10
                        </span>
                    </h2>
                    <h5 class="card-title">
                        <?= $subtitle ?>
                    </h5>
                    <p class="card-text">
                        <?= $description ?>
                    </p>
                    <p class="card-text">
                        Rs.<span class="fs-3 text-success fw-bolder">
                            <?= $price ?>
                        </span><strike>
                            <?= $oldPrice ?>
                        </strike>
                    </p>
                    <p class="card-text">
                        <a href="<?= $link ?>" target="_blank" class="btn btn-success btn-lg">JOIN NOW BEFORE OFFER EXPIRES
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                                <path
                                    d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                            </svg></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
<?php elseif ($type === 'notrecommended_product'): ?>
    <div class="card border-2 border-danger my-5">
        <div class="card-header bg-danger text-white fw-bolder border-bottom border-danger border-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-hand-thumbs-down-fill" viewBox="0 0 16 16">
                <path
                    d="M6.956 14.534c.065.936.952 1.659 1.908 1.42l.261-.065a1.38 1.38 0 0 0 1.012-.965c.22-.816.533-2.512.062-4.51q.205.03.443.051c.713.065 1.669.071 2.516-.211.518-.173.994-.68 1.2-1.272a1.9 1.9 0 0 0-.234-1.734c.058-.118.103-.242.138-.362.077-.27.113-.568.113-.856 0-.29-.036-.586-.113-.857a2 2 0 0 0-.16-.403c.169-.387.107-.82-.003-1.149a3.2 3.2 0 0 0-.488-.9c.054-.153.076-.313.076-.465a1.86 1.86 0 0 0-.253-.912C13.1.757 12.437.28 11.5.28H8c-.605 0-1.07.08-1.466.217a4.8 4.8 0 0 0-.97.485l-.048.029c-.504.308-.999.61-2.068.723C2.682 1.815 2 2.434 2 3.279v4c0 .851.685 1.433 1.357 1.616.849.232 1.574.787 2.132 1.41.56.626.914 1.28 1.039 1.638.199.575.356 1.54.428 2.591" />
            </svg> NOT RECOMMENDED
        </div>
        <div class="card-body">
            <div class="row g-4">
                <div class="col-md-6">
                    <a href="<?= $link ?>" target="_blank"><img src="<?= $image ?>" alt="" width="100%" class="rounded"></a>
                    <hr>
                    <?php if (isset ($pros)): ?>
                        <?php foreach ($pros as $pro): ?>
                            <p class="card-text text-success">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                </svg>
                                <?= $pro ?>
                            </p>
                        <?php endforeach ?>
                    <?php endif ?>
                    <?php if (isset ($cons)): ?>
                        <?php foreach ($cons as $con): ?>
                            <p class="card-text text-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z" />
                                </svg>
                                <?= $con ?>
                            </p>
                        <?php endforeach ?>
                    <?php endif ?>
                    <hr>
                </div>
                <div class="col-md-6">
                    <h2 class="display-6">
                        <a href="<?= $link ?>" target="_blank">
                            <?= $title ?>
                        </a> <span class="badge bg-dark">
                            <?= $rating ?> / 10
                        </span>
                    </h2>
                    <h5 class="card-title">
                        <?= $subtitle ?>
                    </h5>
                    <p class="card-text">
                        <?= $description ?>
                    </p>
                    <p class="card-text">
                        Rs.<span class="fs-3 text-danger fw-bolder">
                            <?= $price ?>
                        </span><strike>
                            <?= $oldPrice ?>
                        </strike>
                    </p>
                    <p class="card-text">
                        <a href="<?= $link ?>" target="_blank" class="btn btn-danger btn-lg">JOIN THIS COURSE
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                                <path
                                    d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                            </svg></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
<?php elseif ($type === 'data'): ?>
    <div class="card border-2 border-dark my-5">
        <div class="card-body">
            <h2 class="card-title">Pros and Cons</h2>
            <div class="row g-4">
                <div class="col-md-6">
                    <?php foreach ($pros as $pro): ?>
                        <p class="card-text text-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                <path
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                            </svg>
                            <?= $pro ?>
                        </p>
                    <?php endforeach ?>
                </div>
                <div class="col-md-6">
                    <?php foreach ($cons as $con): ?>
                        <p class="card-text text-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                <path
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z" />
                            </svg>
                            <?= $con ?>
                        </p>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
<?php endif ?>