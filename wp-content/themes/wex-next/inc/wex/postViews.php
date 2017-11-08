<?php

/**
 * getPostViews()函数
 * 功能：获取阅读数量
 * 在需要显示浏览次数的位置，调用此函数
 * @Param object|int $postID   文章的id
 * @Return string $count		  文章阅读数量
 */
function getPostViews( $postID ) {
    $count_key = 'post_views_count';
    $count = get_post_meta( $postID, $count_key, true );
    if( $count=='' ) {
        delete_post_meta( $postID, $count_key );
        add_post_meta( $postID, $count_key, '0' );
        return "0";
    }
    return $count;
}


/**
 * setPostViews()函数
 * 功能：设置或更新阅读数量
 * 在内容页(single.php，或page.php )调用此函数
 * @Param object|int $postID   文章的id
 * @Return string $count		  文章阅读数量
 */
function setPostViews( $postID ) {
    $count_key = 'post_views_count';
    $count = get_post_meta( $postID, $count_key, true );
    if( $count=='' ) {
        $count = 0;
        delete_post_meta( $postID, $count_key );
        add_post_meta( $postID, $count_key, '0' );
    } else {
        $count++;
        update_post_meta( $postID, $count_key, $count );
    }
}




?>