
<!-- Main body part  -->
<div id="main-content">
    <div class="container-fluid">
        <!-- Page header section  -->
        <div class="block-header">
            <div class="row clearfix mt-3">

                <div class="col-lg-10 col-md-12 col-sm-12">
                    <h1>Dashboard</h1>
                    
                </div>

            </div>

            <!-- <div class="row clearfix header mt-3">
                <div class="col-lg-10 col-md-12  col-sm-12">
                    <form action="<?= base_url('Dashboard') ?>" method='post' >
                        <div class="form-group row">
                            <div class="col-sm-6 col-md-6 col-lg-4">
                                <select class="form-control show-tick select2" name="id_periode">
                                    <?php foreach ($periode as $prd ) { ?>
                                        <?php if($this->session->userdata('id_periode') == $prd['id_periode']) { ?>
                                            <option value="<?= $prd['id_periode'] ?>"selected><?= $prd['nama_periode'] ?></option>
                                        <?php } else{ ?>
                                            <option value="<?= $prd['id_periode'] ?>"><?= $prd['nama_periode'] ?></option>
                                        <?php } ?>

                                    <?php }?>                                    
                                </select>
                            </div>
                            <div class="col-sm-2 col-md-2 col-lg-2">
                                <button class="btn btn-primary" style="border-radius: 8px;" type="submit">Tampilkan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div> -->
        </div>

        <div class="row clearfix">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg page_menu">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars text-muted"></i>
                    </button>

                </nav>

            </div>
            <div class="col-12">
                <div class="card theme-bg gradient">
                    <div class="body">
                        <div class="row">
                            <div class="col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="body">
                                        <div>Total Penerima Bantuan</div>
                                        <?php
                                        $jumlahprm = 0;
                                        foreach($penerima as $prm) {
                                            $jumlahprm ++;
                                        }

                                        ?>
                                        <div class="mt-3 h1"><?php echo $jumlahprm; ?></div>

                                    </div>

                                </div>
                            </div>


                            <div class="col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="body">
                                        <div>Total Kriteria</div>
                                        <?php
                                        $jumlahktr = 0;
                                        foreach($kriteria as $ktr) {
                                            $jumlahktr ++;
                                        }

                                        ?>
                                        <div class="mt-3 h1"><?php echo $jumlahktr; ?></div>

                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="body">
                                        <div>Total Periode</div>
                                        <?php
                                        $jumlahprd = 0;
                                        foreach($period as $prd) {
                                            $jumlahprd ++;
                                        }

                                        ?>
                                        <div class="mt-3 h1"><?php echo $jumlahprd; ?></div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="body">
                                        <div>Total Calon Anggota Graduasi</div>
                                        <?php
                                        $jumlahcl = 0;
                                        foreach($calon as $cl) {
                                            $jumlahcl ++;
                                        }

                                        ?>
                                        <div class="mt-3 h1"><?php echo $jumlahcl; ?></div>

                                    </div>
                                </div>
                            </div>
                        </div>         
                    </div>
                </div>
            </div>


            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="header">
                        <div class="text-center"><h2><strong>Grafik Hasil Rekomendasi Graduasi PKH</strong></h2></div>
                        <ul class="header-dropdown dropdown">
                            <li><a href="javascript:void(0);" class="full-screen"><i class="fa fa-expand"></i></a></li>
                        </ul>
                    </div>
                    <div class="col-lg-8 col-md-12 col-sm-12 mt-5 ml-5">
                        <!-- <label>Inputkan nilai filter hasil (%)<span class="text-danger">*</span></label> -->
                        <form action="<?= base_url('Dashboard/FilterHasil') ?>" method='post' >
                            <div class="form-group row">
                                <div class="col-sm-4">

                                    <input class="form-control" type="number" min="1" max="100" name="hasil" value="<?php echo $this->session->userdata('hasil') ?>" placeholder="Inputkan nilai filter hasil (%)"  required> 
                                </div>
                                <div class="col-sm-2">
                                    <button class="btn btn-success" style="border-radius: 8px;" type="submit">Tampilkan</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"></h6>
                        </div>
                        <div class="card-body">
                            <div class="chart-area">
                                <canvas id="Grafik"></canvas>
                            </div>
                            
                        </div>
                    </div> -->


                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">

                        <div class="card-body">
                            <div class="recent-report__chart">
                              <div id="grafik2"></div>
                          </div>
                      </div>
                  </div>
              </div>


          </div>
      </div>



  </div>

