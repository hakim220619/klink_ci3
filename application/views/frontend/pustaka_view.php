<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- TITLE -->
    <title>Pustaka</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="shortcut icon" href="<?php echo base_url().'theme/images/favicon.png'?>"/>
	<meta name="description" content="Layanan KI">
    
	<!-- META FOR IOS & HANDHELD -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<meta name="HandheldFriendly" content="true" />
	<meta name="apple-mobile-web-app-capable" content="YES" />
	<!-- //META FOR IOS & HANDHELD -->

    <!-- GOOGLE FONT -->
    <link href='https://fonts.googleapis.com/css?family=Hind:400,300,500,600%7cMontserrat:400,700' rel='stylesheet' type='text/css'>
	

    <!-- CSS LIBRARY -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'theme/css/lib/font-awesome.min.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'theme/css/lib/font-lotusicon.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'theme/css/lib/bootstrap.min.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'theme/css/lib/owl.carousel.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'theme/css/lib/jquery-ui.min.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'theme/css/lib/magnific-popup.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'theme/css/lib/settings.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'theme/css/lib/bootstrap-select.min.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'theme/css/helper.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'theme/css/custom.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'theme/css/responsive.css'?>">

    <!-- MAIN STYLE -->
    <link rel="stylesheet" id="css-main" href="<?php echo base_url().'assets/css/codebase.min.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'theme/css/style.css'?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/js/plugins/datatables/dataTables.bootstrap4.min.css'?>">
   

</head>

<body>


    <!-- PRELOADER -->
    <div id="preloader">
        <span class="preloader-dot"></span>
    </div>
    <!-- END / PRELOADER -->

    <!-- PAGE WRAP -->
    <div id="page-wrap">

        <!-- HEADER -->
        <header id="header" class="header-v2">
            
            <!-- HEADER TOP -->
           <?php $this->load->view('frontend/headertop');?>
            <!-- END / HEADER TOP -->
            
            <!-- HEADER LOGO & MENU -->
          <?php $this->load->view('frontend/header');?>
			
			<!-- END / HEADER LOGO & MENU -->

        </header>
        <!-- END / HEADER -->
        
        <!--BANNER -->
        <section class="section-sub-banner bg-9">
            <div></div>
            <div class="sub-banner">
                <div class="container">
                    <div class="text text-center">
                    </div>
                </div>

            </div>

        </section>
        <!-- END BANNER -->

        <!-- CONTACT -->
        <main id="main-container">
                <!-- Page Content -->
                <div class="content">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-8">
                            <div class="block">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">Pustaka Digital</h3>
                                    <div class="block-options">
                                        
                                    </div>
                                </div>
                                <div class="block-content block-content-full">
                                    <table id="mytable" class="table table-striped table-responsive table-bordered nowrap" style="width:100%">
                                        <thead>
                                                <th style="width: 20px;text-align: center;">No</th>
                                                <th style="width: 120px;text-align: center;">Nama File</th>
                                                <th style="width: 25px;text-align: center;">Kategori</th>
                                                <th style="width: 270px;text-align: center;">Keterangan</th>
                                                <th style="width: 20px;text-align: center;">Download</th>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            $no=0;
                                            foreach ($pustaka->result() as $row) :
                                            $no++;
                                        ?>
                                            <tr>
                                               <td style="vertical-align: middle;text-align: center;"><?php echo $no;?></td>
                                                <!-- <td><img style="width:50px;height:40px;" src="<?php echo base_url().'assets/images/'.$row->pt_photo;?>"></td> -->
                                                <td style="vertical-align: middle;"><?php echo $row->pu_namafile;?></td>
                                                <td style="vertical-align: middle;"><?php echo $row->namastatus;?></td>
                                                <td style="vertical-align: middle;"><?php echo $row->pu_keterangan;?></td>
                                                <td style="width: 30px;text-align: center;vertical-align: middle;"><a href="<?php echo base_url().'assets/images/user/'.$row->pu_link;?>" class="badge badge-warning">Download</a></td>
                                            </tr>
                                        <?php endforeach;?>
                                        <tfoot>
                                            <tr>
                                                <th></th>
                                                <th>Nama File</th>
                                                <th>Kategori</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                        </tbody>
                                         
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                 
                </div>
                <!-- END Page Content -->
            </main>
        <!-- END / CONTACT -->

       
        
        <!-- FOOTER -->
        <?php $this->load->view('frontend/footer');?>
        <!-- END / FOOTER -->

    </div>
    <!-- END / PAGE WRAP -->

    <script type="text/javascript" src="<?php echo base_url().'theme/js/lib/jquery-1.11.0.min.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'theme/js/lib/jquery-ui.min.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'theme/js/lib/bootstrap.min.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'theme/js/lib/bootstrap-select.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'theme/js/lib/isotope.pkgd.min.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'theme/js/lib/jquery.themepunch.revolution.min.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'theme/js/lib/jquery.themepunch.tools.min.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'theme/js/lib/owl.carousel.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'theme/js/lib/jquery.appear.min.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'theme/js/lib/jquery.countTo.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'theme/js/lib/jquery.countdown.min.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'theme/js/lib/jquery.parallax-1.1.3.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'theme/js/lib/jquery.magnific-popup.min.js'?>"></script>

    <script type="text/javascript" src="<?php echo base_url().'theme/js/lib/jquery.form.min.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'theme/js/lib/jquery.validate.min.js'?>"></script>

    <script type="text/javascript" src="<?php echo base_url().'theme/js/scripts.js'?>"></script>

     <script src="<?php echo base_url().'assets/js/plugins/datatables/jquery.dataTables.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/plugins/datatables/dataTables.bootstrap4.min.js'?>"></script>


     <script type="text/javascript">
            
            $(document).ready(function() {
            $('#mytable').DataTable( {
      
    
    
                initComplete: function () {
                    //this.api().columns([1, 2]).every( function () {
                    this.api().columns([1,2]).every( function () {
                        var column = this;
                        var select = $('<select style="text-align-last: center;"><option value="">-----Semua-----</option></select>')
                            .appendTo( $(column.footer()).empty() )
                            // .appendTo( $(column.header()) )
                            .on( 'change', function () {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );
         
                                column
                                    .search( val ? '^'+val+'$' : '', true, false )
                                    .draw();
                            } );
                        
                        column.data().unique().sort().each( function ( d, j ) {
                            select.append( '<option value="'+d+'">'+d+'</option>' )
                        } );
                    } );
                }
            } );
        } );
        </script>
</body>
</html>