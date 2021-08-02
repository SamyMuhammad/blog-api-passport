<?php

/**
 * Get the id to be used in validation rules.
 * @param \Illuminate\Foundation\Http\FormRequest $formRequest
 * @param string $modelName
 */
if (! function_exists('getRouteId')){
    function getRouteId($formRequest, $modelName)
    {
        $id = '';
        if ($formRequest->isMethod('PUT') || $formRequest->isMethod('PATCH')){
            $id = $formRequest->route($modelName)->id;
        }
        return $id;
    }
}
