<?php echo $roces_camera_active_count ?>
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
              <td><?php echo $all_access_point + $all_camera + $all_desktop + $all_digital_camera + $all_external_hard_disk + $all_laptop + $all_monitor + $all_mouse + $all_printer + $all_projector + $all_server + $all_switch + $all_tv + $all_ups + $all_video_conference ?></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-md-9">
        <ul class="nav nav-tabs">
          <li class="nav active exo-font"><a class="tab-headers" id="ALL-tab" href="#ALL-1" data-toggle="tab" style="border-radius:0px;">ALL</a></li>
          <li class="nav nav-two exo-font"><a class="tab-headers" id="PBI-tab"href="#PBI-1" data-toggle="tab" style="border-radius:0px;">Roces</a></li>
          <li class="nav nav-two exo-font"><a class="tab-headers" id="STAM-tab" href="#STAM-1" data-toggle="tab" style="border-radius:0px;">Sta. Maria</a></li>
        </ul>
        <div class="tab-content" style="background-color:#cccccb;">
          <div class="tab-pane fade in active" id="ALL-1">
              <div class="padding-fifteen no-side-padding" style="background-color:#8e44ad;">
                <div id="barchart-ALL-1" class="chart-class">
                </div>
              </div>
          </div>
          <div class="tab-pane fade in" id="PBI-1">
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
              <td><?php echo $all_active; ?></td>
            </tr>
            <tr>
              <td>For Repair</td>
              <td><?php echo $all_for_repair; ?></td>
            </tr>
            <tr>
              <td>Stockroom</td>
              <td><?php echo $all_stockroom; ?></td>
            </tr>
            <tr>
              <td>Service Unit</td>
              <td><?php echo $all_service_unit; ?></td>
            </tr>
            <tr>
              <td>Disposed</td>
              <td><?php echo $all_disposed; ?></td>
            </tr>
            <tr>
              <td>For Disposal</td>
              <td><?php echo $all_for_disposal; ?></td>
            </tr>
            <tr>
              <td><b>Grand Total</b></td>
              <td><?php echo $all_active + $all_for_repair + $all_stockroom + $all_service_unit + $all_disposed + $all_for_disposal; ?></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-md-9">
        <ul class="nav nav-tabs">
          <li class="nav active exo-font"><a class="tab-headers" id="ALL-tab" href="#ALL-2" data-toggle="tab" style="border-radius:0px;">All</a></li>
          <li class="nav exo-font"><a class="tab-headers" id="PBI-tab"href="#PBI-2" data-toggle="tab" style="border-radius:0px;">Roces</a></li>
          <li class="nav exo-font"><a class="tab-headers" id="STAM-tab" href="#STAM-2" data-toggle="tab" style="border-radius:0px;">Sta. Maria</a></li>
        </ul>
        <div class="tab-content" style="background-color:#cccccb;">
          <div class="tab-pane fade in active" id="ALL-2">
              <div class="padding-fifteen no-side-padding" style="background-color:#8e44ad;">
                <div id="barchart-ALL-2" class="chart-class">
                </div>
              </div>
          </div>
          <div class="tab-pane fade in" id="PBI-2">
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
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

// Graph 1: PBI Roces
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

// Graph 1: PBI STAM
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

// Graph 3: All
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

