<?php
require_once './includes/header.php';
require_once './functions/process_contacts.php';
?>
<div class="window">
    <h1 class="page-header"><small>Контакти</small></h1>
    <div class="row">
        <form method="get" action="contacts.php" class="col-lg-5 col-md-7 col-xs-12 navbar-default"
              style="padding: 10px;  border-radius: 5px;">
            <div class="form-group">
                <label>Име:</label>
                <input class="form-control" type="text" name="name" value="<?php echo setNameValue() ?>"/>
                <!--error message-->
                <?php
                if (isset($_GET['name']) and empty($_GET['name'])):
                    ?>
                    <p class="error">Моля, попълнете полето!</p>
                <?php endif; ?>
                <!--error message-->
            </div>

            <div class="form-group">
                <label>Електронна поща</label>
                <input class="form-control" type="text" name="e-mail" value="<?php echo setEmailValue() ?>"/>
                <!--error message-->
                <?php
                if (isset($_GET['e-mail']) and ! filter_var($_GET['e-mail'], FILTER_VALIDATE_EMAIL)):
                    ?>
                    <p class="error">Моля, попълнете полето с валиден е-мейл адрес!</p>
                <?php endif; ?>
                <!--error message-->
            </div>

            <div class="form-group">
                <label>Съобщение:</label>
                <textarea class="form-control" rows="10"
                          name="message"><?php echo setMessageValue(); ?></textarea>
                <!--error message-->
                <?php
                if (isset($_GET['message']) and empty($_GET['message'])):
                    ?>
                    <p class="error">Моля, попълнете полето!</p>
                <?php endif; ?>
                <!--error message-->
            </div>
            <br/>

            <div class="form-group">
                <button class="form-control btn btn-danger"><span class="glyphicon glyphicon-send"></span>&nbsp;Изпрати</button>
            </div>
        </form>
    </div>   
</div>
<br/>
<br/>
<?php
require_once './includes/footer.php';
