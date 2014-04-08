<section class="main row">
    <?php echo $sidemenu; ?>
    <div class="core small-10 columns">
        <h3><?php echo $title; ?></h3>
        <!-- <a href="<?php echo base_url('index.php/article/form/' . $content_type ); ?>" class="button tiny radius add-cat">Add <?php echo ucfirst($content_type); ?></a> -->
        <hr>
        <table class="auto">
            <thead>
                <tr>
                    <th width="30"><input type="checkbox"></input></th>
                    <th width="50">ID</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Active</th>
                    <th>Featured</th>
                    <th width="250">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($recordset) : ?>
                    <?php foreach ($recordset as $row) : ?>
                    <tr>
                        <td><input type="checkbox"></input></td>
                        <td class="delete-id"><?php echo $row->id; ?></td>
                        <td><img src="<?php echo base_url('images/uploads/' . $row->image); ?>" width="80"></td>
                        <td><?php echo $row->title; ?></td>
                        <td><?php echo $row->is_active == 1 ? 'Yes' : 'No'; ?></td>
                        <td><?php echo $row->is_featured == 1 ? 'Yes' : 'No'; ?></td>
                        <td>
                            <a href="<?php echo base_url('index.php/article/form/' . $content_type . '/' . $row->id); ?>" class="button tiny radius edit-cat">Edit</a>
                            <a href="" class="button tiny radius warning delete" data-reveal-id="delete-prompt">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" align="center">No Data</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="pagination-centered">
            <ul class="pagination">
                <?php echo $links; ?>
            </ul>
        </div>
    </div>

</section>

<?php $data = array('controller' => 'article', 'function' => 'delete', 'goto' => 'article/index/' . $content_type); $this->load->view('admin/modal-delete', $data); ?>