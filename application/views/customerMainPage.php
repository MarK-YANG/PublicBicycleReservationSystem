<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 2/13/15
 * Time: 3:30 PM
 */

?>

            <div class="span9">

                <h1 class="page-title">
                    <i class="icon-user"></i>
                    用户帐户
                </h1>

                <div class="row">

                    <div class="span9">

                        <div class="widget">

                            <div class="widget-header">
                                <h3>基本信息</h3>
                            </div> <!-- /widget-header -->

                            <div class="widget-content">

                                <form id="edit-profile" class="form-horizontal" />
                                <fieldset>

                                    <br>

                                    <div class="control-group">
                                        <label class="control-label" for="username">用户名：</label>
                                        <div class="controls">
                                            <input type="text" class="input-large disabled" id="username" value="<?php echo $customer[0]->customer_id?>"/>
                                            <p class="help-block">用户名是为登录而用，不能修改.</p>
                                        </div> <!-- /controls -->
                                    </div> <!-- /control-group -->


                                    <div class="control-group">
                                        <label class="control-label" for="name">姓名：</label>
                                        <div class="controls">
                                            <input type="text" class="input-medium" id="name" value="<?php echo $customer[0]->name?>" readonly="true" />
                                        </div> <!-- /controls -->
                                    </div> <!-- /control-group -->


                                    <div class="control-group">
                                        <label class="control-label" for="gender">性别：</label>
                                        <div class="controls">
                                            <input type="text" class="input-medium" id="gender" value="<?php if($customer[0]->gender){echo "男";}else{echo "女";}?>" readonly="true" />
                                        </div> <!-- /controls -->
                                    </div> <!-- /control-group -->


                                    <div class="control-group">
                                        <label class="control-label" for="citizenId">身份证号码：</label>
                                        <div class="controls">
                                            <input type="text" class="input-large" id="citizenId" readonly="true" value="<?php $str = $customer[0]->citizen_id; echo substr($str, 0, 6); echo "********"; echo substr($str, 14,4)?>" />
                                        </div> <!-- /controls -->
                                    </div> <!-- /control-group -->


                                    <div class="control-group">
                                        <label class="control-label" for="birthDate">出生日期：</label>
                                        <div class="controls">
                                            <input type="text" class="input-medium" id="birthDate" readonly="true" value="<?php echo $customer[0]->birthdate?>" />
                                        </div> <!-- /controls -->
                                    </div> <!-- /control-group -->

                                    <br> <br>

                                    <div class="control-group">
                                        <label class="control-label" for="createTime">创建时间：</label>
                                        <div class="controls">
                                            <input type="text" class="input-medium" id="createTime" readonly="true" value="<?php echo $customer[0]->create_time?>" />
                                        </div> <!-- /controls -->
                                    </div> <!-- /control-group -->

                                    <div class="control-group">
                                        <label class="control-label" for="breakCount">违规次数：</label>
                                        <div class="controls">
                                            <input type="text" class="input-medium" id="breakCount" readonly="true" value="<?php echo $customer[0]->break_count?>" />
                                        </div> <!-- /controls -->
                                    </div> <!-- /control-group -->

                                    <div class="control-group">
                                        <label class="control-label" for="balance">帐户余额：</label>
                                        <div class="controls">
                                            <input type="text" class="input-medium" id="balance" readonly="true" value="<?php echo "￥".$customer[0]->balance?>" />
                                        </div> <!-- /controls -->
                                    </div> <!-- /control-group -->

                                    <div class="control-group">
                                        <label class="control-label" for="level">用户等级：</label>
                                        <div class="controls">
                                            <input type="text" class="input-medium" id="level" readonly="true" value="<?php echo "VIP".$customer[0]->level?>" />
                                        </div> <!-- /controls -->
                                    </div> <!-- /control-group -->

                                    <br />

                                </fieldset>
                                </form>

                            </div> <!-- /widget-content -->

                        </div> <!-- /widget -->

                    </div> <!-- /span9 -->

                </div> <!-- /row -->

                <div class="row">

                    <div class="span9">

                        <div class="widget">

                            <div class="widget-header">
                                <h3>修改密码</h3>
                            </div> <!-- /widget-header -->

                            <div class="widget-content">

                                <form id="change-password" class="form-horizontal" action="<?php  base_url()?>index.php/customerMainPage/changePassword" method="post" />

                                <fieldset>

                                    <br>
                                    <div class="control-group">
                                        <label class="control-label" for="password">新密码：</label>
                                        <div class="controls">
                                            <input type="password" class="input-medium" name="password" id="password" value="" />
                                            <p class="help-block" style="color: red"><?php echo validation_errors(' ',' ');?></p>
                                        </div> <!-- /controls -->
                                    </div> <!-- /control-group -->

                                    <div class="control-group">
                                        <label class="control-label" for="rePassword">确认密码：</label>
                                        <div class="controls">
                                            <input type="password" class="input-medium" name="rePassword" id="rePassword" value="" />
                                        </div> <!-- /controls -->


                                    </div> <!-- /control-group -->

                                    <div class="form-actions">
                                        <br>
                                        <button type="submit" class="btn btn-primary">保存</button> <button class="btn">取消</button>
                                    </div>

                                </fieldset>

                                </form>

                            </div> <!-- /widget-content -->

                        </div> <!-- /widget -->

                    </div> <!-- /span9 -->

                </div> <!-- /row -->


            </div> <!-- /span9 -->


        </div> <!-- /row -->

    </div> <!-- /container -->

</div> <!-- /content -->

