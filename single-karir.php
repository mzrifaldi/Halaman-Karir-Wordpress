<?php
/**
 * Template Name: Single Karir (Layout Sidebar v4 - Mobile Summary Tweak)
 * Template Post Type: karir
 *
 * Ini adalah template untuk menampilkan satu 'karir' custom post type.
 * Versi 4:
 * - Memperbaiki masalah sticky sidebar pada desktop.
 * - REVISI: Ringkasan Pekerjaan pindah ke bawah Thumbnail pada tampilan mobile.
 *
 * @package    WordPress
 * @subpackage PutraFarmaYogya
 * @since      1.3.0
 */

get_header();

// Enqueue Owl Carousel assets
wp_enqueue_style('owl-carousel-css', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css');
wp_enqueue_style('owl-theme-css', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css');
wp_enqueue_script('jquery');
wp_enqueue_script('owl-carousel-js', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', array('jquery'), null, true);

?>

<style>
/* Import Montserrat Font */
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap');

:root {
    /* CSS Variables for Putra Farma Yogyakarta */
    --pfy-primary: #2d7b4d;
    --pfy-dark: #1a4a2e;
    --pfy-accent: #40b06e;
    --pfy-bg-light: #f8f9fa;     /* putih lembut */
    --pfy-text-dark: #212529;    /* hitam pudar */
    --pfy-highlight-bg: #d4edda; /* hijau terang */
    --pfy-highlight-text: #155724;/* teks hijau tua */
    --pfy-border-light: #e9ecef; /* abu muda */
    --pfy-white: #FFFFFF;
    --pfy-font-family: 'Montserrat', sans-serif;
}

/* * STRUKTUR LAYOUT BARU
 * Menggunakan CSS Grid untuk layout utama (konten + sidebar)
 */
.pfy-karir-page-wrapper {
    max-width: 1140px;
    margin: 3rem auto;
    display: grid;
    grid-template-columns: 1fr 340px; /* Konten fleksibel, sidebar 340px */
    gap: 2.5rem;
    /* Baris 'align-items: flex-start;' dihapus agar sticky berfungsi */
}

.pfy-karir-main-content {
    /* Kolom ini berisi artikel dan tombol kembali */
}

/* Main container untuk artikel lowongan */
.pfy-karir-single-container {
    font-family: var(--pfy-font-family);
    color: var(--pfy-text-dark);
    background-color: var(--pfy-white);
    border: 1px solid var(--pfy-border-light);
    border-radius: 12px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.06);
    overflow: hidden; 
}

/* Featured image (landscape di atas konten) */
.pfy-karir-featured-image {
    width: 100%;
    height: 350px; 
    overflow: hidden;
    background-color: var(--pfy-bg-light);
}

.pfy-karir-featured-image img {
    width: 100%;
    height: 100%;
    display: block;
    object-fit: contain; 
}

/* Header section (hanya judul) */
.pfy-karir-header {
    padding: 2rem 2.5rem 2rem;
    border-bottom: 1px solid var(--pfy-border-light);
}

.pfy-karir-header .job-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--pfy-primary);
    margin: 0;
    line-height: 1.2;
}

/* Blok Ringkasan Mobile (di bawah H1) */
.pfy-summary-widget-mobile {
    display: none; /* Sembunyikan di desktop */
    padding: 1.5rem 2.5rem;
    /* REVISI: Border-top ditambahkan agar terpisah dari gambar */
    border-top: 1px solid var(--pfy-border-light);
    /* REVISI: Border-bottom untuk memisahkan dari konten */
    border-bottom: 1px solid var(--pfy-border-light);
}

.pfy-summary-widget-mobile .pfy-sidebar-widget {
    background: none;
    border: none;
    padding: 0;
    margin: 0;
}

/* Main content area */
.pfy-karir-content-wrapper {
    padding: 1.5rem 2.5rem 2.5rem;
}

/* Content styling dari editor */
.pfy-karir-content .section-title {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--pfy-dark);
    margin-top: 2.5rem;
    margin-bottom: 1.5rem;
    padding-bottom: 0.5rem;
    border-bottom: 2px solid var(--pfy-border-light);
}

