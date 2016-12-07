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
        $project_data = get_post_meta($post->ID, 'project_data', true);

        if ($project_data['nir_color'] == ''){
            $nir_color = '#35ba7c';
        }else{
            $nir_color = $project_data['nir_color'];
        }
        if ($project_data['nir_logo_color'] == ''){
            $nir_logo_color = '#ffffff';
        }else{
            $nir_logo_color = $project_data['nir_logo_color'];
        }

//        var_dump($post);

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

        </style>

        <div class="dagroup">
            <label class="dalabel">
                Link color:
            </label>
            <input type="color" class="dafield"  name="nir_color" value="<?php echo $nir_color; ?>" />
            <input type="hidden"  name="nir_secret" value="segredo" />
        </div>

        <div class="dagroup">
            <label class="dalabel">
                Logo color:
            </label>
            <input type="color" class="dafield"  name="nir_logo_color" value="<?php echo $nir_logo_color; ?>" />
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

        update_post_meta( $post_id, 'project_data', $project_data );

    }

}

