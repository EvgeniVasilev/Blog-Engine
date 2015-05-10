<?php
require_once './includes/header.php';
?>
    <div class="window">
        <h1 class="page-header">
            <small>Качване на графика</small>
        </h1>
        <form>
            <div class="form-group">
                <label>Изберете файл, който да качите:</label>
                <input type="file" name="file"/>
            </div>
            <div class="form-group">
                <button class="btn btn-danger">Качване</button>
            </div>
        </form>
        <div>
            <h3>
                <small>Разрешени файлови формати:</small>
            </h3>
        </div>
    </div>
<?php
require_once './includes/footer.php';
