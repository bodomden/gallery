<div class="row">
    <div class="col-md-6 border ps-2">
        <form action="/album/" method="post" name="form">
            <div class="form-group mb-3">
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="name" maxlength="45"" required>
                </div>
                <div class=" mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <textarea type="text" name="description" class="form-control" rows="3" wrap="soft" id="description" placeholder="description" maxlength="255" required></textarea>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-secondary">Create</button>
                </div>
            </div>
        </form>
    </div>
</div>