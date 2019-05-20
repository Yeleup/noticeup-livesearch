<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="submit" form="form-information" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
        <a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
      <h1><?php echo $heading_title; ?></h1>
      <ul class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
  <div class="container-fluid">
    <?php if ($success) { ?>
    <div class="alert alert-success"><i class="fa fa-exclamation-circle"></i> <?php echo $success; ?>
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    <?php } ?>
    <?php if ($error_warning) { ?>
    <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error_warning; ?>
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    <?php } ?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $text_edit; ?></h3>
      </div>
      <div class="panel-body">
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-information" class="form-horizontal">
          <div class="form-group">
           <label class="col-sm-2 control-label" for="minLength"><?php echo $min_length; ?></label>
           <div class="col-sm-10">
             <input value="<?php if($noticeuplivesearch_minLength){ echo $noticeuplivesearch_minLength;} ?>" type="number" name="noticeuplivesearch_minLength" class="form-control" id="minLength">
           </div>
          </div>
          <div class="form-group">
           <label class="col-sm-2 control-label" for="maxShownResults"><?php echo $max_shown_results; ?></label>
           <div class="col-sm-10">
             <input value="<?php if($noticeuplivesearch_maxShownResults){ echo $noticeuplivesearch_maxShownResults;} ?>" type="number" name="noticeuplivesearch_maxShownResults" class="form-control" id="maxShownResults">
           </div>
          </div>

          <div class="form-group">
           <label class="col-sm-2 control-label" for="visibleProperties"><?php echo $visible_properties; ?><span data-toggle="tooltip" title="<?php echo $tooltip_properties; ?>"></span></label>
           <div class="col-sm-10">
             <input type='text' data-selection-required='true' value='<?php if($noticeuplivesearch_visibleProperties){ echo $noticeuplivesearch_visibleProperties;} ?>' data-min-length='0' data-value-property='value' name="noticeuplivesearch_visibleProperties" class='flexdatalist' data-min-length='1' multiple='multiple' list='properties'>
              <datalist id="properties">
                <option value="image"><?php echo $image; ?></option>
                <option value="name"><?php echo $name; ?></option>
                <option value="price"><?php echo $price; ?></option>
                <option value="oldprice"><?php echo $old_price; ?></option>
                <option value="model"><?php echo $model; ?></option>
                <option value="manufacturer"><?php echo $manufacturer; ?></option>
              </datalist>
           </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="ImageWidth"><?php echo $image_width; ?></label>
           <div class="col-sm-1">
             <input value="<?php if($noticeuplivesearch_image_width){ echo $noticeuplivesearch_image_width;} ?>" type="number" name="noticeuplivesearch_image_width" class="form-control" id="imageWidth">
           </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="imageHeight"><?php echo $image_height; ?></label>
           <div class="col-sm-1">
             <input value="<?php if($noticeuplivesearch_image_height){ echo $noticeuplivesearch_image_height;} ?>" type="number" name="noticeuplivesearch_image_height" class="form-control" id="imageHeight">
           </div>
          </div>

          <div class="form-group">
           <label class="col-sm-2 control-label" for="groupBy"><?php echo $group_by_manufacturer; ?></label>
           <div class="col-sm-10">
             <input value="manufacturer" <?php if($noticeuplivesearch_groupBy){ echo 'checked';} ?> type="checkbox" name="noticeuplivesearch_groupBy" class="form-control" id="groupBy">
           </div>
          </div>

        </form>

        <p class="col-sm-5 col-sm-offset-2 text-info"><?php echo $style_info;?></p>
      </div>
    </div>
  </div>
</div>
<?php echo $footer; ?>
