<?php
require_once './includes/header.php';
require_once './functions/get_full_article.php';
require_once './functions/list_comments.php';
?>
    <div class="window">
        <?php
        $id = $_GET["id"];
        $sql = "SELECT * FROM articles WHERE article_id=" . $id;

        get_ful_article($sql);

        list_comments();
        ?>
        <div class="row">
            <hr/>
            <form method="get" class="form-horizontal col-lg-5 col-sm-6 col-xs-12">
                <input id="get_id" type="hidden" value="<?php echo $id; ?>"/>

                <div class="form-group">
                    <label>Потребителско Име:</label>
                    <input id="u_name" type="text" class="form-control"/>
                </div>
                <div class="form-group">
                    <label>Текст:</label>
                    <textarea id="message" class="form-control" rows="5"></textarea>
                </div>
            </form>
        </div>
        <div class="row">
            <button id="f_comments" class="btn btn-danger col-lg-5 col-sm-6 col-xs-12">Коментирай</button>
        </div>
        <br/>
        <script>
            $(document).ready(function () {
                var btn = $("#f_comments"), name = $('#u_name'), message = $('#message'), u_name_val = '', message_val = '', get_id = $('#get_id');
                btn.on('click', function () {
                    if (!name.val()) {
                        alert('Моля, попълнете потребителско име!');
                        name.focus();
                        return;
                    } else {
                        u_name_val = name.val();
                    }

                    if (!message.val()) {
                        alert('Моля, попълнете коментар!');
                        message.focus();
                        return;
                    } else {
                        message_val = message.val();
                    }

                    $.ajax({
                        action: 'GET',
                        url: './functions/post_comments.php',
                        data: {
                            id: get_id.val(),
                            name: name.val(),
                            comment: message.val()
                        }
                    }).done(function (data) {
                        name.val(null);
                        message.val(null);
                        $("#comment_confirm").modal();
                    });
                });
            });
        </script>
    </div>
    <!--conformational modal-->
    <div class="modal fade" id="comment_confirm">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <br/>
                </div>
                <div class="modal-body">
                    <h1>
                        <small>
                            <center>
                                Коментарът Ви беше успешно публикуван!
                            </center>
                        </small>
                    </h1>
                    <br/>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
    </div>
    <!--conformational modal-->
<?php
require_once './includes/footer.php';
