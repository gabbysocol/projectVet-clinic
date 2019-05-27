<?php
    session_start();

    function printTable()
    {
        $arr= array();
        $search = ['@', '.', '\n'];

        $keys = array_keys($arr[0]);
        echo '<table><tr>';
        foreach ($keys as $key)
            echo sprintf('<th>%s</th>', $key);
        echo '</tr>';

        foreach ($arr as $file)
        {
            if (isset($types))
            {
                $flag = false;
                foreach ($types as $type)
                {
                    if ($type === $file['file_extention']){
                        $flag = true;
                        break;
                    }
                }
                if (!$flag)
                    continue;
            }
            if (isset($filter))
            {
                $pos = stripos($file['file_name'], $filter);
                if($pos !== 0)
                {
                    continue;
                }
            }

            echo '<tr>';

            foreach ($keys as $key) {

                if ($key === "file_path") {
                    $filepath = $dir.$file[$key];
                    //echo sprintf('<td class="load_style"><a class="load_button" href="%s" download>Download file</a></td>', $filepath);

                    echo sprintf('<td class="load_style"><input type="button" onclick="downloadFile(this.name)" name="%s&fileRealName=%s" value="Download"/></td>',
                        $filepath,$file['file_name'] );

                    continue;
                }
                echo sprintf('<td>%s</td>', $file[$key]);

            }
            echo '</tr>';
        }

        echo '</table>';
    }