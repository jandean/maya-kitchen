<section class="main row">
    <?php echo $sidemenu; ?>
    <div class="core small-10 columns">
        <h3><?php echo $title; ?></h3>
        <hr>
        <?php //echo "<pre>"; var_dump($result); die(); ?>
        <div><?php echo $message; ?></div>
        <?php echo form_open_multipart('recipe/form/' . @$result->id); ?>
            <input type="hidden" name="recipe_id" value="<?php echo set_value('recipe_id', @$result->id); ?>" />
            <input type="hidden" id="content_type" value="recipe" />
            <label>Title
                <input type="text" placeholder="Title" name="title" id="title" value="<?php echo set_value('title', @$result->title); ?>" />
            </label>
            <label>Slug
                <input type="text" placeholder="Title-Slug" name="slug" id="slug" value="<?php echo set_value('slug', @$result->slug); ?>" readonly />
            </label>
            <label>Ingredients
                <textarea rows="10" placeholder="Type ingredients, one line per item" name="ingredients"><?php echo set_value('ingredients', @$contents['ingredients']); ?></textarea>
            </label><br/>
            <label>Procedure
                <textarea rows="10" placeholder="Type procedure" name="procedure"><?php echo set_value('procedure', @$contents['procedure']); ?></textarea>
            </label><br/>
            <label>Yield
                <input type="text" placeholder="Type yield" name="yield" value="<?php echo set_value('yield', @$contents['yield']); ?>" />
            </label>
            <label>Notes
                <textarea rows="10" placeholder="Type notes, if any" name="notes"><?php echo set_value('notes', @$contents['notes']); ?></textarea>
            </label><br/>
            <label>Category
                <?php foreach ($categories as $category) : ?>
                <label>
                    <input type="radio" name="recipe_category_id" value="<?php echo $category->id; ?>" <?php echo set_value('recipe_category_id', @$result->recipe_category_id) == $category->id ? "checked" : ""; ?> /> <?php echo $category->name; ?>
                </label>
                <?php endforeach; ?>
            </label>
            <label>Cover Image
                <input type="file" name="image" />
            </label>
            <label>
                <input type="checkbox" name="for_kids" value="1" <?php echo set_value('for_kids', @$result->for_kids) == 1 ? "checked" : ""; ?> /> Is this for Kids?
            </label>
            <label>
                <input type="checkbox" name="is_active" value="1" <?php echo set_value('is_active', @$result->is_active, TRUE) == 1 ? "checked" : ""; ?> /> Active
            </label>
            <label>
                <input type="checkbox" name="is_featured" value="1" <?php echo set_value('is_featured', @$result->is_featured) == 1 ? "checked" : ""; ?> /> Feature this recipe
            </label>
            <hr>
            <button type="submit" class="button tiny radius alert">PUBLISH</button>
            <a href="<?php echo base_url('recipe'); ?>" class="button tiny radius secondary">CANCEL</a>
        <?php echo form_close(); ?>
    </div>

</section>