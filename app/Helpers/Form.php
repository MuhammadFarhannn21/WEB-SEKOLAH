<?php

namespace App\Helpers;

/**
 * Pengganti ringan untuk Form facade dari laravelcollective/html
 * (paket tersebut tidak tersedia lagi sejak upgrade ke Laravel 11).
 * Hanya mendukung method yang dipakai di view: open, model, close,
 * text, email, password, textarea, dan select.
 */
class Form
{
    protected static $model = null;

    public static function open(array $options = [])
    {
        static::$model = null;

        return static::openTag($options);
    }

    public static function model($model, array $options = [])
    {
        static::$model = $model;

        return static::openTag($options);
    }

    public static function close()
    {
        static::$model = null;

        return '</form>';
    }

    public static function text($name, $value = null, array $options = [])
    {
        return static::input('text', $name, $value, $options);
    }

    public static function email($name, $value = null, array $options = [])
    {
        return static::input('email', $name, $value, $options);
    }

    public static function password($name, array $options = [])
    {
        return '<input type="password" name="'.e($name).'"'.static::attributes($options).'>';
    }

    public static function textarea($name, $value = null, array $options = [])
    {
        $options += ['cols' => 50, 'rows' => 10];

        return '<textarea name="'.e($name).'"'.static::attributes($options).'>'.e(static::value($name, $value)).'</textarea>';
    }

    public static function select($name, $list = [], $selected = null, array $options = [])
    {
        $selected = (string) static::value($name, $selected);
        $html = '';

        foreach ($list as $key => $label) {
            $isSelected = (string) $key === $selected ? ' selected="selected"' : '';
            $html .= '<option value="'.e($key).'"'.$isSelected.'>'.e($label).'</option>';
        }

        return '<select name="'.e($name).'"'.static::attributes($options).'>'.$html.'</select>';
    }

    protected static function openTag(array $options)
    {
        $method = strtoupper($options['method'] ?? 'POST');
        $url = $options['url'] ?? url()->current();
        $url = is_array($url) ? url(implode('/', $url)) : url($url);
        unset($options['method'], $options['url']);

        $html = '<form method="'.($method === 'GET' ? 'GET' : 'POST').'" action="'.e($url).'" accept-charset="UTF-8"'.static::attributes($options).'>';

        if ($method !== 'GET') {
            $html .= csrf_field();
        }

        if (!in_array($method, ['GET', 'POST'])) {
            $html .= method_field($method);
        }

        return $html;
    }

    protected static function input($type, $name, $value, array $options)
    {
        return '<input type="'.$type.'" name="'.e($name).'" value="'.e(static::value($name, $value)).'"'.static::attributes($options).'>';
    }

    protected static function value($name, $default)
    {
        $old = session()->getOldInput($name);
        if (!is_null($old)) {
            return $old;
        }

        if (is_null($default) && static::$model) {
            return data_get(static::$model, $name);
        }

        return $default;
    }

    protected static function attributes(array $options)
    {
        $html = '';

        foreach ($options as $key => $value) {
            if (is_numeric($key)) {
                $html .= ' '.e($value).'="'.e($value).'"';
            } elseif (!is_null($value)) {
                $html .= ' '.e($key).'="'.e($value).'"';
            }
        }

        return $html;
    }
}