/* ... (Sisa styling konten sama) ... */
.pfy-karir-content .section-title .fa,
.pfy-karir-content .section-title .fas {
    color: var(--pfy-primary);
}
.pfy-karir-content .job-description {
    line-height: 1.7;
}
.pfy-karir-content .details-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 2rem;
    margin-top: 2.5rem;
}
.pfy-karir-content .details-list {
    list-style: none;
    padding: 0;
    margin: 0;
}
.pfy-karir-content .details-list li {
    display: flex;
    align-items: flex-start;
    gap: 0.75rem;
    margin-bottom: 1rem;
    line-height: 1.6;
}
.pfy-karir-content .details-list .fa-check-circle,
.pfy-karir-content .details-list .fas.fa-check-circle {
    color: var(--pfy-accent);
    margin-top: 0.25em;
}


/* Back Button (di bawah artikel) */
.pfy-back-button-section {
    text-align: left;
    margin-top: 1.5rem;
}
.pfy-back-button {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background-color: var(--pfy-bg-light);
    color: var(--pfy-text-dark);
    padding: 0.6rem 1.5rem;
    border-radius: 50px;
    text-decoration: none;
    font-weight: 500;
    transition: background-color 0.3s ease, color 0.3s ease;
    border: 1px solid var(--pfy-border-light);
}
.pfy-back-button:hover {
    background-color: var(--pfy-dark);
    color: var(--pfy-white);
    border-color: var(--pfy-dark);
}

/* * STYLING SIDEBAR
 */
.pfy-karir-sidebar {
    /* Container ini sekarang akan merentang (stretch) */
}

/* Wrapper ini yang akan sticky */
.pfy-sidebar-sticky-content {
    position: sticky;
    top: 8rem; /* Menempel 8rem dari atas viewport */
}

.pfy-sidebar-widget {
    background: var(--pfy-bg-light);
    border: 1px solid var(--pfy-border-light);
    border-radius: 8px;
    padding: 1.5rem;
    margin-bottom: 1.5rem;
}

.pfy-sidebar-widget .widget-title {
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--pfy-dark);
    margin-top: 0;
    margin-bottom: 1.5rem;
    padding-bottom: 0.75rem;
    border-bottom: 1px solid var(--pfy-border-light);
}

/* Tombol Lamar */
.pfy-apply-button {
    display: block; 
    width: 100%;
    background-color: var(--pfy-accent); 
    color: var(--pfy-white);
    padding: 0.9rem 1.5rem;
    border-radius: 10px;
    text-decoration: none;
    font-weight: 700;
    font-size: 1.1rem;
    transition: background-color 0.3s ease, transform 0.3s ease;
    border: none;
    cursor: pointer;
    text-align: center;
    box-sizing: border-box; 
}
.pfy-apply-button .fas {
    margin-right: 0.5rem;
    color: var(--pfy-white);
}
.pfy-apply-button:hover {
    background-color: var(--pfy-primary);
    color: var(--pfy-white);
    transform: translateY(-2px);
}

/* Info Meta di Sidebar */
.pfy-job-meta-list {
    list-style: none;
    padding: 0;
    margin: 0;
    color: var(--pfy-text-dark);
    font-size: 0.95rem;
}
.pfy-job-meta-list li {
    display: flex;
    align-items: flex-start; 
    gap: 0.75rem;
    margin-bottom: 1rem;
}
.pfy-job-meta-list li .fas {
    color: var(--pfy-primary);
    width: 20px; 
    text-align: center;
    margin-top: 0.15em;
}
.pfy-job-meta-list li div {
    flex: 1;
}
.pfy-job-meta-list li strong {
    display: block;
    color: var(--pfy-dark);
    font-weight: 700;
    margin-bottom: 0.15rem;
}

/* Widget Info Perusahaan */
.pfy-company-widget p {
    font-size: 0.9rem;
    line-height: 1.6;
    margin: 0;
}


/* * STYLING LOWONGAN LAINNYA (OWL CAROUSEL)
 */
