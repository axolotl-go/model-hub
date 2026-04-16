<?php

namespace App\View\Components;

use App\Models\Threed;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Storage;

class ThreeDView extends Component
{
    public $modelPath;
    public $previewImage;
    public $isValid = false;

    public function __construct($model = null)
{
    if ($model instanceof Threed) {
        // ok
    } elseif (is_numeric($model) || is_string($model)) {
        $model = Threed::find($model);
    } else {
        $model = null;
    }

    if (!$model) {
        $this->isValid = false;
        return;
    }

    $this->modelPath = $model->file_path;
    $this->previewImage = $model->preview_image;

    if (!$this->modelPath || !Storage::disk('public')->exists($this->modelPath)) {
        $this->isValid = false;
        return;
    }

    $extension = strtolower(
        pathinfo(parse_url($this->modelPath, PHP_URL_PATH), PATHINFO_EXTENSION)
    );

    $this->isValid = in_array($extension, ['glb', 'gltf', 'fbx']);
}
    public function render(): View
    {
        return view('components.three-d-view');
    }
}
