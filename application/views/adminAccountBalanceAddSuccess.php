<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 2/28/15
 * Time: 11:58 PM
 */
?>

<div class="span9">

    <h1 class="page-title">
        <i class="icon-star"></i>
        用户帐户管理
    </h1>


    <div class="widget">

        <div class="widget-header">
            <i class="icon-check"></i>
            <h3 style="color: green">充值成功</h3>
        </div> <!-- /widget-header -->

        <div class="widget-content">
            <form id="edit-profile" class="form-horizontal" />
            <fieldset>

                <br>

                <div class="control-group">
                    <label class="control-label">帐户名称：</label>
                    <div class="controls">
                        <input type="text" class="input-large" id="customerId" readonly="true" value="<?php echo $customer[0]->customer_id?>" />
                    </div> <!-- /controls -->
                </div> <!-- /control-group -->


                <div class="control-group">
                    <label class="control-label">客户姓名：</label>
                    <div class="controls">
                        <input type="text" class="input-medium" id="name" readonly="true" value="<?php echo $customer[0]->name?>" />
                    </div> <!-- /controls -->
                </div> <!-- /control-group -->


                <div class="control-group">
                    <label class="control-label">用户余额：</label>
                    <div class="controls">
                        <input type="text" class="input-medium" id="balance" readonly="true" value="￥ <?php echo $customer[0]->balance?>" />
                    </div> <!-- /controls -->
                </div> <!-- /control-group -->

                <br />

            </fieldset>

            </form>
        </div> <!-- /widget-content -->

    </div> <!-- /widget -->

</div> <!-- /container -->

</div> <!-- /content -->