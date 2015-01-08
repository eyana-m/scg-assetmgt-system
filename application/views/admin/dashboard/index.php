<?php echo $roces_access_point_active_count; ?>


<div class="container">
  <div class="row dashboard-row">
    <h4 class="exo-font"><center><b>Current Inventory Count</b></center></h4>
    <div class="container" style="background-color: #cccccb; margin-top: 1em; padding-bottom:15px; padding-top:20px;">
      <div class="col-md-3">
        <table class="table table-striped table-bordered" style="margin-bottom:0px;">
          <thead>
            <th>Asset</th>
            <th>Total Number</th>
          </thead>
          <tbody class="font-eleven">
            <tr>
              <td>Access Point</td>
              <td><?php echo $all_access_point ?></td>
            </tr>
            <tr>
              <td>Camera</td>
              <td><?php echo $all_camera ?></td>
            </tr>
            <tr>
              <td>Desktop</td>
              <td><?php echo $all_desktop ?></td>
            </tr>
            <tr>
              <td>Digital Camera</td>
              <td><?php echo $all_digital_camera ?></td>
            </tr>
            <tr>
              <td>External HDD</td>
              <td><?php echo $all_external_hard_disk ?></td>
            </tr>
            <tr>
              <td>Laptop</td>
              <td><?php echo $all_laptop ?></td>
            </tr>
            <tr>
              <td>Monitor</td>
              <td><?php echo $all_monitor ?></td>
            </tr>
            <tr>
              <td>Mouse</td>
              <td><?php echo $all_mouse ?></td>
            </tr>
            <tr>
              <td>Printer</td>
              <td><?php echo $all_printer ?></td>
            </tr>
            <tr>
              <td>Projector</td>
              <td><?php echo $all_projector ?></td>
            </tr>
            <tr>
              <td>Server</td>
              <td><?php echo $all_server ?></td>
            </tr>
            <tr>
              <td>Switch</td>
              <td><?php echo $all_switch?></td>
            </tr>
            <tr>
              <td>TV</td>
              <td><?php echo $all_tv ?></td>
            </tr>
            <tr>
              <td>UPS</td>
              <td><?php echo $all_ups ?></td>
            </tr>
            <tr>
              <td>Video Conference</td>
              <td><?php echo $all_video_conference ?></td>
            </tr>
            <tr>
              <td><b>Grand Total</b></td>
              <td>100</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-md-9">
        <ul class="nav nav-tabs">
          <li class="nav active"><a class="tab-headers" id="PBI-tab"href="#PBI-1" data-toggle="tab" style="border-radius:0px;">PBI</a></li>
          <li class="nav nav-two"><a class="tab-headers" id="STAM-tab" href="#STAM-1" data-toggle="tab" style="border-radius:0px;">STAM</a></li>
          <li class="nav"><a class="tab-headers" id="ALL-tab" href="#ALL-1" data-toggle="tab" style="border-radius:0px;">ALL</a></li>
        </ul>
        <div class="tab-content" style="background-color:#cccccb;">
          <div class="tab-pane fade in active" id="PBI-1">
              <div class="padding-fifteen no-side-padding" style="background-color:#2980b9;">
                <div id="barchart-PBI-1" class="chart-class">
                </div>
              </div>
          </div>
          <div class="tab-pane fade in" id="STAM-1">
              <div class="padding-fifteen no-side-padding" style="background-color:#e74c3c;">
                <div id="barchart-STAM-1" class="chart-class">
                </div>
              </div>
          </div>
          <div class="tab-pane fade in" id="ALL-1">
              <div class="padding-fifteen no-side-padding" style="background-color:#8e44ad;">
                <div id="barchart-ALL-1" class="chart-class">
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>



  <div class="row dashboard-row" style="margin-top:10px;">
    <h4 class="exo-font"><center><b>Inventory Status</b></center></h4>
    <div class="container" style="background-color: #cccccb; margin-top: 1em; padding-bottom:15px; padding-top:20px">
      <div class="col-md-3">
        <table class="table table-striped table-bordered" style="margin-bottom:0px;">
          <thead>
            <th>Asset</th>
            <th>Total Number</th>
          </thead>
          <tbody class="font-eleven">
            <tr>
              <td>Active</td>
              <td>10</td>
            </tr>
            <tr>
              <td>Service unit</td>
              <td>10</td>
            </tr>
            <tr>
              <td>For Repair</td>
              <td>10</td>
            </tr>
            <tr>
              <td>Unknown</td>
              <td>10</td>
            </tr>
            <tr>
              <td><b>Grand Total</b></td>
              <td>10</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-md-9">
        <ul class="nav nav-tabs">
          <li class="nav active"><a class="tab-headers" id="PBI-tab"href="#PBI-2" data-toggle="tab" style="border-radius:0px;">PBI</a></li>
          <li class="nav"><a class="tab-headers" id="STAM-tab" href="#STAM-2" data-toggle="tab" style="border-radius:0px;">STAM</a></li>
          <li class="nav"><a class="tab-headers" id="ALL-tab" href="#ALL-2" data-toggle="tab" style="border-radius:0px;">All</a></li>
        </ul>
        <div class="tab-content" style="background-color:#cccccb;">
          <div class="tab-pane fade in active" id="PBI-2">
              <div class="padding-fifteen no-side-padding" style="background-color:#2980b9;">
                <div id="barchart-PBI-2" class="chart-class">
                </div>
              </div>
          </div>
          <div class="tab-pane fade in" id="STAM-2">
              <div class="padding-fifteen no-side-padding" style="background-color:#e74c3c;">
                <div id="barchart-STAM-2" class="chart-class">
                </div>
              </div>
          </div>
          <div class="tab-pane fade in" id="ALL-2">
              <div class="padding-fifteen no-side-padding" style="background-color:#8e44ad;">
                <div id="barchart-ALL-2" class="chart-class">
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$(function () {
    $('#barchart-PBI-1').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Philippine Batteries, Inc.'
        },
        xAxis: {
            categories: ['Access Point', 'Camera', 'Desktop', 'Digital Camera', 'External Hard Disk', 'Laptop', 'Monitor', 'Mouse', 'Printer', 'Projector', 'Server', 'Switch', 'TV', 'UPS', 'Video Conference']
        },
        yAxis: {
            title: {
                text: 'Quantity'
            }
        },
        series: [{
            name: 'Active',
            data: [<?php echo $roces_access_point_active ?>, <?php echo $roces_camera_active ?>, <?php echo $roces_desktop_active ?>, <?php echo $roces_digital_camera_active ?>, <?php echo $roces_external_hard_disk_active ?>, <?php echo $roces_laptop_active ?>, <?php echo $roces_monitor_active ?>, <?php echo $roces_mouse_active ?>, <?php echo $roces_printer_active ?>, <?php echo $roces_projector_active ?>, <?php echo $roces_server_active ?>, <?php echo $roces_switch_active?>, <?php echo $roces_tv_active ?>, <?php echo $roces_ups_active ?>, <?php echo $roces_video_conference_active ?>]
        }, {
            name: 'Inactive',
            data: [<?php echo $roces_access_point_inactive ?>, <?php echo $roces_camera_inactive ?>, <?php echo $roces_desktop_inactive ?>, <?php echo $roces_digital_camera_inactive ?>, <?php echo $roces_external_hard_disk_inactive ?>, <?php echo $roces_laptop_inactive ?>, <?php echo $roces_monitor_inactive ?>, <?php echo $roces_mouse_inactive ?>, <?php echo $roces_printer_inactive ?>, <?php echo $roces_projector_inactive ?>, <?php echo $roces_server_inactive ?>, <?php echo $roces_switch_inactive?>, <?php echo $roces_tv_inactive ?>, <?php echo $roces_ups_inactive ?>, <?php echo $roces_video_conference_inactive ?>]
        }]
    });
});

