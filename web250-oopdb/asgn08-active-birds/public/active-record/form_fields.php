<?php
// Prevent direct access
if(!isset($bird)) {
  redirect_to(url_for('/birds.php'));
}
?>

<dl>
  <dt>Common Name</dt>
  <dd>
    <input type="text" name="bird[common_name]" value="<?php echo h($bird->common_name); ?>" />
  </dd>
</dl>

<dl>
  <dt>Habitat</dt>
  <dd>
    <textarea name="bird[habitat]" rows="4" cols="50"><?php echo h($bird->habitat); ?></textarea>
  </dd>
</dl>

<dl>
  <dt>Food</dt>
  <dd>
    <textarea name="bird[food]" rows="4" cols="50"><?php echo h($bird->food); ?></textarea>
  </dd>
</dl>

<dl>
  <dt>Conservation Level</dt>
  <dd>
    <select name="bird[conservation_id]">
      <option value=""></option>
      <?php foreach(Bird::CONSERVATION_OPTIONS as $cons_id => $cons_name) { ?>
        <option value="<?php echo $cons_id; ?>" <?php if($bird->conservation_id == $cons_id) { echo 'selected'; } ?>>
          <?php echo $cons_name; ?>
        </option>
      <?php } ?>
    </select>
  </dd>
</dl>

<dl>
  <dt>Backyard Tips</dt>
  <dd>
    <textarea name="bird[backyard_tips]" rows="4" cols="50"><?php echo h($bird->backyard_tips); ?></textarea>
  </dd>
</dl>