.pfy-related-karir {
    max-width: 1140px; 
    margin: 4rem auto;
    padding: 2.5rem;
    background-color: var(--pfy-bg-light);
    border-radius: 12px;
}
.pfy-related-karir h2 {
    text-align: center;
    font-size: 2rem;
    font-weight: 700;
    color: var(--pfy-dark);
    margin: 0 0 2.5rem 0;
}
/* ... (Sisa styling Owl Carousel sama) ... */
.pfy-related-karir-card {
    background: var(--pfy-white);
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0,0,0,0.04);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border: 1px solid var(--pfy-border-light);
}
.pfy-related-karir-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.08);
}
.pfy-related-karir-card .card-img {
    height: 180px;
    background-size: contain;
    background-position: center;
    border-bottom: 1px solid var(--pfy-border-light);
}
.pfy-related-karir-card .card-content {
    padding: 1.5rem;
}
.pfy-related-karir-card .card-title {
    font-size: 1.1rem;
    font-weight: 700;
    margin: 0 0 1rem 0;
    color: var(--pfy-dark);
    line-height: 1.4;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;  
    overflow: hidden;
    height: 3.08em; 
}
.pfy-related-karir-card .card-link {
    color: var(--pfy-primary);
    text-decoration: none;
    font-weight: 700;
    font-size: 0.9rem;
}
.pfy-related-karir-card .card-link:hover {
    text-decoration: underline;
    color: var(--pfy-dark);
}
.pfy-related-karir .owl-dots {
    margin-top: 1.5rem;
}
.pfy-related-karir .owl-dot span {
    background: var(--pfy-border-light) !important;
}
.pfy-related-karir .owl-dot.active span {
    background: var(--pfy-primary) !important;
}
.pfy-related-karir .owl-nav button.owl-prev,
.pfy-related-karir .owl-nav button.owl-next {
    background: var(--pfy-white) !important;
    color: var(--pfy-primary) !important;
    border-radius: 50% !important;
    width: 40px;
    height: 40px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    font-size: 1.5rem !important;
    line-height: 1 !important;
}
.pfy-related-karir .owl-nav {
    position: absolute;
    top: 40%;
    width: 100%;
    transform: translateY(-50%);
    display: flex;
    justify-content: space-between;
}
.pfy-related-karir .owl-nav button.owl-prev {
    margin-left: -20px;
}
.pfy-related-karir .owl-nav button.owl-next {
    margin-right: -20px;
}


/* Responsive adjustments */
@media (max-width: 991px) {
    /* Stack layout on tablet/mobile */
    .pfy-karir-page-wrapper {
        grid-template-columns: 1fr; /* 1 kolom */
        gap: 2rem;
    }
    .pfy-karir-sidebar {
        position: static; 
        top: auto;
        order: 1; /* Pindahkan sidebar ke bawah konten */
    }
    .pfy-karir-main-content {
        order: 0;
    }

    /* Matikan sticky di mobile */
    .pfy-sidebar-sticky-content {
        position: static;
    }

    /* Tampilkan blok ringkasan mobile */
    .pfy-summary-widget-mobile {
        display: block;
    }

    /* Sembunyikan blok ringkasan desktop */
    .pfy-summary-widget-desktop {
        display: none;
    }

    /*
     * !! REVISI CSS !!
     * Aturan .pfy-karir-header yang menghapus border-bottom
     * telah DIHAPUS dari sini, karena kita ingin border itu kembali.
     */
}

/* Tombol Lamar & Info Perusahaan di Mobile */
.pfy-mobile-action-section {
    display: none; /* sembunyikan default */
    padding: 1.5rem;
    border-top: 1px solid var(--pfy-border-light);
    border-bottom: 1px solid var(--pfy-border-light);
    background-color: var(--pfy-bg-light);
    border-radius: 12px;
    margin: 1.5rem;
}

.pfy-company-widget-mobile {
    margin-top: 1rem;
    text-align: center;
}

    .pfy-company-widget-mobile .widget-title {
        text-align: center;
        margin-bottom: 0.75rem;
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--pfy-dark);
        border-bottom: none; /* opsional: hilangkan garis bawah */
    }
    .pfy-company-widget-mobile p {
        text-align: center;
        font-size: 0.95rem;
        line-height: 1.6;
        margin: 0 auto;
        max-width: 90%; /* agar tidak terlalu melebar */
    }

@media (max-width: 991px) {
    .pfy-mobile-action-section {
        display: block; /* tampilkan di mobile */
    }

    /* Sembunyikan versi sidebar di mobile */
    .pfy-karir-sidebar {
        display: none;
    }
}


@media (min-width: 768px) {
    .pfy-karir-header .job-title {
        font-size: 3rem;
    }
    .pfy-karir-content .details-grid {
        grid-template-columns: 1fr 1fr;
        gap: 3rem;
    }
}

