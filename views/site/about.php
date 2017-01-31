<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading"><i class="fa fa-comments fa-1x"></i>This Is conten</div>
                <div class="clearfix" style="padding:10px">

                <div class="col-md-5 col-sm-6 col-xs-12">
                   	<div class="form-group">
        				<label class="control-label col-md-3">Text input</label>
				        <div class="col-md-9">			
				                <input type="text" name="NomorSprint" class="form-control" value="">
						</div>
					</div>
                </div>

                <div class="col-md-5 col-sm-6 col-xs-12">
                   		<label class="control-label col-md-3">Text input</label>
                   	<div class="form-group input-group">
						<input class="form-control" type="text">
						<span class="input-group-btn">
							<button class="btn btn-default" type="button">
								<!-- <i class="fa fa-search"></i> -->browse
							</button>
						</span>
					</div>
                </div>

                <div class="col-md-5 col-sm-6 col-xs-12">
                   	<div class="form-group">
                   		<label class="control-label col-md-3">Text Input</label>
				        <div class="col-md-9">			
				                <!-- <input type="text" name="NomorSprint" class="form-control" value=""> -->
							<textarea class="form-control" rows="3"></textarea>
						</div>
					</div>
                </div>

                <div class="col-md-5 col-sm-6 col-xs-12">
                   	<div class="form-group">
	                    	<label >Checkboxes</label>
	                    <div class="checkbox">
	                        <label>
	                            <input value="" type="checkbox">Checkbox 1
	                        </label>
	                    </div>
	                    <div class="checkbox">
	                        <label>
	                            <input value="" type="checkbox">Checkbox 2
	                        </label>
	                    </div>
	                    <div class="checkbox">
	                        <label>
	                            <input value="" type="checkbox">Checkbox 3
	                        </label>
	                    </div>
                    </div>
                </div>



                </div>
            </div>
        </div>
    </div>
</div>
