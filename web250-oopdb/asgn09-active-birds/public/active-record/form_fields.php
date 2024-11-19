<?php
if(!isset($bird)) {
    redirect_to(url_for('/birds.php'));
}
?>

<dl>
    <dt>Common Name</dt>
    <dd>
        <input type="text" name="bird[common_name]" value="<?php echo h($bird->common_name); ?>" />
        <?php echo display_field_error($bird->errors, 'common_name'); ?>
    </dd>
</dl>

<dl>
    <dt>Habitat</dt>
    <dd>
        <input type="text" name="bird[habitat]" value="<?php echo h($bird->habitat); ?>" />
        <?php echo display_field_error($bird->errors, 'habitat'); ?>
    </dd>
</dl>

<dl>
    <dt>Food</dt>
    <dd>
        <input type="text" name="bird[food]" value="<?php echo h($bird->food); ?>" />
        <?php echo display_field_error($bird->errors, 'food'); ?>
    </dd>
</dl>

<dl>
    <dt>Conservation Status</dt>
    <dd>
        <select name="bird[conservation_id]">
            <option value="">Select Conservation Status</option>
            <?php foreach(Bird::get_conservation_options() as $id => $option) { ?>
                <option value="<?php echo $id; ?>" <?php if($bird->conservation_id == $id) { echo 'selected'; } ?>>
                    <?php echo $option; ?>
                </option>
            <?php } ?>
        </select>
        <?php echo display_field_error($bird->errors, 'conservation_id'); ?>
    </dd>
</dl>

<dl>
    <dt>Backyard Tips</dt>
    <dd>
        <textarea name="bird[backyard_tips]" rows="4" cols="50"><?php echo h($bird->backyard_tips); ?></textarea>
        <?php echo display_field_error($bird->errors, 'backyard_tips'); ?>
    </dd>
</dl>