$(function () {
    $('#barchart-STAM-1').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'STAM'
        },
        xAxis: {
            categories: ['Access Point', 'Camera', 'Desktop', 'Digital Camera', 'External Hard Disk', 'Laptop', 'Monitor', 'Mouse', 'Printer', 'Projector', 'Server', 'Switch', 'TV', 'UPS', 'Video Conference']
        },
        yAxis: {
            title: {
                text: 'Quantity'
            }
        },
        series: [{
            name: 'Active',
            data: [<?php echo $stam_access_point_active ?>, <?php echo $stam_camera_active ?>, <?php echo $stam_desktop_active ?>, <?php echo $stam_digital_camera_active ?>, <?php echo $stam_external_hard_disk_active ?>, <?php echo $stam_laptop_active ?>, <?php echo $stam_monitor_active ?>, <?php echo $stam_mouse_active ?>, <?php echo $stam_printer_active ?>, <?php echo $stam_projector_active ?>, <?php echo $stam_server_active ?>, <?php echo $stam_switch_active?>, <?php echo $stam_tv_active ?>, <?php echo $stam_ups_active ?>, <?php echo $stam_video_conference_active ?>]
        }, {
            name: 'Inactive',
            data: [<?php echo $stam_access_point_inactive ?>, <?php echo $stam_camera_inactive ?>, <?php echo $stam_desktop_inactive ?>, <?php echo $stam_digital_camera_inactive ?>, <?php echo $stam_external_hard_disk_inactive ?>, <?php echo $stam_laptop_inactive ?>, <?php echo $stam_monitor_inactive ?>, <?php echo $stam_mouse_inactive ?>, <?php echo $stam_printer_inactive ?>, <?php echo $stam_projector_inactive ?>, <?php echo $stam_server_inactive ?>, <?php echo $stam_switch_inactive?>, <?php echo $stam_tv_inactive ?>, <?php echo $stam_ups_inactive ?>, <?php echo $stam_video_conference_inactive ?>]
        }]
    });
});

