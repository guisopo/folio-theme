<?php
  $meta_value = get_post_meta( $post->ID, '_folio_work_meta_key', true );
  
  $work_category = ( ! empty ( $meta_value['category'] ) ) ? $meta_value['category'] : '';
  $work_title = ( ! empty ( $meta_value['title'] ) ) ? $meta_value['title'] : '';
  $work_year = ( ! empty ( $meta_value['year'] ) ) ? $meta_value['year'] : '';
  $work_material = ( ! empty ( $meta_value['material'] ) ) ? $meta_value['material'] : '';
  $work_technique = ( ! empty ( $meta_value['technique'] ) ) ? $meta_value['technique'] : '';
  $work_dimensions = ( ! empty ( $meta_value['dimensions'] ) ) ? $meta_value['dimensions'] : '';
  $work_units = ( ! empty ( $meta_value['units'] ) ) ? $meta_value['units'] : 'cm';
  $work_duration = ( ! empty ( $meta_value['duration'] ) ) ? $meta_value['duration'] : '';
  $work_description = ( ! empty ( $meta_value['description'] ) ) ? $meta_value['description'] : '';

  $taxterms = get_terms( 'work_type', array( 'get' => 'all' ) );
?> 
  <p>Here you can fill the details of this work. Remember to click the <b>Publish</b> button on the right to save the data.</p>
  <p>
    <label class="post-attributes-label" for="folio_work_category">Category:</label>
    <select id="work_category" name="folio_work[category]">
      <?php 
        foreach( $taxterms as $term ){
          $selected = selected( $work_category, $term->name );
          echo '<option value="'. $term->name .'" '. $selected .'>'. $term->name .'</option>';
        }
      ?></select>
  </p>
  <p>
    <label class="post-attributes-label" for="folio_work_title">Title:</label>
    <input
      type="text"
      name="folio_work[title]"
      placeholder="Title of your work"
      size="20"
      value="<?php echo esc_attr( $work_title ); ?>"
    >
  </p>
  <p>
    <label class="post-attributes-label" for="folio_work_title">Year:</label>
    <input
      type="text"
      name="folio_work[year]"
      placeholder="<?php echo date('Y') ?>"
      maxlength="4"
      pattern="[0-9]{4,4}"
      size="4"
      value="<?php echo esc_attr( $work_year ); ?>"
    >
  </p>
  <p>
    <label class="post-attributes-label" for="folio_work_material">Material:</label>
    <input
      type="text"
      name="folio_work[material]"
      placeholder="Material used"
      size="20"
      value="<?php echo esc_attr( $work_material ); ?>"
    >
  </p>
  <p>
    <label class="post-attributes-label" for="folio_work_technique">Technique:</label>
    <input
      type="text"
      name="folio_work[technique]"
      placeholder="Technique used"

      size="20"
      value="<?php echo esc_attr( $work_technique ); ?>"
    >
  </p>
  <p>
    <label class="post-attributes-label" for="folio_work_dimensions">Dimensions:</label>
    <input
      type="text"
      name="folio_work[dimensions]"
      placeholder="height x width x depth"
      size="20"
      value="<?php echo esc_attr( $work_dimensions ); ?>"
    >
    <select id="work_units" name="folio_work[units]">
      <option value="mm" <?php selected( $work_units, 'mm' ); ?>>mm</option>
      <option value="cm" <?php selected( $work_units, 'cm' ); ?>>cm</option>
      <option value="m" <?php selected( $work_units, 'm' ); ?>>m</option>
      <option value="none" <?php selected( $work_units, 'none' ); ?>>none</option>
    </select>
  </p>
  <p>
    <label class="post-attributes-label" for="folio_work_media">Media description:</label>
    <input
      type="text"
      name="folio_work[media]"
      placeholder="Video (Digital Betacam and DVD)"
      size="20"
      value="<?php echo esc_attr( $work_media ); ?>"
    >
  </p>
  <p>
    <label class="post-attributes-label" for="folio_work_credits">Credits:</label>
    <textarea
      name="folio_work[credits]"
      rows="1"
      cols="20"
      placeholder="Director, camera, performance, editing..."
      value="<?php echo esc_attr( $work_credits ); ?>"
    >
    </textarea>
  </p>
  <p>
    <label class="post-attributes-label" for="folio_work_duration">Duration:</label>
    <input
      type="text"
      name="folio_work[duration]"
      placeholder="00"
      maxlength="2"
      pattern="[0-9]{2,2}"
      size="2"
      value="<?php echo esc_attr( $work_duration ); ?>"
    >
    <span>:</span>
    <input
      type="text"
      name="folio_work[duration]"
      placeholder="00"
      maxlength="2"
      pattern="[0-60]{2,2}"
      size="2"
      value="<?php echo esc_attr( $work_duration ); ?>"
    >
    <span>:</span>
    <input
      type="text"
      name="folio_work[duration]"
      placeholder="00"
      maxlength="2"
      pattern="[0-9]{2,2}"
      size="2"
      value="<?php echo esc_attr( $work_duration ); ?>"
    >
  </p>
  <p>
    <label class="post-attributes-label" for="folio_work_description">Description:</label>
    <textarea
      name="folio_work[description]"
      rows="1"
      cols="20"
      >
      <?php echo esc_attr( $work_description ); ?>
    </textarea>
  </p>