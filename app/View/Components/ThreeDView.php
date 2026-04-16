<?php

namespace App\View\Components;

use App\Models\Threed;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ThreeDView extends Component
{
    public $modelPath;
    public $previewImage;
    public $isValid = false;

    public function __construct($model = null)
    {
        $model = null;

        if ($model instanceof Threed) {
            $model = $model;
        } elseif (is_numeric($model) || is_string($model)) {
            $model = Threed::find($model);
        }

        if ($model) {
            $this->modelPath = $model->file_path;
            $this->previewImage = $model->preview_image;
            $extension = pathinfo($this->modelPath, PATHINFO_EXTENSION);
            $this->isValid = in_array(strtolower($extension), ['glb', 'gltf']);
        } else {
            $this->isValid = false;
        }
    }

    public function render(): View
    {
        return view('components.three-d-view');
    }
}
