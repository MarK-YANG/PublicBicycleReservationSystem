<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 3/3/15
 * Time: 8:35 PM
 */
?>

<script src="assets/ajax/adminHistoricalOrder.js"></script>

<div class="span9">

    <h1 class="page-title">
        <i class="icon-bookmark"></i>
        全部订单
    </h1>

    <div class="widget">

        <div class="widget-header">
            <h3>全部订单</h3>
        </div>
        <!-- /widget-header -->

        <div class="widget-content">

            <div class="tabbable">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#1" data-toggle="tab">自行车预约订单</a>
                    </li>
                    <li><a href="#2" data-toggle="tab">停车位预约订单</a></li>
                    <li><a href="#3" data-toggle="tab">租车订单</a></li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="1">
                        <h3>输入自行车预约订单的关键字...</h3>

                        <form class="faq-search">
                            <input type="text" name="search" placeholder="Search By Keyword" id="txt1"
                                   onkeyup="showHint1(this.value)">
                        </form>
                        <span id="txtHint1">
                    </div>

                    <div class="tab-pane" id="2">
                        <h3>输入停车位预约订单的关键字...</h3>

                        <form class="faq-search">
                            <input type="text" name="search" placeholder="Search By Keyword" id="txt2"
                                   onkeyup="showHint2(this.value)">
                        </form>
                        <span id="txtHint2">
                    </div>

                    <div class="tab-pane" id="3">
                        <h3>输入租车订单的关键字...</h3>

                        <form class="faq-search">
                            <input type="text" name="search" placeholder="Search By Keyword" id="txt3"
                                   onkeyup="showHint3(this.value)">
                        </form>
                        <span id="txtHint3">
                    </div>

                </div>

            </div>
        </div>


    </div>
    <!-- /widget -->


</div> <!-- /container -->

</div> <!-- /content -->

