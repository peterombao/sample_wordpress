<?php
global $wpdb;
$results = $wpdb->get_results("
        SELECT * FROM {$wpdb->prefix}po_entries
        ORDER BY entry_name
    ", OBJECT );
?>
<span class="type_box hidden"> &mdash;
    <label for="product-type">
        <select id="product-type" name="product-type">
            <optgroup label="Entry">
                    <option value="">None</option>
                <?php foreach ( $results as $result ) : ?>
                    <option value="<?php echo $result->id; ?>"><?php echo $result->entry_name; ?></option>
                <?php endforeach; ?>
            </optgroup>
        </select>
    </label>
</span>