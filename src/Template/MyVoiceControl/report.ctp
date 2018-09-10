<?php
$link_org = ['controller' => 'complaint', 'action' => 'route'];
?>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<div class="col-sm-10">
    <div class="container-fluid">
        <div class="panel-block bg-transparent" id="reports">
            <h2 class="panel-block-title">Complaints</h2>
        </div>
        <?php
        echo $this->Form->create();
        ?>
        <div class="decorate-filter" style="background: #f1f1f1; padding: 10px; color: #222222;">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <?php
                        echo $this->Form->input('complaint_id', ['label' => 'Complaint Id', 'type' => 'text', 'class' => 'form-control', 'id' => 'complaint_id']);
                        ?>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select id="category" onchange="return filterSelected();"  name="category" class="form-control">
                            <option value="0" <?php if (empty($category)) echo 'selected=selected' ?>>All</option> 
                            <?php foreach ($getGategory as $displaycategory) { ?>
                                <option value="<?php echo $displaycategory['id']; ?>" <?php if (!empty($category) && $category == $displaycategory['id']) echo 'selected=selected'; ?> ><?php echo $displaycategory['name']; ?></option>
                            <?php } ?>   
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="sub category">Sub Category</label>
                        <select id="subCategory" name="subCategory"  class="form-control">
                            <?php if (empty($subcategory)) { ?>
                                <option value="" <?php echo 'selected=selected'; ?> >All</option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="severity">Severity</label>
                        <select id="severity" name="severity" class="form-control">
                            <!--<option value="">Select</option>-->
                            <option value="0" <?php if (empty($severity) && $severity === '') echo 'selected=selected'; ?>>All</option>
                            <option value="High" <?php if (!empty($severity) && 'High' == $severity) echo 'selected=selected'; ?>>High</option>
                            <option value="Medium" <?php if (!empty($severity) && 'Medium' == $severity) echo 'selected=selected'; ?>>Medium</option>
                            <option value="Low" <?php if (!empty($severity) && 'Low' == $severity) echo 'selected=selected'; ?>>Low</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="status">City</label>
                        <select class="form-control" name="city" id="city">
                            <!--<option value="">Select</option>-->
                            <option value="0" <?php if (empty($city)) echo 'selected=selected'; ?>>All</option>
                            <?php foreach ($getcity as $citys) { ?>
                                <option value="<?= $citys['city'] ?>" <?php if (!empty($city) && $citys['city'] == $city) echo 'selected=selected'; ?>><?php echo ucfirst($citys['city']); ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="date range">Pick Date From</label>
                        <input type="text" class="form-control" id="from_date" value="<?php if (!empty($from)) echo $from ?>" name="from" value="" />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="date range">Pick Date To</label>
                        <input type="text" class="form-control" id="to_date" name="to_date" value="<?php if (!empty($to)) echo $to ?>" />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="satus">Status</label>
                        <select id="status" name="case_status" class="form-control">
                            <!--<option value="">Select</option>-->
                            <option value="0" <?php if (empty($case_status)) echo 'selected=selected'; ?>>All</option>
                            <?php foreach ($status as $query) { ?>
                                <option value="<?php echo $query['id']; ?>" <?php if (!empty($case_status) && $query['id'] == $case_status) echo 'selected=selected'; ?>><?php echo $query['name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-right">
                    <div class="form-group">
                        <button  id="apply_filter" style="" class="btn btn-dark p-a-10" name="apply_filter">Apply Filter</button>
                    </div>
                </div>
            </div>
        </div>
        <?php
        echo $this->Form->end();
        ?>
        <hr>
        <div>
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Complaint Id</th>
                        <th>Title</th>
                        <th>Filed on</th>
                        <th>Category</th>
                        <th>Complainant</th>
                        <th>Offender</th>
                        <th>Status</th>
                        <th>Severity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($complaintData)) {
                        foreach ($complaintData as $complaint) {
                            $link=$link_org;
                            $link[]=$complaint['id'];
                            ?>
                            <tr>
                                <td>
                                    <?php
                                    $cid = "";
                                    if (!empty($complaint['complaint_id'])) {
                                        $cid = $complaint['complaint_id'];
                                    }
                                    echo $this->Html->link($cid, $link);
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $title = "";
                                    if (!empty($complaint['c_title'])) {
                                        $title = $complaint['c_title'];
                                    }
                                    echo $this->Html->link($title, $link);
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $filed_on = "";
                                    if (!empty($complaint['complaint_id_genrate_date'])) {
                                        $filed_on = date('d/m/Y', strtotime($complaint['complaint_id_genrate_date']));
                                    }
                                    echo $this->Html->link($filed_on, $link);
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $category = "";
                                    if (!empty($complaint['category']['name'])) {
                                        $category = $complaint['category']['name'];
                                    }
                                    echo $this->Html->link($category, $link);
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $complainant = "";
                                    if (!empty($complaint['name'])) {
                                        $complainant = $complaint['name'];
                                    }
                                    echo $this->Html->link($complainant, $link);
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $accused = "";
                                    if (!empty($complaint['accused'])) {
                                        foreach ($complaint['accused'] as $ac) {
                                            if ($accused == "") {
                                                $accused = $ac['accused_name'];
                                            } else {
                                                $accused = $accused . ", " . $ac['accused_name'];
                                            }
                                        }
                                    }
                                    echo $this->Html->link($accused, $link);
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $status_txt = "";
                                    if (!empty($complaint['cstatus']['name'])) {
                                        $status = $complaint['cstatus']['name'];
                                        $sts_cls = "label-success";
                                        $cstatus = $complaint['cstatus']['id'];
                                        //var_dump($cstatus);
                                        switch ($cstatus) {
                                            case 1:
                                                $sts_cls = "label-default";
                                                break;
                                            case 2:
                                                $sts_cls = "label-success";
                                                break;
                                            case 15:
                                                $sts_cls = "label-success";
                                                break;
                                            case 16:
                                                $sts_cls = "label-danger";
                                                break;
                                        }
                                        $status_txt = '<span class="label ' . $sts_cls . '">' . $status . '</span>';
                                    }
                                    echo $this->Html->link($status_txt, $link, ['escape' => false]);
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $severity = "";
                                    if (!empty($complaint['severity'])) {
                                        $severity = $complaint['severity'];
                                    }
                                    echo $this->Html->link($severity, $link);
                                    ?>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </div>
</div>        

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
                            $(document).ready(function () {
                                //   $.fn.dataTable.moment('DD/MM/YYYY');
                                $('#example').DataTable({
                                    "aaSorting": [],
                                    "columns": [
                                        {"width": "10%"},
                                        {"width": "30%"},
                                        {"width": "8%"},
                                        {"width": "8%"},
                                        {"width": "8%"},
                                        null,
                                        null,
                                        {"width": "8%"}
                                    ],

                                    "oLanguage": {
                                        "sEmptyTable": "No records found"
                                    }

                                    //}

                                });

                                $('#from_date').datepicker({
                                    changeMonth: true,
                                    changeYear: true,
                                    showButtonPanel: true,
                                    dateFormat: "m/d/yy",
                                    maxDate: 0

                                });
                                $('#to_date').datepicker({
                                    changeMonth: true,
                                    changeYear: true,
                                    showButtonPanel: true,
                                    dateFormat: "m/d/yy",
                                    maxDate: 0

                                });

                                var category = '<?php echo $category;                ?>';
                                //        console.log(category); return false;
                                var subcategory = '<?php echo $subcategory;                ?>';
                                if (category !== '') {
                                    $.ajax({
                                        url: '<?= $this->Url->build('/') . 'MyVoiceControl/getReportSubcate' ?>',
                                        data: {'sel': category},
                                        method: 'POST',
                                        success: function (data) {
                                            var d = $.parseJSON(data);
                                            $('#subCategory').html(d.html);
                                            if (subcategory !== '') {
                                                $('#subCategory').val(subcategory);
                                            }
                                        }
                                    });
                                }



                            });
                            function  filterSelected() {
                                var sel = $('#category').val();
                                if (sel !== '') {
                                    $.ajax({
                                        url: '<?= $this->Url->build('/') . 'MyVoiceControl/getReportSubcate' ?>',
                                        data: {'sel': sel},
                                        method: 'POST',
                                        success: function (data) {
                                            var d = $.parseJSON(data);
                                            $('#subCategory').html(d.html);
                                        }
                                    });
                                }
                                if (sel === '') {
                                    $('#subCategory').html('<option value="">All</option>');
                                }
                            }
</script>
<!-- code for fetching sub category based on category selection on dashboard file for supervisor -->
<style>
    #example {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        table-layout: fixed;
    }

    #example td, #example th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #example tr:nth-child(even){background-color: #f2f2f2;}

    #example tr:hover {background-color: #ddd;}

    #example th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #17bb94;
        color: white;
    }
</style>



