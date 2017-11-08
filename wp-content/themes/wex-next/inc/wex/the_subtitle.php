<?php
function the_subtitle(){
    $meta_data = get_post_meta(get_the_ID(), 'post_info', true);
    $subtitle= $meta_data['subtitle'];
    if (!empty($subtitle)){
        echo $subtitle;
    }
}
?>