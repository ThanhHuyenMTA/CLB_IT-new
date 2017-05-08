<section class="content-header">
    <h1>
        Bảng điều khiển
        <small>findjob.vn</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <li class="active">Bảng điều khiển</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Info boxes -->
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Nhà Tuyển dụng</span>
                    <span class="info-box-number"><?php echo $totalRecruitment; ?></span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div><!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Sinh viên</span>
                    <span class="info-box-number"><?php echo $totalEmployee; ?></span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div><!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-briefcase"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Công việc</span>
                    <span class="info-box-number"><?php echo $totalJob; ?></span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div><!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-suitcase"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Chọn việc</span>
                    <span class="info-box-number"><?php echo $totalChoices; ?></span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div><!-- /.col -->
    </div><!-- /.row -->

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Báo cáo hàng tháng</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-8">
                            <p class="text-center">
                                <strong>Thời gian: 1 Jan, 2014 - 30 Jul, 2014</strong>
                            </p>
                            <div class="chart">
                                <!-- Sales Chart Canvas -->
                                <canvas id="salesChart" style="height: 180px;"></canvas>
                            </div><!-- /.chart-responsive -->
                        </div><!-- /.col -->
                        <div class="col-md-4">
                            <p class="text-center">
                                <strong>Tháng hiện tại / Tháng trước</strong>
                            </p>
                            <div class="progress-group">
                                <span class="progress-text">Nhà tuyển dụng</span>
                                <span class="progress-number"><?php echo '<b>' . $numberReCurrent . '</b>/' . $numberReBefore;?></span>
                                <div class="progress sm">
                                    <div class="progress-bar progress-bar-aqua" style="width: <?php if($numberReBefore == 0) echo '100%'; else echo ($numberReCurrent * 100 / $numberReBefore).'%';?>"></div>
                                </div>
                            </div><!-- /.progress-group -->
                            <div class="progress-group">
                                <span class="progress-text">Sinh viên</span>
                                <span class="progress-number"><?php echo '<b>' . $numberEmpCurrent . '</b>/' . $numberEmpBefore;?></span>
                                <div class="progress sm">
                                    <div class="progress-bar progress-bar-red" style="width: <?php if($numberEmpBefore == 0) echo '100%'; else echo ($numberEmpCurrent * 100 / $numberEmpBefore).'%';?>"></div>
                                </div>
                            </div><!-- /.progress-group -->
                            <div class="progress-group">
                                <span class="progress-text">Công việc</span>
                                <span class="progress-number"><?php echo '<b>' . $numberJobCurrent . '</b>/' . $numberJobBefore;?></span>
                                <div class="progress sm">
                                    <div class="progress-bar progress-bar-green" style="width: <?php if($numberJobBefore == 0) echo '100%'; else echo ($numberJobCurrent * 100 / $numberJobBefore).'%';?>"></div>
                                </div>
                            </div><!-- /.progress-group -->
                            <div class="progress-group">
                                <span class="progress-text">Chọn việc</span>
                                <span class="progress-number"><?php echo '<b>' . $numberChoicesCurrent . '</b>/' . $numberChoicesBefore;?></span>
                                <div class="progress sm">
                                    <div class="progress-bar progress-bar-yellow" style="width: <?php if($numberChoicesBefore == 0) echo '100%'; else echo ($numberChoicesCurrent * 100 / $numberChoicesBefore).'%';?>"></div>
                                </div>
                            </div><!-- /.progress-group -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- ./box-body -->
                <div class="box-footer">
                    <div class="row">
                        <div class="col-sm-3 col-xs-6">
                            <div class="description-block border-right">
                                <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> <?php if($totalRecruitment == 0) echo '0%'; else echo ($numberReCurrent * 100 / $totalRecruitment).'%';?></span>
                                <h5 class="description-header"><?php echo $numberReCurrent;?></h5>
                                <span class="description-text">Nhà tuyển dụng</span>
                            </div><!-- /.description-block -->
                        </div><!-- /.col -->
                        <div class="col-sm-3 col-xs-6">
                            <div class="description-block border-right">
                                <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> <?php if($totalEmployee == 0) echo '0%'; else echo ($numberEmpCurrent * 100 / $totalEmployee).'%';?></span>
                                <h5 class="description-header" id="Total-price-order"><?php echo $numberEmpCurrent;?></h5>
                                <span class="description-text">Sinh viên</span>
                            </div><!-- /.description-block -->
                        </div><!-- /.col -->
                        <div class="col-sm-3 col-xs-6">
                            <div class="description-block border-right">
                                <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> <?php if($totalJob == 0) echo '0%'; else echo ($numberJobCurrent * 100 / $totalJob).'%';?></span>
                                <h5 class="description-header" id="number-order"><?php echo $numberJobCurrent;?></h5>
                                <span class="description-text">Công việc</span>
                            </div><!-- /.description-block -->
                        </div><!-- /.col -->
                        <div class="col-sm-3 col-xs-6">
                            <div class="description-block">
                                <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> <?php if($totalChoices == 0) echo '0%'; else echo ($numberChoicesCurrent * 100 / $totalChoices).'%';?></span>
                                <h5 class="description-header" id="price-order"><?php echo $numberChoicesCurrent;?></h5>
                                <span class="description-text">Chọn việc</span>
                            </div><!-- /.description-block -->
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.box-footer -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->

    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <div class="col-md-6">
            <!-- TABLE: LATEST ORDERS -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Sinh viên</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table no-margin">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên</th>
                                    <th>SDT</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày tạo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($employees as $item): ?>
                                    <tr>
                                        <td>
                                            <?php 
                                            echo $this->Html->link(
                                                $item['id'], 
                                                array(
                                                    'controller' => 'Customers',
                                                    'action' => 'edit',
                                                    'id' => $item['id']
                                                ));?>
                                        </td>
                                        <td><?php echo $item['full_name']; ?></td>
                                        <td><?php echo $item['mobile']; ?></td>
                                        <td align="center">
                                            <?php if ($item['status']): ?>
                                                <i class="fa fa-check-circle-o"></i>
                                            <?php else: ?>
                                                <i class="fa fa-power-off"></i>
                                            <?php endif; ?>
                                        </td>
                                        <td><div class="sparkbar" data-color="#00a65a" data-height="20"><?php echo $item['created']; ?></div></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div><!-- /.table-responsive -->
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                    <?php echo $this->Html->link(
                        'Thêm mới',
                        array(
                            'controller' => 'Customers',
                            'action' => 'add'
                        ),
                        array('class' => 'btn btn-sm btn-info btn-flat pull-left')
                    );?>
                    <?php echo $this->Html->link(
                        'Xem tất cả',
                        array(
                            'controller' => 'Customers',
                            'action' => 'index'
                        ),
                        array('class' => 'btn btn-sm btn-default btn-flat pull-right')
                    );?>
                </div><!-- /.box-footer -->
            </div><!-- /.box -->
        </div><!-- /.col -->
        <div class="col-md-6">
            <!-- TABLE: LATEST ORDERS -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Nhà tuyển dụng</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table no-margin">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên</th>
                                    <th>SDT</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày tạo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($recruitments as $item): ?>
                                    <tr>
                                        <td>
                                            <?php 
                                            echo $this->Html->link(
                                                $item['id'], 
                                                array(
                                                    'controller' => 'Customers',
                                                    'action' => 'edit',
                                                    'id' => $item['id']
                                                ));?>
                                        </td>
                                        <td><?php echo $item['full_name']; ?></td>
                                        <td><?php echo $item['mobile']; ?></td>
                                        <td align="center">
                                            <?php if ($item['status']): ?>
                                                <i class="fa fa-check-circle-o"></i>
                                            <?php else: ?>
                                                <i class="fa fa-power-off"></i>
                                            <?php endif; ?>
                                        </td>
                                        <td><div class="sparkbar" data-color="#00a65a" data-height="20"><?php echo $item['created']; ?></div></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div><!-- /.table-responsive -->
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                    <?php echo $this->Html->link(
                        'Thêm mới',
                        array(
                            'controller' => 'Customers',
                            'action' => 'add'
                        ),
                        array('class' => 'btn btn-sm btn-info btn-flat pull-left')
                    );?>
                    <?php echo $this->Html->link(
                        'Xem tất cả',
                        array(
                            'controller' => 'Customers',
                            'action' => 'index'
                        ),
                        array('class' => 'btn btn-sm btn-default btn-flat pull-right')
                    );?>
                </div><!-- /.box-footer -->
            </div><!-- /.box -->
        </div><!-- /.col -->

        <div class="col-md-12">
            <!-- PRODUCT LIST -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Công việc</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <ul class="products-list product-list-in-box">
                        <?php foreach ($jobs as $item): ?>
                            <li class="item">
                                <div class="product-img">
                                    <img src="css/dist/img/default-50x50.gif" alt="<?php echo $item['title']; ?>">
                                </div>
                                <div class="product-info">
                                    <a href="javascript::;" class="product-title">
                                        <?php echo $item['title']; ?>
                                        <span class="label label-warning pull-right">
                                            <?php 
                                            if($item['unit'] == 1) 
                                                echo $item['salary'] . ' / Giờ'; 
                                            elseif($item['unit'] == 2) 
                                                echo $item['salary'] . ' / Ngày'; 
                                            else
                                                echo $item['salary'] . ' / Tháng'; 
                                            ?>
                                        </span>
                                    </a>
                                    <span class="product-description">
                                        <?php echo mb_substr($item['description'], 0, 50, 'UTF-8') . '...'; ?>
                                    </span>
                                </div>
                            </li><!-- /.item -->
                        <?php endforeach; ?>
                    </ul>
                </div><!-- /.box-body -->
                <div class="box-footer text-center">
                    <?php echo $this->Html->link(
                        'Xem tất cả',
                        array(
                            'controller' => 'Jobs',
                            'action' => 'index'
                        ),
                        array('class' => 'uppercase btn btn-sm btn-default btn-flat')
                    );?>
                </div><!-- /.box-footer -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->
<!-- ChartJS 1.0.1 -->
<?php echo $this->Html->script('Admin.Chart.min.js');?>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<?php echo $this->Html->script('Admin.dashboard2.js');?>