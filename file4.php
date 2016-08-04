<?php
namespace myFilter;

class demoFilter
{
//需要的验证数据
    protected $filed;
    //错误信息用来判断是否为空为空这表示信息都正确了
    protected $messge = [];
//设置验证信息
    public function filed($date)
    {
        $this->filed = $date;
        return $this;
    }
    public function required($msg = '')
    {
        if (empty($this->filed)) {
            $this->messge[] = empty($msg) ? $this->filed . "不能为空" : $msg;
        }
        return $this;
    }
    public function checkEmail($msg = '')
    {
        if (filter_var($this->filed, FILTER_VALIDATE_EMAIL) === false) {
            $this->messge[] = empty($msg) ? "邮箱格式不正确" : $msg;
        }
        return $this;
    }
    public function http($msg = '')
    {
        if (filter_var($this->filed, FILTER_VALIDATE_URL, FILTER_FLAG_HOST_REQUIRED) === false) {
            $this->messge[] = empty($msg) ? "网站格式不正确" : $msg;
        }
        return $this;
    }
    public function phone($msg = '')
    {
        $preg = '/^\d{11}$/';
        if (!preg_match($preg, $this->filed)) {
            $this->messge[] = empty($msg) ? "手机格式错误" : $msg;
        }

    }
    public function checkIp($msg = '')
    {
        if (filter_var($this->filed, FILTER_VALIDATE_IP) === false) {
            $this->messge[] = empty($msg) ? "ip格式错误" : $msg;
        }
    }
    public function get()
    {
        if (empty($this->messge)) {
            return true;
        }
        return $this->messge;
    }
}