@media (max-width: 767px) {
    .pfy-karir-header {
        /* Padding dikembalikan seperti semula (atau disesuaikan) */
        padding: 1.5rem;
    }
    .pfy-summary-widget-mobile {
        padding: 1.5rem;
        /* REVISI: Pastikan border-top ada di mobile */
        border-top: 1px solid var(--pfy-border-light);
    }
    .pfy-karir-content-wrapper {
        padding: 1.5rem 1.5rem 2rem;
    }
    .pfy-karir-featured-image {
        height: 250px;
    }
    .pfy-related-karir {
        padding: 1.5rem;
    }
    .pfy-related-karir .owl-nav {
        display: none; /* Sembunyikan nav di mobile, dots sudah cukup */
    }
}
</style>

<main id="main" class="site-main" role="main">
    <?php
    if ( have_posts() ) :
        while ( have_posts() ) : the_post();

            // --- Ambil SEMUA meta data sekali di sini ---
            $lokasi = get_post_meta( get_the_ID(), 'lokasi_pekerjaan', true );
            $tipe   = get_post_meta( get_the_ID(), 'tipe_pekerjaan', true );
            $gaji   = get_post_meta( get_the_ID(), 'gaji', true );
            $link_lamaran = get_post_meta( get_the_ID(), 'link_lamaran', true ); 

            /**
             * Fungsi Bantuan untuk me-render blok Ringkasan Pekerjaan
             * (Tidak ada perubahan pada fungsi ini)
             */
            function pfy_render_job_summary_widget($lokasi, $tipe, $gaji) {
                ?>
                <div class="pfy-sidebar-widget pfy-summary-widget">
                    <h3 class="widget-title">Ringkasan Pekerjaan</h3>
                    <ul class="pfy-job-meta-list">
                        <?php if ( ! empty( $lokasi ) ) : ?>
                            <li>
                                <i class="fas fa-map-marker-alt"></i>
                                <div>
                                    <strong>Lokasi</strong>
                                    <?php echo esc_html( $lokasi ); ?>
                                </div>
                            </li>
                        <?php endif; ?>
                        <?php if ( ! empty( $tipe ) ) : ?>
                            <li>
                                <i class="fas fa-briefcase"></i>
                                <div>
                                    <strong>Tipe Pekerjaan</strong>
                                    <?php echo esc_html( $tipe ); ?>
                                </div>
                            </li>
                        <?php endif; ?>
                        <?php if ( ! empty( $gaji ) ) : ?>
                            <li>
                                <i class="fas fa-money-bill-wave"></i>
                                <div>
                                    <strong>Gaji</strong>
                                    <?php echo esc_html( $gaji ); ?>
                                </div>
                            </li>
                        <?php endif; ?>
                        <li>
                            <i class="fas fa-calendar-alt"></i>
                            <div>
                                <strong>Diposting</strong>
                                <?php echo get_the_date(); // Tanggal posting standar WordPress ?>
                            </div>
                        </li>
                    </ul>
                </div>
                <?php
            }
            // --- Akhir dari pengambilan data ---
    ?>
        <div class="pfy-karir-page-wrapper">
            
            <div class="pfy-karir-main-content">
                <article id="post-<?php the_ID(); ?>" <?php post_class('pfy-karir-single-container'); ?>>

                    <header class="pfy-karir-header">
                        <?php the_title( '<h1 class="job-title">', '</h1>' ); ?>
                    </header>


                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="pfy-karir-featured-image">
                            <?php the_post_thumbnail('full'); // Gunakan 'large' atau 'full' ?>
                        </div>
                    <?php endif; ?>

                    <div class="pfy-summary-widget-mobile">
                        <?php pfy_render_job_summary_widget($lokasi, $tipe, $gaji); ?>
                    </div>

                    <div class="pfy-karir-content-wrapper">
                        <div class="pfy-karir-content">
                            <?php the_content(); ?>
                        </div>
                    </div>
                    <!-- Tambahan untuk tombol dan info perusahaan di mobile -->
