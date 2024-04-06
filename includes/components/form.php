<div class="card bg-light text-dark container p-4">
    <h4 class="m-auto pb-3">QR-code generator</h4>

    <form method="post" id="form-qr" autocomplete="off">
        <div class="form-group">
            <input name="text" required placeholder="Type the text..." type="text" class="form-control">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Send</button>
        </div>
        <div id="error" class="text-danger" style="display: none;"></div>
    </form>
    <img src="" alt="qr-code" id="qr-image">
</div>