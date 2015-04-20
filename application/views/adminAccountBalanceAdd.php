<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 2/28/15
 * Time: 11:42 PM
 */
?>

<div class="span9">

    <h1 class="page-title">
        <i class="icon-star"></i>
        用户帐户管理
    </h1>


    <div class="widget">

        <div class="widget-header">
            <i class="icon-cogs"></i>
            <h3>帐户充值</h3>
        </div> <!-- /widget-header -->

        <div class="widget-content">
            <form id="edit-profile" class="form-horizontal" action="index.php/adminAccountManage/add/<?php echo $customer[0]->customer_id?>" method="post"/>
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


                <div class="control-group">
                    <label class="control-label" for="account">充值金额：</label>
                    <div class="controls">
                        <input type="text" class="input-mini" id="account" name="account" value="<?php echo set_value('account');?>" />&emsp;元</input>
                        <p class="help-block" style="color: red"><?php echo validation_errors(' ',' ');?></p>
                    </div> <!-- /controls -->
                </div> <!-- /control-group -->

                <br />

            </fieldset>

            <div class="form-actions">
                <br>
                <button type="submit" class="btn btn-success">充值</button>
            </div>

            </form>
        </div> <!-- /widget-content -->

    </div> <!-- /widget -->

</div> <!-- /container -->

</div> <!-- /content -->