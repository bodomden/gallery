<div class="row">
    <div class="col-md-6 border ps-2">
        <form action="/album/<?php echo $album->id ?>" method="post" name="form">
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group mb-3">
                <div class="mb-3">
                    <label for="name" class="form-label">Title:</label>
                    <input type="text" name="name" class="form-control" id="name" maxlength="45" value="<?php echo $album->name ?>" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <textarea type="text" name="description" class="form-control" rows="3" wrap="soft" id="description" maxlength="255" required><?php echo $album->description ?></textarea>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-secondary">Save</button>
                </div>
        </form>
    </div>
</div>