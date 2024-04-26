<div class="modal fade" id="commentModal" tabindex="-1" aria-labelledby="commentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <form action="/comment" method="post" name="commentForm" id="commentForm">
                    <div class="form-group mb-3">
                        <div class=" mb-3">
                            <label for="comment" class="form-label">Add comment:</label>
                            <textarea type="text" name="comment" class="form-control" rows="3" wrap="soft" id="comment" placeholder="comment" maxlength="255" required></textarea>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-secondary">Send</button>
                        </div>
                    </div>
                </form>
                <h5>Comments:</h5>
                <hr>
                <div id="loading">
                    <img src="/assets/image/loading.gif" id="loading">
                </div>
                <div class="comments">
                </div>
            </div>
        </div>
    </div>
</div>