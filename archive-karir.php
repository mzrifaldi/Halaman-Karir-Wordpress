<?php
/**
 * Template Name: Arsip Karir PFY
 * The template for displaying Karir archive pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package PutraFarmaTheme
 */

get_header(); // Memuat header tema Anda
?>

<section class="pfy-career-section">

    <div class="pfy-career-container">
        
        <header class="pfy-career-header">
            <h1>Bergabung dengan Tim Putra Farma Yogyakarta</h1>
            <p>Kami selalu mencari individu berbakat dan bersemangat untuk tumbuh bersama kami. Temukan posisi yang tepat untuk Anda di Putra Farma Yogyakarta.</p>
        </header>

        <div class="pfy-job-listings">
            <?php if ( have_posts() ) : ?>
                <?php
                while ( have_posts() ) :
                    the_post();
                    $lokasi = get_post_meta( get_the_ID(), 'lokasi_pekerjaan', true );
                    $tipe   = get_post_meta( get_the_ID(), 'tipe_pekerjaan', true );
                    $gaji   = get_post_meta( get_the_ID(), 'gaji', true ); 
                    $tanggal = get_the_date( 'j F Y' );
                    ?>
                    
                    <a href="<?php the_permalink(); ?>" class="pfy-job-card">
                        
                        <div class="pfy-job-details">
                            <h3><?php the_title(); ?></h3>
                            <div class="pfy-job-meta">
                                <?php if ( ! empty( $lokasi ) ) : ?>
                                    <span><i class="fas fa-map-marker-alt"></i> <?php echo esc_html( $lokasi ); ?></span>
                                <?php endif; ?>
                                <?php if ( ! empty( $tipe ) ) : ?>
                                    <span><i class="fas fa-briefcase"></i> <?php echo esc_html( $tipe ); ?></span>
                                <?php endif; ?>
                                <?php if ( ! empty( $gaji ) ) : ?>
                                    <span><i class="fas fa-money-bill-wave"></i> <?php echo esc_html( $gaji ); ?></span>
                                <?php endif; ?>
                                <span><i class="fas fa-calendar-alt"></i> <?php echo esc_html( $tanggal ); ?></span>
                            </div>
                        </div>

                        <div class="pfy-job-action">
                            Lihat Detail <i class="fas fa-arrow-right"></i>
                        </div>
                    </a>
                <?php endwhile; ?>
            <?php else : ?>
                <div class="pfy-no-jobs-message">
                    <p>Saat ini belum ada lowongan yang tersedia. Silakan periksa kembali nanti.</p>
                </div>
            <?php endif; ?>
        </div>

        <div class="pfy-pagination-wrapper">
            <?php
            the_posts_pagination( array(
                'mid_size'  => 2,
                'prev_text' => __( 'Sebelumnya', 'textdomain' ),
                'next_text' => __( 'Berikutnya', 'textdomain' ),
            ) );
            ?>
        </div>

    </div>
</section>

