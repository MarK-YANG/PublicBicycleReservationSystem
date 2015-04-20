<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 3/1/15
 * Time: 12:18 AM
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
            <h3 style="color: green">解冻成功</h3>
        </div> <!-- /widget-header -->

        <div class="widget-content">
            <form id="edit-profile" class="form-horizontal" />
            <fieldset>

                <br>

                <div class="control-group">
                    <label class="control-label">帐户名称：</label>
                    <div class="controls">
                        <input type="text" class="input-medium" id="customerId" readonly="true" value="<?php echo $customer[0]->customer_id?>" />
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

                <div class="control-group">
                    <label class="control-label">帐户状态：</label>
                    <div class="controls">
                        <input type="text" class="input-medium" id="state" readonly="true" value="正常" />
                    </div> <!-- /controls -->
                </div> <!-- /control-group -->

                <br />

            </fieldset>

            </form>
        </div> <!-- /widget-content -->

    </div> <!-- /widget -->

</div> <!-- /container -->

</div> <!-- /content -->