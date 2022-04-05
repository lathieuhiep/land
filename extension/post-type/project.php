<?php
/*
*---------------------------------------------------------------------
* This file create and contains the template post_type meta elements
*---------------------------------------------------------------------
*/

add_action('init', 'land_create_project', 10);

function land_create_project() {

    /* Start post type template */
    $labels = array(   
        'name'                  =>  _x( 'Dự án', 'post type general name', 'land' ),
        'singular_name'         =>  _x( 'Dự án', 'post type singular name', 'land' ),
        'menu_name'             =>  _x( 'Dự án', 'admin menu', 'land' ),
        'name_admin_bar'        =>  _x( 'Danh sách Dự án', 'add new on admin bar', 'land' ),
        'add_new'               =>  _x( 'Thêm mới', 'Dự án', 'land' ),
        'add_new_item'          =>  esc_html__( 'Thêm Dự án', 'land' ),
        'edit_item'             =>  esc_html__( 'Sửa Dự án', 'land' ),
        'new_item'              =>  esc_html__( 'Dự án mới', 'land' ),
        'view_item'             =>  esc_html__( 'Xem dự án', 'land' ),
        'all_items'             =>  esc_html__( 'Tất cả dự án', 'land' ),
        'search_items'          =>  esc_html__( 'Tìm kiếm dự án', 'land' ),
        'not_found'             =>  esc_html__( 'Không tìm thấy', 'land' ),
        'not_found_in_trash'    =>  esc_html__( 'Không tìm thấy trong thùng rác', 'land' ),
        'parent_item_colon'     =>  ''
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'menu_icon'          => 'dashicons-open-folder',
        'capability_type'    => 'post',
        'rewrite'            => array('slug' => 'du-an' ),
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => 5,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
    );

    register_post_type('land_project', $args );
    /* End post type template */

    /* Start taxonomy */
    $taxonomy_labels = array(
        'name'              => _x( 'Danh mục dự án', 'taxonomy general name', 'land' ),
        'singular_name'     => _x( 'Danh mục dự án', 'taxonomy singular name', 'land' ),
        'search_items'      => __( 'Tìm kiếm danh mục', 'land' ),
        'all_items'         => __( 'Tất cả danh mục', 'land' ),
        'parent_item'       => __( 'Danh mục cha', 'land' ),
        'parent_item_colon' => __( 'Danh mục cha:', 'land' ),
        'edit_item'         => __( 'Sửa', 'land' ),
        'update_item'       => __( 'Cập nhật', 'land' ),
        'add_new_item'      => __( 'Thêm mới', 'land' ),
        'new_item_name'     => __( 'Tên mới', 'land' ),
        'menu_name'         => __( 'Danh mục', 'land' ),
    );

    $taxonomy_args = array(

        'labels'            => $taxonomy_labels,
        'hierarchical'      => true,
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'danh-muc-du-an' ),
    );

    register_taxonomy( 'land_project_cat', array( 'land_project' ), $taxonomy_args );
    /* End taxonomy */

}