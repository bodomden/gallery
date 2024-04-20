<?php include('../controller/image.php'); ?>
<?php include("template/header.php"); ?>
<div class="row">
    <div class="col-md-6 border ps-2">
        <form method="post" enctype="multipart/form-data">
            <p style="font-weight: bold;"><?php echo $message; ?></p>
            <p><input type="file" class="form-control" name="upload" required></p>
            <p>Название:</p>
            <p><input type="text" class="form-control" name="title" placeholder="Введите название" maxlength="45" required></p>
            <p>Описание:</p>
            <p><textarea name="description" class="form-control" rows="3" wrap="soft" placeholder="Введите описание" maxlength="255" required></textarea></p>
            <p><input type="submit" class="form-control" value="Загрузить" name="submit"></p>
        </form>
    </div>
</div>

<?php include("template/footer.php"); ?>