<div id="category-form" class="reveal-modal text-center small" data-reveal>
    <h3 id="category_form_title">Add New <?php echo ucfirst($content_type); ?> Category</h2>
    <hr>

    <div id="infoMessage"></div>
    <form id="form_category">
        <input type="hidden" id="category_id" name="category_id">
        <input type="hidden" id="category_type" name="category_type" value="<?php echo $type; ?>">
        <label>Category
            <input type="text" id="category_name" name="category_name" placeholder="Type category name" />
        </label>
        <button type="button" class="button tiny radius alert save-cat" onclick="save_category()">SAVE</button>
    </form>
    <a class="close-reveal-modal">&#215;</a>
</div>