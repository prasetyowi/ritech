<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Informasi</h2>
                <ol>
                    <li><a href="<?= base_url(); ?>">Home</a></li>
                    <li>Informasi</li>
                </ol>
            </div>

        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row g-5">

                <div class="col-lg-8">

                    <div class="row gy-4 posts-list">

                        <?php foreach ($Article as $article) : ?>

                            <div class="col-lg-6">
                                <article class="d-flex flex-column">

                                    <div class="post-img">
                                        <img src="<?= base_url() ?>assets/upload/article/<?= $article['article_sampul'] ?>" alt="" class="img-fluid">
                                    </div>

                                    <h2 class="title">
                                        <a href="<?= base_url('MainApp/Informasi/detail/' . $article['article_id']) ?>"><?= $article['article_judul'] ?></a>
                                    </h2>

                                    <div class="meta-top">
                                        <ul>
                                            <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="<?= base_url('MainApp/Informasi/detail/' . $article['article_id']) ?>"><?= $article['updwho'] ?></a></li>
                                            <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="<?= base_url('MainApp/Informasi/detail/' . $article['article_id']) ?>"><time datetime="2022-01-01"><?= $article['tgl_post'] ?></time></a></li>
                                        </ul>
                                    </div>

                                    <div class="content">
                                        <p><?= $article['article_short_desc'] ?></p>
                                    </div>

                                    <div class="read-more mt-auto align-self-end">
                                        <a href="<?= base_url('MainApp/Informasi/detail/' . $article['article_id']) ?>">Read More</a>
                                    </div>

                                </article>
                            </div><!-- End post list item -->
                        <?php endforeach; ?>

                    </div><!-- End blog posts list -->
                    <br><br>
                    <?= $pagination; ?>

                </div>

                <div class="col-lg-4">

                    <div class="sidebar">

                        <div class="sidebar-item search-form">
                            <h3 class="sidebar-title">Search</h3>
                            <form action="<?= base_url() ?>MainApp/Informasi/search/" class="mt-3" method="GET">
                                <input type="text" id="filter_judul" name="filter_judul" placeholder="Cari Berdasarkan Judul">
                                <button type="submit"><i class="bi bi-search"></i></button>
                            </form>
                        </div><!-- End sidebar search formn-->

                    </div><!-- End Blog Sidebar -->

                </div>

            </div>

        </div>
    </section><!-- End Blog Section -->

</main><!-- End #main -->