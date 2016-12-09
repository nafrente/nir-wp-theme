<?php

function project_admin_init(){
    //Creating the metabox
    add_action('add_meta_boxes_project', 'nir_create_metaboxes');
    add_action('save_post_project', 'nir_saving_metaboxes', 10, 3);

    function nir_create_metaboxes(){
    add_meta_box(
      'nir_project_options',
        __('Project Options', 'nir-plugin' ),
        'nir_project_options',
        'project',
        'side',
        'high'
    );
    }
    //Function to display the metabox
    function nir_project_options($post){
        //Getting the updated meta data
        $project_data = get_post_meta($post->ID, 'project_data', true);

        //Setting the default values on the meta data
        if(!isset($project_data['nir_color']) && !isset($project_data['nir_color']) ){
            $project_data = array();
            $nir_color = $project_data['nir_color'] = '#35ba7c';
            $nir_logo_color = $project_data['nir_logo_color'] = '#ffffff';
            update_post_meta( $post->ID, 'project_data', $project_data );
        }

        if ( !isset($project_data['nir_color']) ){
            $nir_color = '#35ba7c';
        }else{
            $nir_color = $project_data['nir_color'];
        }
        if ( !isset($project_data['nir_logo_color']) ){
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
        ?>
    <!-- Styles of the metabox -->
        <style>
            .dagroup{
                display: block;
                padding: 15px;
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
            .dafield.check input{margin-right: 0;}
            .dalabel.check{
                display: inline-block;
                width: 85%;
            }
            #nir_reset{
                color: darkred;
                cursor: pointer;
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
                Link color:
            </label>
            <input type="color" class="dafield"  name="nir_color" id="nir_color" value="<?php echo $nir_color; ?>" />
        </div>

        <div class="dagroup">
            <label class="dalabel" for="nir_logo_color">
                Logo color:
            </label>
            <input type="color" class="dafield" id="nir_logo_color"  name="nir_logo_color" value="<?php echo $nir_logo_color; ?>" />
        </div>
        <div class="dagroup">
            <label class="dalabel check" for="nir_logo_color">
                Check if featured project:
            </label>
            <span class="dafield check">
                <input type="checkbox" id="nir_featured"  value="featured" name="nir_featured" <?php echo $nir_featured; ?> />
            </span>

        </div>

        <div class="dagroup">
            <a id="nir_reset">
                Use default colors
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

        update_post_meta( $post_id, 'project_data', $project_data );

    }

}

