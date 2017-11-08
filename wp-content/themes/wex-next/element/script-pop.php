
<script>

    $("html,body").click(function(e) {
        var gcd = new Array(<?php

            if(is_array(cs_get_option('pop_words') )):
                $i=0;
            foreach ( cs_get_option('pop_words') as $value ):
                $i++;
            if($i!=1){echo ',';}

             echo '"'.$value['word'].'"';

           endforeach;endif;?>);
        var n = Math.floor(Math.random() * gcd.length);
        var $i = $("<b/>").text(gcd[n]);
        var x = e.pageX,
            y = e.pageY;
        $i.css({
            "z-index": 9999999999999999,
            "top": y - 20,
            "left": x,
            "position": "absolute",
            "color": "<?php echo cs_get_option('pop_color');?>"
        });
        $("body").append($i);
        $i.animate({
                "top": y - 180,
                "opacity": 0
            },
            1500,
            function() {
                $i.remove()
            });
        e.stopPropagation()
    });
</script>

