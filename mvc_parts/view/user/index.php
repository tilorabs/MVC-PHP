<h4><?= $this->pageData['_user'] ?></h4>
<?php if ($this->validData) { ?>
<form method="post" action="<?= $this->pageData['controllerlink'] ?>">
    <input type="hidden" name="sortOrder" value="<?php echo $this->sortOrder=='ASC'?'DESC':'ASC'; ?>" />
    <table class="mainContent">
        <thead>
        <tr>
            <th class="col-sm-3"><?= $this->pageData['_firstname'] ?>
                <button class="btn btn-link right sort" name="sortBy" type="submit" value="1">
                    <i class="fa <?php
                        if($this->sortBy==1)
                            echo ($this->sortOrder=='ASC')?'fa-sort-alpha-asc':'fa-sort-alpha-desc';
                        else
                            echo 'fa-sort';
                    ?>"></i>
                </button>
                <div class="input-wrapper">
                    <i class="fa fa-search"></i>
                    <input type="text" class="form-control" id="search_firstname" placeholder="<?= $this->pageData['_firstname'] ?>" autocomplete="off" autofocus="autofocus">
                </div>
            </th>
            <th class="col-sm-3"><?= $this->pageData['_lastname'] ?>
                <button class="btn btn-link right sort" name="sortBy" type="submit" value="2">
                    <i class="fa <?php
                        if($this->sortBy==2)
                            echo ($this->sortOrder=='ASC')?'fa-sort-alpha-asc':'fa-sort-alpha-desc';
                        else
                            echo 'fa-sort';
                    ?>"></i>
                </button>
                <div class="input-wrapper">
                    <i class="fa fa-search"></i>
                    <input type="text" class="form-control" id="search_lastname" placeholder="<?= $this->pageData['_lastname'] ?>" autocomplete="off" autofocus="autofocus">
                </div>
            </th>
            <th class="col-sm-2"><?= $this->pageData['_gender'] ?>
                <button class="btn btn-link right sort" name="sortBy" type="submit" value="3">
                    <i class="fa <?php
                        if($this->sortBy==3)
                            echo ($this->sortOrder=='ASC')?'fa-sort-alpha-asc':'fa-sort-alpha-desc';
                        else
                            echo 'fa-sort';
                    ?>"></i>
                </button>
            </th>
            <th class="col-sm-4">Email
                <button class="btn btn-link right sort" name="sortBy" type="submit" value="4">
                    <i class="fa <?php
                    if($this->sortBy==4)
                        echo ($this->sortOrder=='ASC')?'fa-sort-alpha-asc':'fa-sort-alpha-desc';
                    else
                        echo 'fa-sort';
                    ?>"></i>
                </button>
            </th>
        </tr>
        </thead>
    </table>
</form>
<table class="mainContent" id="result">
    <tbody>
    <?php foreach ($this->user as $e) { ?>
        <tr>
            <td class="col-sm-3"><?php echo $e->getFirstname(); ?></td>
            <td class="col-sm-3"><?php echo $e->getLastname(); ?></td>
            <td class="col-sm-2"><?php echo $this->genderNames[$e->getGender()]; ?></td>
            <td class="col-sm-4"><?php echo $e->getEmail(); ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<?php } ?>

<script type="text/javascript">
    $(document).ready(function() {
        $('#search_firstname').keyup(function() {
            $('#search_lastname').val('');
            var inputVal = $(this).val();
            if(inputVal.length >= 0) {
                $.ajax({
                    url:"index.php",
                    method: "post",
                    data:{
                        controller: 'ajaxUser',
                        action: 'index',
                        search:inputVal,
                        search_task: 1,
                        sortBy: <?php echo $this->sortBy; ?>,
                        sortOrder: '<?php echo $this->sortOrder; ?>'
                    },
                    dataType:"text",
                    success:function (data) {
                        $('#result').html(data);
                    }
                });
            } else {
                $('#result').empty();
            }
        });
        $('#search_lastname').keyup(function() {
            $('#search_firstname').val('');
            var inputVal = $(this).val();
            if(inputVal.length >= 0) {
                $.ajax({
                    url:"index.php",
                    method: "post",
                    data:{
                        controller: 'ajaxUser',
                        action: 'index',
                        search:inputVal,
                        search_task: 2,
                        sortBy: <?php echo $this->sortBy; ?>,
                        sortOrder: '<?php echo $this->sortOrder; ?>'
                    },
                    dataType:"text",
                    success:function (data) {
                        $('#result').html(data);
                    }
                });
            } else {
                $('#result').empty();
            }
        });
    });
</script>