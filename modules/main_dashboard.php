<?php
    include 'session.php';
    include '../includes/header.php';
?>





    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="pull-right">
                    <?php echo"HI ".$userid ?>
                    <a class="btn btn-danger" href="logout">LOGOUT</a>
                </div>
                <br/><br/><br/><br/>

                <div class="content-body">
                <div id="crypto-stats-3" class="row">
                    <!-- <div class="col-xl-4 col-12">
                        <div class="card crypto-card-3 pull-up">
                            <div class="card-content">
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-2">
                                            <i class="cc BTC warning font-large-2" title="BTC"></i>
                                        </div>
                                        <div class="col-5 pl-2">
                                            <h4>BTC</h4>
                                            <h6 class="text-muted">Bitcoin</h6>
                                        </div>
                                        <div class="col-5 text-right">
                                            <h4>$9,980</h4>
                                            <h6 class="success darken-4">31% <i class="la la-arrow-up"></i></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div><canvas id="btc-chartjs" class="height-75 chartjs-render-monitor" style="display: block; width: 322px; height: 75px;" width="322" height="75"></canvas></div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="col-xl-4 col-12">
                        <div class="card crypto-card-3 pull-up">
                            <div class="card-content">
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-2">
                                            <i class="cc ETH blue-grey lighten-1 font-large-2" title="ETH"></i>
                                        </div>
                                        <div class="col-5 pl-2">
                                            <h4>ETH</h4>
                                            <h6 class="text-muted">Ethereum</h6>
                                        </div>
                                        <div class="col-5 text-right">
                                            <h4>$944</h4>
                                            <h6 class="success darken-4">12% <i class="la la-arrow-up"></i></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div><canvas id="eth-chartjs" class="height-75 chartjs-render-monitor" width="322" height="75" style="display: block; width: 322px; height: 75px;"></canvas></div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="col-xl-3 col-3">
                        <div class="card crypto-card-3 pull-up">
                            <div class="card-content">
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-2">
                                            <i class="cc XRP info font-large-2" title="XRP"></i>
                                        </div>
                                        <div class="col-5 pl-2">
                                            <h4>TOTAL POINTS</h4>
                                            <h6 class="text-muted">Balance</h6>
                                        </div>
                                        <div class="col-5 text-right">
                                            <h4>$1.2</h4>
                                            <h6 class="danger">20% <i class="la la-arrow-down"></i></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div><canvas id="xrp-chartjs" class="height-75 chartjs-render-monitor" width="322" height="75" style="display: block; width: 322px; height: 75px;"></canvas></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-9 col-xl-9">
                        <div id="accordionCrypto" role="tablist" aria-multiselectable="true">
                            <div class="card accordion collapse-icon accordion-icon-rotate">

                                <a id="heading31" data-toggle="collapse" href="#accordionBTC" aria-expanded="true" aria-controls="accordionBTC" class="card-header bg-info p-1 bg-lighten-1">
                                    <div class="card-title lead white">RECENT TRANSACTION HISTORY</div>
                                </a>
                                <div id="accordionBTC" role="tabpanel" data-parent="#accordionCrypto" aria-labelledby="heading31" class=" collapse show" aria-expanded="true">
                                    <div class="card-content">
                                        <div class="card-body p-0">
                                            <div class="media-list list-group">
                                                <div class="list-group-item list-group-item-action media p-1">
                                                    <a class="media-link" href="#">
                                                        <div class="media-left">
                                                            <p class="text-bold-600 m-0">BTC/USD</p>
                                                            <p class="font-small-2 text-muted m-0">24h Change</p>
                                                            <p class="font-small-2 text-muted m-0">24h Volume</p>
                                                        </div>
                                                        <div class="media-body text-right">
                                                            <p class="text-bold-600 m-0">11916.9</p>
                                                            <p class="font-small-2 text-muted m-0 success">283.1 USD (+2.33%)</p>
                                                            <p class="font-small-2 text-muted m-0 text-bold-600">1029.1906 BTC</p>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="list-group-item list-group-item-action media p-1 bg-info bg-lighten-5">
                                                    <a class="media-link" href="#">
                                                        <div class="media-left">
                                                            <p class="text-bold-600 m-0">BTC/EUR</p>
                                                            <p class="font-small-2 text-muted m-0">24h Change</p>
                                                            <p class="font-small-2 text-muted m-0">24h Volume</p>
                                                        </div>
                                                        <div class="media-body text-right">
                                                            <p class="text-bold-600 m-0">9213.3</p>
                                                            <p class="font-small-2 text-muted m-0 success">56.1 EUR (+5.52%)</p>
                                                            <p class="font-small-2 text-muted m-0 text-bold-600">560.1906 BTC</p>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="list-group-item list-group-item-action media p-1 border-bottom-0">
                                                    <a class="media-link" href="#">
                                                        <div class="media-left">
                                                            <p class="text-bold-600 m-0">BTC/GBP</p>
                                                            <p class="font-small-2 text-muted m-0">24h Change</p>
                                                            <p class="font-small-2 text-muted m-0">24h Volume</p>
                                                        </div>
                                                        <div class="media-body text-right">
                                                            <p class="text-bold-600 m-0">8015.1</p>
                                                            <p class="font-small-2 text-muted m-0 danger">-183.1 USD (-1.33%)</p>
                                                            <p class="font-small-2 text-muted m-0 text-bold-600">320.1906 BTC</p>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <a id="heading32" class="card-header bg-info p-1 bg-lighten-1 my-1" data-toggle="collapse" href="#accordionETH" aria-expanded="false" aria-controls="accordionETH">
                                    <div class="card-title lead white collapsed">ETH</div>
                                </a>
                                <div id="accordionETH" role="tabpanel" data-parent="#accordionCrypto" aria-labelledby="heading32" class=" collapse" aria-expanded="false">
                                    <div class="card-content">
                                        <div class="card-body p-0">
                                            <div class="media-list list-group">
                                                <div class="list-group-item list-group-item-action media p-1">
                                                    <a class="media-link" href="#">
                                                        <div class="media-left">
                                                            <p class="text-bold-600 m-0">ETH/USD</p>
                                                            <p class="font-small-2 text-muted m-0">24h Change</p>
                                                            <p class="font-small-2 text-muted m-0">24h Volume</p>
                                                        </div>
                                                        <div class="media-body text-right">
                                                            <p class="text-bold-600 m-0">11916.9</p>
                                                            <p class="font-small-2 text-muted m-0 success">283.1 USD (+2.33%)</p>
                                                            <p class="font-small-2 text-muted m-0 text-bold-600">1029.1906 ETH</p>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="list-group-item list-group-item-action media p-1">
                                                    <a class="media-link" href="#">
                                                        <div class="media-left">
                                                            <p class="text-bold-600 m-0">ETH/EUR</p>
                                                            <p class="font-small-2 text-muted m-0">24h Change</p>
                                                            <p class="font-small-2 text-muted m-0">24h Volume</p>
                                                        </div>
                                                        <div class="media-body text-right">
                                                            <p class="text-bold-600 m-0">9213.3</p>
                                                            <p class="font-small-2 text-muted m-0 success">56.1 EUR (+5.52%)</p>
                                                            <p class="font-small-2 text-muted m-0 text-bold-600">560.1906 ETH</p>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="list-group-item list-group-item-action media p-1 border-bottom-0">
                                                    <a class="media-link" href="#">
                                                        <div class="media-left">
                                                            <p class="text-bold-600 m-0">ETH/GBP</p>
                                                            <p class="font-small-2 text-muted m-0">24h Change</p>
                                                            <p class="font-small-2 text-muted m-0">24h Volume</p>
                                                        </div>
                                                        <div class="media-body text-right">
                                                            <p class="text-bold-600 m-0">8015.1</p>
                                                            <p class="font-small-2 text-muted m-0 danger">-183.1 USD (-1.33%)</p>
                                                            <p class="font-small-2 text-muted m-0 text-bold-600">320.1906 ETH</p>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <a id="heading33" class="card-header bg-info p-1 bg-lighten-1" data-toggle="collapse" href="#accordionXRP" aria-expanded="false" aria-controls="accordionXRP">
                                    <div class="card-title lead white collapsed">XRP</div>
                                </a>
                                <div id="accordionXRP" role="tabpanel" data-parent="#accordionCrypto" aria-labelledby="heading33" class=" collapse" aria-expanded="false">
                                    <div class="card-content">
                                        <div class="card-body p-0">
                                            <div class="media-list list-group">
                                                <div class="list-group-item list-group-item-action media p-1">
                                                    <a class="media-link" href="#">
                                                        <div class="media-left">
                                                            <p class="text-bold-600 m-0">XRP/USD</p>
                                                            <p class="font-small-2 text-muted m-0">24h Change</p>
                                                            <p class="font-small-2 text-muted m-0">24h Volume</p>
                                                        </div>
                                                        <div class="media-body text-right">
                                                            <p class="text-bold-600 m-0">11916.9</p>
                                                            <p class="font-small-2 text-muted m-0 success">283.1 USD (+2.33%)</p>
                                                            <p class="font-small-2 text-muted m-0 text-bold-600">1029.1906 XRP</p>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="list-group-item list-group-item-action media p-1">
                                                    <a class="media-link" href="#">
                                                        <div class="media-left">
                                                            <p class="text-bold-600 m-0">XRP/EUR</p>
                                                            <p class="font-small-2 text-muted m-0">24h Change</p>
                                                            <p class="font-small-2 text-muted m-0">24h Volume</p>
                                                        </div>
                                                        <div class="media-body text-right">
                                                            <p class="text-bold-600 m-0">9213.3</p>
                                                            <p class="font-small-2 text-muted m-0 success">56.1 EUR (+5.52%)</p>
                                                            <p class="font-small-2 text-muted m-0 text-bold-600">560.1906 XRP</p>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="list-group-item list-group-item-action media p-1 border-bottom-0">
                                                    <a class="media-link" href="#">
                                                        <div class="media-left">
                                                            <p class="text-bold-600 m-0">XRP/GBP</p>
                                                            <p class="font-small-2 text-muted m-0">24h Change</p>
                                                            <p class="font-small-2 text-muted m-0">24h Volume</p>
                                                        </div>
                                                        <div class="media-body text-right">
                                                            <p class="text-bold-600 m-0">8015.1</p>
                                                            <p class="font-small-2 text-muted m-0 danger">-183.1 USD (-1.33%)</p>
                                                            <p class="font-small-2 text-muted m-0 text-bold-600">320.1906 XRP</p>
                                                        </div>
                                                    </a>
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



                <!-- <h1 class="text-center">Choose Type</h1> -->
                <!-- <table class="table text-center">
                    <thead>
                        <tr>
                            <th scope="col">
                                <div class="card card-choice"  data-id="1">
                                    <img class="card-img-top" src="../img/resources/type_alu.jpg" alt="Image Aluminum" style="width:100%;">
                                    <div class="card-body">
                                        <h5 class="card-title">Aluminum</h5>
                                        <p class="card-text"></p>
                                    </div>
                                </div>
                            </th>
                            <th scope="col">
                                <div class="card card-choice" data-id="2">
                                    <img class="card-img-top" src="../img/resources/type_bottle.jpg" alt="Image Plastic Bottle" style="width:100%;">
                                    <div class="card-body">
                                        <h5 class="card-title">Plastic Bottle</h5>
                                        <p class="card-text"></p>
                                    </div>
                                </div>
                            </th>
                            <th scope="col">
                                <div class="card card-choice" data-id="3">
                                    <img class="card-img-top" src="../img/resources/type_paper.png" alt="Image Paper" style="width:100%;">
                                    <div class="card-body">
                                        <h5 class="card-title">Paper</h5>
                                        <p class="card-text"></p>
                                    </div>
                                </div>
                            </th>
                        </tr>
                    </thead>
                </table> -->
            </div>
    </div>

    <div class="modal fade text-left mdl_add" id="mdl_add" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Alert !!!</h4>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button> -->
                </div>
                    <div class="modal-body">
                        <h1 class="text-center"><div id="modaltxt" style="font-size:450%"></h1>
                        <!-- <h1 class="text-center"><div id="modaltxt"></h1> -->
                    </div>
                <div class="modal-footer">
                    <div id="yno">
                        <button type="button" id="ans_yes" class="btn btn-outline-success">Yes</button>
                        <button type="button" id="ans_no" class="btn btn-outline-danger">No</button>
                    </div>
                    <div id="yclose" class="d-none">
                        <button type="button" id="ans_yes" class="btn btn-outline-danger"  data-dismiss="modal">Close</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <script src="../app-assets/vendors/js/vendors.min.js"></script>
    <script src="../app-assets/js/core/libraries/jquery_ui/jquery-ui.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script> -->
  
    <script>
        $('#mdl_add').modal("show");
        $('#modaltxt').html("Is This a Paper?");
        
        $('#ans_yes').click(function(){
            $('#modaltxt').html("Please Use Entrance 2");
            $('#yno').addClass("d-none");
            $('#yclose').removeClass('d-none');
            checkif_exsitGbg();
        });

        $('#ans_no').click(function(){
            $('#modaltxt').html("Please Use Entrance 1");
            $('#yno').addClass("d-none");
            $('#yclose').removeClass('d-none');
            checkif_exsitGbg();
        });

        // $(".card-choice").click(function(){
        //     let c = $(this).data("id");
        //     $('#modaltxt').html("");
 
        //     if(c != 3 ) {
        //         $('#modaltxt').html("Please Use Entrance 1");
        //     }else{
        //         $('#modaltxt').html("Please Use Entrance 2");
        //     }
        // })



        function checkif_exsitGbg(){
            setTimeout(function(){ 
            $('#modaltxt').html("Please Wait ...");

                setTimeout(function(){ 
                    $('#modaltxt').html("Please Wait For Your Receipt.");

                        setTimeout(function(){ 
                            $('#modaltxt').html("Thanks for saving the Environment.");

                            setTimeout(function(){ 
                                window.location.href = "logout.php";
                                    
                            }, 2000);
                                
                        }, 5000);
                        
                }, 5000);

             }, 3000);
        }
   </script>

</body>
</html>
