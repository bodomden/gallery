<div class="row">
    <div class="col-md-6 border ps-2">
        <form action="/image" method="post" enctype="multipart/form-data" name="form" id="imageform">
            <div class="form-group mb-3 pt-2">
                <p id="err" style="color: red;"></p>
                <div class="mb-3">
                    <input type="file" name="upload" class="form-control" id="upload" required>
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Title:</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="title" maxlength="45"" required>
                </div>
                <div class=" mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <textarea type="text" name="description" class="form-control" rows="3" wrap="soft" id="description" placeholder="description" maxlength="255" required></textarea>
                </div>
                <input type="hidden" name="album_id" id="album_id" value="<?php echo $album_id; ?>">
                <div class="mb-3">
                    <button type="submit" class="btn btn-secondary">Add image</button>
                </div>
            </div>
        </form>
    </div>
</div>