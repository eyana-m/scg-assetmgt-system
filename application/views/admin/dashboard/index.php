

<?php echo $temp; ?>

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
              <td>Camera</td>
              <td>10</td>
            </tr>
            <tr>
              <td>Desktop</td>
              <td>10</td>
            </tr>
            <tr>
              <td>Digital Camera</td>
              <td>10</td>
            </tr>
            <tr>
              <td>External HDD</td>
              <td>10</td>
            </tr>
            <tr>
              <td>Laptop</td>
              <td>10</td>
            </tr>
            <tr>
              <td>Monitor</td>
              <td>10</td>
            </tr>
            <tr>
              <td>Mouse</td>
              <td>10</td>
            </tr>
            <tr>
              <td>Printer</td>
              <td>10</td>
            </tr>
            <tr>
              <td>Projector</td>
              <td>10</td>
            </tr>
            <tr>
              <td>Server</td>
              <td>10</td>
            </tr>
            <tr>
              <td>Switch</td>
              <td>10</td>
            </tr>
            <tr>
              <td>TV</td>
              <td>10</td>
            </tr>
            <tr>
              <td>UPS</td>
              <td>10</td>
            </tr>
            <tr>
              <td>Video Conference</td>
              <td>10</td>
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

</body>
