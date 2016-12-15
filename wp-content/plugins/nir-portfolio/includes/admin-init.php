<?php

function project_admin_init(){
    //Creating the metabox
    add_action('add_meta_boxes_project', 'nir_create_metaboxes');
    add_action('save_post_project', 'nir_saving_metaboxes', 10, 3);

    function nir_create_metaboxes(){
        //Metabox for style options
    add_meta_box(
      'nir_project_options',
        __('Project Options', 'nir-plugin' ),
        'nir_project_options',
        'project',
        'side',
        'high'
    );
        //Metabox for Project Representative
    add_meta_box(
        'nir_project_representative',
        __('Placeholder for Project Representative', 'nir-plugin' ),
        'nir_project_representative',
        'project',
        'normal',
        'low'
    );
        //Metabox for Additional Reading
        add_meta_box(
            'nir_project_additional_reading',
            __('Placeholder for Additional Reading', 'nir-plugin' ),
            'nir_project_additional_reading',
            'project',
            'normal',
            'low'
        );
    }
    //Function to display Project Representative metabox
    function nir_project_representative(){
        $value1=  get_post_meta($_GET['post'], 'project_representative' , true ) ;
        wp_editor(
            htmlspecialchars_decode($value1),
            'mettaabox_1',
            $settings = array('textarea_name'=>'project_representative_input')
        );

    }
    //Function to display Additional Reading metabox
    function nir_project_additional_reading($post){
        $value2=  get_post_meta($_GET['post'], 'additional_reading' , true ) ;
        wp_editor(
            htmlspecialchars_decode($value2),
            'mettaabox_2',
            $settings = array('textarea_name'=>'additional_reading_input')
        );
    }

    //Function to display the style metabox
    function nir_project_options($post){
        //Getting the updated meta data
        $project_data = get_post_meta($post->ID, 'project_data', true);

        if ( !isset($project_data['nir_color']) || $project_data['nir_color']== '' ){
            $nir_color = '#35ba7c';
        }else{
            $nir_color = $project_data['nir_color'];
        }
        if ( !isset($project_data['nir_logo_color']) || $project_data['nir_logo_color'] == '' ){
            $nir_logo_color = '#ffffff';
        }else{
            $nir_logo_color = $project_data['nir_logo_color'];
        }
        if ( $project_data['nir_featured'] == 'featured'){
            $nir_featured ='checked="checked"';
        }
        else{
            $nir_featured = '';
        }
        if ( !isset($project_data['nir_text']) || $project_data['nir_text'] == ''){
            $nir_text = __('Read More', 'nir-plugin' );
        }else{
            $nir_text = $project_data['nir_text'];
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
                    jQuery('#nir_text').val('<?php _e('Read More', 'nir-plugin' ) ?>');
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

        <div class="dagroup txt">
            <label class="dalabel txt" for="nir_text">
                <?php _e('Read more button text:', 'nir-plugin' ); ?>
            </label>
            <input type="text" class="dafield txt" id="nir_text"  name="nir_text" value="<?php echo $nir_text; ?>" />
        </div>

        <div class="dagroup">
            <label class="dalabel check" for="nir_logo_color">
                <?php _e('Check if featured project:', 'nir-plugin' ); ?>
            </label>
            <span class="dafield check">
                <input type="checkbox" id="nir_featured"  value="featured" name="nir_featured" <?php echo $nir_featured; ?> />
            </span>
        </div>

        <div class="dagroup">
            <a id="nir_reset">
                <?php _e('Use default', 'nir-plugin' ); ?>
            </a>
        </div>

    <?php
    }

    //Saving logic
    function nir_saving_metaboxes($post_id, $post, $update){
        $post_type = get_post_type($post_id);
        if('project' != $post_type){
            return;
        }
        $project_data = array();
        $project_data['nir_color'] = sanitize_text_field($_POST['nir_color']);
        $project_data['nir_logo_color'] = sanitize_text_field($_POST['nir_logo_color']);
        $project_data['nir_featured'] = isset($_POST['nir_featured']) ? 'featured': '';
        $project_data['nir_text'] = sanitize_text_field($_POST['nir_text']);

        update_post_meta( $post_id, 'project_data', $project_data );


        //project_representative html
        if (!empty($_POST['project_representative_input']))
        {
            $datta=htmlspecialchars($_POST['project_representative_input']);
            update_post_meta($post_id, 'project_representative', $datta );
        }

        //Additional Reading
        if (!empty($_POST['additional_reading_input']))
        {
            $datta=htmlspecialchars($_POST['additional_reading_input']);
            update_post_meta($post_id, 'additional_reading', $datta );
        }

    }

}

