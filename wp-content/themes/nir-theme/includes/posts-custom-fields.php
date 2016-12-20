<?php
/**
 * Posts custon fields
 */

function nir_post_add_meta_box() {

    add_meta_box(
        'nir_post_style_box',
        __( 'Post Style Options', 'nir-theme' ),
        'nir_post_style_box',
        'post',
        'side',
        'high'
    );

}

function nir_post_style_box( $post ){
    $post_meta_dd = get_post_meta($post->ID, 'post_meta_dd', true);

if ( !isset($post_meta_dd['nir_color']) || $post_meta_dd['nir_color']== '' ){
    $nir_color = '#35ba7c';
}else{
    $nir_color = $post_meta_dd['nir_color'];
}
if ( !isset($post_meta_dd['nir_logo_color']) || $post_meta_dd['nir_logo_color'] == '' ){
    $nir_logo_color = '#ffffff';
}else{
    $nir_logo_color = $post_meta_dd['nir_logo_color'];
}
?>

    <!-- Styles of the metabox -->
    <style>
        .dagroup{
            display: block;
            padding: 15px;
        }
        .dagroup.txt{
            display: block;
            padding: 15px 20px 15px 15px;
        }
        .dafield{
            display: inline-block;
            width: 55%;
        }
        .dalabel{
            display: inline-block;
            width: 40%;
        }
        .dafield.check{
            display: inline-block;
            width: 10%;
            text-align: right;
        }
        .dafield.check input{margin-right: -2px;}
        .dalabel.check{
            display: inline-block;
            width: 85%;
        }
        .dalabel.txt, .dafield.txt{
            display: inline-block;
            width: 100%;
        }
        #nir_reset{
            cursor: pointer;
        }
        #nir_reset:hover{
            color: darkred;
        }

    </style>
    <script>
        // Function to reset colors
        jQuery( document ).ready(function() {
            jQuery('#nir_reset').on('click', function (event) {
                event.preventDefault();
                jQuery('#nir_color').val('#35ba7c');
                jQuery('#nir_logo_color').val('#ffffff');
            });
        });
    </script>
    <div class="dagroup">
        <label class="dalabel" for="nir_color">
            <?php _e('Link color:', 'nir-plugin' ); ?>
        </label>
        <input type="color" class="dafield"  name="nir_color" id="nir_color" value="<?php echo $nir_color; ?>" />
    </div>

    <div class="dagroup">
        <label class="dalabel" for="nir_logo_color">
            <?php _e('Logo color:', 'nir-plugin' ); ?>
        </label>
        <input type="color" class="dafield" id="nir_logo_color"  name="nir_logo_color" value="<?php echo $nir_logo_color; ?>" />
    </div>

    <div class="dagroup">
        <a id="nir_reset">
            <?php _e('Use default', 'nir-plugin' ); ?>
        </a>
    </div>

<?php
}

function nir_saving_post_meta_box($post_id, $post, $update){

    $post_type = get_post_type($post_id);
    if('post' != $post_type){
        return;
    }
    $post_meta_dd = array();
    $post_meta_dd['nir_color'] = sanitize_text_field($_POST['nir_color']);
    $post_meta_dd['nir_logo_color'] = sanitize_text_field($_POST['nir_logo_color']);

    update_post_meta( $post_id, 'post_meta_dd', $post_meta_dd );

}