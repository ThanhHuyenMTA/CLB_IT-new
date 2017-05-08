<!-- \src\Template\Cvs\add.ctp -->
<?php echo $this->Html->script('Admin.moment-with-locales.js');?>
<?php echo $this->Html->script('Admin.bootstrap-datetimepicker.js');?>
<?php echo $this->Html->css('Admin.bootstrap-datetimepicker.css');?>
<?php echo $this->Html->script("Admin.create_cv"); ?>
<?php echo $this->Html->css(array('Admin.tether.min', 'Admin.cropper.min', 'Admin.cropper_main'));?>
<?php echo $this->Html->script(array('Admin.tether.min', 'Admin.cropper.min', 'jquery.validate.min', 'Admin.banners_add')); ?>
<section class="content-header">
    <h1>
        Quản lý
        <small>banner</small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <?php
            echo $this->Html->link(
                '<i class="fa fa-dashboard"></i> Trang chủ</a>',
                array('controller' => 'admin', 'action' => 'index'),
                array('escape' => false)); ?>
        </li>
        <li><?php echo $this->Html->link('Quản lý Banner', array('controller' => 'Banners', 'action' => 'index')); ?></li>
        <li class="active">Thêm mới</li>
    </ol>
</section>

<!-- Main content -->
<div class="container">
    <div class="col-sm-12 create-cv">
        <!-- Horizontal Form -->
        <div class="box-header with-border">
            <h3 class="box-title">Thêm mới Banner</h3>
        </div><!-- /.box-header -->
        <div>
            <?= $this->Flash->render() ?>
        </div>
        <!-- form start -->
        <?php
        echo $this->Form->create('Banners', array(
            'type' => 'post',
            'class' => 'form-create-cv form-horizontal',
            'id' => 'form-create-cv',
            'role' => 'form'
        ));
        ?>
        <div class='cv-information' style="margin-top: 20px;">
            <div class='cv-information-left col-md-12'>
                <div class="form-group">
                    <label for="full_name" class="col-md-2 control-label">Tên banner<span
                            class="required"> *</span></label>
                    <div class="col-md-8">
                        <?= $this->Form->input('name', ['label' => false, 'class' => 'form-control', 'id' => 'name']) ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="full_name" class="col-md-2 control-label">Title 1</label>
                    <div class="col-md-8">
                        <?= $this->Form->input('title1', ['label' => false, 'class' => 'form-control', 'id' => 'title1']) ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="full_name" class="col-md-2 control-label">Title 2</label>
                    <div class="col-md-8">
                        <?= $this->Form->input('title2', ['label' => false, 'class' => 'form-control', 'id' => 'title2']) ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="full_name" class="col-md-2 control-label">Title3</label>
                    <div class="col-md-8">
                        <?= $this->Form->input('title3', ['label' => false, 'class' => 'form-control', 'id' => 'title3']) ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="full_name" class="col-md-2 control-label">Chiều rộng</label>
                    <div class="col-md-8">
                        <?= $this->Form->input('width', ['label' => false, 'class' => 'form-control', 'id' => 'width', 'readonly' => true]) ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="full_name" class="col-md-2 control-label">Chiều cao</label>
                    <div class="col-md-8">
                        <?= $this->Form->input('height', ['label' => false, 'class' => 'form-control', 'id' => 'height', 'readonly' => true]) ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="full_name" class="col-md-2 control-label">Tọa độ X</label>
                    <div class="col-md-8">
                        <?= $this->Form->input('x', ['label' => false, 'class' => 'form-control', 'id' => 'x', 'readonly' => true]) ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="full_name" class="col-md-2 control-label">Tọa độ Y</label>
                    <div class="col-md-8">
                        <?= $this->Form->input('y', ['label' => false, 'class' => 'form-control', 'id' => 'y', 'readonly' => true]) ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="full_name" class="col-md-2 control-label">Order sort</label>
                    <div class="col-md-8">
                        <?= $this->Form->input('order_sort', ['label' => false, 'class' => 'form-control', 'id' => 'order_sort', 'value' => 50, 'type' => 'number']) ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="full_name" class="col-md-12 control-label" style="text-align: center;">Chỉnh sửa ảnh</label>
                </div>
                <div class="form-group">
                    <div class="container" style="width: 94% !important;">
                        <div class="row">
                            <div class="col-md-9">
                                <!-- <h3 class="page-header">Demo:</h3> -->
                                <div class="img-container">
                                    <img src="/admin/img/user2-160x160.jpg" alt="Picture">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <!-- <h3 class="page-header">Preview:</h3> -->
                                <div class="docs-preview clearfix">
                                    <div class="img-preview preview-lg"></div>
                                    <div class="img-preview preview-md"></div>
                                    <div class="img-preview preview-sm"></div>
                                    <div class="img-preview preview-xs"></div>
                                </div>

                                <!-- <h3 class="page-header">Data:</h3> -->
                                <div class="docs-data">
                                    <div class="input-group input-group-sm">
                                        <label class="input-group-addon" for="dataX">X</label>
                                        <input type="text" class="form-control" id="dataX" placeholder="x">
                                        <span class="input-group-addon">px</span>
                                    </div>
                                    <div class="input-group input-group-sm">
                                        <label class="input-group-addon" for="dataY">Y</label>
                                        <input type="text" class="form-control" id="dataY" placeholder="y">
                                        <span class="input-group-addon">px</span>
                                    </div>
                                    <div class="input-group input-group-sm">
                                        <label class="input-group-addon" for="dataWidth">Width</label>
                                        <input type="text" class="form-control" id="dataWidth" placeholder="width">
                                        <span class="input-group-addon">px</span>
                                    </div>
                                    <div class="input-group input-group-sm">
                                        <label class="input-group-addon" for="dataHeight">Height</label>
                                        <input type="text" class="form-control" id="dataHeight" placeholder="height">
                                        <span class="input-group-addon">px</span>
                                    </div>
                                    <div class="input-group input-group-sm">
                                        <label class="input-group-addon" for="dataRotate">Rotate</label>
                                        <input type="text" class="form-control" id="dataRotate" placeholder="rotate">
                                        <span class="input-group-addon">deg</span>
                                    </div>
                                    <div class="input-group input-group-sm">
                                        <label class="input-group-addon" for="dataScaleX">ScaleX</label>
                                        <input type="text" class="form-control" id="dataScaleX" placeholder="scaleX">
                                    </div>
                                    <div class="input-group input-group-sm">
                                        <label class="input-group-addon" for="dataScaleY">ScaleY</label>
                                        <input type="text" class="form-control" id="dataScaleY" placeholder="scaleY">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="actions">
                            <div class="col-md-9 docs-buttons">
                                <!-- <h3 class="page-header">Toolbar:</h3> -->
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary" data-method="setDragMode" data-option="move" title="Move">
            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.setDragMode(&quot;move&quot;)">
              <span class="fa fa-arrows"></span>
            </span>
                                    </button>
                                    <button type="button" class="btn btn-primary" data-method="setDragMode" data-option="crop" title="Crop">
            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.setDragMode(&quot;crop&quot;)">
              <span class="fa fa-crop"></span>
            </span>
                                    </button>
                                </div>

                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary" data-method="zoom" data-option="0.1" title="Zoom In">
            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.zoom(0.1)">
              <span class="fa fa-search-plus"></span>
            </span>
                                    </button>
                                    <button type="button" class="btn btn-primary" data-method="zoom" data-option="-0.1" title="Zoom Out">
            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.zoom(-0.1)">
              <span class="fa fa-search-minus"></span>
            </span>
                                    </button>
                                </div>

                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary" data-method="move" data-option="-10" data-second-option="0" title="Move Left">
            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.move(-10, 0)">
              <span class="fa fa-arrow-left"></span>
            </span>
                                    </button>
                                    <button type="button" class="btn btn-primary" data-method="move" data-option="10" data-second-option="0" title="Move Right">
            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.move(10, 0)">
              <span class="fa fa-arrow-right"></span>
            </span>
                                    </button>
                                    <button type="button" class="btn btn-primary" data-method="move" data-option="0" data-second-option="-10" title="Move Up">
            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.move(0, -10)">
              <span class="fa fa-arrow-up"></span>
            </span>
                                    </button>
                                    <button type="button" class="btn btn-primary" data-method="move" data-option="0" data-second-option="10" title="Move Down">
            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.move(0, 10)">
              <span class="fa fa-arrow-down"></span>
            </span>
                                    </button>
                                </div>

                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary" data-method="rotate" data-option="-45" title="Rotate Left">
            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.rotate(-45)">
              <span class="fa fa-rotate-left"></span>
            </span>
                                    </button>
                                    <button type="button" class="btn btn-primary" data-method="rotate" data-option="45" title="Rotate Right">
            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.rotate(45)">
              <span class="fa fa-rotate-right"></span>
            </span>
                                    </button>
                                </div>

                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary" data-flip="horizontal" data-method="scaleX" data-option="-1" title="Flip Horizontal">
            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.scaleX(-1)">
              <span class="fa fa-arrows-h"></span>
            </span>
                                    </button>
                                    <button type="button" class="btn btn-primary" data-flip="vertical" data-method="scaleY" data-option="-1" title="Flip Vertical">
            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.scaleY(-1)">
              <span class="fa fa-arrows-v"></span>
            </span>
                                    </button>
                                </div>

                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary" data-method="crop" title="Crop">
            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.crop()">
              <span class="fa fa-check"></span>
            </span>
                                    </button>
                                    <button type="button" class="btn btn-primary" data-method="clear" title="Clear">
            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.clear()">
              <span class="fa fa-remove"></span>
            </span>
                                    </button>
                                </div>

                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary" data-method="disable" title="Disable">
            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.disable()">
              <span class="fa fa-lock"></span>
            </span>
                                    </button>
                                    <button type="button" class="btn btn-primary" data-method="enable" title="Enable">
            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.enable()">
              <span class="fa fa-unlock"></span>
            </span>
                                    </button>
                                </div>

                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary" data-method="reset" title="Reset">
            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.reset()">
              <span class="fa fa-refresh"></span>
            </span>
                                    </button>
                                    <label class="btn btn-primary" for="inputImage" title="Upload image file">
                                        <input type="file" class="sr-only" id="inputImage" name="file" accept="image/*">
            <span class="docs-tooltip" data-toggle="tooltip" title="Import image with Blob URLs" style="background: red !important;">
              <span class="fa fa-upload"></span>
            </span>
                                    </label>
                                    <button type="button" class="btn btn-primary" data-method="destroy" title="Destroy">
            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.destroy()">
              <span class="fa fa-power-off"></span>
            </span>
                                    </button>
                                </div>

                                <div class="btn-group btn-group-crop">
                                    <button type="button" class="btn btn-primary" data-method="getCroppedCanvas">
            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.getCroppedCanvas()" style="background: red">
              Set and preview
            </span>

                                    </button>
                                    <button type="button" class="btn btn-primary" data-method="getCroppedCanvas" data-option="{ &quot;width&quot;: 160, &quot;height&quot;: 90 }">
            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.getCroppedCanvas({ width: 160, height: 90 })">
              160&times;90
            </span>
                                    </button>
                                    <button type="button" class="btn btn-primary" data-method="getCroppedCanvas" data-option="{ &quot;width&quot;: 320, &quot;height&quot;: 180 }">
            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.getCroppedCanvas({ width: 320, height: 180 })">
              320&times;180
            </span>
                                    </button>
                                </div>

                                <!-- Show the cropped image in modal -->
                                <div class="modal fade docs-cropped" id="getCroppedCanvasModal" role="dialog" aria-hidden="true" aria-labelledby="getCroppedCanvasTitle" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="getCroppedCanvasTitle">Preview</h4>
                                            </div>
                                            <div class="modal-body"></div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<!--                                                <a class="btn btn-primary" id="download" href="javascript:void(0);" download="cropped.jpg">Download</a>-->
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.modal -->
                                <input type="hidden" name="image" id="imageTemp">
                                <button type="button" class="btn btn-primary" data-method="getData" data-option data-target="#putData">
          <span class="docs-tooltip" data-toggle="tooltip" title="cropper.getData()">
            Get Data
          </span>
                                </button>
                                <button type="button" class="btn btn-primary" data-method="setData" data-target="#putData">
          <span class="docs-tooltip" data-toggle="tooltip" title="cropper.setData(data)">
            Set Data
          </span>
                                </button>
                                <button type="button" class="btn btn-primary" data-method="getContainerData" data-option data-target="#putData">
          <span class="docs-tooltip" data-toggle="tooltip" title="cropper.getContainerData()">
            Get Container Data
          </span>
                                </button>
                                <button type="button" class="btn btn-primary" data-method="getImageData" data-option data-target="#putData">
          <span class="docs-tooltip" data-toggle="tooltip" title="cropper.getImageData()">
            Get Image Data
          </span>
                                </button>
                                <button type="button" class="btn btn-primary" data-method="getCanvasData" data-option data-target="#putData">
          <span class="docs-tooltip" data-toggle="tooltip" title="cropper.getCanvasData()">
            Get Canvas Data
          </span>
                                </button>
                                <button type="button" class="btn btn-primary" data-method="setCanvasData" data-target="#putData">
          <span class="docs-tooltip" data-toggle="tooltip" title="cropper.setCanvasData(data)">
            Set Canvas Data
          </span>
                                </button>
                                <button type="button" class="btn btn-primary" data-method="getCropBoxData" data-option data-target="#putData">
          <span class="docs-tooltip" data-toggle="tooltip" title="cropper.getCropBoxData()">
            Get Crop Box Data
          </span>
                                </button>
                                <button type="button" class="btn btn-primary" data-method="setCropBoxData" data-target="#putData">
          <span class="docs-tooltip" data-toggle="tooltip" title="cropper.setCropBoxData(data)">
            Set Crop Box Data
          </span>
                                </button>
                                <button type="button" class="btn btn-primary" data-method="moveTo" data-option="0">
          <span class="docs-tooltip" data-toggle="tooltip" title="cropper.moveTo(0)">
            0,0
          </span>
                                </button>
                                <button type="button" class="btn btn-primary" data-method="zoomTo" data-option="1">
          <span class="docs-tooltip" data-toggle="tooltip" title="cropper.zoomTo(1)">
            100%
          </span>
                                </button>
                                <button type="button" class="btn btn-primary" data-method="rotateTo" data-option="180">
          <span class="docs-tooltip" data-toggle="tooltip" title="cropper.rotateTo(180)">
            180°
          </span>
                                </button>
                                <input type="text" class="form-control" id="putData" placeholder="Get data to here or set data with this value">

                            </div><!-- /.docs-buttons -->

                            <div class="col-md-3 docs-toggles">
                                <!-- <h3 class="page-header">Toggles:</h3> -->
                                <div class="btn-group docs-aspect-ratios" data-toggle="buttons">
                                    <label class="btn btn-primary active">
                                        <input type="radio" class="sr-only" id="aspectRatio0" name="aspectRatio" value="1.7777777777777777" checked>
            <span class="docs-tooltip" data-toggle="tooltip" title="aspectRatio: 16 / 9">
              16:9
            </span>
                                    </label>
                                    <label class="btn btn-primary">
                                        <input type="radio" class="sr-only" id="aspectRatio1" name="aspectRatio" value="1.3333333333333333">
            <span class="docs-tooltip" data-toggle="tooltip" title="aspectRatio: 4 / 3">
              4:3
            </span>
                                    </label>
                                    <label class="btn btn-primary">
                                        <input type="radio" class="sr-only" id="aspectRatio2" name="aspectRatio" value="1">
            <span class="docs-tooltip" data-toggle="tooltip" title="aspectRatio: 1 / 1">
              1:1
            </span>
                                    </label>
                                    <label class="btn btn-primary">
                                        <input type="radio" class="sr-only" id="aspectRatio3" name="aspectRatio" value="0.6666666666666666">
            <span class="docs-tooltip" data-toggle="tooltip" title="aspectRatio: 2 / 3">
              2:3
            </span>
                                    </label>
                                    <label class="btn btn-primary">
                                        <input type="radio" class="sr-only" id="aspectRatio4" name="aspectRatio" value="NaN">
            <span class="docs-tooltip" data-toggle="tooltip" title="aspectRatio: NaN">
              Free
            </span>
                                    </label>
                                </div>

                                <div class="btn-group docs-view-modes" data-toggle="buttons">
                                    <label class="btn btn-primary active">
                                        <input type="radio" class="sr-only" id="viewMode0" name="viewMode" value="0" checked>
            <span class="docs-tooltip" data-toggle="tooltip" title="View Mode 0">
              VM0
            </span>
                                    </label>
                                    <label class="btn btn-primary">
                                        <input type="radio" class="sr-only" id="viewMode1" name="viewMode" value="1">
            <span class="docs-tooltip" data-toggle="tooltip" title="View Mode 1">
              VM1
            </span>
                                    </label>
                                    <label class="btn btn-primary">
                                        <input type="radio" class="sr-only" id="viewMode2" name="viewMode" value="2">
            <span class="docs-tooltip" data-toggle="tooltip" title="View Mode 2">
              VM2
            </span>
                                    </label>
                                    <label class="btn btn-primary">
                                        <input type="radio" class="sr-only" id="viewMode3" name="viewMode" value="3">
            <span class="docs-tooltip" data-toggle="tooltip" title="View Mode 3">
              VM3
            </span>
                                    </label>
                                </div>

                                <div class="dropdown dropup docs-options">
                                    <button type="button" class="btn btn-primary btn-block dropdown-toggle" id="toggleOptions" data-toggle="dropdown" aria-expanded="true">
                                        Toggle Options
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu" aria-labelledby="toggleOptions">
                                        <li role="presentation">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="responsive" checked>
                                                responsive
                                            </label>
                                        </li>
                                        <li role="presentation">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="restore" checked>
                                                restore
                                            </label>
                                        </li>
                                        <li role="presentation">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="checkCrossOrigin" checked>
                                                checkCrossOrigin
                                            </label>
                                        </li>
                                        <li role="presentation">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="checkOrientation" checked>
                                                checkOrientation
                                            </label>
                                        </li>

                                        <li role="presentation">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="modal" checked>
                                                modal
                                            </label>
                                        </li>
                                        <li role="presentation">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="guides" checked>
                                                guides
                                            </label>
                                        </li>
                                        <li role="presentation">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="center" checked>
                                                center
                                            </label>
                                        </li>
                                        <li role="presentation">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="highlight" checked>
                                                highlight
                                            </label>
                                        </li>
                                        <li role="presentation">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="background" checked>
                                                background
                                            </label>
                                        </li>

                                        <li role="presentation">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="autoCrop" checked>
                                                autoCrop
                                            </label>
                                        </li>
                                        <li role="presentation">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="movable" checked>
                                                movable
                                            </label>
                                        </li>
                                        <li role="presentation">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="rotatable" checked>
                                                rotatable
                                            </label>
                                        </li>
                                        <li role="presentation">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="scalable" checked>
                                                scalable
                                            </label>
                                        </li>
                                        <li role="presentation">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="zoomable" checked>
                                                zoomable
                                            </label>
                                        </li>
                                        <li role="presentation">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="zoomOnTouch" checked>
                                                zoomOnTouch
                                            </label>
                                        </li>
                                        <li role="presentation">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="zoomOnWheel" checked>
                                                zoomOnWheel
                                            </label>
                                        </li>
                                        <li role="presentation">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="cropBoxMovable" checked>
                                                cropBoxMovable
                                            </label>
                                        </li>
                                        <li role="presentation">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="cropBoxResizable" checked>
                                                cropBoxResizable
                                            </label>
                                        </li>
                                        <li role="presentation">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="toggleDragModeOnDblclick" checked>
                                                toggleDragModeOnDblclick
                                            </label>
                                        </li>
                                    </ul>
                                </div><!-- /.dropdown -->
                            </div><!-- /.docs-toggles -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="submit-created-cv text-center">
            <button type="submit" class="btn btn-create-cv" formnovalidate = true>TẠO BANNER</button>
            <button type="reset" class="btn btn-cancel">HỦY</button>
        </div>
        <?php $this->Form->end(); ?>
    </div><!--/.col (right) -->
</div><!-- /.container -->