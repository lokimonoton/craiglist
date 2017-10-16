<div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('city/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('city/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('city'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
        <th>Store Count</th>
        <th>City Id</th>
        <th>Region Code</th>
        <th>State Code</th>
        <th>City Name</th>
        <th>Total Institution</th>
        <th>Total Customer</th>
        <th>Input Datetime</th>
        <th>Input Username</th>
        <th>Active</th>
        <th>Action</th>
            </tr><?php
            foreach ($city_data as $city)
            {
                ?>
                <tr>
            <td width="80px"><?php echo ++$start ?></td>
            <td><?php echo $city->store_count ?></td>
            <td><?php echo $city->city_id ?></td>
            <td><?php echo $city->region_code ?></td>
            <td><?php echo $city->state_code ?></td>
            <td><?php echo $city->city_name ?></td>
            <td><?php echo $city->total_institution ?></td>
            <td><?php echo $city->total_customer ?></td>
            <td><?php echo $city->input_datetime ?></td>
            <td><?php echo $city->input_username ?></td>
            <td><?php echo $city->active ?></td>
            <td style="text-align:center" width="200px">
                <?php 
                 
                echo anchor(site_url('city/update/'.$city->city_code),'Update'); 
                echo ' | '; 
                echo anchor(site_url('city/delete/'.$city->city_code),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                ?>
            </td>
        </tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
        </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>