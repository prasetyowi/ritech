<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Informasi Details</h2>
                <ol>
                    <li><a href="<?= base_url() ?>">Home</a></li>
                    <li><a href="<?= base_url('MainApp/Informasi') ?>">Informasi</a></li>
                    <li>Informasi Details</li>
                </ol>
            </div>

        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Details Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row g-5">

                <div class="col-lg-12">

                    <?php foreach ($Article as $article) : ?>

                        <article class="blog-details">

                            <div class="post-img">
                                <img src="<?= base_url() ?>assets/upload/article/<?= $article['article_sampul'] ?>" alt="" class="img-fluid">
                            </div>

                            <h2 class="title"><?= $article['article_judul'] ?></h2>

                            <div class="meta-top">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-details.html"><?= $article['updwho'] ?></a></li>
                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-details.html"><time datetime="2020-01-01"><?= $article['tgl_post'] ?></time></a></li>
                                </ul>
                            </div><!-- End meta top -->

                            <div class="content">
                                <?= $article['article_desc'] ?>
                            </div><!-- End post content -->

                        </article><!-- End blog post -->

                        <div class="post-author d-flex align-items-center">
                            <img src="assets/img/blog/blog-author.jpg" class="rounded-circle flex-shrink-0" alt="">
                            <div>
                                <h4><?= $article['updwho'] ?></h4>
                                <p>
                                    <?= $article['article_short_desc'] ?>
                                </p>
                            </div>
                        </div><!-- End post author -->

                    <?php endforeach; ?>

                </div>
            </div>

        </div>
    </section><!-- End Blog Details Section -->

</main><!-- End #main -->