<style>
    /*
        Brand palette (Putra Farma Yogyakarta - PFY)
        - #2d7b4d (utama)
        - #1a4a2e (gelap)
        - #40b06e (aksen cerah)
        - #f8f9fa (putih lembut)
        - #212529 (hitam pudar)
        - #d4edda (hijau terang)
        - #155724 (teks hijau tua)
        - #e9ecef (abu muda)
        - #FFFFFF (putih standar)
        Font: Montserrat
    */

    /* --- Variabel CSS untuk kemudahan maintenance --- */
    :root {
        --pfy-primary: #2d7b4d;
        --pfy-dark: #1a4a2e;
        --pfy-accent: #40b06e;
        --pfy-soft-white: #f8f9fa;
        --pfy-faded-black: #212529;
        --pfy-light-green: #d4edda;
        --pfy-dark-green-text: #155724;
        --pfy-light-gray: #e9ecef;
        --pfy-white: #FFFFFF;
    }

    /* --- General Styling & Scoping --- */
    .pfy-career-section {
        font-family: 'Montserrat', sans-serif;
        background-color: var(--pfy-soft-white);
        padding: 80px 20px;
        position: relative;
        overflow: hidden;
        color: var(--pfy-faded-black);
    }

    /* --- Container & Header --- */
    .pfy-career-section .pfy-career-container {
        max-width: 960px; /* Lebar umum untuk list/konten */
        margin: 0 auto;
        position: relative;
        z-index: 1;
    }

    .pfy-career-section .pfy-career-header {
        text-align: center;
        margin-bottom: 60px;
    }

    .pfy-career-section .pfy-career-header h1 {
        font-size: 2.5rem;
        color: var(--pfy-primary);
        margin-bottom: 16px;
        font-weight: 700;
    }

    .pfy-career-section .pfy-career-header p {
        font-size: 1.1rem;
        max-width: 700px;
        margin: 0 auto;
        line-height: 1.6;
        color: var(--pfy-faded-black);
        opacity: 0.9;
    }

    /* --- Daftar Lowongan Kerja (List Layout) --- */
    .pfy-career-section .pfy-job-listings {
        display: flex;
        flex-direction: column;
        gap: 20px; /* Jarak antar item lowongan */
    }

    /* --- Kartu Lowongan (List Item) --- */
    .pfy-career-section .pfy-job-card {
        background-color: var(--pfy-white);
        border-radius: 8px;
        padding: 24px 30px;
        text-decoration: none;
        color: var(--pfy-faded-black);
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: 1px solid var(--pfy-light-gray);
    }

    .pfy-career-section .pfy-job-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(45, 123, 77, 0.1); /* Bayangan hijau lembut */
    }
    
    /* --- Konten Kartu (Kiri) --- */
    .pfy-career-section .pfy-job-details {
        flex-grow: 1; /* Ambil ruang sebanyak mungkin */
        margin-right: 20px; /* Jarak ke tombol aksi */
    }

    .pfy-career-section .pfy-job-card h3 {
        font-size: 1.25rem;
        font-weight: 600;
        color: var(--pfy-dark);
        margin: 0 0 8px 0;
    }

    .pfy-career-section .pfy-job-meta {
        display: flex;
        gap: 16px;
        font-size: 0.9rem;
        color: #555; /* Sedikit lebih terang dari hitam pudar */
        flex-wrap: wrap; /* Agar rapi di mobile */
    }
    
    .pfy-career-section .pfy-job-meta span {
        display: flex;
        align-items: center;
        gap: 6px;
    }
    
    .pfy-career-section .pfy-job-meta i.fas {
        color: var(--pfy-primary); /* Ikon warna utama */
    }

    /* --- Aksi Kartu (Kanan) --- */
    .pfy-career-section .pfy-job-action {
        font-weight: 700;
        color: var(--pfy-accent);
        display: flex;
        align-items: center;
        gap: 8px;
        transition: color 0.3s ease;
        flex-shrink: 0; /* Mencegah tombol mengecil */
    }

    .pfy-career-section .pfy-job-card:hover .pfy-job-action {
        color: var(--pfy-primary);
    }

    .pfy-career-section .pfy-job-action i {
        transition: transform 0.3s ease;
    }

    .pfy-career-section .pfy-job-card:hover .pfy-job-action i {
        transform: translateX(5px);
    }

    /* --- Pesan Jika Tidak Ada Lowongan --- */
    .pfy-career-section .pfy-no-jobs-message {
        text-align: center;
        padding: 40px 20px;
        background-color: var(--pfy-light-green);
        border: 1px solid var(--pfy-accent);
        border-radius: 8px;
        color: var(--pfy-dark-green-text);
    }

    /* --- Paginasi --- */
    .pfy-pagination-wrapper {
        margin-top: 60px;
        text-align: center;
    }
    .pfy-pagination-wrapper .nav-links {
        display: flex;
        justify-content: center;
        gap: 10px;
    }
    .pfy-pagination-wrapper .page-numbers {
        display: inline-block;
        padding: 10px 16px;
        border: 1px solid var(--pfy-light-gray);
        border-radius: 4px;
        text-decoration: none;
        color: var(--pfy-primary);
        background-color: var(--pfy-white);
        transition: background-color 0.3s, color 0.3s;
        font-weight: 600;
    }
    .pfy-pagination-wrapper .page-numbers:hover {
        background-color: var(--pfy-light-gray);
    }
    .pfy-pagination-wrapper .page-numbers.current {
        background-color: var(--pfy-primary);
        color: var(--pfy-white);
        border-color: var(--pfy-primary);
    }

    /* --- Media Queries --- */
    @media (max-width: 767px) {
        /* Buat kartu lowongan menumpuk di mobile */
        .pfy-career-section .pfy-job-card {
            flex-direction: column;
            align-items: flex-start;
            gap: 16px;
        }

        .pfy-career-section .pfy-job-action {
            margin-top: 10px;
        }

        .pfy-career-section .pfy-career-header h1 {
            font-size: 2rem;
        }
    }

    @media (min-width: 768px) {
        .pfy-career-section .pfy-career-header h1 {
            font-size: 3rem;
        }
    }
</style>

<?php
get_footer(); // Memuat footer tema Anda
?>