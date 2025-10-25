// =============================
// Custom Post Type: Karir
// =============================
function vetencode_register_post_type_karir() {

    $labels = array(
        'name'                  => _x('Karir', 'Post Type General Name', 'vetencode'),
        'singular_name'         => _x('Karir', 'Post Type Singular Name', 'vetencode'),
        'menu_name'             => __('Karir', 'vetencode'),
        'name_admin_bar'        => __('Karir', 'vetencode'),
        'add_new'               => __('Tambah Karir', 'vetencode'),
        'add_new_item'          => __('Tambah Posisi Baru', 'vetencode'),
        'edit_item'             => __('Edit Karir', 'vetencode'),
        'new_item'              => __('Karir Baru', 'vetencode'),
        'view_item'             => __('Lihat Karir', 'vetencode'),
        'view_items'            => __('Lihat Semua Karir', 'vetencode'),
        'search_items'          => __('Cari Karir', 'vetencode'),
        'not_found'             => __('Tidak ditemukan', 'vetencode'),
        'not_found_in_trash'    => __('Tidak ditemukan di tong sampah', 'vetencode'),
        'all_items'             => __('Semua Karir', 'vetencode'),
    );

    $args = array(
        'label'                 => __('Karir', 'vetencode'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'excerpt', 'thumbnail', 'custom-fields'),
        'taxonomies'            => array('category'),
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_icon'             => 'dashicons-businessman',
        'rewrite'               => array(
            'slug'       => 'karir',
            'with_front' => false
        ),
        'has_archive'           => true,
        'hierarchical'          => false,
        'publicly_queryable'    => true,
        'show_in_rest'          => true, // untuk Gutenberg & API
        'menu_position'         => 20,
    );

    register_post_type('karir', $args);
}
add_action('init', 'vetencode_register_post_type_karir');
