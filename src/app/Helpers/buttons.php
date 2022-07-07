<?php

function BUTTON_CRUD($object, $route, $model): string
{
    $html = '';
    if (auth()->user()->can('edit-' . $model))
        $html = $html . ' <a href="' . route($route . 'edit', $object->id) . '" class="'.config('class.button.edit').'" data-toggle = "tooltip" title = "Edit Record"><i class="'.config('class.icon.edit').'"></i></a> ';
    if (auth()->user()->can('delete-' . $model))
        $html = $html . ' <button data-remote="' . route($route . 'ajaxDelete', $object->id) . '" class="'.config('class.button.delete').'" data-toggle = "tooltip" title = "Delete Record" id="delete"><i class="'.config('class.icon.delete').'"></i></button> ';
    return $html;
}
