<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 3/3/15
 * Time: 10:13 PM
 */
?>


<div class="span9">

    <h1 class="page-title">
        <i class="icon-user"></i>
        帐户信息
    </h1>


    <div class="widget">

        <div class="widget-header">
            <i class="icon-cogs"></i>
            <h3>管理员信息</h3>
        </div> <!-- /widget-header -->

        <div class="widget-content">
            <form id="edit-profile" class="form-horizontal" />
            <fieldset>

                <br>

                <div class="control-group">
                    <label class="control-label">帐户名称：</label>
                    <div class="controls">
                        <input type="text" class="input-medium" id="adminId" readonly="true" value="<?php echo $admin[0]->admin_id?>" />
                    </div> <!-- /controls -->
                </div> <!-- /control-group -->


                <div class="control-group">
                    <label class="control-label">管理员姓名：</label>
                    <div class="controls">
                        <input type="text" class="input-medium" id="name" readonly="true" value="<?php echo $admin[0]->name?>" />
                    </div> <!-- /controls -->
                </div> <!-- /control-group -->


                <div class="control-group">
                    <label class="control-label">权限等级：</label>
                    <div class="controls">
                        <input type="text" class="input-medium" id="previledge" readonly="true" value="LEVEL<?php echo $admin[0]->privilege?>" />
                    </div> <!-- /controls -->
                </div> <!-- /control-group -->

                <br />

            </fieldset>


            </form>
        </div> <!-- /widget-content -->

    </div> <!-- /widget -->

</div> <!-- /container -->

</div> <!-- /content -->