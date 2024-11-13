<?php
if(!isset($bird)) {
  redirect_to(url_for('/birds.php'));
}
?>

<dl>
  <dt>Common Name</dt>
  <dd><input type="text" name="bird[common_name]" value="<?php echo h($bird->common_name); ?>" /></dd>
</dl>

<dl>
  <dt>Habitat</dt>
  <dd><input type="text" name="bird[habitat]" value="<?php echo h($bird->habitat); ?>" /></dd>
</dl>

<dl>
  <dt>Food</dt>
  <dd><input type="text" name="bird[food]" value="<?php echo h($bird->food); ?>" /></dd>
</dl>

<dl>
  <dt>Conservation Status</dt>
  <dd>
    <select name="bird[conservation_id]">
    <?php foreach(Bird::get_conservation_options() as $id => $option) { ?>
      <option value="<?php echo $id; ?>" <?php if($bird->conservation_id == $id) { echo 'selected'; } ?>><?php echo $option; ?></option>
    <?php } ?>
    </select>
  </dd>
</dl>

<dl>
  <dt>Backyard Tips</dt>
  <dd><textarea name="bird[backyard_tips]" rows="4" cols="50"><?php echo h($bird->backyard_tips); ?></textarea></dd>
</dl>
