<?php

/**
 * Plugin Name: Datingprofielen
 * Plugin URI: https://www.sexdaten.nl/
 * Description: Save JSON data as a custom post type
 * Version: 1.0
 * Author: Dev Dose
 * Author URI: https://www.sexdaten.nl/
 **/

/*****************************************************************************************
                                ADD STYLING FILES
 ******************************************************************************************/

function styling_files()
{
  wp_register_style('styling_files', plugins_url('css/bootstrap.min.css', __FILE__));
  wp_register_style('styling_files', plugins_url('css/style.css', __FILE__));
  wp_enqueue_style('styling_files');
  // wp_register_script( 'styling_files', plugins_url('your_script.js',__FILE__ ));
  // wp_enqueue_script('styling_files');
}
add_action('admin_init', 'styling_files');

/*****************************************************************************************
                                REGISTER POST TYPE
 ******************************************************************************************/

function dating_profiles_post_type()
{
  $labels = array(
    'name'               => _x('Datingprofielen', 'post type general name'),
    'singular_name'      => _x('Datingprofiel', 'post type singular name'),
    'add_new'            => _x('Add New', 'Datingprofiel'),
    'add_new_item'       => __('Add New Datingprofiel'),
    'edit_item'          => __('Edit Datingprofiel'),
    'new_item'           => __('New Datingprofiel'),
    'all_items'          => __('All Datingprofielen'),
    'view_item'          => __('View Datingprofiel'),
    'search_items'       => __('Search Datingprofielen'),
    'not_found'          => __('No Datingprofielen found'),
    'not_found_in_trash' => __('No Datingprofielen found in the Trash'),
    'menu_name'          => 'Datingprofielen'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our profiles and profile specific data',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array('title', 'editor', 'thumbnail'),
    'has_archive'   => true,
    'menu_icon'     => 'dashicons-money',
  );
  register_post_type('datingprofielen', $args);
}
add_action('init', 'dating_profiles_post_type');

/*****************************************************************************************
                                ADDING CUSTOM FIELDS TO POST TYPE
 ******************************************************************************************/
function profile_custom_fields()
{
  add_meta_box(
    'dating_fields',
    'Profile Details',
    'profile_custom_function',
    'datingprofielen',
    'normal',
    'high'
  );
}
add_action("admin_init", "profile_custom_fields");
function profile_custom_function()
{

  global $post;



  $custom = get_post_custom($post->ID);
  $name = $custom["name"][0];
  $length = $custom["length"][0];
  $physique = $custom["physique"][0];
  $eye_color = $custom["eye_color"][0];
  $hair_color = $custom["hair_color"][0];
  $education = $custom["education"][0];
  $piercing = $custom["piercing"][0];
  $tattoo = $custom["tattoo"][0];
  $smoking = $custom["smoking"][0];
  $gender = $custom["gender"][0];
  $cupsize = $custom["cupsize"][0];
  $ethnic = $custom["ethnic"][0];
  $relationship = $custom["relationship"][0];
  $pubic_hair = $custom["pubic_hair"][0];
  $profile_image = $custom["profile_image"][0];
  $age = $custom["age"][0];
  $province = $custom["province"][0];
  $country = $custom["country"][0];
  $url = $custom["url"][0];
?>
  <div class="dating_details mt-3">
    <div class="row mb-2">
      <div class="col-md-6">
        <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name ?>">
      </div>
      <div class="col-md-6">
        <input type="text" class="form-control" name="length" id="length" placeholder="Length" value="<?php echo $length ?>">
      </div>
    </div>
    <div class="row mb-2">
      <div class="col-md-6">
        <input type="text" class="form-control" name="eye_color" id="eye_color" placeholder="Eye color" value="<?php echo $eye_color ?>">
      </div>
      <div class="col-md-6">
        <input type="text" class="form-control" name="hair_color" id="hair_color" placeholder="Hair color" value="<?php echo $hair_color ?>">
      </div>
    </div>
    <div class="row mb-2">
      <div class="col-md-6">
        <input type="text" class="form-control" name="education" id="education" placeholder="Education" value="<?php echo $education ?>">
      </div>
      <div class="col-md-6">
        <input type="text" class="form-control" name="piercing" id="piercing" placeholder="Piercing" value="<?php echo $piercing ?>">
      </div>
    </div>
    <div class="row mb-2">
      <div class="col-md-6">
        <input type="text" class="form-control" name="tattoo" id="tattoo" placeholder="Tattoo" value="<?php echo $tattoo ?>">
      </div>
      <div class="col-md-6">
        <input type="text" class="form-control" name="smoking" id="smoking" placeholder="smoking" value="<?php echo $smoking ?>">
      </div>
    </div>
    <div class="row mb-2">
      <div class="col-md-6">
        <input type="text" class="form-control" name="physique" id="physique" placeholder="Physique" value="<?php echo $physique ?>">
      </div>
      <div class="col-md-6">
        <input type="text" class="form-control" name="cupsize" id="cupsize" placeholder="Cupsize" value="<?php echo $cupsize ?>">
      </div>
    </div>
    <div class="row mb-2">
      <div class="col-md-6">
        <input type="text" class="form-control" name="ethnic" id="ethnic" placeholder="Ethnic" value="<?php echo $ethnic ?>">
      </div>
      <div class="col-md-6">
        <input type="text" class="form-control" name="relationship" id="relationship" placeholder="Relationship" value="<?php echo $relationship ?>">
      </div>
    </div>
    <div class="row mb-2">
      <div class="col-md-6">
        <input type="text" class="form-control" name="pubic_hair" id="pubic_hair" placeholder="Pubic hair" value="<?php echo $pubic_hair ?>">
      </div>
      <div class="col-md-6">
        <input type="text" class="form-control" name="profile_image" id="profile_image" placeholder="Profile image" value="<?php echo $profile_image ?>">
      </div>
    </div>
    <div class="row mb-2">
      <div class="col-md-6">
        <input type="text" class="form-control" name="age" id="age" placeholder="Age" value="<?php echo $age ?>">
      </div>
      <div class="col-md-6">
        <input type="text" class="form-control" name="province" id="province" placeholder="Province" value="<?php echo $province ?>">
      </div>
    </div>
    <div class="row mb-2">
      <div class="col-md-6">
        <input type="text" class="form-control" name="country" id="country" placeholder="Country" value="<?php echo $country ?>">
      </div>
      <div class="col-md-6">
        <input type="text" class="form-control" name="url" id="url" placeholder="External Url" value="<?php echo $url ?>">
      </div>
    </div>
  </div>

<?php
}