<div class="pfy-mobile-action-section">
    <?php if ( ! empty( $link_lamaran ) ) : ?>
        <a href="<?php echo esc_url( $link_lamaran ); ?>" class="pfy-apply-button" target="_blank" rel="noopener noreferrer">
            <i class="fas fa-paper-plane"></i> Lamar Sekarang
        </a>
    <?php endif; ?>

    <div class="pfy-company-widget-mobile">
        <h3 class="widget-title">Tentang Kami</h3>
        <p>Putra Farma Yogyakarta berkomitmen untuk menyediakan layanan maklon minuman serbuk dan produk minuman serbuk terbaik bagi masyarakat. Bergabunglah dengan tim kami yang profesional dan berdedikasi.</p>
    </div>
</div>


                </article><section class="pfy-back-button-section">
                    <a href="<?php echo esc_url( home_url('/karir/') ); // Pastikan URL ini benar ?>" class="pfy-back-button">
                        <i class="fas fa-arrow-left"></i> Kembali ke Semua Lowongan
                    </a>
                </section>
            </div><aside class="pfy-karir-sidebar">
                
                <div class="pfy-sidebar-sticky-content">

                    <?php if ( ! empty( $link_lamaran ) ) : ?>
                    <div class="pfy-sidebar-widget pfy-apply-widget">
                        <a href="<?php echo esc_url( $link_lamaran ); ?>" class="pfy-apply-button" target="_blank" rel="noopener noreferrer">
                            <i class="fas fa-paper-plane"></i> Lamar Sekarang
                        </a>
                    </div>
                    <?php else : ?>
                    <div class="pfy-sidebar-widget pfy-apply-widget">
                        <p style="text-align: center; margin: 0; font-size: 0.9rem; color: var(--pfy-text-dark);">Link lamaran belum tersedia.</p>
                    </div>
                    <?php endif; ?>

                    <div class="pfy-summary-widget-desktop">
                        <?php pfy_render_job_summary_widget($lokasi, $tipe, $gaji); ?>
                    </div>
                    
                    <div class="pfy-sidebar-widget pfy-company-widget">
                        <h3 class="widget-title">Tentang Putra Farma</h3>
                        <p>Putra Farma Yogyakarta berkomitmen untuk menyediakan layanan dan produk kesehatan terbaik bagi masyarakat. Bergabunglah dengan tim kami yang profesional dan berdedikasi.</p>
                    </div>

                </div></aside></div><?php
        endwhile;
    else :
        echo '<p style="text-align: center; padding: 3rem;">Maaf, lowongan pekerjaan tidak ditemukan.</p>';
    endif;
    ?>

    <?php
    // Query untuk lowongan lainnya (Tidak ada perubahan)
    $related_args = array(
        'post_type'      => 'karir',
        'posts_per_page' => 6,
        'post__not_in'   => array( get_the_ID() ), // Kecualikan post saat ini
        'orderby'        => 'rand', // Tampilkan secara acak
    );
    $related_query = new WP_Query( $related_args );

    if ( $related_query->have_posts() ) :
    ?>
    <section class="pfy-related-karir">
        <h2>Lowongan Lainnya</h2>
        <div class="owl-carousel owl-theme">
            <?php while ( $related_query->have_posts() ) : $related_query->the_post(); ?>
                <div class="item">
                    <article class="pfy-related-karir-card">
                        <?php
                        $bg_image = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'medium_large') : 'https://via.placeholder.com/400x250.png?text=Putra+Farma';
                        ?>
                        <div class="card-img" style="background-image: url('<?php echo esc_url($bg_image); ?>');"></div>
                        <div class="card-content">
                            <h3 class="card-title"><?php the_title(); ?></h3>
                            <a href="<?php the_permalink(); ?>" class="card-link">Lihat Detail →</a>
                        </div>
                    </article>
                </div>
            <?php endwhile; ?>
        </div>
    </section>
    <?php
    endif;
    wp_reset_postdata(); // Reset query
    ?>

</main><script>
// Inisialisasi Owl Carousel (Tidak ada perubahan)
jQuery(document).ready(function($){
    if (typeof $.fn.owlCarousel === 'function') {
        $('.owl-carousel').owlCarousel({
            loop: false,
            margin: 20,
            nav: true,
            dots: true,
            navText: ['<i class="fas fa-chevron-left"></i>', '<i class="fas fa-chevron-right"></i>'],
            responsive:{
                0:{
                    items:1,
                    nav: false // Sembunyikan nav di mobile
                },
                600:{
                    items:2
                },
                960:{
                    items:3
                }
            }
        });
    } else {
        console.warn('Owl Carousel JS not loaded.');
    }
});
</script>

<?php
get_footer();
?>