</div>

</div>
</div>

</div>
</div>

</body>
</html>
<?php 
$nama = '';
$jumlah = '';
foreach ($periodeGrafik as $pg) {
    $nama .= ' "'. $pg['nama_periode']. '",';
    $jumlah .=  $pg['jumlah']. ',';
}?>
<!-- <?php echo $jumlah ?> -->

<script src="<?php echo base_url() ?>assets/js/select2/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="<?php echo base_url() ?>assets/js/select2/select2.min.js" defer></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('.select2').select2();
});</script>
<!-- Page level plugins -->
<script src="<?php echo base_url() ?>assets/js/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?php echo base_url() ?>assets/js/chart.js/chart-area-demo.js"></script>
<script type="text/javascript">
    var ctx = document.getElementById("Grafik");
    var myLineChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: [<?php echo $nama ?>],
        datasets: [{
          label: "Jumlah Yang Direkomendasikan",
          lineTension: 0.3,
          backgroundColor: "rgba(78, 115, 223, 0.05)",
          borderColor: "rgba(78, 115, 223, 1)",
          pointRadius: 3,
          pointBackgroundColor: "rgba(78, 115, 223, 1)",
          pointBorderColor: "rgba(78, 115, 223, 1)",
          pointHoverRadius: 3,
          pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
          pointHoverBorderColor: "rgba(78, 115, 223, 1)",
          pointHitRadius: 10,
          pointBorderWidth: 2,
          data: [<?php echo $jumlah ?>],
      }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
    }
},
scales: {
  xAxes: [{
    time: {
      unit: 'date'
  },
  gridLines: {
      display: false,
      drawBorder: false
  },
  ticks: {
      maxTicksLimit: 7
  }
}],

yAxes: [{
    ticks: {
      maxTicksLimit: 5,
      padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return '' + number_format(value);
        }
    },
    gridLines: {
      color: "rgb(234, 236, 244)",
      zeroLineColor: "rgb(234, 236, 244)",
      drawBorder: false,
      borderDash: [2],
      zeroLineBorderDash: [2]
  }
}],
},

legend: {
  display: false
},
tooltips: {
  backgroundColor: "rgb(255,255,255)",
  bodyFontColor: "#858796",
  titleMarginBottom: 10,
  titleFontColor: '#6e707e',
  titleFontSize: 14,
  borderColor: '#dddfeb',
  borderWidth: 1,
  xPadding: 15,
  yPadding: 15,
  displayColors: false,
  intersect: false,
  mode: 'index',
  caretPadding: 10,
  callbacks: {
    label: function(tooltipItem, chart) {
      var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
      return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
  }
}
}
}
});
</script>

<script type="text/javascript">
    'use strict';
    $(function () {
        grafik2();
    });
    function grafik2() {
        var options = {
            chart: {
                height: 250,
                type: 'line',
                shadow: {
                    enabled: false,
                    color: '#bbb',
                    top: 3,
                    left: 2,
                    blur: 3,
                    opacity: 1
                },
            },
            stroke: {
                width: 7,
                curve: 'smooth'
            },
            series: [{
                name: 'Jumlah yang direkomendasikan',
                data: [<?php echo $jumlah ?>]
            }],
            xaxis: {
                type: 'text',
                categories: [<?php echo $nama ?>],
                labels: {
                    style: {
                        colors: '#9aa0ac',
                    }
                }
            },

            fill: {
                type: 'gradient',
                gradient: {
                    shade: 'dark',
                    gradientToColors: ['#FDD835'],
                    shadeIntensity: 1,
                    type: 'horizontal',
                    opacityFrom: 1,
                    opacityTo: 1,
                    stops: [0, 100, 100, 100]
                },
            },
            markers: {
                size: 4,
                opacity: 0.9,
                colors: ["#FFA41B"],
                strokeColor: "#fff",
                strokeWidth: 2,

                hover: {
                    size: 7,
                }
            },
            yaxis: {
                min: 0,
                
                title: {
                    text: 'Jumlah yang direkomendasikan ',
                },
                labels: {
                    style: {
                        color: '#9aa0ac',
                    }
                }
            }
        }

        var chart = new ApexCharts(
            document.querySelector("#grafik2"),
            options
            );

        chart.render();
    }
</script>