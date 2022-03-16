<?php if (!empty($this->error)) { ?>
    <div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button><?php echo $this->error; ?></div>
<?php } if (!empty($this->success)) { ?>
    <div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button><?php echo $this->success; ?></div>
<?php } ?>