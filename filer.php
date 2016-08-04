<?php
/**
 * Created by PhpStorm.
 * User: tanyunbao
 * Date: 2016/8/4
 * Time: 11:22
 */
class filter
{

    public function fileA()
    {
        $emailGuest_a = $_POST["number"];
        $emailGuest_b = '';
        $options      = array(
            'options' => array(
                'min_Range' => 0,
                'mar_Range' => 9,
            ),

        );

        //过滤电子邮箱
        if (filter_var($emailGuest_a, FILTER_VALIDATE_EMAIL)) {
            echo "echo($emailGuest_a)";
            echo "<pre>";
        }
        //过滤ip

        if (filter_var($emailGuest_a, FILTER_VALIDATE_IP)) {
            echo "echo($emailGuest_a)";
            echo "<pre>";
        } else if (filter_var($emailGuest_b . FILTER_VALIDATE_IP)) {
            echo "echo ($emailGuest_b)is no IP";
            echo "<pre>";

        }
        //过滤取值0-9的范围范围
        if (filter_var($emailGuest_a, FILTER_VALIDATE_INT, $options) !== false) {
            echo "($emailGuest_a)is 0-9number";
            echo "<pre>";
        }
        $options['options']['default'] = 1;
        if (($emailGuest_a = filter_var($emailGuest_a, FILTER_VALIDATE_INT, $options)) !== false) {
            echo "This (emailGuest_a) integer is considered valid (between 0 and 3) and is $emailGuest_a.";
            echo "<pre>";
        }

    }

}
if (isset($_POST["btn_submit"])) {

    $oneDemo = new filer();
    $oneDemo->fileA();
}
