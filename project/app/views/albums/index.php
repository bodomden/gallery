<div class="col-md-4 ms-2">
    <div class="row">
        <div class="list-group">
            <?php
            if (!empty($data)) {
                foreach ($data as $alb) {
            ?>
                    <a href="/album/<?php echo $alb->id; ?>" class="list-group-item list-group-item-action">
                        <?php echo $alb->name; ?></a>
            <?php
                }
            } else {
                echo "No albums";
            }
            ?>
        </div>
    </div>
    <div class="mt-2">
        <p?><a href="/album/create" style="font-weight: bold;">Create album</a></p>
    </div>
</div>