// Graph 4: PBI Roces
$(function () {
    $('#barchart-PBI-2').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Inventory Status'
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
            data: [<?php echo $roces_access_point_active_count ?>, <?php echo $roces_camera_active_count ?>, <?php echo $roces_desktop_active_count ?>, <?php echo $roces_digital_camera_active_count ?>, <?php echo $roces_external_hard_disk_active_count ?>, <?php echo $roces_laptop_active_count ?>, <?php echo $roces_monitor_active_count ?>, <?php echo $roces_mouse_active_count ?>,<?php echo $roces_printer_active_count ?>, <?php echo $roces_projector_active_count ?>, <?php echo $roces_server_active_count ?>, <?php echo $roces_switch_active_count ?>, <?php echo $roces_tv_active_count ?>, <?php echo $roces_ups_active_count ?>, <?php echo $roces_video_conference_active_count ?>]
        }, {
            name: 'For Repair',
            data: [<?php echo $roces_access_point_for_repair_count ?>, <?php echo $roces_camera_for_repair_count ?>, <?php echo $roces_desktop_for_repair_count ?>, <?php echo $roces_digital_camera_for_repair_count ?>, <?php echo $roces_external_hard_disk_for_repair_count ?>, <?php echo $roces_laptop_for_repair_count ?>, <?php echo $roces_monitor_for_repair_count ?>, <?php echo $roces_mouse_for_repair_count ?>,<?php echo $roces_printer_for_repair_count ?>, <?php echo $roces_projector_for_repair_count ?>, <?php echo $roces_server_for_repair_count ?>, <?php echo $roces_switch_for_repair_count ?>, <?php echo $roces_tv_for_repair_count ?>, <?php echo $roces_ups_for_repair_count ?>, <?php echo $roces_video_conference_for_repair_count ?>]
        }, {
            name: 'Stockroom',
            data: [<?php echo $roces_access_point_stockroom_count ?>, <?php echo $roces_camera_stockroom_count ?>, <?php echo $roces_desktop_stockroom_count ?>, <?php echo $roces_digital_camera_stockroom_count ?>, <?php echo $roces_external_hard_disk_stockroom_count ?>, <?php echo $roces_laptop_stockroom_count ?>, <?php echo $roces_monitor_stockroom_count ?>, <?php echo $roces_mouse_stockroom_count ?>,<?php echo $roces_printer_stockroom_count ?>, <?php echo $roces_projector_stockroom_count ?>, <?php echo $roces_server_stockroom_count ?>, <?php echo $roces_switch_stockroom_count ?>, <?php echo $roces_tv_stockroom_count ?>, <?php echo $roces_ups_stockroom_count ?>, <?php echo $roces_video_conference_stockroom_count ?>]
        }, {
            name: 'Service Unit',
            data: [<?php echo $roces_access_point_service_unit_count ?>, <?php echo $roces_camera_service_unit_count ?>, <?php echo $roces_desktop_service_unit_count ?>, <?php echo $roces_digital_camera_service_unit_count ?>, <?php echo $roces_external_hard_disk_service_unit_count ?>, <?php echo $roces_laptop_service_unit_count ?>, <?php echo $roces_monitor_service_unit_count ?>, <?php echo $roces_mouse_service_unit_count ?>,<?php echo $roces_printer_service_unit_count ?>, <?php echo $roces_projector_service_unit_count ?>, <?php echo $roces_server_service_unit_count ?>, <?php echo $roces_switch_service_unit_count ?>, <?php echo $roces_tv_service_unit_count ?>, <?php echo $roces_ups_service_unit_count ?>, <?php echo $roces_video_conference_service_unit_count ?>]
        }, {
            name: 'Disposed',
            data: [<?php echo $roces_access_point_disposed_count ?>, <?php echo $roces_camera_disposed_count ?>, <?php echo $roces_desktop_disposed_count ?>, <?php echo $roces_digital_camera_disposed_count ?>, <?php echo $roces_external_hard_disk_disposed_count ?>, <?php echo $roces_laptop_disposed_count ?>, <?php echo $roces_monitor_disposed_count ?>, <?php echo $roces_mouse_disposed_count ?>,<?php echo $roces_printer_disposed_count ?>, <?php echo $roces_projector_disposed_count ?>, <?php echo $roces_server_disposed_count ?>, <?php echo $roces_switch_disposed_count ?>, <?php echo $roces_tv_disposed_count ?>, <?php echo $roces_ups_disposed_count ?>, <?php echo $roces_video_conference_disposed_count ?>]
        }, {
            name: 'For Disposal',
            data: [<?php echo $roces_access_point_for_disposal_count ?>, <?php echo $roces_camera_for_disposal_count ?>, <?php echo $roces_desktop_for_disposal_count ?>, <?php echo $roces_digital_camera_for_disposal_count ?>, <?php echo $roces_external_hard_disk_for_disposal_count ?>, <?php echo $roces_laptop_for_disposal_count ?>, <?php echo $roces_monitor_for_disposal_count ?>, <?php echo $roces_mouse_for_disposal_count ?>,<?php echo $roces_printer_for_disposal_count ?>, <?php echo $roces_projector_for_disposal_count ?>, <?php echo $roces_server_for_disposal_count ?>, <?php echo $roces_switch_for_disposal_count ?>, <?php echo $roces_tv_for_disposal_count ?>, <?php echo $roces_ups_for_disposal_count ?>, <?php echo $roces_video_conference_for_disposal_count ?>]
        }]
    });
});

