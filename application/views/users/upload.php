<div class="row justify-content-center">
    <div class="col-6">
        <h1><?php echo $title ?></h1>
        <p><?php echo $this->session->flashdata('message')?></p>
            
            
        
        <?php echo form_open_multipart('users/upload', array('id' => 'loginForm')) ?>
            <div class="form-group">
               <input type="file" name="userfile"/ >
               <?php echo $error;?>
            </div>
            
            <div class="form-group">
                <input type="submit" name="submit" value="upload" class="btn btn-primary"/>
            </div>
        <?php echo form_close(); ?>
    </div>
</div>