$(function () {
    $('#barchart-ALL-1').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'ALL'
        },
        xAxis: {
            categories: ['Access Point', 'Camera', 'Desktop', 'Digital Camera', 'External Hard Disk', 'Laptop', 'Monitor', 'Mouse', 'Printer', 'Projector', 'Server', 'Switch', 'TV', 'UPS', 'Video Conference']
        },
        yAxis: {
            title: {
                text: 'Quantity'
            }
        },
        series: [{
            name: 'Active',
            data: [<?php echo $all_access_point_active ?>, <?php echo $all_camera_active ?>, <?php echo $all_desktop_active ?>, <?php echo $all_digital_camera_active ?>, <?php echo $all_external_hard_disk_active ?>, <?php echo $all_laptop_active ?>, <?php echo $all_monitor_active ?>, <?php echo $all_mouse_active ?>, <?php echo $all_printer_active ?>, <?php echo $all_projector_active ?>, <?php echo $all_server_active ?>, <?php echo $all_switch_active?>, <?php echo $all_tv_active ?>, <?php echo $all_ups_active ?>, <?php echo $all_video_conference_active ?>]
        }, {
            name: 'Inactive',
            data: [<?php echo $all_access_point_inactive ?>, <?php echo $all_camera_inactive ?>, <?php echo $all_desktop_inactive ?>, <?php echo $all_digital_camera_inactive ?>, <?php echo $all_external_hard_disk_inactive ?>, <?php echo $all_laptop_inactive ?>, <?php echo $all_monitor_inactive ?>, <?php echo $all_mouse_inactive ?>, <?php echo $all_printer_inactive ?>, <?php echo $all_projector_inactive ?>, <?php echo $all_server_inactive ?>, <?php echo $all_switch_inactive?>, <?php echo $all_tv_inactive ?>, <?php echo $all_ups_inactive ?>, <?php echo $all_video_conference_inactive ?>]
        }]
    });
});
</script>

  <script type="text/javascript" src="<?php echo res_url('admin/js/highcharts.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo res_url('admin/js/main.js'); ?>"></script>