// Graph 5: PBI STAM
$(function () {
    $('#barchart-STAM-2').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Inventory Status'
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
            data: [<?php echo $stam_access_point_active_count ?>, <?php echo $stam_camera_active_count ?>, <?php echo $stam_desktop_active_count ?>, <?php echo $stam_digital_camera_active_count ?>, <?php echo $stam_external_hard_disk_active_count ?>, <?php echo $stam_laptop_active_count ?>, <?php echo $stam_monitor_active_count ?>, <?php echo $stam_mouse_active_count ?>,<?php echo $stam_printer_active_count ?>, <?php echo $stam_projector_active_count ?>, <?php echo $stam_server_active_count ?>, <?php echo $stam_switch_active_count ?>, <?php echo $stam_tv_active_count ?>, <?php echo $stam_ups_active_count ?>, <?php echo $stam_video_conference_active_count ?>]
        }, {
            name: 'For Repair',
            data: [<?php echo $stam_access_point_for_repair_count ?>, <?php echo $stam_camera_for_repair_count ?>, <?php echo $stam_desktop_for_repair_count ?>, <?php echo $stam_digital_camera_for_repair_count ?>, <?php echo $stam_external_hard_disk_for_repair_count ?>, <?php echo $stam_laptop_for_repair_count ?>, <?php echo $stam_monitor_for_repair_count ?>, <?php echo $stam_mouse_for_repair_count ?>,<?php echo $stam_printer_for_repair_count ?>, <?php echo $stam_projector_for_repair_count ?>, <?php echo $stam_server_for_repair_count ?>, <?php echo $stam_switch_for_repair_count ?>, <?php echo $stam_tv_for_repair_count ?>, <?php echo $stam_ups_for_repair_count ?>, <?php echo $stam_video_conference_for_repair_count ?>]
        }, {
            name: 'Stockroom',
            data: [<?php echo $stam_access_point_stockroom_count ?>, <?php echo $stam_camera_stockroom_count ?>, <?php echo $stam_desktop_stockroom_count ?>, <?php echo $stam_digital_camera_stockroom_count ?>, <?php echo $stam_external_hard_disk_stockroom_count ?>, <?php echo $stam_laptop_stockroom_count ?>, <?php echo $stam_monitor_stockroom_count ?>, <?php echo $stam_mouse_stockroom_count ?>,<?php echo $stam_printer_stockroom_count ?>, <?php echo $stam_projector_stockroom_count ?>, <?php echo $stam_server_stockroom_count ?>, <?php echo $stam_switch_stockroom_count ?>, <?php echo $stam_tv_stockroom_count ?>, <?php echo $stam_ups_stockroom_count ?>, <?php echo $stam_video_conference_stockroom_count ?>]
        }, {
            name: 'Service Unit',
            data: [<?php echo $stam_access_point_service_unit_count ?>, <?php echo $stam_camera_service_unit_count ?>, <?php echo $stam_desktop_service_unit_count ?>, <?php echo $stam_digital_camera_service_unit_count ?>, <?php echo $stam_external_hard_disk_service_unit_count ?>, <?php echo $stam_laptop_service_unit_count ?>, <?php echo $stam_monitor_service_unit_count ?>, <?php echo $stam_mouse_service_unit_count ?>,<?php echo $stam_printer_service_unit_count ?>, <?php echo $stam_projector_service_unit_count ?>, <?php echo $stam_server_service_unit_count ?>, <?php echo $stam_switch_service_unit_count ?>, <?php echo $stam_tv_service_unit_count ?>, <?php echo $stam_ups_service_unit_count ?>, <?php echo $stam_video_conference_service_unit_count ?>]
        }, {
            name: 'Disposed',
            data: [<?php echo $stam_access_point_disposed_count ?>, <?php echo $stam_camera_disposed_count ?>, <?php echo $stam_desktop_disposed_count ?>, <?php echo $stam_digital_camera_disposed_count ?>, <?php echo $stam_external_hard_disk_disposed_count ?>, <?php echo $stam_laptop_disposed_count ?>, <?php echo $stam_monitor_disposed_count ?>, <?php echo $stam_mouse_disposed_count ?>,<?php echo $stam_printer_disposed_count ?>, <?php echo $stam_projector_disposed_count ?>, <?php echo $stam_server_disposed_count ?>, <?php echo $stam_switch_disposed_count ?>, <?php echo $stam_tv_disposed_count ?>, <?php echo $stam_ups_disposed_count ?>, <?php echo $stam_video_conference_disposed_count ?>]
        }, {
            name: 'For Disposal',
            data: [<?php echo $stam_access_point_for_disposal_count ?>, <?php echo $stam_camera_for_disposal_count ?>, <?php echo $stam_desktop_for_disposal_count ?>, <?php echo $stam_digital_camera_for_disposal_count ?>, <?php echo $stam_external_hard_disk_for_disposal_count ?>, <?php echo $stam_laptop_for_disposal_count ?>, <?php echo $stam_monitor_for_disposal_count ?>, <?php echo $stam_mouse_for_disposal_count ?>,<?php echo $stam_printer_for_disposal_count ?>, <?php echo $stam_projector_for_disposal_count ?>, <?php echo $stam_server_for_disposal_count ?>, <?php echo $stam_switch_for_disposal_count ?>, <?php echo $stam_tv_for_disposal_count ?>, <?php echo $stam_ups_for_disposal_count ?>, <?php echo $stam_video_conference_for_disposal_count ?>]
        }]
    });
});

