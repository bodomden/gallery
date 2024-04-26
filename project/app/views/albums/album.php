<br>
<div class="row">
    <?php if (!empty($images)) {
        foreach ($images as $img) { ?>
            <div class="col-md-3 col-6 col-sm-4 col-lg-2 mb-3">
                <img src="/upload/<?php echo $img->name; ?>" style="width:100%" class="hover-shadow cursor border-bottom border-2 pt-1 pb-1" data-bs-toggle="modal" data-bs-target="#bigModal">
                <div class="row">
                    <ul id='123' class="info-icons d-flex justify-content-center mt-1 mb-0">
                        <li><i class="fa-regular fa-thumbs-up ms-2 me-1" data-wht="<?php echo $img->id; ?>" data-act="like" onclick="changeStatus(this)"></i><span><?php echo $img->like ?></span></li>
                        <li><i class="fa-regular fa-thumbs-down ms-2 me-1" data-wht="<?php echo $img->id; ?>" data-act="dislike" onclick="changeStatus(this)"></i><span><?php echo $img->dislike ?></span></li>
                        <li><i class="fa-regular fa-comment-dots ms-2 me-1" id="commentIcon" data-wht="<?php echo $img->id; ?>" data-act="comment" data-bs-toggle="modal" data-bs-target="#commentModal"></i><span><?php echo $img->comment ?></span></li>
                    </ul>
                    <div class="text-center">
                        <p><?php echo $img->title ?></p>
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
<?php include 'app/views/albums/commentmodal.php' ?>
<div class="mt-2">
    <p><a href="/album/<?php echo $id; ?>/add" style="font-weight: bold;">Add image</a></p>
    <p><a href="/album/<?php echo $id; ?>/edit" style="font-weight: bold;">Edit album</a></p>
    <form id="deletealbum" action="/album/<?php echo $id; ?>" method="post">
        <input type="hidden" name="_method" value="DELETE">
        <p><a href="#" style="font-weight: bold;" onclick="document.querySelector('#deletealbum').submit()">Delete album</a></p>
    </form>
    <p><a href="#" style="font-weight: bold; color: red;" onclick="localStorage.clear();alert('Cleared');">End session</a></p>
</div>
</div>