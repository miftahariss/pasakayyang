<h3 class="alert alert-info"><?php echo $title; ?></h3>
<form action="" method="post" enctype="multipart/form-data">
    <?php //print_r($content) ?>
    <table class="table table-striped">
        <tr>
            <td>Kanal</td>
            <td>
                <?=$channel?>
                <span class="alert-error"><?php echo form_error('channel')?></span>
            </td>
        </tr>
<!--        <tr>
            <td>Artikel Headline</td>
            <td>
                <input type="checkbox" name="headline" value="<?php echo $article->headline ?>" checked="checked" /> As Headline
            </td>
        </tr>-->
        <tr>
            <td>Judul</td>
            <td>
                <input type="text" name="title" value="<?php echo $article->title; ?>" class="input input-block-level" />
                <span class="alert-error"><?php echo form_error('title')?></span>
            </td>
        </tr>
        <tr>
            <td>Short Desc</td>
            <td>
                <input type="text" name="short_desc" value="<?php echo $article->short_desc ?>" class="input input-block-level" />
                <span class="alert-error"><?php echo form_error('short_desc')?></span>
            </td>
        </tr>
        <tr>
            <td>Isi</td>
            <td>
                <textarea type="text" name="body"><?php echo $article->body; ?></textarea>
                <span class="alert-error"><?php echo form_error('body')?></span>
            </td>
        </tr>
        <tr>
            <td>Website</td>
            <td>
                <input type="text" name="website" value="<?php echo $article->website; ?>" class="input input-block-level" required="required" />
                <span class="alert-error"><?php echo form_error('website')?></span>
            </td>
        </tr>
        <tr>
            <td>Meta Keywords</td>
            <td>
                <input type="text" name="meta_keywords" value="<?php echo $article->meta_keywords ?>" class="input input-block-level" />
                <span class="alert-error"><?php echo form_error('meta_keywords')?></span>
            </td>
        </tr>
        <tr>
            <td>Meta Description</td>
            <td>
                <input type="text" name="meta_description" value="<?php echo $article->meta_description ?>" class="input input-block-level" />
                <span class="alert-error"><?php echo form_error('meta_description')?></span>
            </td>
        </tr>
        <tr>
            <td>Foto <code>Maksimal 2MB</code></td>
            <td>
            	<?php if ($article->filename == 0): ?>
            		<span class="label label-important">Foto tidak ditemukan!</span>
            	<?php else: ?>
            		<img src="<?php echo base_url()?>asset_admin/assets/uploads/cover/small/<?php echo $article->filename ?>" /><br />
            	<?php endif; ?>
                <input type="file" name="userfile" />
                <span class="alert-error"><?php echo form_error('userfile'); ?></span>
            </td>
        </tr>
        <input type="hidden" name="id_account" value="<?php echo $article->id_account; ?>" />
    </table>
<!--    <table class="table table-striped" id="editPhoto">
        <tr>
            <th colspan="5">Gallery <a class="btn" onclick="editPhoto()"><span class="icon icon-plus-sign"></span> Add Photo</a></th>
        </tr>
        <tr>

            <td><u><b>Judul Foto</b></u></td>
            <td><u><b>Deskripsi Foto</b></u></td>
            <td><u><b>Foto</b></u></td>
            <td><u><b>Aksi</b></u></td>
        </tr>
        <?php foreach ($photos as $photo): ?>
            <tr>

                <td>
                    <?php echo $photo->title?>
                </td>
                <td>
                    <?php echo $photo->body?>
                </td>
                <td>
                    <?php if ($photo->filename == 0): ?>
                        <span class="label label-important">Foto tidak ditemukan!</span>
                    <?php else: ?>
                        <img class="thumbnail" src="<?php echo base_url()?>asset_admin/assets/uploads/gallery/small/<?php echo $photo->filename?>" width="100" /><br />
                    <?php endif; ?>
                </td>
                <td>
                    <?php echo anchor('/backend/acladmin/edit_gallery_photo/' . $article->id . '/' . $photo->id, "<span class='icon-edit'></span> Edit",array('class'=>'btn','onclick'=>"return confirm('yakin mau edit photo ini?')"));?>
                    <?php echo anchor('/backend/acladmin/articlegaleridelete/' . $article->id . '/' . $photo->id, "<span class='icon-remove-sign'></span> Delete",array('class'=>'btn','onclick'=>"return confirm('yakin mau delete photo ini?')"));?>
                </td>
            </tr>
            <input type="hidden" name="id_photo" value="<?php echo $photo->id ?>" />
        <?php endforeach; ?>

    </table>-->

    <table class="table table-striped">
        <tr>
            <td><input type="submit" class="btn btn-large btn-primary" name="submit" value="Update" /></td>
        </tr>
    </table>
</form>
<script type="text/javascript" src="<?php echo base_url();?>asset_admin/assets/js/ckeditor/ckeditor.js"></script>
<script type="text/javascript">CKEDITOR.replace ('body', {toolbar : 'Basic'})</script>