// Graph 6: All
$(function () {
    $('#barchart-ALL-2').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Inventory Status'
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
            data: [<?php echo $all_access_point_active_count ?>, <?php echo $all_camera_active_count ?>, <?php echo $all_desktop_active_count ?>, <?php echo $all_digital_camera_active_count ?>, <?php echo $all_external_hard_disk_active_count ?>, <?php echo $all_laptop_active_count ?>, <?php echo $all_monitor_active_count ?>, <?php echo $all_mouse_active_count ?>,<?php echo $all_printer_active_count ?>, <?php echo $all_projector_active_count ?>, <?php echo $all_server_active_count ?>, <?php echo $all_switch_active_count ?>, <?php echo $all_tv_active_count ?>, <?php echo $all_ups_active_count ?>, <?php echo $all_video_conference_active_count ?>]
        }, {
            name: 'For Repair',
            data: [<?php echo $all_access_point_for_repair_count ?>, <?php echo $all_camera_for_repair_count ?>, <?php echo $all_desktop_for_repair_count ?>, <?php echo $all_digital_camera_for_repair_count ?>, <?php echo $all_external_hard_disk_for_repair_count ?>, <?php echo $all_laptop_for_repair_count ?>, <?php echo $all_monitor_for_repair_count ?>, <?php echo $all_mouse_for_repair_count ?>,<?php echo $all_printer_for_repair_count ?>, <?php echo $all_projector_for_repair_count ?>, <?php echo $all_server_for_repair_count ?>, <?php echo $all_switch_for_repair_count ?>, <?php echo $all_tv_for_repair_count ?>, <?php echo $all_ups_for_repair_count ?>, <?php echo $all_video_conference_for_repair_count ?>]
        }, {
            name: 'Stockroom',
            data: [<?php echo $all_access_point_stockroom_count ?>, <?php echo $all_camera_stockroom_count ?>, <?php echo $all_desktop_stockroom_count ?>, <?php echo $all_digital_camera_stockroom_count ?>, <?php echo $all_external_hard_disk_stockroom_count ?>, <?php echo $all_laptop_stockroom_count ?>, <?php echo $all_monitor_stockroom_count ?>, <?php echo $all_mouse_stockroom_count ?>,<?php echo $all_printer_stockroom_count ?>, <?php echo $all_projector_stockroom_count ?>, <?php echo $all_server_stockroom_count ?>, <?php echo $all_switch_stockroom_count ?>, <?php echo $all_tv_stockroom_count ?>, <?php echo $all_ups_stockroom_count ?>, <?php echo $all_video_conference_stockroom_count ?>]
        }, {
            name: 'Service Unit',
            data: [<?php echo $all_access_point_service_unit_count ?>, <?php echo $all_camera_service_unit_count ?>, <?php echo $all_desktop_service_unit_count ?>, <?php echo $all_digital_camera_service_unit_count ?>, <?php echo $all_external_hard_disk_service_unit_count ?>, <?php echo $all_laptop_service_unit_count ?>, <?php echo $all_monitor_service_unit_count ?>, <?php echo $all_mouse_service_unit_count ?>,<?php echo $all_printer_service_unit_count ?>, <?php echo $all_projector_service_unit_count ?>, <?php echo $all_server_service_unit_count ?>, <?php echo $all_switch_service_unit_count ?>, <?php echo $all_tv_service_unit_count ?>, <?php echo $all_ups_service_unit_count ?>, <?php echo $all_video_conference_service_unit_count ?>]
        }, {
            name: 'Disposed',
            data: [<?php echo $all_access_point_disposed_count ?>, <?php echo $all_camera_disposed_count ?>, <?php echo $all_desktop_disposed_count ?>, <?php echo $all_digital_camera_disposed_count ?>, <?php echo $all_external_hard_disk_disposed_count ?>, <?php echo $all_laptop_disposed_count ?>, <?php echo $all_monitor_disposed_count ?>, <?php echo $all_mouse_disposed_count ?>,<?php echo $all_printer_disposed_count ?>, <?php echo $all_projector_disposed_count ?>, <?php echo $all_server_disposed_count ?>, <?php echo $all_switch_disposed_count ?>, <?php echo $all_tv_disposed_count ?>, <?php echo $all_ups_disposed_count ?>, <?php echo $all_video_conference_disposed_count ?>]
        }, {
            name: 'For Disposal',
            data: [<?php echo $all_access_point_for_disposal_count ?>, <?php echo $all_camera_for_disposal_count ?>, <?php echo $all_desktop_for_disposal_count ?>, <?php echo $all_digital_camera_for_disposal_count ?>, <?php echo $all_external_hard_disk_for_disposal_count ?>, <?php echo $all_laptop_for_disposal_count ?>, <?php echo $all_monitor_for_disposal_count ?>, <?php echo $all_mouse_for_disposal_count ?>,<?php echo $all_printer_for_disposal_count ?>, <?php echo $all_projector_for_disposal_count ?>, <?php echo $all_server_for_disposal_count ?>, <?php echo $all_switch_for_disposal_count ?>, <?php echo $all_tv_for_disposal_count ?>, <?php echo $all_ups_for_disposal_count ?>, <?php echo $all_video_conference_for_disposal_count ?>]
        }]
    });
});
</script>

  <script type="text/javascript" src="<?php echo res_url('admin/js/highcharts.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo res_url('admin/js/main.js'); ?>"></script>
