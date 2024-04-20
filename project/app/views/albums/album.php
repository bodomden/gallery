<br>
<div class="row">
    <?php if (!empty($images)) {
        foreach ($images as $img) { ?>
            <div class="col-md-3 col-6 col-sm-4 col-lg-2 mb-3">
                <img src="/upload/<?php echo $img->name; ?>" style="width:100%" class="hover-shadow cursor border-bottom border-2 pt-1 pb-1" data-bs-toggle="modal" data-bs-target="#bigModal">
                <div class="row">
                    <ul id='123' class="info-icons d-flex justify-content-center mt-1 mb-0">
                        <li><i class="fa-regular fa-thumbs-up ms-2 me-1" data-wht="<?php echo $img->id; ?>" data-act="like" onclick="set(this)"></i><span><?php echo $img->like ?></span></li>
                        <li><i class="fa-regular fa-thumbs-down ms-2 me-1" data-wht="<?php echo $img->id; ?>" data-act="dislike" onclick="set(this)"></i><span><?php echo $img->dislike ?></span></li>
                        <li><i class="fa-regular fa-comment-dots ms-2 me-1"></i><span><?php echo $img->comment ?></span></li>
                    </ul>
                    <div class="text-center">
                        <a class="img-name" href="<?php echo $img->title ?>"><?php echo $img->title ?></a>
                    </div>
                </div>
            </div>
    <?php }
    } else {
        echo "The album is empty";
    } ?>
</div>
<div class="modal fade" id="bigModal" tabindex="-1" aria-labelledby="bigModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>
<div class="mt-2">
    <p><a href="image/create" style="font-weight: bold;">Add image</a></p>
    <p><a href="/album/<?php echo $id; ?>/edit" style="font-weight: bold;">Edit album</a></p>
</div>
</div>