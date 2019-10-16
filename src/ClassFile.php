<?php
/**
 * Created by PhpStorm.
 * User: bzg
 * Date: 2019/10/13
 * Time: 16:37
 */

namespace Baozi;

/**
 * 对象文件
 * Class ClassFile
 * @package mytools\annotation
 */
class ClassFile
{
    /**
     * 对象全名
     * @var string
     */
    private $real_class_name = '';

    /**
     * 对象的标题
     * @var array
     */
    private $class_title = '';

    /**
     * 对象的注释
     * @var array
     */
    private $class_doc = [];

    /**
     * 各个方法的注释
     * @var array
     */
    private $action_doc = [];


    public function __construct($class_name)
    {
        $this->real_class_name = $class_name;
    }


    /**
     * 设置对象全名
     * @param string $name
     */
    public function setClassTitle(string $name)
    {
        $this->class_title = $name;
    }

    /**
     * 设置类注释
     * @param array $doc
     */
    public function setClassDoc(array $doc)
    {
        $this->class_doc = $doc;
    }

    /**
     * 设置方法数组
     * @param array $doc
     */
    public function setActionDoc(array $doc)
    {
        $this->action_doc = $doc;
    }


    /**
     * 获取当前类名
     * @param bool $type 是否获取含有命空间的完整类名
     * @return mixed|string
     */
    public function getClassName($type = false)
    {
        return $type ? $this->real_class_name : array_pop(explode('\\',$this->real_class_name));
    }

    /**
     * 获取类的标题
     * @return array
     */
    public function getClassTitle()
    {
        return $this->class_title;
    }

    /**
     * 获取类的注释
     * @param string $name
     * @return array|mixed
     */
    public function getClassDoc($name = '')
    {
        if(empty($name)) {
            return $this->class_doc;
        }else{
            return $this->class_doc[$name];
        }
    }

    /**
     * 获取方法的注释
     * @param string $name
     * @return array|mixed
     */
    public function getActionDoc($name = '')
    {
        if(empty($name)) {
            return $this->action_doc;
        }else{
            return $this->action_doc[$name];
        }
    }
}