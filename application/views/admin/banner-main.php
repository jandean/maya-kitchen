<section class="main row">
    <?php echo $sidemenu; ?>
    <div class="core small-10 columns">
        <h3>Homepage Banner</h3>
        <hr>
        <table class="auto">
            <thead>
                <tr>
                    <!-- <th width="30"><input type="checkbox"></input></th> -->
                    <th width="50">ID</th>
                    <th>Image</th>
                    <th>Link</th>
                    <th width="250">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($recordset) : ?>
                    <?php foreach ($recordset as $row) : ?>
                    <tr>
                        <!-- <td><input type="checkbox"></input></td> -->
                        <td class="delete-id"><?php echo $row->id; ?></td>
                        <td><img src="<?php echo base_url('images/uploads/' . $row->img); ?>" width="80"></td>
                        <td><?php echo $row->url; ?></td>
                        <td>
                            <a href="<?php echo base_url('pages/banner_form/' . $row->id); ?>" class="button tiny radius edit-cat">Edit</a>
                            <a href="" class="button tiny radius warning delete" data-reveal-id="delete-prompt">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" align="center">No Data</td>
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

<?php $data = array('controller' => 'pages', 'function' => 'delete', 'goto' => 'pages/banner'); $this->load->view('admin/modal-delete', $data); ?>