/*****************************************************************************************
                                GET DATA FROM API
 ******************************************************************************************/
add_action('wp_ajax_nopriv_get_profiles_from_api', 'get_profiles_from_api');
add_action('wp_ajax_get_profiles_from_api', 'get_profiles_from_api');
function get_profiles_from_api()
{
  $url = 'https://www.affilaxy.com/promos/json/generators/sexklik/json/?affref=mt1Aj68637&pi=&site=sexklik.nl&nichesite=ongebondenseks.nl&nation=nl&id';
  $results = wp_remote_retrieve_body(wp_remote_get($url));
  $profiles = json_decode($results, true);
  foreach ($profiles as $profile) {
    $profile_title = sanitize_title($profile['name']);
    $inserted_profile =  array(
      'post_name' => $profile['name'],
      'post_title' => $profile_title,
      'post_type' => 'datingprofielen',
      'post_status' => 'publish',
      'post_content' => $profile['aboutme']

    );
    $postId = wp_insert_post($inserted_profile);
    if (is_wp_error($inserted_profile)) {
      continue;
    }


    $fillable = [
      'name',
      'gender',
      'length',
      'physique',
      'eye_color',
      'hair_color',
      'education',
      'piercing',
      'tattoo',
      'smoking',
      'aboutme',
      'cupsize',
      'ethnic',
      'relationship',
      'pubic_hair',
      'profile_image',
      'age',
      'province',
      'country',
      'url',
    ];
    foreach ($fillable as $name) {
      update_post_meta($postId, $name, $profile[$name]);
    }
  }

  wp_remote_post(admin_url('admin-ajax.php?action=get_profiles_from_api'), [
    'blocking' => true,
    'sslverify' => true,
    'body' => $results
  ]);
}

/*****************************************************************************************
                                DISPLAY POST USING SHORTCODE
 ******************************************************************************************/
function shortcode_for_profiles_post_type()
{

  $args = array(
    'post_type'      => 'datingprofielen',
    'posts_per_page' => '10',
    'publish_status' => 'published',
    'posts_per_page' => 30
  );

  $query = new WP_Query($args);

  if ($query->have_posts()) :

    while ($query->have_posts()) :

      $query->the_post();

      $result .= '<pre>';
      $result .= '' . get_the_title() . '';
      $result .= '</pre>';

    endwhile;

    wp_reset_postdata();

  endif;

  return $result;
}

add_shortcode('profiles-list', 'shortcode_for_profiles_post_type');

/*****************************************************************************************
                                SINGLE TEMPLATE FILTER
 ******************************************************************************************/
function profile_single_template($template)
{
  global $post;
  if ('datingprofielen' === $post->post_type && locate_template(array('single-profile.php')) !== $template) {
    return plugin_dir_path(__FILE__) . 'templates/single-profile.php';
  }
  return $template;
}

add_filter('single_template', 'profile_single_template');

/*****************************************************************************************
                                ARCHIVE TEMPLATE FILTER
 ******************************************************************************************/
function profiles_archive_template($template)
{
  global $post;
  if ('datingprofielen' === $post->post_type && locate_template(array('archive-profile.php')) !== $template) {
    return plugin_dir_path(__FILE__) . 'templates/archive-profile.php';
  }
  return $template;
}

add_filter('archive_template', 'profiles_archive_template');
