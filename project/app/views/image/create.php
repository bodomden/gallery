<div class="row">
    <div class="col-md-6 border ps-2">
        <form action="/image/store" method="post" enctype="multipart/form-data" name="form">
            <div class="form-group mb-3 pt-2">
                <div class="mb-3">
                    <input type="file" name="name" class="form-control" id="name" required>
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Title:</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="title" maxlength="45"" required>
                </div>
                <div class=" mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <textarea type="text" name="description" class="form-control" rows="3" wrap="soft" id="description" placeholder="description" maxlength="255" required></textarea>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-secondary">Upload</button>
                </div>
            </div>
        </form>
    </div>
</div>