<!DOCTYPE HTML>
<html>
    <head>
        <title>�������� ������ TagFace</title>
        <link rel="stylesheet" type="text/css" href="http://store.alaev.info/style.css" />
        <style type="text/css">
            #header {width: 100%; text-align: center;}
            .box-cnt{width: 100%; overflow: hidden;}
        </style>
    </head>

    <body>
        <div class="wrap">
            <div id="header">
                <h1>TagFace</h1>
            </div>
            <div class="box">
                <div class="box-t">&nbsp;</div>
                <div class="box-c">
                    <div class="box-cnt">
                        <?php

                            $output = module_uninstaller();
                            echo $output;

                        ?>
                    </div>
                </div>
                <div class="box-b">&nbsp;</div>
            </div>
        </div>
    </body>
</html>

<?php

    function module_uninstaller()
    {
        // ����������� �����
        $output = '<h2>����� ���������� � ������ ��� �������� ������ TagFace!</h2>';
        $output .= '<p><strong>��������!</strong> ����� �������� ������ <strong>�����������</strong> ������� ���� <strong>tagface_uninstaller.php</strong> � ������ �������!</p>';
        $output .= '<p>';
        $output .= '<strong>����� ����, ���������� ������� ��������� �����:</strong>';
        $output .= '<ul>';
            $output .= '<li>/engine/modules/<strong>tagface.php</strong></li>';
            $output .= '<li>/engine/inc/<strong>tagface.php</strong></li>';
            $output .= '<li>/engine/editor/<strong>tagface_description.php</strong></li>';
            $output .= '<li>/engine/editor/<strong>tagface_description_pages.php</strong></li>';
            $output .= '<li>/engine/skins/images/<strong>tagface.png</strong></li>';
            $output .= '<li>/templates/<em>��� ������ �������</em>/<strong>tagface.tpl</strong></li>';
        $output .= '</ul>';
        $output .= '</p>';

        // ���� ����� $_POST ��������� �������� tagface_uninstall, ���������� �����������, �������� ����������
        if(!empty($_POST['tagface_uninstall']))
        {
            // ���������� config
            include_once ('engine/data/config.php');

            // ���������� DLE API
            include ('engine/api/api.class.php');
            
            // �������� ������� category_face
            $query = "DROP TABLE IF EXISTS `".PREFIX."_tag_face`;";
            $dle_api->db->query($query);

            // ������� ������ �� �������
            $dle_api->uninstall_admin_module('tagface');

            // �����
            $output .= '<p>';
            $output .= '������ ������� �����!';
            $output .= '</p>';
        }

        // ���� ����� $_POST ������ �� ���������, ������� ����� ��� �������� ������
        else
        {
            // �����
            $output .= '<p>';
            $output .= '<form method="POST" action="tagface_uninstaller.php">';
            $output .= '<input type="hidden" name="tagface_uninstall" value="1" />';
            $output .= '<input type="submit" value="������� ������" />';
            $output .= '</form>';
            $output .= '</p>';
        }
        
        $output .= '<p>';
        $output .= '<a href="http://alaev.info/blog/post/3857?from=TagFaceUninstaller">���������� � ��������� ������</a>';
        $output .= '</p>';

        // ������� ���������� ��, ��� ������ ���� ��������
        return $output;
    }

?>